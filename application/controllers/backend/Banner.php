<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{

		
		$this->rs = $this->db->where('config_id', $this->config_id)->get('banner')->result();
		$this->render('banner/index', $this);
	}

	public function add()
	{
		$this->render('banner/add');
	}
	

	public function delete($id)
	{
		$this->load->helper('file');
		$rs = $this->db->where('id', $id)->get('banner');
		if ($rs->num_rows()>0) {
			$file = $rs->row()->path;
			unlink('upload/banner/'.$file);
		}
		$this->db->where('id', $id)->delete('banner');
		redirect('backend/banner');
	}

	public function dosave()
	{
		$config = array(
			'upload_path' => './upload/banner/',
			'file_name' => 'banner-'.$this->province_id.'-'.time(),
			'allowed_types' => 'jpg|gif|png|JPEG|JPG',
		);
		if(is_file($config['upload_path']))
		{
		    chmod($config['upload_path'], 777); ## this should change the permissions
		}
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('path')) {
			$data = $this->upload->data();
			$this->db->insert('banner', array(
				'path' => $data['file_name'],
				'config_id' => $this->config_id
			));

			//chmod($config['upload_path'], 755); ## this should change the permissions
		} 
		redirect('backend/banner');
	}

	
}