<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Backend {
	public function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		$this->rs = $this->db->get('menu_config')->result();
		$this->render('menu/index', $this);
	}

	public function add()
	{
		$this->render('menu/add');
	}

	public function dosave()
	{
		$this->db->insert('menu_config', array(
			'name' => $this->input->post('name'),
			'sort' => $this->input->post('sort')
		));

		redirect('backend/menu');
	
	}

	public function sub_menu($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$config = array(
				array(
					'field' => 'sub_name',
					'rules' => 'required'
				),
				
				array(
					'field' => 'type',
					'rules' => 'required'
				),
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run()) {


				$this->db->insert('menu_sub', array(
					'link_id' => $id,
					'sub_name' => $this->input->post('sub_name'),
					'sub_sort' => $this->input->post('sub_sort'),
					'link' => $this->input->post('link'),
					'type' => $this->input->post('type'),
				));
			} 

			$sub_id = $this->input->post('sub_id');
			if (count($sub_id) > 0) {
				foreach($sub_id as $sid => $v) {
					$this->db->where('sub_id', $sid)->update('menu_sub', array(
						'sub_sort' => $v
					));
				}
			}


			$link = $this->input->post('link2');
			if (count($link) > 0) {
				foreach($link as $sid => $v) {
					$this->db->where('sub_id', $sid)->update('menu_sub', array(
						'link' => $v
					));
				}
			}

			$sub_name2 = $this->input->post('sub_name2');
			if (count($sub_name2) > 0) {
				foreach($sub_name2 as $sid => $v) {
					$this->db->where('sub_id', $sid)->update('menu_sub', array(
						'sub_name' => $v
					));
				}
			}

			//redirect('backend/menu/sub_menu/'.$id);
		}
		$this->rs = $this->db->where('link_id', $id)->order_by('sub_sort', 'ASC')->get('menu_sub')->result();
		$this->render('menu/sub', $this);
	}

	public function del_sub($link_id, $sub_id)	
	{
		$this->db->where('sub_id', $sub_id)->where('link_id', $link_id)->delete('menu_sub');
		redirect('backend/menu/sub_menu/'.$link_id);
	}

}