<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
	private $member_id;
	public function __construct()
	{
		parent::__construct();
		$this->member_id = $this->session->userdata('id');

	}

	public function getSchool()
	{
		$rs = $this->db->where('id', $this->member_id)->get('member');
		if ($rs->num_rows() > 0) {
			return $rs->row()->school;
		}
		return false;
	}
}