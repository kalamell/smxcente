<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	protected $province_code;
	protected $province_id;
	protected $config_id;
	protected $area_type_id;
	public function __construct()
	{
		parent::__construct();
		$this->updateField();

		$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
		$rs = $this->db->select('config.id, config.province_id')
				->where('province.PROVINCE_CODE', $dat)
				->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

		

		$this->province_id = $rs->row()->province_id;
		$this->province_code = $dat;
		$this->config_id = $rs->row()->id;


		$member = $this->db->where('id', $this->session->userdata('id'))->get('member')->row();
		$this->area_type_id = $member->area_type_id;
	}

	protected function render($view, $data = array(), $return = false) 
	{
		if (!$return) {
			$this->load->view('header', $data);
			$this->load->view($view, $data);
			$this->load->view('footer', $data);
		} else {
			$html = $this->load->view('header', $data, true);
			$html.=$this->load->view($view, $data, true);
			return $html;
		}
	}

	private function updateField()
	{
		
	}
}

class Backend extends CI_Controller
{
	protected $province_code;
	protected $province_id;
	protected $config_id;
	protected $area_type_id;
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if (!isBackend()) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}

		$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
		$rs = $this->db->select('config.id, config.province_id')
				->where('province.PROVINCE_CODE', $dat)
				->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

		

		$this->province_id = $rs->row()->province_id;
		$this->province_code = $dat;
		$this->config_id = $rs->row()->id;

		$member = $this->db->where('id', $this->session->userdata('id'))->get('member')->row();
		$this->area_type_id = $member->area_type_id;
		
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view('backend/'.$view, $data);
		$this->load->view('footer', $data);
	}
}

class Base_Member extends CI_Controller {

	protected $province_code;
	protected $province_id;
	protected $config_id;
	protected $area_type_id;
	

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')==NULL) redirect('login');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->set_flashdata('save', 1);
		}

		$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
		$rs = $this->db->select('config.id, config.province_id')
				->where('province.PROVINCE_CODE', $dat)
				->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

		

		$this->province_id = $rs->row()->province_id;
		$this->province_code = $dat;
		$this->config_id = $rs->row()->id;

		
		$member = $this->db->where('id', $this->session->userdata('id'))->get('member')->row();
		$this->area_type_id = $member->area_type_id;
		
		
		
	}

	protected function render($view, $data = array()) 
	{
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}
}


