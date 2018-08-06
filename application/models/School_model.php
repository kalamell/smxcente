<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSchool($f6)
	{
		$rs = $this->db->where('school_id', $f6)->get('school');
		if ($rs->num_rows() > 0) {
			return $rs->row();
		}
		return false;
	}

	public function get_age_data()
	{
		$rs = $this->db->select('COUNT(age) as count_age, age, gender')->where(array(
			'term_id' => $term_id,
			'year_id' => $year_id,
			'age IS NOT NULL' => null
		))->group_by('gender, age')->get('students')->result();

		return $rs;
	}
	public function update_age_data($term_id, $year_id, $school_id = '')
	{
		if ($school_id != '') {
			$this->db->where('school_id', $school_id);
		}
		$rs = $this->db->select('school_id, COUNT(age) as count_age, age, gender')->where(array(
			'term_id' => $term_id,
			'year_id' => $year_id,
			'age IS NOT NULL' => null
		))->group_by('gender, age, school_id')->get('students')->result();

		echo $this->db->last_query();

		foreach($rs as $r) {
			$rs = $this->db->where(array(
				'term_id' => $term_id,
				'year_id' => $year_id,
				'gender' => $r->gender,
				'age' => $r->age,
				'school_id' => $r->school_id,
			))->get('school_student_age');

			if ($rs->num_rows() == 0) {
				$this->db->insert('school_student_age', array(
					'school_id' => $r->school_id,
					'term_id' => $term_id,
					'year_id' => $year_id,
					'gender' => $r->gender,
					'age' => $r->age,
					'total' => $r->count_age,
				));
			} else {
				$this->db->where(array(
					'term_id' => $term_id,
					'year_id' => $year_id,
					'gender' => $r->gender,
					'age' => $r->age,
					'school_id' => $r->school_id,
				))->update('school_student_age', array(
					
					'total' => $r->count_age,
				));
			}
		}
	}
}