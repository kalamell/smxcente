<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_type extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{

		
		$this->rs = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		//echo $this->db->last_query();
		$this->render('area_type/index', $this);
	}


	public function getdata()
	{
		$this->rs = $this->db->where('province_id', $this->province_id)->where("type", $this->input->post('type'))->get('area_type')->result();
		$this->load->view('backend/area_type/getdata', $this);
	}


	public function add()
	{
		$this->render('area_type/add');
	}
	public function edit($id)
	{
		$this->r = $this->db->where('area_type_id', $id)->get('area_type')->row();
		$this->render('area_type/edit', $this);
	}

	public function delete($id)
	{
		$this->db->where('area_type_id', $id)->delete('area_type');
		redirect('backend/area_type');
	}

	public function dosave()
	{
		$config = array(
			array(
				'field' => 'area_type_name',
				'rules' => 'required'
			),
			
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == false) redirect('backend/area_type/add');

		$this->db->insert('area_type', array(
			'area_type_name' => $this->input->post('area_type_name'),
			'type' => $this->input->post('type'),
			'province_id' => $this->province_id
		));

		redirect('backend/area_type');
	}

	public function update()
	{
		$config = array(
			array(
				'field' => 'area_type_id',
				'rules' => 'required'
			),
			array(
				'field' => 'area_type_name',
				'rules' => 'required'
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == false) redirect('backend/area_type');

		$this->db->where('area_type_id', $this->input->post('area_type_id'))->update('area_type', array(
			'area_type_name' => $this->input->post('area_type_name'),
			'type' => $this->input->post('type'),
			'province_id' => $this->province_id
		));

		redirect('backend/area_type');
	}
}