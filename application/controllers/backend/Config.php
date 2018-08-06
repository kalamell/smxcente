<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		if (isAdminArea()) {
			redirect('backend/school');
		}

		$this->r = $this->db->where('id', $this->config_id)->get('config')->row();

		$this->menu_config = $this->db->order_by('sort', 'asc')->get('menu_config')->result();
		$this->menu_sub = $this->db->order_by('sub_sort', 'asc')->get('menu_sub')->result();
		$this->menu_website = $this->db->where('config_id', $this->config_id)->get('menu_website')->result();
		$this->provinces = $this->db->order_by('CONVERT( PROVINCE_NAME USING tis620 ) ASC', null)->get('province')->result();

		$this->link = $this->db->where('config_id', $this->config_id)->get('config_link')->result();
		$this->terms = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();
		$this->render('config', $this);
	}

	public function update()
	{
		$config = array(
			array(
				'field' => 'id',
				'rules' => 'required'
			),
			
			array(
				'field' => 'footer',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$this->db->where('id', $this->input->post('id'))->update('config', array(
				'title' => $this->input->post('title'),
				'province_id' => $this->input->post('province_id'),
				'footer' => $this->input->post('footer'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'year_id' => $this->input->post('year_id'),
				'term_id' => $this->input->post('term_id'),
			));

			$config = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|png|JPEG|PNG',
				'file_name' => 'logo-'.$this->province_id,
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('logo')) {
				$data = $this->upload->data();
				$this->db->where('id', $this->input->post('id'))->update('config', array(
					'logo' => $data['file_name'],
				));
			}
		}

		$menu = $this->input->post('menu_sub');

		if (count($menu) > 0) {
			$this->db->where('config_id', $this->input->post('id'))->delete('menu_website');

			foreach($menu as $k => $sub_id)
			{
				$this->db->insert('menu_website', array(
					'config_id' => $this->input->post('id'),
					'sub_id' => $sub_id
				));
			}
		}


		$config = array(
			array(
				'field' => 'link_name',
				'rules' => 'required'
			),
			
			array(
				'field' => 'link_url',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$this->db->insert('config_link', array(
				'config_id' => $this->config_id,
				'link_url' => $this->input->post('link_url'),
				'link_name' => $this->input->post('link_name'),
			));
			$link_id = $this->db->insert_id();


			$config = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|png|JPEG|PNG',
				'file_name' => 'link-'.$link_id,
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('link_thumbnail')) {
				$data = $this->upload->data();
				$this->db->where('link_id', $link_id)->update('config_link', array(
					'link_thumbnail' => $data['file_name'],
				));
			}

		}

		redirect('backend/config');
	}

	public function delete_link($link_id) {
		$this->db->where('link_id', $link_id)->where('config_id', $this->config_id)->delete('config_link');
		redirect('backend/config');
	}

}