<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Backend {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('school_model', 'sm');
	} 

	public function index()
	{
		if (isAdminArea()) {
			$this->db->where('school.area_type_id', $this->area_type_id);

		}
		$this->rs = $this->db->select('gender, age, SUM(total) as total')->order_by('age', 'asc')->join('school', 'school_student_age.school_id = school.school_id')
						->where('province_id', $this->province_id)
						->group_by('age, gender')
						->get('school_student_age')->result();

		


		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();

		$this->render('student/index', $this);
	}


	public function update_age_data()
	{
		$this->sm->update_age_data($this->input->post('term'), $this->input->post('years'));


		
		redirect('backend/student');
	}
}