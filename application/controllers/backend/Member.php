<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_userdata('txt', $this->input->post('txt'));
			$this->session->set_userdata('active', $this->input->post('active'));
			redirect('backend/member');
		}

		$this->rs = $this->_getmember();
		
		$this->render('member/index', $this);
	}




	private function _getmember()
	{
		/*
		
		$this->db->select('*,member.id as member_id')
				->join('school', 'member.school = school.school_id', 'LEFT')
				->join('config', 'member.config_id = config.id', 'LEFT')
				->join('area_type', 'member.area_type_id = area_type.area_type_id', 'LEFT')
				->group_by('member.id')
				->order_by("FIELD(status, 'superadmin', 'admin_province', 'admin_area', 'staff', 'member') ASC", NULL, false);
		*/

		$w = '';
		$type = '';

		if (!isSuperAdmin()) {
			//$this->db->reset_query();
			//$this->db->where('mebmer.province_id', $this->config_id);
			$w.= "WHERE  member.config_id = '".$this->config_id."' ";
		}

		

		
		if ($this->session->userdata('txt')) {
			//$this->db->like('name', $this->session->userdata('txt'));
			if ($w == '') {
				$w.= "WHERE name like '%".$this->session->userdata('txt')."%'";
			} else {
				$w.= "AND name like '%".$this->session->userdata('txt')."%'";
			}
		}


		if ($this->session->userdata('active')) {
			//$this->db->like('name', $this->session->userdata('txt'));
			if ($w == '') {
				$w.= "WHERE active = 'N'";
			} else {
				$w.= "AND active = 'N'";
			}
		}


		if (isAdminProvince()) {
			
			$type = '';
			if ($w == '') {
				$type = '  ';
			} else {
				$type = '  ';

			}

			$query = $type." OR ( member.config_id = '".$this->config_id."' AND (status = 'admin_province' OR status = 'admin_area' OR status ='staff' OR status = 'member'))";
			//$this->db->where($query, NULL);
			$w.= $query;
		}

		if (isAdminArea()) {

			$type = '';
			if ($w == '') {

				$type = '  ';
			} else {
				$type = '  ';

			}


			$query = $type." OR ( member.area_type_id = '".$this->area_type_id."' AND (status ='staff' OR status = 'member'))";
			//$this->db->where($query, NULL);

			$w.= $query;
		}

		
		$q = '';

		if ($this->session->userdata('active')) {
			//$this->db->like('name', $this->session->userdata('txt'));
			if ($w == '') {
				$q.= "WHERE active = 'N'";
			} else {
				$q.= "AND active = 'N'";
			}
		}


		$query = "SELECT *, `member`.`id` as `member_id` FROM `member` LEFT JOIN `school` ON `member`.`school` = `school`.`school_id` LEFT JOIN `config` ON `member`.`config_id` = `config`.`id` LEFT JOIN `area_type` ON `member`.`area_type_id` = `area_type`.`area_type_id` ".$w." ".$q." GROUP BY `member`.`id` ORDER BY FIELD(status, 'superadmin', 'admin_province', 'admin_area', 'staff', 'member') ASC";

		//echo $query;
		

		$rs = $this->db->query($query);

	

		return $rs->result();

	}

	public function login($id)
	{
		$this->session->set_userdata('id', $id);
		redirect('member');
	}

	public function add()
	{
		if (isAdminProvince() || isAdminArea()) {
			$this->db->where('PROVINCE_ID', $this->province_id);
		}

		$this->province = $this->db->get('province')->result();
		$this->config_data = $this->db->get('config')->result();

		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}

		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();

		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}
		$this->school = $this->db->where('province_id', $this->province_id)->get('school')->result();
		
		$this->render('member/add', $this);
	}

	public function edit($id)
	{

		if (isAdminProvince() || isAdminArea()) {
			$this->db->where('PROVINCE_ID', $this->province_id);
		}
		$this->province = $this->db->get('province')->result();
		$this->r = $this->db->where('id', $id)->get('member')->row();


		$this->config_data = $this->db->get('config')->result();
		$this->config_id = $this->config_id;

		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}
		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();

		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}
		$this->school = $this->db->where('province_id', $this->province_id)->get('school')->result();
		
		$this->render('member/edit', $this);
	}


	public function dosave()
	{
		$config = array(
			
			array(
				'field' => 'name',
				'rules' => 'required'
			),
			array(
				'field' => 'surname',
				'rules' => 'required'
			),

			array(
				'field' => 'username',
				'rules' => 'required|is_unique[member.username]'
			),

			array(
				'field' => 'password',
				'rules' => 'required'
			),

		);
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('save', '');
			redirect('backend/member/add');
		}

		$this->db->insert('member', array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'username' => $this->input->post('username'),
			'password' => do_hash($this->input->post('password')),
			'active' => $this->input->post('active'),
			'status' => $this->input->post('status'),
			'area_type_id' => $this->input->post('area_type_id'),
			'province_id' => $this->input->post('province_id2'),
			'config_id' => $this->config_id,
		));

		redirect('backend/member');

	}


	public function update()
	{
		$w = '';

		$rs = $this->db->where('username', $this->input->post('username'))->where('id !=', $this->input->post('id'))->get('member');
		if ($rs->num_rows() > 0) {
			$w = '|is_unique[member.username]';
		}

		$config = array(
			array(
				'field' => 'id',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'rules' => 'required'
			),
			array(
				'field' => 'surname',
				'rules' => 'required'
			),

			array(
				'field' => 'username',
				'rules' => 'required'.$w
			),

		);
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('save', '');
			redirect('backend/member/add');
		}

		if ($this->input->post('password')!=NULL) {
			$this->db->set('password', do_hash($this->input->post('password')));
		}

		$this->db->where('id', $this->input->post('id'))->update('member', array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'username' => $this->input->post('username'),
			'active' => $this->input->post('active'),
			'status' => $this->input->post('status'),
			'area_type_id' => $this->input->post('area_type_id'),
			'province_id' => $this->input->post('province_id2'),
			'config_id' => $this->config_id,
		));

		redirect('backend/member');

	}


	public function delete($id)
	{
		$this->db->where('id', $id)->delete('member');
		redirect('backend/member');

	}

}