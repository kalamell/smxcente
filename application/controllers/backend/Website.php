<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{

		$this->rs = $this->db->join('province', 'config.province_id = province.PROVINCE_ID')->get('config')->result();
		$this->render('website/index', $this);
	}

	public function add()
	{
		$this->province = $this->db->get('province')->result();
		$this->render('website/add', $this);
	}

	public function dosave()
	{
		$this->db->insert('config', array(
			'province_id' => $this->input->post('province_id2'),
			'title' => $this->input->post('name'),
			'type_website' => $this->input->post('type_website'),
		));
		redirect('backend/website');
	}
}