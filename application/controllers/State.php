<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('school_model', 'sm');
	}

	public function index()
	{
		$this->year = $this->db->get('years')->result();
		$this->render('state/index', $this);
	}
	
	public function detail() {
		$this->school = array();



		if ($this->session->userdata('txt')!=NULL || $this->session->userdata('area_type_id') != NULL) {
			$this->school = $this->db->like('school_name', $this->session->userdata('txt'))
				->where('area_type_id', $this->session->userdata('area_type_id'))
				->where('province_id', $this->province_id)
				->like('f9', 'อ')
				->where('type_school is not null', null, false)
				->get('school')->result();	

			//echo $this->db->last_query();
		}

		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		$this->render('state/detail', $this);
	}

	public function school($id) {
		$this->year = $this->db->order_by('year_id', 'DESC')->get('years')->result();
		$this->load->view('state/school', $this);
	}


	public function search() {
		$this->session->set_userdata('txt', $this->input->post('school_name'));
		$this->session->set_userdata('school_type', $this->input->post('school_type'));
		$this->session->set_userdata('area_type_id', $this->input->post('area_type_id'));
		redirect('state/detail');
	}


	public function list_report() {
		$config = array(
			array(
				'field' => 'year_id',
				'label' => 'Year ID',
				'rules' => 'required',
			),
			array(
				'field' => 'report_type',
				'label' => 'REPORT TYPE',
				'rules' => 'required',
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {

			$this->year_id = $this->input->post('year_id');
			$this->province = $this->province_id;

			//echo 'province_id'. $this->province_id;

			if ($this->input->post('report_type') == 'province') {
				$this->load->view('state/report_type_province', $this);
			}

			if ($this->input->post('report_type') == 'area') {
				$this->load->view('state/report_type_area', $this);
			}


		} else {
			echo '';
		}
	}
}
