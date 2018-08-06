<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Base {

	public function __construct()
	{
		parent::__construct();
	}
	

	public function index()
	{
		$this->render('auth/login');
	}

	public function register()
	{
		$this->school = $this->db->select('school_id, school_name')->order_by('school_name', 'asc')->get('school')->result();
		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		
		$this->render('auth/register', $this);
	}

	public function do_login()
	{
		$config = array(
			array(
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'password',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$rs = $this->db->where(array(
				'username' => $this->input->post('username'),
				'password' => do_hash($this->input->post('password')),
				'active' => 'Y',
			))->get('member');
			if ($rs->num_rows() > 0) {
				if ($rs->row()->config_id == $this->config_id) {
					$this->session->set_userdata('id', $rs->row()->id);
					redirect('member');
				} else {
					if ($rs->row()->status == 'superadmin') {
						$this->session->set_userdata('id', $rs->row()->id);
						redirect('backend');
					} else {

						$r = $this->db->join('province', 'config.province_id = province.PROVINCE_ID')
								->where('config.id', $rs->row()->config_id)
								->get('config');
						if ($r->num_rows() == 0) {
							redirect('login');
						} else {
							redirect('http://'.$r->row()->PROVINCE_CODE.'.smxcenter.com');
						}
					}
				}
			} else {
				$this->session->set_flashdata('error', 1);
				redirect('login');
			}
		}
		redirect('login');
	}

	public function do_register()
	{
		$config = array(
			array(
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required|is_unique[member.username]',
				'errors' => array(
					'is_unique' => 'มีผู้ใช้งาน '.$this->input->post('username').' นี้แล้ว'
				)
			),
			array(
				'field' => 'password',
				'label' => 'password',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'required'
			),

			array(
				'field' => 'email',
				'label' => 'email',
				'rules' => 'valid_email|required|is_unique[member.email]',
				'errors' => array(
					'is_unique' => 'มีผู้ใช้งาน '.$this->input->post('email').' นี้แล้ว'
				)
			),

			array(
				'field' => 'surname',
				'label' => 'surname',
				'rules' => 'required'
			),

			array(
				'field' => 'area_type_id',
				'label' => 'area',
				'rules' => 'required'
			),

			array(
				'field' => 'school',
				'label' => 'school',
				'rules' => 'required'
			),

			
		);
		$this->form_validation->set_rules($config);
		$ar['result'] = false;
		if ($this->form_validation->run()) {
			$this->db->set('created_date', 'NOW()', false)->set('updated_date', "NOW()", false)->insert('member', array(
				'username' => $this->input->post('username'),
				'password' => do_hash($this->input->post('password')),
				'idcard' => $this->input->post('username'),
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'telephone' => $this->input->post('telephone'),
				'area_type_id' => $this->input->post('area_type_id'),
				'school' => $this->input->post('school'),
				'ip' => $this->input->ip_address(),
				'status' => 'staff',
				'active' => 'N',
				'config_id' => $this->config_id
			));

			//echo $this->db->last_query();

			
			$ar['result'] = true;
		} else {
			$ar['msg'] = validation_errors();
		}

		echo json_encode($ar);
	}


	public function check_idcard()
	{
		$rs = $this->db->where('username', $this->input->get('username'))->get('member');


		if ($rs->num_rows() ==0) {
			echo 'true';
		} else {
			echo 'false';
		}
	}


	public function check_email()
	{
		$rs = $this->db->where('email', $this->input->get('email'))->get('member');
		if ($rs->num_rows() ==0) {
			echo 'true';
		} else {
			echo 'false';
		}
	}


	public function list_school()
	{
		$rs = $this->db->where('area_id', $this->input->post('area'))->get('school');
		$ar = $rs->result_array();
		echo json_encode($ar);

	}


	public function list_school2()
	{
		$rs = $this->db->where('area_type_id', $this->input->post('area'))->get('school');
		$ar = $rs->result_array();
		echo json_encode($ar);

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function getamphur()
	{
		$rs = $this->db->where('PROVINCE_ID', $this->input->post('province_id'))->get('amphur');
		echo json_encode($rs->result_array());
	}

	public function getdistrict()
	{
		$rs = $this->db->where('AMPHUR_ID', $this->input->post('amphur_id'))->get('district');
		echo json_encode($rs->result_array());
	}

	public function list_school_area()
	{
		$rs = $this->db->where('area_id', $this->input->post('area_id'))->get('school');
		$ar = $rs->result_array();
		echo json_encode($ar);

	}

	public function list_school_province()
	{
		$rs = $this->db->where('province_id', $this->input->post('province_id'))->get('school');
		$ar = $rs->result_array();
		echo json_encode($ar);

	}

}
