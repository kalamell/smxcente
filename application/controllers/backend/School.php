<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends Backend {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	} 

	public function index()
	{
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url'] = site_url('backend/school/index');

		$this->db->reset_query();


		$num = $this->db->where('province_id', $this->province_id);

		

		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}

		if ($this->session->userdata('txt')) {
			$num = $this->db->like('school_name', $this->session->userdata('txt'))
					->or_like('school_id', $this->session->userdata('txt'))
					->count_all_results('school');
		} else {
			$num = $this->db->count_all_results('school');
		}

		


		$config['total_rows'] = $num;
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;


		if (isAdminArea()) {
			$this->db->where('school.area_type_id', $this->area_type_id);
		}
		
		$rs = $this->db->join('area_type', 'school.area_type_id = area_type.area_type_id', 'LEFT')
					->where('school.province_id', $this->province_id)
					->order_by('school.id', 'ASC')
					->limit($config['per_page'], $this->uri->segment(4));


		if ($this->session->userdata('txt')) {
			$this->db->like('school_name', $this->session->userdata('txt'));
			$this->db->or_like('school_id', $this->session->userdata('txt'));
		}
		$this->db->where('school.province_id', $this->province_id);
		$rs = $this->db->get('school')->result();

		$this->rs = $rs;


		$this->pagination->initialize($config);



		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();


		$this->org_type = $this->db->get('org_type')->result(); //สังกัด
		$this->ministry = $this->db->get('ministry')->result(); //กระทยวง
		$this->department = $this->db->get('department')->result(); //สำนัก
		$this->municipal = $this->db->get('municipal')->result(); //เขตเทศบาล
		$this->inspect = $this->db->get('inspect')->result(); // เขตตรวจราชการ

		

		$this->school_sub = $this->db->where('area_id', $this->rs->area_id)->get('school')->result();
		$this->school_room_sub = $this->db->where('school_id', $this->school_id)->get('school_room_sub')->result();

		$this->room_level = $this->db->order_by('rmid', 'ASC')->order_by('sort', 'ASC')->get('room_level')->result();

		$this->level = $this->db->get('level')->result();


		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}

		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();

		



		$this->render('school/index', $this);
	}

	public function data()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$school_data = $this->input->post('teacher_total');
			if (count($school_data) > 0) {
				foreach($school_data as $sid => $v) {
					$std = $this->input->post('teacher_standard');
					$chk = $this->db->where('school_id', $sid)->get('school_data');
					if ($chk->num_rows() == 0) {
						$this->db->insert('school_data', array(
							'school_id' => $sid,
							'teacher_total' => $v,
							'teacher_standard' => $std[$sid],
						));
					} else {
						$this->db->where('school_id', $sid)->update('school_data', array(
							'teacher_total' => $v,
							'teacher_standard' => $std[$sid],
						));
					}
				}
			}

			redirect(current_url());
		}
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url'] = site_url('backend/school/data');

		
		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}

		$config['total_rows'] = $this->db->where('province_id', $this->province_id)->count_all_results('school');
		$config['per_page'] = 100;
		$config['uri_segment'] = 4;

		

		if (isAdminArea()) {
			$this->db->where('school.area_type_id', $this->area_type_id);
		}
		
		$this->rs = $this->db->select('*,school.school_id')
					->join('area_type', 'school.area_type_id = area_type.area_type_id', 'LEFT')
					->join('school_data', 'school.school_id = school_data.school_id', 'LEFT')
					->where('school.province_id', $this->province_id)
					->order_by('school.id', 'ASC')
					->group_by('school.school_id')
					->limit($config['per_page'], $this->uri->segment(4))
					->get('school')->result();


		$this->pagination->initialize($config);



		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();


		$this->org_type = $this->db->get('org_type')->result(); //สังกัด
		$this->ministry = $this->db->get('ministry')->result(); //กระทยวง
		$this->department = $this->db->get('department')->result(); //สำนัก
		$this->municipal = $this->db->get('municipal')->result(); //เขตเทศบาล
		$this->inspect = $this->db->get('inspect')->result(); // เขตตรวจราชการ

		

		$this->school_sub = $this->db->where('area_id', $this->rs->area_id)->get('school')->result();
		$this->school_room_sub = $this->db->where('school_id', $this->school_id)->get('school_room_sub')->result();

		$this->room_level = $this->db->order_by('rmid', 'ASC')->order_by('sort', 'ASC')->get('room_level')->result();

		$this->level = $this->db->get('level')->result();


		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}

		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();

		



		$this->render('school/data', $this);
	}


	public function do_search()
	{
		$this->session->set_userdata('txt', $this->input->post('txt'));
		redirect('backend/school');
	}

	private function getAreaId($area_code, $area_code_name)
	{
		$rs = $this->db->where('area_code', $area_code)->get('area');
		if ($rs->num_rows() == 0) {
			$this->db->insert('area', array(
				'area_code' => $area_code,
				'area_code_name' => $area_code_name
			));
		} else {
			$this->db->where('area_code', $area_code)->update('area', array(
				'area_code_name' => $area_code_name
			));
		}

		return $area_code;
	}

	private function getSchoolType($school_type_name) 
	{
		$rs = $this->db->where('school_type_name', $school_type_name)->get('school_type');
		if ($rs->num_rows() == 0) {
			$this->db->insert('school_type', array(
				'school_type_name' => $school_type_name
			));
			return $this->db->insert_id();
		} else {
			return $rs->row()->school_type_id;
		}
	}

	private function getSchoolSize($school_size_id) 
	{
		$rs = $this->db->where('school_size_id', $school_size_id)->get('school_size');
		if ($rs->num_rows() == 0) {
			$this->db->insert('school_size', array(
				'school_size_id' => $school_size_id
			));
			return $school_size_id;
		} else {
			return $rs->row()->school_size_id;
		}
	}


	private function getGroupId($area_code, $group_name) 
	{
		$rs = $this->db->where('area_code', $area_code)->where('group_name', $group_name)->get('groups');
		if ($rs->num_rows() == 0) {
			$this->db->insert('groups', array(
				'area_code' => $area_code,
				'group_name' => $group_name
			));
			return $this->db->insert_id();
		} else {
			return $rs->row()->group_id;
		}
	}


	public function import_data_school()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = 'school-data-update-'.time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();
        	$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			print_r($data);

			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	print_r($data);

			    	list($area_id, $area_name, $school_id, $percode, $code10, $school_name, $no, $land, $land_wa, $land_work, $land_rai, $wat) = explode(",", $data);
			    	$this->db->where('school_id', $school_id)->update('school', array(
			    		'land' => $land,
			    		'land_wa' => $land_wa,
			    		'land_rai' => $land_rai,
			    		'land_work' => $land_work,
			    		'wat' => $wat
			    	));

			    	
					
			    }
			    $k++;
			}
        }
        redirect('backend/school');

	}


	public function import_map_school()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = 'school-map-update-'.time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();
        	$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;

			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	print_r($data);

			    	list($school_id, $school_name, $lat, $lng) = explode(",", $data);
			    	$this->db->where('school_id', $school_id)->update('school', array(
			    		'lat' => $lat,
			    		'lng' => $lng
			    	));

			    	
					
			    }
			    $k++;
			}
        }
        redirect('backend/school');

	}

	public function import_private()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = 'schol-private'.time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();

        	

			$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	list($school_id, $school_name, $level, $moo, $road, $tumbon, $amphur, $province, $zipcode, $mobile, $fax, $area_code) = explode(",", $data);
					
					//echo $pk.'-'.$stkey.' - '.$no.'-'.$area_code.'-'.$area_code_name.'-'.$school_name.'-'.$school_name_en.'-'.$code10.'-'.$code8.'-'.$school_type_name.'-'.$group_name.'<br>';

			    	$check = $this->db->where('school_id', $school_id)->get('school');
			    	

			    	
			    	$province_id = $this->db->like('PROVINCE_NAME', $province)->get('province')->row()->PROVINCE_ID;

			    	$amphur_id = $this->getAmphur($province_id, $amphur);
			    	$district_id = $this->getDistrict($province_id, $amphur_id, $tumbon);

			    	

			    	if ($check->num_rows() == 0) {
			    		$this->db->insert('school', array(
			    			'school_id' => $school_id,
			    			'area_id' => $area_code,
			    			'school_name' => $school_name,
			    			'f9' => $level,
			    			'zipcode' => $zipcode,
			    			'telephone' => $mobile,
			    			'fax' => $fax,
			    			'moo' => $moo,
			    			'road' => $road,
			    			'province_id' => $province_id,
			    			'amphur_id' => $amphur_id,
			    			'district_id' => $district_id,
			    			'area_type_id' => $this->input->post('area_type_id2'),
			    			'type_school' => $this->input->post('type_school'),
			    			'm_id' => $this->input->post('m_id'),
			    			'ins_id' => $this->input->post('ins_id'),
			    		));

			    		

			    	} else {
			    		$this->db->where('school_id', $school_id)->update('school', array(
			    			'area_id' => $area_code,
			    			'school_name' => $school_name,
			    			'f9' => $level,
			    			'zipcode' => $zipcode,
			    			'telephone' => $mobile,
			    			'fax' => $fax,
			    			'moo' => $moo,
			    			'road' => $road,
			    			'province_id' => $province_id,
			    			'amphur_id' => $amphur_id,
			    			'district_id' => $district_id,
			    			'area_type_id' => $this->input->post('area_type_id2'),
			    			'type_school' => $this->input->post('type_school'),
			    			'm_id' => $this->input->post('m_id'),
			    			'ins_id' => $this->input->post('ins_id'),
			    		));

			    	}

			    }
			    $k++;
			}
			fclose($handle);


        } 
        redirect('backend/school');

	}


	public function import()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();

        	

			$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	list($geo_id, $province_code, $no, $area_code, $area_code_name, $school_name, $school_name_en, $school_head, $obec_id, $school_id, $f8, $school_type_name, $group_name, $moo, $tumbon, $amphur, $province, $zipcode, $email, $website, $opt, $mobile, $fax, $startdate, $land1, $land2, $type, $pea, $date) = explode(",", $data);
					
					//echo $pk.'-'.$stkey.' - '.$no.'-'.$area_code.'-'.$area_code_name.'-'.$school_name.'-'.$school_name_en.'-'.$code10.'-'.$code8.'-'.$school_type_name.'-'.$group_name.'<br>';

			    	$check = $this->db->where('school_id', $school_id)->get('school');
			    	$area_code = $this->getAreaId($area_code, $area_code_name);

			    	$school_type_id = $this->getSchoolType($school_type_name);
			    	$group_id = $this->getGroupId($area_code, $group_name);
			    	$school_size_id = $this->getSchoolSize($type);

			    	$province_id = $this->db->where('PROVINCE_CODE', $province_code)->get('province')->row()->PROVINCE_ID;

			    	$amphur_id = $this->getAmphur($province_id, $amphur);
			    	$district_id = $this->getDistrict($province_id, $amphur_id, $tumbon);

			    	$area_type_id = $this->getAreaTypeId($this->input->post('area_type_id'), $this->input->post('type_school'), $province_id);


			    	if ($check->num_rows() == 0) {
			    		$this->db->insert('school', array(
			    			'geo_id' => $geo_id,
			    			'area_id' => $area_code,
			    			'province_code' => $province_code,
			    			'school_name' => $school_name,
			    			'school_name_en' => $school_name_en,
			    			'school_head' => $school_head,
			    			'obec_id' => $obec_id,
			    			'school_id' => $school_id,
			    			'f8' => $f8,
			    			'school_type_id' => $school_type_id,
			    			'f9' => $school_type_name,
			    			'group_id' => $group_id,
			    			'zipcode' => $zipcode,
			    			'email' => $email,
			    			'website' => $website,
			    			'telephone' => $mobile,
			    			'fax' => $fax,
			    			'school_size_id' => $school_size_id,
			    			'moo' => $moo,
			    			'province_id' => $province_id,
			    			'amphur_id' => $amphur_id,
			    			'district_id' => $district_id,
			    			'area_type_id' => $this->input->post('area_type_id2'),
			    			'type_school' => $this->input->post('type_school'),
			    			'm_id' => $this->input->post('m_id'),
			    			'ins_id' => $this->input->post('ins_id'),
			    		));

			    		

			    	} else {
			    		$this->db->where('school_id', $school_id)->update('school', array(
			    			'geo_id' => $geo_id,
			    			'area_id' => $area_code,
			    			'province_code' => $province_code,
			    			'school_name' => $school_name,
			    			'school_name_en' => $school_name_en,
			    			'school_head' => $school_head,
			    			'obec_id' => $obec_id,
			    			'school_id' => $school_id,
			    			'f8' => $f8,
			    			'school_type_id' => $school_type_id,
			    			'f9' => $school_type_name,
			    			'group_id' => $group_id,
			    			'zipcode' => $zipcode,
			    			'email' => $email,
			    			'website' => $website,
			    			'telephone' => $mobile,
			    			'fax' => $fax,
			    			'school_size_id' => $school_size_id,
			    			'moo' => $moo,
			    			'province_id' => $province_id,
			    			'amphur_id' => $amphur_id,
			    			'district_id' => $district_id,
			    			'area_type_id' => $this->input->post('area_type_id2'),
			    			'type_school' => $this->input->post('type_school'),
			    			'm_id' => $this->input->post('m_id'),
			    			'ins_id' => $this->input->post('ins_id'),
			    		));

			    		

			    	}

			    }
			    $k++;
			}
			fclose($handle);


        } 
        redirect('backend/school');
	}

	
	public function getAmphur($province_id, $amphur)
	{
		$rs = $this->db->where('PROVINCE_ID', $province_id)->like('AMPHUR_NAME', $amphur)->get('amphur');
		return $rs->row()->AMPHUR_ID;
	}

	public function getDistrict($province_id, $amphur_id, $name)
	{
		$rs = $this->db->where('PROVINCE_ID', $province_id)->where('AMPHUR_ID', $amphur_id)->like('DISTRICT_NAME', $name)->get('district');
		return $rs->row()->DISTRICT_ID;

	}

	public function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			

			$this->db->insert('school', array(
				'school_id'                 => $this->input->post('school_id'),
				'f8'                 => $this->input->post('f8'),
				'province_school_id' => $this->input->post('province_school_id'),
				'school_name'        => $this->input->post('school_name'),
				'school_name_en'     => $this->input->post('school_name_en'),
				'area_id'            => $this->input->post('area_id'),
				'school_head'        => $this->input->post('school_head'),
				'f21'                => $this->input->post('f21'),
				'school_no'          => $this->input->post('school_no'),
				'f11'                => $this->input->post('f11'),
				'moo'                => $this->input->post('moo'),
				'road'               => $this->input->post('road'),
				'district_id'        => $this->input->post('district_id'),
				'amphur_id'          => $this->input->post('amphur_id'),
				'province_id'        => $this->province_id,
				'zipcode'            => $this->input->post('zipcode'),
				'telephone'          => $this->input->post('telephone'),
				'telephone2'         => $this->input->post('telephone2'),
				'fax'                => $this->input->post('fax'),
				'fax2'               => $this->input->post('fax2'),
				'email'              => $this->input->post('email'),
				'website'            => $this->input->post('website'),
				'land'               => $this->input->post('land'),
				'wat'                => $this->input->post('wat'),
				'lat'                => $this->input->post('lat'),
				'lng'                => $this->input->post('lng'),
				'org_type_id'        => $this->input->post('org_type_id'),
				'm_id'               => $this->input->post('m_id'),
				'dep_id'             => $this->input->post('dep_id'),
				'mun_id'             => $this->input->post('mun_id'),
				'ins_id'             => $this->input->post('ins_id'),
				'type_school'        => $this->input->post('type_school'),
				'level_id'           => $this->input->post('level_id'),
				'area_type_id'           => $this->input->post('area_type_id')
			));

			

			$upload = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|png|gif|JPEG|PNG',
				'file_name' => $this->input->post('school_id'),
			);
			$this->load->library('upload', $upload);
			if ($this->upload->do_upload('sign_school')) {
				$data = $this->upload->data();
				$this->db->where('school_id', $this->input->post('school_id'))->update('school', array(
					'sign_school' => $data['file_name']
				));
			}

			redirect('backend/school/add');
		}

		$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

		$this->province = $this->db->where('PROVINCE_ID', $this->province_id)->get('province')->result();
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('AMPHUR_ID', $this->province_id)->get('district')->result();
		

		$this->org_type = $this->db->get('org_type')->result(); //สังกัด
		$this->ministry = $this->db->get('ministry')->result(); //กระทยวง
		$this->department = $this->db->get('department')->result(); //สำนัก
		$this->municipal = $this->db->get('municipal')->result(); //เขตเทศบาล
		$this->inspect = $this->db->get('inspect')->result(); // เขตตรวจราชการ

		
/*
		$this->school_sub = $this->db->where('area_id', $this->rs->area_id)->get('school')->result();
		$this->school_room_sub = $this->db->where('school_id', $this->school_id)->get('school_room_sub')->result();
*/
		$this->room_level = $this->db->order_by('rmid', 'ASC')->order_by('sort', 'ASC')->get('room_level')->result();

		$this->level = $this->db->get('level')->result();

		$this->render('school/add', $this);
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			

			$this->db->where('id', $this->input->post('id'))->update('school', array(
				'school_id'                 => $this->input->post('school_id'),
				'f8'                 => $this->input->post('f8'),
				'province_school_id' => $this->input->post('province_school_id'),
				'school_name'        => $this->input->post('school_name'),
				'school_name_en'     => $this->input->post('school_name_en'),
				'area_id'            => $this->input->post('area_id'),
				'school_head'        => $this->input->post('school_head'),
				'f21'                => $this->input->post('f21'),
				'school_no'          => $this->input->post('school_no'),
				'f11'                => $this->input->post('f11'),
				'moo'                => $this->input->post('moo'),
				'road'               => $this->input->post('road'),
				'district_id'        => $this->input->post('district_id'),
				'amphur_id'          => $this->input->post('amphur_id'),
				'province_id'        => $this->province_id,
				'zipcode'            => $this->input->post('zipcode'),
				'telephone'          => $this->input->post('telephone'),
				'telephone2'         => $this->input->post('telephone2'),
				'fax'                => $this->input->post('fax'),
				'fax2'               => $this->input->post('fax2'),
				'email'              => $this->input->post('email'),
				'website'            => $this->input->post('website'),
				'land'               => $this->input->post('land'),
				'wat'                => $this->input->post('wat'),
				'lat'                => $this->input->post('lat'),
				'lng'                => $this->input->post('lng'),
				'org_type_id'        => $this->input->post('org_type_id'),
				'm_id'               => $this->input->post('m_id'),
				'dep_id'             => $this->input->post('dep_id'),
				'mun_id'             => $this->input->post('mun_id'),
				'ins_id'             => $this->input->post('ins_id'),
				'type_school'        => $this->input->post('type_school'),
				'level_id'           => $this->input->post('level_id'),
				'area_type_id'           => $this->input->post('area_type_id')
			));

			

			$upload = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|png|gif|JPEG|PNG',
				'file_name' => $this->input->post('school_id'),
			);
			$this->load->library('upload', $upload);
			if ($this->upload->do_upload('sign_school')) {
				$data = $this->upload->data();
				$this->db->where('school_id', $this->input->post('school_id'))->update('school', array(
					'sign_school' => $data['file_name']
				));
			}

			redirect('backend/school/edit/'.$this->input->post('id'));
		}

		$r = $this->db->where('id', $id)->get('school')->row();
		$this->r = $r;


		$this->area = $this->db->select('area.area_code, area.area_code_name')->join('school', 'area.area_code = school.area_id')
				->where('school.province_id', $this->province_id)->group_by('area.area_code')->get('area')->result();

		$this->province = $this->db->where('PROVINCE_ID', $this->province_id)->get('province')->result();
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('AMPHUR_ID', $r->amphur_id)->get('district')->result();


		$this->org_type = $this->db->get('org_type')->result(); //สังกัด
		$this->ministry = $this->db->get('ministry')->result(); //กระทยวง
		$this->department = $this->db->get('department')->result(); //สำนัก
		$this->municipal = $this->db->get('municipal')->result(); //เขตเทศบาล
		$this->inspect = $this->db->get('inspect')->result(); // เขตตรวจราชการ

		

		$this->school_sub = $this->db->where('area_id', $this->rs->area_id)->get('school')->result();
		$this->school_room_sub = $this->db->where('school_id', $this->school_id)->get('school_room_sub')->result();

		$this->room_level = $this->db->order_by('rmid', 'ASC')->order_by('sort', 'ASC')->get('room_level')->result();

		$this->level = $this->db->get('level')->result();

		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);
		}

		$this->area_type = $this->db->where('province_id', $this->province_id)->where("type", $r->type_school)->get('area_type')->result();

		$this->render('school/edit', $this);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)->delete('school');
		redirect('backend/school');
	}

	public function import_student_data()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = 'school-student-data-'.time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();        	

			$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {	
			    	list($area_id, $area_name, $school_id, $school_name, 
			    		$a1b, $a1g, $x1, $a1r, 
			    		$a2b, $a2g, $x2, $a2r, 
			    		$a3b, $a3g, $x3, $a3r, 
			    		$ab1, $ag1, $aa1, $ar1, 

			    		$p1b, $p1g, $p1, $p1r, 
			    		$p2b, $p2g, $p2, $p2r, 
			    		$p3b, $p3g, $p3, $p3r,
			    		$p4b, $p4g, $p4, $p4r, 
			    		$p5b, $p5g, $p5, $p5r, 
			    		$p6b, $p6g, $p6, $p6r, 
			    		$ap1, $ap2, $ap3, $ap4,

			    		$m1b, $m1g, $m1, $m1r, 
			    		$m2b, $m2g, $m2, $m2r, 
			    		$m3b, $m3g, $m3, $m3r,
			    		$am1, $am2, $am3, $am4,

			    		$m4b, $m4g, $m4, $m4r, 
			    		$m5b, $m5g, $m5, $m5r, 
			    		$m6b, $m6g, $m6, $m6r, 
			    		$am5, $am6, $am7, $am8,


			    		$pvc1b, $pvc1g, $pvc1, $pvc1r, 
			    		$pvc2b, $pvc2g, $pvc2, $pvc2r, 
			    		$pvc3b, $pvc3g, $pvc3, $pvc3r,
			    		$am9, $am10, $am11, $am12,
			    		

			    	) = explode(",", $data);


			    	$r1 = $this->db->where('school_id', $school_id)->get('school');


			    	if ($r1->num_rows() > 0) {
			    		$area_type_id = $this->getAreaTypeId($this->input->post('area_type_id2'), $this->input->post('type_school'), $r1->row()->province_id);

			    		$this->db->where('school_id', $school_id)->update('school', array(
			    			'area_type_id' => $this->input->post('area_type_id2'),
			    			'type_school' => $this->input->post('type_school'),
			    			'm_id' => $this->input->post('m_id'),
			    			'ins_id' => $this->input->post('ins_id'),
			    			'school_name' => $school_name,
			    		));

			    		//echo $this->db->last_query();
			    	} else {
			    		$this->db->insert('school', array(
			    			'school_id' => $school_id,
			    			'school_name' => $school_name,
			    			'province_id' => $this->province_id,
			    			'area_type_id' => $this->input->post('area_type_id2'),
			    			'type_school' => $this->input->post('type_school'),
			    			'm_id' => $this->input->post('m_id'),
			    			'ins_id' => $this->input->post('ins_id'),
			    		));
			    	}

			    	$rs = $this->db->where(array(
			    		'term_id' => $this->input->post('term'),
			    		'year_id' => $this->input->post('years'),
			    		'school_id' => $school_id
			    	))->get('school_data');

			    	$ar = array(
		    			'term_id' => $this->input->post('term'),
			    		'year_id' => $this->input->post('years'),
			    		'school_id' => $school_id,
			    		'a1_boy' => $a1b,
			    		'a1_girl' => $a1g,
			    		'a1_room' => $a1r,
			    		'a2_boy' => $a2b,
			    		'a2_girl' => $a2g,
			    		'a2_room' => $a2r,
			    		'a3_boy' => $a3b,
			    		'a3_girl' => $a3g,
			    		'a3_room' => $a3r,

			    		'p1_boy' => $p1b,
			    		'p1_girl' => $p1g,
			    		'p1_room' => $p1r,

			    		'p2_boy' => $p2b,
			    		'p2_girl' => $p2g,
			    		'p2_room' => $p2r,

			    		'p3_boy' => $p3b,
			    		'p3_girl' => $p3g,
			    		'p3_room' => $p3r,

			    		'p4_boy' => $p4b,
			    		'p4_girl' => $p4g,
			    		'p4_room' => $p4r,

			    		'p5_boy' => $p5b,
			    		'p5_girl' => $p5g,
			    		'p5_room' => $p5r,

			    		'p6_boy' => $p6b,
			    		'p6_girl' => $p6g,
			    		'p6_room' => $p6r,

			    		'm1_boy' => $m1b,
			    		'm1_girl' => $m1g,
			    		'm1_room' => $m1r,

			    		'm2_boy' => $m2b,
			    		'm2_girl' => $m2g,
			    		'm2_room' => $m2r,

			    		'm3_boy' => $m3b,
			    		'm3_girl' => $m3g,
			    		'm3_room' => $m3r,

			    		'm4_boy' => $m4b,
			    		'm4_girl' => $m4g,
			    		'm4_room' => $m4r,

			    		'm5_boy' => $m5b,
			    		'm5_girl' => $m5g,
			    		'm5_room' => $m5r,

			    		'm6_boy' => $m6b,
			    		'm6_girl' => $m6g,
			    		'm6_room' => $m6r,


			    		'pvc1_boy' => $pvc1b,
			    		'pvc1_girl' => $pvc1g,
			    		'pvc1_room' => $pvc1r,

			    		'pvc2_boy' => $pvc2b,
			    		'pvc2_girl' => $pvc2g,
			    		'pvc2_room' => $pvc2r,

			    		'pvc3_boy' => $pvc3b,
			    		'pvc3_girl' => $pvc3g,
			    		'pvc3_room' => $pvc3r,

		    		);

			    	if ($rs->num_rows() == 0) {
			    		$this->db->insert('school_data', $ar);
			    	} else {
			    		$this->db->where('sd_id', $rs->row()->sd_id)->update('school_data', $ar);
			    	}

			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'a1', $a1r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'a2', $a2r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'a3', $a3r);

			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'p1', $p1r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'p2', $p2r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'p3', $p3r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'p4', $p4r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'p5', $p5r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'p6', $p6r);


			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'm1', $m1r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'm2', $m2r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'm3', $m3r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'm4', $m4r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'm5', $m5r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'm6', $m6r);


			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'pvc1', $pvc1r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'pvc2', $pvc2r);
			    	$this->save_school_room($this->input->post('term'), $this->input->post('years'), $school_id, 'pvc3', $pvc3r);



			    }
			    $k++;
			}
		}
		redirect('backend/school');
	}

	public function getAreaTypeId($area_id, $type_school, $province_id)
	{
		if ($province_id != 0 || $province_id != null) {
			$area = $this->db->where('area_code', $area_id)->get('area')->row();
			$rs = $this->db->where(array(
				'area_id' => $area_id
			))->get('area_type');
			if ($rs->num_rows() == 0) {
				$this->db->insert('area_type', array(
					'area_id' => $area_id,
					'area_type_name' => $area->area_code_name,
					'type' => $type_school,
					'province_id' => $this->province_id
				));
				return $this->db->insert_id();
			} else {

				$this->db->where('area_type_id', $rs->row()->area_type_id)->update('area_type', array(
					'area_id' => $area_id,
					'area_type_name' => $area->area_code_name,
					'type' => $type_school,
					'province_id' => $this->province_id

				));


				return $rs->row()->area_type_id;
			}
		}
	}

	private function save_school_room($term_id, $year_id, $school_id, $from, $total)
	{
		$rs = $this->db->where(array(
    		'term_id' => $term_id,
    			'year_id' => $year_id,
    			'school_id' => $school_id,
    	))->get('school_room');

    	if ($rs->num_rows() == 0) {
    		$this->db->insert('school_room', array(
    			'term_id' => $term_id,
    			'year_id' => $year_id,
    			'school_id' => $school_id,
    			$from => $total
    		));
    	} else {

    		$this->db->where('id', $rs->row()->id)->update('school_room', array(
    			'term_id' => $term_id,
    			'year_id' => $year_id,
    			'school_id' => $school_id,
    			$from => $total
    		));
    	}
	}
}