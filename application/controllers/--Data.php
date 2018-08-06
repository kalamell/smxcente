<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('school_model', 'sm');
	}
	public function index()
	{
		
		$this->rs = $this->db->where('province_id', $this->province_id)->get('school')->result();
		
		$this->render('data/school', $this);
	}

	public function school($type)
	{
		if ($type == 'amphur') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
			$this->render('data/school-amphur', $this);
		} else if ($type == 'district') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
			$this->render('data/school-district', $this);
		} else if ($type == 'area') {
			$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
			$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
			$this->school_type = $this->db->select('area_code, area_code_name')->join('school', 'area.area_code = school.area_id')->group_by('area.area_code')->where('province_id', $this->province_id)->get('area')->result();
			
			$this->render('data/school-area', $this);
		} else {
			redirect('');
		}
	}

	public function id($id)
	{
		$this->rs = $this->sm->getSchool($id);
		$this->render('data/id', $this);

	}

	public function listschool()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->render('data/listschool', $this);
	}

	public function listschool2()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->select('area_code, area_code_name')->join('school', 'area.area_code = school.area_id')->group_by('area.area_code')->where('province_id', $this->province_id)->get('area')->result();
		$this->render('data/listschool2', $this);
	}

	public function listschoolarea()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->province_id = $this->province_id;
		$this->render('data/listschoolarea', $this);
	}

	public function listgender()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->render('data/listgender', $this);
	}

	public function listgender_level()
	{
		$this->rs = $this->db->get('level')->result();
		$this->render('data/listgender_level', $this);
	}

	public function listroom()
	{
		$this->rs = $this->db->get('level')->result();
		$this->render('data/listroom', $this);
	}

	public function listteacher()
	{
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('PROVINCE_ID', $this->province_id)->get('district')->result();
		$this->school_type = $this->db->where('school_type_name !=', '')->get('school_type')->result();
		$this->render('data/listteacher', $this);
	}

	public function academic_standing()
	{
		$this->rs = $this->db->get('academic_standing')->result();
		$this->render('data/academic_standing', $this);
	}
}
