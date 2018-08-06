<?php 
class Teacher extends Backend {
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{

		if (isAdminArea()) {
			$this->db->where('school.area_type_id', $this->area_type_id);

		}

		$this->rs = $this->db->select('*, teacher.id')->join('school', 'teacher.school_id = school.school_id')->where('province_id', $this->province_id)->get('teacher')->result();

		
		$this->term = $this->db->get('term')->result();
		$this->years = $this->db->get('years')->result();

		$this->_t = $this->input->post('term');
		$this->_y = $this->input->post('years');

		$this->render('teacher/index', $this);
	}

	public function teacher_delete($id)
	{
		$this->db->where('id', $id)->delete('teacher');
		redirect('backend/teacher');
	}

	public function teacher_add()
	{
		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);

		}

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

		$this->render('teacher/add', $this);
	}

	public function teacher_edit($id)
	{
		$this->r = $this->db->select('*, teacher.id')->where('teacher.id', $id)->join('school', 'teacher.school_id = school.school_id', 'LEFT')->get('teacher')->row();
		
		if (isAdminArea()) {
			$this->db->where('area_type_id', $this->area_type_id);

		}

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

		$this->render('teacher/edit', $this);
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
		}
		redirect('backend/teacher');

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

		//	echo $this->db->last_query();
		} 
		redirect('backend/teacher');

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
        redirect('backend/teacher');
	}
}