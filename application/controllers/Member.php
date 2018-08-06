<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Base_Member {
	private $member_id;
	private $school_id;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model', 'mm');
		$this->load->model('school_model', 'sm');
		$this->member_id = $this->session->userdata('id');
		$this->school_id = $this->mm->getSchool();

		$this->load->library('pagination');


	}
	public function index()
	{
		$r = $this->db->where('id', $this->member_id)->get('member')->row();

		$this->r = $r;


		$this->area = $this->db->where('province_id', $this->province_id)->where('area_type_id', $this->area_type_id)->get('area_type')->result();

		$this->school = $this->db->where(array('area_type_id' => $r->area_type_id))->get('school')->result();

				

		$this->render('member/index', $this);
	}

	public function childrens()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->db->insert('childrens', array(
				'member_id' => $this->member_id,
				'province_id' => $this->province_id,
				'amphur_id' => $this->input->post('amphur_id'),
				'district_id' => $this->input->post('district_id'),
				'age' => $this->input->post('age'),
				'boy' => $this->input->post('boy'),
				'girl' => $this->input->post('girl'),
				'year_id' => $this->input->post('year_id'),
				'study' => $this->input->post('study'),
			));

			redirect('member/childrens');
		}
		$this->rs = $this->db->where('member_id', $this->member_id)
					->join('amphur', 'childrens.amphur_id = amphur.AMPHUR_ID', 'LEFT')
					->join('district', 'childrens.district_id = district.DISTRICT_ID', 'LEFT')
					->join('years', 'childrens.year_id = years.year_id')
					->order_by('childrens.year_id', 'DESC')
					->order_by('age', 'ASC')
					->get('childrens')->result();
		$this->years = $this->db->get('years')->result();

		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->render('member/childrens', $this);
	}


	public function del_childrens($id)
	{
		$this->db->where(array(
			'id' => $id,
			'member_id' => $this->member_id
		))->delete('childrens');
		redirect('member/childrens');
	}

	public function update_age()
	{
		$this->_updata_age();

		redirect('member/student');

	}

	private function _updata_age()
	{
		$school = $this->db->select('province_id, amphur_id, district_id')->where('school_id', $this->school_id)->get('school')->row();
		$rs = $this->db->select('COUNT(id) as count, gender, age, year_id')->where('school_id', $this->school_id)
					->join('room_level', 'students.rmid = room_level.rmid', 'LEFT')
					->group_by('gender')
					->group_by('age')
					->group_by('year_id')
					->get('students')->result();

		foreach($rs as $r) {
			$c = $this->db->where(array(
				'year_id' => $r->year_id,
				'province_id' => $school->province_id,
				'amphur_id' => $school->amphur_id,
				'district_id' => $school->district_id,
				'member_id' => $this->member_id,
				'age' => $r->age
			))->get('childrens');

			$field = $r->gender == 'ช' ? 'boy' : 'girl';

			if ($c->num_rows() == 0) {
				$this->db->insert('childrens', array(
					'year_id' => $r->year_id,
					'province_id' => $school->province_id,
					'amphur_id' => $school->amphur_id,
					'district_id' => $school->district_id,
					'member_id' => $this->member_id,
					'age' => $r->age,
					$field => $r->count,
					'study' => 1,
				));
			} else {
				$this->db->where('id', $c->row()->id)->update('childrens', array(
					'year_id' => $r->year_id,
					'province_id' => $school->province_id,
					'amphur_id' => $school->amphur_id,
					'district_id' => $school->district_id,
					'member_id' => $this->member_id,
					'age' => $r->age,
					$field => $r->count,
					'study' => 1
				));
			}
		}
	}

	public function school($term, $year)
	{
		if ($term == '' || $year == '') redirect('member/term');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->input->post('tab') == '1') {
				$upload = array(
					'upload_path' => './upload/',
					'allowed_types' => 'jpg|png|gif|JPEG|PNG',
					'file_name' => $this->school_id,
				);
				$this->load->library('upload', $upload);
				if ($this->upload->do_upload('sign_school')) {
					$data = $this->upload->data();
					$this->db->where('school_id', $this->school_id)->update('school', array(
						'sign_school' => $data['file_name']
					));
				}

				$this->db->where('school_id', $this->school_id)->update('school', array(
					//'f7'                 => $this->input->post('f7'),
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
					'province_id'        => $this->input->post('province_id'),
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
					'org_type_id'                => $this->input->post('org_type_id'),
					'm_id'                => $this->input->post('m_id'),
					'dep_id'                => $this->input->post('dep_id'),
					'mun_id'                => $this->input->post('mun_id'),
					'ins_id'                => $this->input->post('ins_id'),
					'area_type_id'       => $this->input->post('area_type_id'),
					'type_school'       => $this->input->post('type_school'),
					'land'       => $this->input->post('land'),
					'land_work'       => $this->input->post('land_work'),
					'land_wa'       => $this->input->post('land_wa'),
				));

				redirect('member/school/'.$term.'/'.$year.'#tab1');
			}

			if ($this->input->post('tab') == '2') {
				

				$this->db->where('school_id', $this->school_id)->update('school', array(
					'school_sub_id'  => $this->input->post('school_sub_id'),
					'state_live'     => $this->input->post('state_live'),
					'state_focus'     => $this->input->post('state_focus'),
				));

				
				redirect('member/school/'.$term.'/'.$year.'#tab2');

			}


			if ($this->input->post('tab') == 'water') {
				

				$this->db->where('school_id', $this->school_id)->update('school', array(
					'pp1'  => $this->input->post('pp1'),
					'pp2'     => $this->input->post('pp2'),
					'pp3'     => $this->input->post('pp3'),
					'pp4'     => $this->input->post('pp4'),
				));


				$this->db->where('school_id', $this->school_id)->update('school', array(
					'pp_drink_m1'     => $this->input->post('pp_drink_m1'),
					'pp_drink_m2'     => $this->input->post('pp_drink_m2'),
					'pp_drink_m3'     => $this->input->post('pp_drink_m3'),
					'pp_drink_m4'     => $this->input->post('pp_drink_m4'),
					'pp_drink_m5'     => $this->input->post('pp_drink_m5'),
					'pp_drink_m6'     => $this->input->post('pp_drink_m6'),
					'pp_drink_m7'     => $this->input->post('pp_drink_m7'),
					'pp_drink_m8'     => $this->input->post('pp_drink_m8'),
					'pp_drink_m9'     => $this->input->post('pp_drink_m9'),
					'pp_drink_m10'     => $this->input->post('pp_drink_m10'),
					'pp_drink_m11'     => $this->input->post('pp_drink_m11'),
					'pp_drink_m12'     => $this->input->post('pp_drink_m12'),


					'pp_use_m1'     => $this->input->post('pp_use_m1'),
					'pp_use_m2'     => $this->input->post('pp_use_m2'),
					'pp_use_m3'     => $this->input->post('pp_use_m3'),
					'pp_use_m4'     => $this->input->post('pp_use_m4'),
					'pp_use_m5'     => $this->input->post('pp_use_m5'),
					'pp_use_m6'     => $this->input->post('pp_use_m6'),
					'pp_use_m7'     => $this->input->post('pp_use_m7'),
					'pp_use_m8'     => $this->input->post('pp_use_m8'),
					'pp_use_m9'     => $this->input->post('pp_use_m9'),
					'pp_use_m10'     => $this->input->post('pp_use_m10'),
					'pp_use_m11'     => $this->input->post('pp_use_m11'),
					'pp_use_m12'     => $this->input->post('pp_use_m12'),
				));

				
				redirect('member/school/'.$term.'/'.$year.'#tab6');

			}

			if ($this->input->post('tab') == 'elec') {
				

				

				$this->db->where('school_id', $this->school_id)->update('school', array(
					'area_fire'     => $this->input->post('area_fire'),
					'have_fire'     => $this->input->post('have_fire'),
					'ff1_use'     => $this->input->post('ff1_use'),
					'ff1_kva'     => $this->input->post('ff1_kva'),
					'ff1_amp'     => $this->input->post('ff1_amp'),
					'ff1_type'     => $this->input->post('ff1_type'),
					'ff2_use'     => $this->input->post('ff2_use'),
					'ff2_kva'     => $this->input->post('ff2_kva'),
					'ff2_amp'     => $this->input->post('ff2_amp'),
					'ff2_type'     => $this->input->post('ff2_type'),
					'ff3_use'     => $this->input->post('ff3_use'),
					'ff3_kva'     => $this->input->post('ff3_kva'),
					'ff3_amp'     => $this->input->post('ff3_amp'),
					'ff3_type'     => $this->input->post('ff3_type'),
					'ff4_use'     => $this->input->post('ff4_use'),
					'ff4_kva'     => $this->input->post('ff4_kva'),
					'ff4_amp'     => $this->input->post('ff4_amp'),
					'ff4_type'     => $this->input->post('ff4_type'),
					'ff4_kva'     => $this->input->post('ff4_kva'),
					'ff4_amp'     => $this->input->post('ff4_amp'),
					'ff4_type'     => $this->input->post('ff4_type'),
					'ff5_total'     => $this->input->post('ff5_total'),
					'ff5_amp'     => $this->input->post('ff5_amp'),
					'ff5_type'     => $this->input->post('ff5_type'),
					'ff6_total'     => $this->input->post('ff6_total'),
					'ff6_amp'     => $this->input->post('ff6_amp'),
					'ff6_type'     => $this->input->post('ff6_type'),
				));

				
				redirect('member/school/'.$term.'/'.$year.'#tab5');

			}

			if ($this->input->post('tab') == 'room') {
				/*
				$this->db->where(array(
					'school_id' => $this->school_id,
					'term_id' => $term,
					'year_id' => $year,
				))->update('school_room', array(
					'a1'     => $this->input->post('a1'),
					'a2'     => $this->input->post('a2'),
					'a3'     => $this->input->post('a3'),
					'p1'     => $this->input->post('p1'),
					'p2'     => $this->input->post('p2'),
					'p3'     => $this->input->post('p3'),
					'p4'     => $this->input->post('p4'),
					'p5'     => $this->input->post('p5'),
					'p6'     => $this->input->post('p6'),
					'm1'     => $this->input->post('m1'),
					'm2'     => $this->input->post('m2'),
					'm3'     => $this->input->post('m3'),
					'm4'     => $this->input->post('m4'),
					'm5'     => $this->input->post('m5'),
					'm6'     => $this->input->post('m6'),
					'pvc1'   => $this->input->post('pvc1'),
					'pvc2'   => $this->input->post('apvc2'),
					'pvc3'   => $this->input->post('pvc3'),
				));
				*/

				$this->db->where(array(
					'school_id' => $this->school_id,
					'term_id' => $term,
					'year_id' => $year,
				))->update('school_data', array(
					'a1_room'     => $this->input->post('a1_room'),
					'a2_room'     => $this->input->post('a2_room'),
					'a3_room'     => $this->input->post('a3_room'),
					'p1_room'     => $this->input->post('p1_room'),
					'p2_room'     => $this->input->post('p2_room'),
					'p3_room'     => $this->input->post('p3_room'),
					'p4_room'     => $this->input->post('p4_room'),
					'p5_room'     => $this->input->post('p5_room'),
					'p6_room'     => $this->input->post('p6_room'),
					'm1_room'     => $this->input->post('m1_room'),
					'm2_room'     => $this->input->post('m2_room'),
					'm3_room'     => $this->input->post('m3_room'),
					/*
					'm4'     => $this->input->post('m4'),
					'm5'     => $this->input->post('m5'),
					'm6'     => $this->input->post('m6'),
					'pvc1'   => $this->input->post('pvc1'),
					'pvc2'   => $this->input->post('apvc2'),
					'pvc3'   => $this->input->post('pvc3'),
					*/
				));
				redirect('member/school/'.$term.'/'.$year.'#tab8');

			}

			if ($this->input->post('tab') == 'class') {
				$this->db->where('school_id', $this->school_id)->update('school', array(
					'rmid_start' => $this->input->post('rmid_start'),
					'rmid_end' => $this->input->post('rmid_end'),
				));


				$chk = $this->db->where(array(
					'school_id' => $this->school_id,
					'term_id' => $term,
					'year_id' => $year,
				))->get('school_data');
				if ($chk->num_rows() == 0) {
					$this->db->insert('school_data', array(
						'school_id' => $this->school_id,
						'term_id' => $term,
						'year_id' => $year,
						'd2_boy'     => $this->input->post('d2_boy'),
						'd2_girl'    => $this->input->post('d2_girl'),
						'd3_boy'     => $this->input->post('d3_boy'),
						'd3_girl'    => $this->input->post('d3_girl'),
						'd4_boy'     => $this->input->post('d4_boy'),
						'd4_girl'    => $this->input->post('d4_girl'),
						'd5_boy'     => $this->input->post('d5_boy'),
						'd5_girl'    => $this->input->post('d5_girl'),
						'a2_boy'     => $this->input->post('a2_boy'),
						'a2_girl'    => $this->input->post('a2_girl'),
						'a3_boy'     => $this->input->post('a3_boy'),
						'a3_girl'    => $this->input->post('a3_girl'),
						'p1_boy'     => $this->input->post('p1_boy'),
						'p1_girl'    => $this->input->post('p1_girl'),
						'p2_boy'     => $this->input->post('p2_boy'),
						'p2_girl'    => $this->input->post('p2_girl'),
						'p3_boy'     => $this->input->post('p3_boy'),
						'p3_girl'    => $this->input->post('p3_girl'),
						'p4_boy'     => $this->input->post('p4_boy'),
						'p4_girl'    => $this->input->post('p4_girl'),
						'p5_boy'     => $this->input->post('p5_boy'),
						'p5_girl'     => $this->input->post('p5_girl'),
						'p4_girl'    => $this->input->post('p4_girl'),
						'p6_boy'     => $this->input->post('p6_boy'),
						'p6_girl'    => $this->input->post('p6_girl'),

						'm1_boy'     => $this->input->post('m1_boy'),
						'm1_girl'    => $this->input->post('m1_girl'),
						'm2_boy'     => $this->input->post('m2_boy'),
						'm2_girl'    => $this->input->post('m2_girl'),
						'm3_boy'     => $this->input->post('m3_boy'),
						'm3_girl'    => $this->input->post('m3_girl'),

						'm4_boy'     => $this->input->post('m4_boy'),
						'm4_girl'    => $this->input->post('m4_girl'),
						'm5_boy'     => $this->input->post('m5_boy'),
						'm5_girl'    => $this->input->post('m5_girl'),
						'm6_boy'     => $this->input->post('m6_boy'),
						'm6_girl'    => $this->input->post('m6_girl'),
					));
				} else {

					$this->db->where(array(
						'school_id' => $this->school_id,
						'term_id' => $term,
						'year_id' => $year,
					))->update('school_data', array(
						'd2_boy'     => $this->input->post('d2_boy'),
						'd2_girl'    => $this->input->post('d2_girl'),
						'd3_boy'     => $this->input->post('d3_boy'),
						'd3_girl'    => $this->input->post('d3_girl'),
						'd4_boy'     => $this->input->post('d4_boy'),
						'd4_girl'    => $this->input->post('d4_girl'),
						'd5_boy'     => $this->input->post('d5_boy'),
						'd5_girl'    => $this->input->post('d5_girl'),
						'a1_boy'     => $this->input->post('a1_boy'),
						'a1_girl'    => $this->input->post('a1_girl'),
						'a2_boy'     => $this->input->post('a2_boy'),
						'a2_girl'    => $this->input->post('a2_girl'),
						'a3_boy'     => $this->input->post('a3_boy'),
						'a3_girl'    => $this->input->post('a3_girl'),
						'p1_boy'     => $this->input->post('p1_boy'),
						'p1_girl'    => $this->input->post('p1_girl'),
						'p2_boy'     => $this->input->post('p2_boy'),
						'p2_girl'    => $this->input->post('p2_girl'),
						'p3_boy'     => $this->input->post('p3_boy'),
						'p3_girl'    => $this->input->post('p3_girl'),
						'p4_boy'     => $this->input->post('p4_boy'),
						'p4_girl'    => $this->input->post('p4_girl'),
						'p5_boy'     => $this->input->post('p5_boy'),
						'p5_girl'     => $this->input->post('p5_girl'),
						'p4_girl'    => $this->input->post('p4_girl'),
						'p6_boy'     => $this->input->post('p6_boy'),
						'p6_girl'    => $this->input->post('p6_girl'),

						'm1_boy'     => $this->input->post('m1_boy'),
						'm1_girl'    => $this->input->post('m1_girl'),
						'm2_boy'     => $this->input->post('m2_boy'),
						'm2_girl'    => $this->input->post('m2_girl'),
						'm3_boy'     => $this->input->post('m3_boy'),
						'm3_girl'    => $this->input->post('m3_girl'),

						'm4_boy'     => $this->input->post('m4_boy'),
						'm4_girl'    => $this->input->post('m4_girl'),
						'm5_boy'     => $this->input->post('m5_boy'),
						'm5_girl'    => $this->input->post('m5_girl'),
						'm6_boy'     => $this->input->post('m6_boy'),
						'm6_girl'    => $this->input->post('m6_girl'),
					));
				}
				redirect('member/school/'.$term.'/'.$year.'#tab7');

			}
			
		}
		$this->rs = $this->sm->getSchool($this->school_id);
		/*
		$chk = $this->db->where(array(
			'school_id' => $this->school_id,
			'term_id' => $term,
			'year_id' => $year,
		))->get('school_room');
		if ($chk->num_rows() == 0) {
			$this->db->insert('school_room', array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			));

			$this->school_room = $this->db->where(array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			))->get('school_room')->row();
		}  else {
			$this->school_room = $chk->row();
		}
		*/

		$chk = $this->db->where(array(
			'school_id' => $this->school_id,
			'term_id' => $term,
			'year_id' => $year,
		))->get('school_data');
		if ($chk->num_rows() == 0) {
			$this->db->insert('school_data', array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			));

			$this->school_room = $this->db->where(array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			))->get('school_data')->row();

			$this->school_room2 = $this->db->where(array(
				'school_id' => $this->school_id,
				'term_id' => $term,
				'year_id' => $year,
			))->get('school_data')->row_array();


		}  else {
			$this->school_room = $chk->row();
			$this->school_room2 = $chk->row_array();
		}

		$this->term = $this->db->where('term_id', $term)->get('term')->row();
		$this->year = $this->db->where('year_id', $year)->get('years')->row();
		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		$this->province = $this->db->where('PROVINCE_ID', $this->province_id)->get('province')->result();
		$this->amphur = $this->db->where('PROVINCE_ID', $this->province_id)->get('amphur')->result();
		$this->district = $this->db->where('AMPHUR_ID', $this->rs->amphur_id)->get('district')->result();


		$this->org_type = $this->db->get('org_type')->result(); //สังกัด
		$this->ministry = $this->db->get('ministry')->result(); //กระทยวง
		$this->department = $this->db->get('department')->result(); //สำนัก
		$this->municipal = $this->db->get('municipal')->result(); //เขตเทศบาล
		$this->inspect = $this->db->get('inspect')->result(); // เขตตรวจราชการ

		

		$this->school_sub = $this->db->where('province_id', $this->province_id)->get('school')->result();
		$this->school_room_sub = $this->db->where('school_id', $this->school_id)->get('school_room_sub')->result();

		/*$this->room_level = $this->db->order_by('rmid', 'ASC')->order_by('sort', 'ASC')->get('room_level')->result();*/

		$this->room_level = $this->db->where('rmid <=', 12)->get('room_level')->result();

		$r = $this->rs;
		$this->area_type = $this->db->where('province_id', $this->province_id)->where("type", $r->type_school)->get('area_type')->result();

		$this->r = $r;

		$this->render('member/school', $this);
	}

	public function save_room_level()
	{
		$this->db->insert('school_room_sub', array(
			'school_id' => $this->school_id,
			'level' => $this->input->post('level'),
			'boy' => $this->input->post('boy'),
			'girl' => $this->input->post('girl'),
			'school_main_name' => $this->input->post('school_main_name')
		));
	}

	public function add_room_level($term, $year, $rmid)
	{
		$this->load->view('member/school/add_room_level');
	}

	public function save_room()
	{

		$this->db->insert('school_room_level', array(
			'school_id' => $this->school_id,
			'term_id' => $this->input->post('term_id'),
			'year_id' => $this->input->post('year_id'),
			'rmid' => $this->input->post('rmid'),
			'room_no' => $this->input->post('room_no'),
			'room_boy' => $this->input->post('room_boy'),
			'room_girl' => $this->input->post('room_girl'),
		));
	}

	public function delete_level()
	{
		$this->db->where("school_id", $this->school_id)->where('ssid', $this->input->post('ssid'))->delete('school_room_sub');
	}

	public function term()
	{
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->input->post('term') !='' && $this->input->post('years')!='') {
				redirect('member/school/'.$this->input->post('term').'/'.$this->input->post('years'));
			} 
		}

		$this->render('member/term', $this);
	}




	public function data_school($step)
	{
		if ($step==1) {
			$this->load->view('member/school/data1');
		}

	}

	public function update()
	{
		if ($this->input->post('password') != NULL) {
			$this->db->set('password', do_hash($this->input->post('password')));
		}
		$this->db->set('updated_date', 'NOW()', false)->where('id', $this->member_id)->update('member', array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'mobile' => $this->input->post('mobile'),
			'telephone' => $this->input->post('telephone'),
			'area_type_id' => $this->input->post('area_type_id'),
			'school' => $this->input->post('school'),
		));




		redirect('member');
	}




	public function student()
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
		$config['base_url'] = site_url('member/student');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->db->where(array(
				'term_id' => $this->input->post('term'),
				'year_id' => $this->input->post('years'),
			));
		}

		$num = 0;

		if (isStaffSchool()) {
			$num = $this->db->where('school_id', $this->school_id)->count_all_results('students');
		}

		if (isAdminProvince()) {
			$num = $this->db->where('school.province_id', $this->province_id)
				->join('school', 'students.school_id = school.school_id')->count_all_results('students');
		}


		if (isAdminArea()) {
			$num = $this->db->where('area_type_id', $this->area_type_id)
			->join('school', 'students.school_id = school.school_id')->count_all_results('students');
		}


		$config['total_rows'] = $num;
		$config['per_page'] = 100;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);



		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->db->where(array(
				'term_id' => $this->input->post('term'),
				'year_id' => $this->input->post('years'),
			));
		}

		$ignore = array('ม.4', 'ม.5', 'ม.6');

		if (isStaffSchool()) {
			$this->rs = $this->db->select('*, students.id')
						->join('room_level', 'students.rmid = room_level.rmid', 'LEFT')
						->join('school', 'students.school_id = school.school_id')
						->order_by('students.id', 'ASC')						
						//->where_not_in('room_level', $ignore)
						->where('students.school_id', $this->school_id)
						->limit($config['per_page'], $this->uri->segment(3))
						->get('students')->result();

						//echo $this->db->last_query();
			
		}

		if (isAdminProvince()) {
			$this->rs = $this->db->select('*, students.id')
						->where('province_id', $this->province_id)
						->join('room_level', 'students.rmid = room_level.rmid', 'LEFT')
						->join('school', 'students.school_id = school.school_id')
						->order_by('students.id', 'ASC')
						//->where_not_in('room_level', $ignore)
						->limit($config['per_page'], $this->uri->segment(3))
						->get('students')->result();

						//echo $this->db->last_query();
		}

		if (isAdminArea()) {
			$this->rs = $this->db->select('*, students.id')
						->where('area_type_id', $this->area_type_id)
						->join('room_level', 'students.rmid = room_level.rmid', 'LEFT')
						->join('school', 'students.school_id = school.school_id')
						->order_by('students.id', 'ASC')
						//->where_not_in('room_level', $ignore)
						->limit($config['per_page'], $this->uri->segment(3))
						->get('students')->result();

						//echo $this->db->last_query();
		}






		

		

		
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();

		$this->_t = $this->input->post('term');
		$this->_y = $this->input->post('years');

		$this->render('member/student/index', $this);
	}

	public function student_add()
	{
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();
		$this->room_level = $this->db->where('rmid <=', 12)->get('room_level')->result();
		//$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();

		$this->_term = '01';
		$this->_year = '2017';
		
		$r = $this->db->where('id', $this->member_id)->get('member')->row();

		$this->r = $r;


		$this->area = $this->db->where('province_id', $this->province_id)->where('area_type_id', $this->area_type_id)->get('area_type')->result();

		$this->school = $this->db->where(array('area_type_id' => $r->area_type_id))->get('school')->result();

		$this->render('member/student/add', $this);
	}

	public function student_edit($id)
	{
		$this->r = $this->db->select('*, students.id, students.moo, students.zipcode')->where('students.id', $id)->join('school', 'students.school_id = school.school_id', 'LEFT')->get('students')->row();
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();
		$this->room_level = $this->db->where('rmid <=', 12)->get('room_level')->result();
		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		$this->render('member/student/edit', $this);
	}

	public function student_delete($id)
	{
		$this->db->where('id', $id)->delete('students');
		redirect('member/student');
	}

	public function save_student()
	{
		$config = array(
			array(
				'field' => 'idcard',
				'label' => 'idcard',
				'rules' => 'required'
			),
			array(
				'field' => 'prefix',
				'label' => 'prefix',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'required'
			),
			array(
				'field' => 'surname',
				'label' => 'surname',
				'rules' => 'required'
			),
			array(
				'field' => 'term_id',
				'label' => 'term_id',
				'rules' => 'required'
			),
			array(
				'field' => 'year_id',
				'label' => 'year_id',
				'rules' => 'required'
			),		
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$this->db->insert('students', array(
				'school_id' => $this->input->post('school_id'),
				'student_id' => $this->input->post('student_id'),
				'prefix' => $this->input->post('prefix'),
				'idcard' => $this->input->post('idcard'),
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'name_en' => $this->input->post('name_en'),
				'surname_en' => $this->input->post('surname_en'),
				'term_id' => $this->input->post('term_id'),
				'year_id' => $this->input->post('year_id'),
				'birthdate' => $this->input->post('birthdate'),
				'rmid' => $this->input->post('rmid'),
				'room_no' => $this->input->post('room_no'),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'room_level' => $this->roomlevel($this->input->post('rmid')),

				'blood' => $this->input->post('blood'),
				'race' => $this->input->post('race'),
				'nationality' => $this->input->post('nationality'),
				'religion' => $this->input->post('religion'),
				'old_bro' => $this->input->post('old_bro'),
				'little_bro' => $this->input->post('little_bro'),
				'old_sis' => $this->input->post('old_sis'),
				'little_sis' => $this->input->post('little_sis'),
				'son_of_man' => $this->input->post('son_of_man'),
				'relation_parent' => $this->input->post('relation_parent'),
				'idcard_father' => $this->input->post('idcard_father'),
				'prefix_father' => $this->input->post('prefix_father'),
				'name_father' => $this->input->post('name_father'),
				'surname_father' => $this->input->post('surname_father'),
				'idcard_mother' => $this->input->post('idcard_mother'),
				'prefix_mother' => $this->input->post('prefix_mother'),
				'name_mother' => $this->input->post('name_mother'),
				'surname_mother' => $this->input->post('surname_mother'),
				'salary_father' => $this->input->post('salary_father'),
				'salary_mother' => $this->input->post('salary_mother'),
				'mobile_father' => $this->input->post('mobile_father'),
				'mobile_mother' => $this->input->post('mobile_mother'),
				'relation' => $this->input->post('relation'),
				'idcard_relation' => $this->input->post('idcard_relation'),
				'prefix_relation' => $this->input->post('prefix_relation'),
				'name_relation' => $this->input->post('name_relation'),
				'surname_relation' => $this->input->post('surname_relation'),
				'salary_relation' => $this->input->post('salary_relation'),
				'mobile_relation' => $this->input->post('mobile_relation'),
				'address_id' => $this->input->post('address_id'),
				'address_no' => $this->input->post('address_no'),
				'moo' => $this->input->post('moo'),
				'road' => $this->input->post('road'),
				'tumbon' => $this->input->post('tumbon'),
				'amphur' => $this->input->post('amphur'),
				'province' => $this->input->post('province'),
				'zipcode' => $this->input->post('zipcode'),
				'address_mobile' => $this->input->post('address_mobile'),

				'address_id_2' => $this->input->post('address_id_2'),
				'address_no_2' => $this->input->post('address_no_2'),
				'moo_2' => $this->input->post('moo_2'),
				'road_2' => $this->input->post('road_2'),
				'tumbon_2' => $this->input->post('tumbon_2'),
				'amphur_2' => $this->input->post('amphur_2'),
				'province_2' => $this->input->post('province_2'),
				'zipcode_2' => $this->input->post('zipcode_2'),
				'address_mobile_2' => $this->input->post('address_mobile_2'),

				'weight' => $this->input->post('weight'),
				'height' => $this->input->post('height'),
				'disadvantage' => $this->input->post('disadvantage'),
				'live' => $this->input->post('live'),
				'grab' => $this->input->post('grab'),
				'stationary' => $this->input->post('stationary'),
				'lose_class' => $this->input->post('lose_class'),
				'lose_food' => $this->input->post('lose_food'),
				'disabled' => $this->input->post('disabled'),
				'gravel_road' => $this->input->post('gravel_road'),
				'paved_road' => $this->input->post('paved_road'),
				'home_water' => $this->input->post('home_water'),
				'home_school' => $this->input->post('home_school'),
				'how_to_school' => $this->input->post('how_to_school'),
				'student_type' => $this->input->post('student_type'),
				'remark' => $this->input->post('remark'),

			));

			$id = $this->db->insert_id();

			$config = array(
				'upload_path' => './upload/student/',
				'allowed_types' => 'jpg|jpeg|PNG|png',
				'file_name' => $this->school_id.'-'.do_hash($this->input->post('idcard')),
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('thumbnail')) {
				$data = $this->upload->data();
				$this->db->where('id', $id)->update('students', array(
					'thumbnail' => $data['file_name']
				));
			}
		}
		redirect('member/student');
	}

	private function roomlevel($id)
	{
		$id = sprintf('%02d', $id);

		if ($id == 1) {
			return  'อ.1';
		}
		if ($id == 2) {
			return  'อ.2';
		}
		if ($id == 3) {
			return  'อ.3';
		}
		if ($id == 4) {
			return  'ป.1';
		}
		if ($id == 5) {
			return  'ป.2';
		}
		if ($id == 6) {
			return  'ป.3';
		}
		if ($id == 7) {
			return  'ป.4';
		}
		if ($id == 8) {
			return  'ป.5';
		}
		if ($id == 9) {
			return  'ป.6';
		}
		if ($id == 10) {
			return  'ม.1';
		}
		if ($id == 11) {
			return  'ม.2';
		}
		if ($id == 12) {
			return  'ม.3';
		}
	}
	public function update_student()
	{
		$config = array(
			array(
				'field' => 'id',
				'label' => 'id',
				'rules' => 'required'
			),
			array(
				'field' => 'idcard',
				'label' => 'idcard',
				'rules' => 'required'
			),
			array(
				'field' => 'prefix',
				'label' => 'prefix',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'required'
			),
			array(
				'field' => 'surname',
				'label' => 'surname',
				'rules' => 'required'
			),
			array(
				'field' => 'term_id',
				'label' => 'term_id',
				'rules' => 'required'
			),
			array(
				'field' => 'year_id',
				'label' => 'year_id',
				'rules' => 'required'
			),		
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$this->db->where('id', $this->input->post('id'))->update('students', array(
				'school_id' => $this->input->post('school_id'),
				'student_id' => $this->input->post('student_id'),
				'prefix' => $this->input->post('prefix'),
				'idcard' => $this->input->post('idcard'),
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'name_en' => $this->input->post('name_en'),
				'surname_en' => $this->input->post('surname_en'),
				'term_id' => $this->input->post('term_id'),
				'year_id' => $this->input->post('year_id'),
				'birthdate' => $this->input->post('birthdate'),
				'rmid' => $this->input->post('rmid'),
				'room_no' => $this->input->post('room_no'),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'room_level' => $this->roomlevel($this->input->post('rmid')),

				'blood' => $this->input->post('blood'),
				'race' => $this->input->post('race'),
				'nationality' => $this->input->post('nationality'),
				'religion' => $this->input->post('religion'),
				'old_bro' => $this->input->post('old_bro'),
				'little_bro' => $this->input->post('little_bro'),
				'old_sis' => $this->input->post('old_sis'),
				'little_sis' => $this->input->post('little_sis'),
				'son_of_man' => $this->input->post('son_of_man'),
				'relation_parent' => $this->input->post('relation_parent'),
				'idcard_father' => $this->input->post('idcard_father'),
				'prefix_father' => $this->input->post('prefix_father'),
				'name_father' => $this->input->post('name_father'),
				'surname_father' => $this->input->post('surname_father'),
				'idcard_mother' => $this->input->post('idcard_mother'),
				'prefix_mother' => $this->input->post('prefix_mother'),
				'name_mother' => $this->input->post('name_mother'),
				'surname_mother' => $this->input->post('surname_mother'),
				'salary_father' => $this->input->post('salary_father'),
				'salary_mother' => $this->input->post('salary_mother'),
				'mobile_father' => $this->input->post('mobile_father'),
				'mobile_mother' => $this->input->post('mobile_mother'),
				'relation' => $this->input->post('relation'),
				'idcard_relation' => $this->input->post('idcard_relation'),
				'prefix_relation' => $this->input->post('prefix_relation'),
				'name_relation' => $this->input->post('name_relation'),
				'surname_relation' => $this->input->post('surname_relation'),
				'salary_relation' => $this->input->post('salary_relation'),
				'mobile_relation' => $this->input->post('mobile_relation'),
				'address_id' => $this->input->post('address_id'),
				'address_no' => $this->input->post('address_no'),
				'moo' => $this->input->post('moo'),
				'road' => $this->input->post('road'),
				'tumbon' => $this->input->post('tumbon'),
				'amphur' => $this->input->post('amphur'),
				'province' => $this->input->post('province'),
				'zipcode' => $this->input->post('zipcode'),
				'address_mobile' => $this->input->post('address_mobile'),

				'address_id_2' => $this->input->post('address_id_2'),
				'address_no_2' => $this->input->post('address_no_2'),
				'moo_2' => $this->input->post('moo_2'),
				'road_2' => $this->input->post('road_2'),
				'tumbon_2' => $this->input->post('tumbon_2'),
				'amphur_2' => $this->input->post('amphur_2'),
				'province_2' => $this->input->post('province_2'),
				'zipcode_2' => $this->input->post('zipcode_2'),
				'address_mobile_2' => $this->input->post('address_mobile_2'),

				'weight' => $this->input->post('weight'),
				'height' => $this->input->post('height'),
				'disadvantage' => $this->input->post('disadvantage'),
				'live' => $this->input->post('live'),
				'grab' => $this->input->post('grab'),
				'stationary' => $this->input->post('stationary'),
				'lose_class' => $this->input->post('lose_class'),
				'lose_food' => $this->input->post('lose_food'),
				'disabled' => $this->input->post('disabled'),
				'gravel_road' => $this->input->post('gravel_road'),
				'paved_road' => $this->input->post('paved_road'),
				'home_water' => $this->input->post('home_water'),
				'home_school' => $this->input->post('home_school'),
				'how_to_school' => $this->input->post('how_to_school'),
				'student_type' => $this->input->post('student_type'),
				'remark' => $this->input->post('remark'),
			));

			$id = $this->input->post('id');

			$config = array(
				'upload_path' => './upload/student/',
				'allowed_types' => 'jpg|jpeg|PNG|png',
				'file_name' => $this->school_id.'-'.do_hash($this->input->post('idcard')),
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('thumbnail')) {
				$data = $this->upload->data();
				$this->db->where('id', $id)->update('students', array(
					'thumbnail' => $data['file_name']
				));
			}
		}
		redirect('member/student');
	}

	public function upload_student()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = 'student-'.$this->school_id;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();
        	$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	list($school_id, $school_name, $idcard, $level, $room_no, $student_id, $gender, $prefix, $name, $surname, $name_en, $surname_en, $birthdate, $age, $age_month, $blood, $ch1, $s1, $religion, $bro1, $bro2, $sis1, $sis2, $me, $relation, $idcard1, $prefix1, $name1, $surname1, $salary1, $mobile1, $idcard2, $prefix2, $name2, $surname2, $salary2, $mobile2, $relation2, $idcard3, $prefix3, $name3, $surname3, $salary3, $mobile3, $address, $addr_no, $moo, $road, $tumbon, $amphur, $province, $zipcode, $addr_phone, $address2, $addr_no2, $moo2, $road2, $tumbon2, $amphur2, $province2, $zipcode2, $addr_phone2, $weight, $height, $m1, $m2, $m3, $m4, $m5, $m6, $m7, $k1, $k2, $k3, $k4, $way, $student_type, $remark) = explode(",", $data);

			    	$rs = $this->db->where(array(
			    		'student_id' => $student_id,
			    		'school_id' => $school_id,
			    		'term_id' => $this->input->post('term'),
			    		'year_id' => $this->input->post('years'),
			    	))->get('students');

			    	if ($rs->num_rows() == 0) {
			    		$this->db->insert('students', array(
			    			'term_id' => $this->input->post('term'),
			    			'year_id' => $this->input->post('years'),
			    			'school_id' => $school_id,
			    			'idcard' => $idcard,
			    			'room_level' => $level,
			    			'room_no' => $room_no,
			    			'student_id' => $student_id,
			    			'gender' => $gender,
			    			'prefix' => $prefix,
			    			'name' => $name,
			    			'surname' => $surname,
			    			'name_en' => $name_en,
			    			'surname_en' => $surname_en,
			    			'birthdate' => $birthdate,
			    			'age' => $age,
			    			'blood' => $blood,
			    			'race' => $ch1,
			    			'nationality' => $s1,
			    			'religion' => $religion,
			    			'old_bro' => $bro1,
			    			'little_bro' => $bro2,
			    			'old_sis' => $sis1,
			    			'little_sis' => $sis2,
			    			'son_of_man' => $me,
			    			'relation_parent' => $relation,
			    			'idcard_father' => $idcard1,
			    			'prefix_father' => $prefix1,
			    			'name_father' => $name1,
			    			'surname_father' => $surname1,
			    			'salary_father' => $salary1,
			    			'mobile_father' => $mobile1,
			    			'idcard_mother' => $idcard2,
			    			'prefix_mother' => $prefix2,
			    			'name_mother' => $name2,
			    			'surname_mother' => $surname2,
			    			'salary_mother' => $salary2,
			    			'mobile_mother' => $mobile2,
			    			'relation' => $relation2,
			    			'idcard_relation' => $idcard3,
			    			'prefix_relation' => $prefix3,
			    			'name_relation' => $name3,
			    			'surname_relation' => $surname3,
			    			'salary_relation' => $salary3,
			    			'mobile_relation' => $mobile3,

			    			
			    			'address_id' => $address,
			    			'address_no' => $addr_no,
			    			'moo' => $moo,
			    			'road' => $road,
			    			'tumbon' => $tumbon,
			    			'amphur' => $amphur,
			    			'province' => $province,
			    			'zipcode' => $zipcode,
			    			'address_mobile' => $addr_phone,

			    			'address_id_2' => $address2,
			    			'address_no_2' => $addr_no2,
			    			'moo_2' => $moo2,
			    			'road_2' => $road2,
			    			'tumbon_2' => $tumbon2,
			    			'amphur_2' => $amphur2,
			    			'province_2' => $province2,
			    			'zipcode_2' => $zipcode2,
			    			'address_mobile_2' => $addr_phone2,

			    			'weight' => $weight,
			    			'height' => $height,



			    			'disadvantage' => $m1,
			    			'live' => $m2,
			    			'grab' => $m3,
			    			'stationary' => $m4,
			    			'lose_class' => $m5,
			    			'lose_food' => $m6,
			    			'disabled' => $m7,

			    			'gravel_road' => $k1,
			    			'paved_road' => $k2,
			    			'home_water' => $k3,
			    			'home_school' => $k4,
			    			'how_to_school' => $way,

			    			'student_type' => $student_type,
			    			'remark' => $remark,

			    		));
			    	} else {

			    		$this->db->where('id', $rs->row()->id)->update('students', array(
			    			'term_id' => $this->input->post('term'),
			    			'year_id' => $this->input->post('years'),
			    			'school_id' => $school_id,
			    			'idcard' => $idcard,
			    			'room_level' => $level,
			    			'room_no' => $room_no,
			    			'student_id' => $student_id,
			    			'gender' => $gender,
			    			'prefix' => $prefix,
			    			'name' => $name,
			    			'surname' => $surname,
			    			'name_en' => $name_en,
			    			'surname_en' => $surname_en,
			    			'birthdate' => $birthdate,
			    			'age' => $age,
			    			'blood' => $blood,
			    			'race' => $ch1,
			    			'nationality' => $s1,
			    			'religion' => $religion,
			    			'old_bro' => $bro1,
			    			'little_bro' => $bro2,
			    			'old_sis' => $sis1,
			    			'little_sis' => $sis2,
			    			'son_of_man' => $me,

			    			'relation_parent' => $relation,
			    			'idcard_father' => $idcard1,
			    			'prefix_father' => $prefix1,
			    			'name_father' => $name1,
			    			'surname_father' => $surname1,
			    			'salary_father' => $salary1,
			    			'mobile_father' => $mobile1,
			    			'idcard_mother' => $idcard2,
			    			'prefix_mother' => $prefix2,
			    			'name_mother' => $name2,
			    			'surname_mother' => $surname2,
			    			'salary_mother' => $salary2,
			    			'mobile_mother' => $mobile2,

			    			'relation' => $relation2,
			    			'idcard_relation' => $idcard3,
			    			'prefix_relation' => $prefix3,
			    			'name_relation' => $name3,
			    			'surname_relation' => $surname3,
			    			'salary_relation' => $salary3,
			    			'mobile_relation' => $mobile3,

			    			
			    			'address_id' => $address,
			    			'address_no' => $addr_no,
			    			'moo' => $moo,
			    			'road' => $road,
			    			'tumbon' => $tumbon,
			    			'amphur' => $amphur,
			    			'province' => $province,
			    			'zipcode' => $zipcode,
			    			'address_mobile' => $addr_phone,

			    			'address_id_2' => $address2,
			    			'address_no_2' => $addr_no2,
			    			'moo_2' => $moo2,
			    			'road_2' => $road2,
			    			'tumbon_2' => $tumbon2,
			    			'amphur_2' => $amphur2,
			    			'province_2' => $province2,
			    			'zipcode_2' => $zipcode2,
			    			'address_mobile_2' => $addr_phone2,

			    			'weight' => $weight,
			    			'height' => $height,



			    			'disadvantage' => $m1,
			    			'live' => $m2,
			    			'grab' => $m3,
			    			'stationary' => $m4,
			    			'lose_class' => $m5,
			    			'lose_food' => $m6,
			    			'disabled' => $m7,

			    			'gravel_road' => $k1,
			    			'paved_road' => $k2,
			    			'home_water' => $k3,
			    			'home_school' => $k4,
			    			'how_to_school' => $way,

			    			'student_type' => $student_type,
			    			'remark' => $remark,
			    		));

			    	}
			    }
			    $k++;
			}
        }

        $this->sm->update_age_data($this->input->post('term'), $this->input->post('years'), $this->school_id);
        $this->_updata_age();
        
        redirect('member/student');
	}

	public function reset_student()
	{
		$this->db->where('school_id', $this->school_id)->delete('students');
		redirect('member/student');
	}


	public function reset_teacher()
	{
		$this->db->where('school_id', $this->school_id)->delete('teacher');
		redirect('member/teacher');
	}


	public function teacher()
	{
		$this->rs = $this->db->select('*, teacher.id')
						->join('school', 'teacher.school_id = school.school_id')
						->where('province_id', $this->province_id)
						->where('teacher.school_id', $this->school_id)
						->get('teacher')->result();

		
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();

		$this->_t = $this->input->post('term');
		$this->_y = $this->input->post('years');

		$this->render('member/teacher/index', $this);
	}

	public function teacher_delete($id)
	{
		$this->db->where('id', $id)->delete('teacher');
		redirect('member/teacher');
	}

	public function teacher_add()
	{
		$r = $this->db->where('id', $this->member_id)->get('member')->row();

		$this->r = $r;


		$this->area = $this->db->where('province_id', $this->province_id)->where('area_type_id', $this->area_type_id)->get('area_type')->result();

		$this->school = $this->db->where(array('area_type_id' => $r->area_type_id))->get('school')->result();

		$this->edu = $this->db->get('edu')->result();
		$this->academic = $this->db->get('academic_standing')->result();
		$this->level = array(
							array(
								'level_id' => '01', 
								'level_name' => 'อ.1'
							),
							array(
								'level_id' => '02', 
								'level_name' => 'อ.2'
							),
							array(
								'level_id' => '03', 
								'level_name' => 'อ.3'
							),
							
							array(
								'level_id' => '06', 
								'level_name' => 'ป.1'
							),
							array(
								'level_id' => '07', 
								'level_name' => 'ป.2'
							),
							array(
								'level_id' => '08', 
								'level_name' => 'ป.3'
							),
							array(
								'level_id' => '09', 
								'level_name' => 'ป.4'
							),
							array(
								'level_id' => '10', 
								'level_name' => 'ป.5'
							),
							array(
								'level_id' => '11', 
								'level_name' => 'ป.6'
							),
							array(
								'level_id' => '12', 
								'level_name' => 'ม.1'
							),
							array(
								'level_id' => '13', 
								'level_name' => 'ม.2'
							),
							array(
								'level_id' => '14', 
								'level_name' => 'ม.3'
							),
							
						);

		$this->level = $this->db->select('rmid as level_id, rm_name as level_name')->where('rmid <=', 12)->get('room_level')->result_array();

		$this->render('member/teacher/add', $this);
	}

	public function teacher_edit($id)
	{
		$this->r = $this->db->select('*, teacher.id')->where('teacher.id', $id)->join('school', 'teacher.school_id = school.school_id', 'LEFT')->get('teacher')->row();
	
		$this->area = $this->db->where('province_id', $this->province_id)->get('area_type')->result();
		$this->edu = $this->db->get('edu')->result();
		$this->academic = $this->db->get('academic_standing')->result();
		$this->level = array(
							array(
								'level_id' => '01', 
								'level_name' => 'อ.1'
							),
							array(
								'level_id' => '02', 
								'level_name' => 'อ.2'
							),
							array(
								'level_id' => '03', 
								'level_name' => 'อ.3'
							),
							
							array(
								'level_id' => '06', 
								'level_name' => 'ป.1'
							),
							array(
								'level_id' => '07', 
								'level_name' => 'ป.2'
							),
							array(
								'level_id' => '08', 
								'level_name' => 'ป.3'
							),
							array(
								'level_id' => '09', 
								'level_name' => 'ป.4'
							),
							array(
								'level_id' => '10', 
								'level_name' => 'ป.5'
							),
							array(
								'level_id' => '11', 
								'level_name' => 'ป.6'
							),
							array(
								'level_id' => '12', 
								'level_name' => 'ม.1'
							),
							array(
								'level_id' => '13', 
								'level_name' => 'ม.2'
							),
							array(
								'level_id' => '14', 
								'level_name' => 'ม.3'
							),
							
						);

		$this->render('member/teacher/edit', $this);
	}

	public function teacher_save()
	{
		$config = array(
			array(
				'field' => 'idcard',
				'label' => 'idcard',
				'rules' => 'required'
			),
			array(
				'field' => 'age',
				'label' => 'Age',
				'rules' => 'required'
			),
			array(
				'field' => 'school_id',
				'label' => 'school_id',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$this->db->insert('teacher', array(
				'idcard' => $this->input->post('idcard'),
    			'level' => $this->input->post('level'),
    			'teacher_id' => $this->input->post('teacher_id'),
    			'school_id' => $this->input->post('school_id'),
    			'gender' => $this->input->post('gender'),
    			'prefix' => $this->input->post('prefix'),
    			'name' => $this->input->post('name'),
    			'surname' => $this->input->post('surname'),
    			'name_en' => $this->input->post('name_en'),
    			'surname_en' => $this->input->post('surname_en'),
    			'position' => $this->input->post('position'),
    			'academic' => $this->input->post('academic'),
    			'age' => $this->input->post('age'),
    			'age_month' => $this->input->post('age_month'),
    			'start_work' => $this->input->post('start_work'),
    			'age_work' => $this->input->post('age_work'),
    			'month_work' => $this->input->post('month_work'),
    			'study' => $this->input->post('study'),
    			'study_eg' => $this->input->post('study_eg'),
    			'study_level' => $this->input->post('study_level'),
    			'teacher_co' => $this->input->post('teacher_co'),
    			'teach_target' => $this->input->post('teach_target'),
			));

			$id = $this->db->insert_id();

			$config = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|jpeg|PNG|png',
				'file_name' => $this->school_id.'-teacher-'.do_hash($id),
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('thumbnail')) {
				$data = $this->upload->data();
				$this->db->where('id', $id)->update('teacher', array(
					'thumbnail' => $data['file_name']
				));
			}

		}
		redirect('member/teacher');

	}


	public function teacher_update()
	{
		$config = array(
			array(
				'field' => 'idcard',
				'label' => 'idcard',
				'rules' => 'required'
			),
			array(
				'field' => 'age',
				'label' => 'Age',
				'rules' => 'required'
			),
			array(
				'field' => 'school_id',
				'label' => 'school_id',
				'rules' => 'required'
			),
			array(
				'field' => 'id',
				'label' => 'ID',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$this->db->where('id', $this->input->post('id'))->update('teacher', array(
				'idcard' => $this->input->post('idcard'),
    			'level' => $this->input->post('level'),
    			'teacher_id' => $this->input->post('teacher_id'),
    			'school_id' => $this->input->post('school_id'),
    			'gender' => $this->input->post('gender'),
    			'prefix' => $this->input->post('prefix'),
    			'name' => $this->input->post('name'),
    			'surname' => $this->input->post('surname'),
    			'name_en' => $this->input->post('name_en'),
    			'surname_en' => $this->input->post('surname_en'),
    			'position' => $this->input->post('position'),
    			'academic' => $this->input->post('academic'),
    			'age' => $this->input->post('age'),
    			'age_month' => $this->input->post('age_month'),
    			'start_work' => $this->input->post('start_work'),
    			'age_work' => $this->input->post('age_work'),
    			'month_work' => $this->input->post('month_work'),
    			'study' => $this->input->post('study'),
    			'study_eg' => $this->input->post('study_eg'),
    			'study_level' => $this->input->post('study_level'),
    			'teacher_co' => $this->input->post('teacher_co'),
    			'teach_target' => $this->input->post('teach_target'),
			));

			$id = $this->input->post('id');

			$config = array(
				'upload_path' => './upload/',
				'allowed_types' => 'jpg|jpeg|PNG|png',
				'file_name' => $this->school_id.'-teacher-'.do_hash($id),
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('thumbnail')) {
				$data = $this->upload->data();
				$this->db->where('id', $id)->update('teacher', array(
					'thumbnail' => $data['file_name']
				));
			}


		//	echo $this->db->last_query();
		} 
		redirect('member/teacher');

	}

	public function upload_teacher()
	{
		$config['upload_path']          = './upload/data/';
        $config['allowed_types']        = 'csv';
        $config['file_name']            = 'teacher-'.$this->school_id;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$data = $this->upload->data();
        	$handle = fopen("./upload/data/".$data['file_name'], "r");
			$k = 0;
			while (($data = fgets($handle)) !== FALSE) {
			    if ($k > 0) {
			    	list($school_id, $school_name, $idcard, $level, $teacher_id, $gender, $prefix, $name, $surname, $name_en, $surname_en, $position, $academic, $birthdate, $age, $age_month, $start_work, $age_work, $month_work, $study, $study_eg, $study_level, $teacher_co, $teach_target) = explode(",", $data);

			    	$rs = $this->db->where(array(
			    		'teacher_id' => $teacher_id,
			    		'school_id' => $this->school_id,
			    	))->get('teacher');



			    	if ($rs->num_rows() == 0) {
			    		$this->db->insert('teacher', array(
			    			'school_id' => $this->school_id,
			    			'idcard' => $idcard,
			    			'level' => $level,
			    			'teacher_id' => $teacher_id,
			    			'gender' => $gender,
			    			'prefix' => $prefix,
			    			'name' => $name,
			    			'surname' => $surname,
			    			'name_en' => $name_en,
			    			'surname_en' => $surname_en,
			    			'position' => $position,
			    			'academic' => $academic,
			    			'age' => $age,
			    			'age_month' => $age_month,
			    			'start_work' => $start_work,
			    			'age_work' => $age_work,
			    			'month_work' => $month_work,
			    			'study' => $study,
			    			'study_eg' => $study_eg,
			    			'study_level' => $study_level,
			    			'teacher_co' => trim($teacher_co),
			    			'teach_target' => trim($teach_target),

			    		));
			    	} else {

			    		$this->db->where('id', $rs->row()->id)->update('teacher', array(
			    			'school_id' => $this->school_id,
			    			'idcard' => $idcard,
			    			'level' => $level,
			    			'teacher_id' => $teacher_id,
			    			'gender' => $gender,
			    			'prefix' => $prefix,
			    			'name' => $name,
			    			'surname' => $surname,
			    			'name_en' => $name_en,
			    			'surname_en' => $surname_en,
			    			'position' => $position,
			    			'academic' => $academic,
			    			'age' => $age,
			    			'age_month' => $age_month,
			    			'start_work' => $start_work,
			    			'age_work' => $age_work,
			    			'month_work' => $month_work,
			    			'study' => $study,
			    			'study_eg' => $study_eg,
			    			'study_level' => $study_level,
			    			'teacher_co' => trim($teacher_co),
			    			'teach_target' => trim($teach_target),

			    		));

			    	}
			    }
			    $k++;
			}
        }
        redirect('member/teacher');
	}


}

