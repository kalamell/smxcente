<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{

		
		$this->rs = $this->db->where('config_id', $this->config_id)->get('news')->result();
		$this->render('news/index', $this);
	}

	public function add()
	{
		$this->render('news/add');
	}
	public function edit($id)
	{
		$this->r = $this->db->where('id', $id)->get('news')->row();
		$this->render('news/edit', $this);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)->delete('news');
		redirect('backend/news');
	}

	public function dosave()
	{
		$config = array(
			array(
				'field' => 'title',
				'rules' => 'required'
			),
			array(
				'field' => 'description',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == false) redirect('backend/news/add');

		$this->db->set('created_date', 'NOW()', false)->insert('news', array(
			'title' => $this->input->post('title'),
			'config_id' => $this->config_id,
			'description' => $this->input->post('description')
		));

		redirect('backend/news');
	}

	public function update()
	{
		$config = array(
			array(
				'field' => 'id',
				'rules' => 'required'
			),
			array(
				'field' => 'title',
				'rules' => 'required'
			),
			array(
				'field' => 'description',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == false) redirect('backend/news/add');

		$this->db->where('id', $this->input->post('id'))->update('news', array(
			'title' => $this->input->post('title'),
			'config_id' => $this->config_id,
			'description' => $this->input->post('description')
		));

		redirect('backend/news');
	}
}