<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->news = $this->db->limit(3)->where('config_id', $this->config_id)->order_by('created_date', 'DESC')->get('news')->result();
		
		$this->render('home', $this);
	}

	public function genid()
	{
		$rs = $this->db->get('school');
		$i = 1;
		foreach($rs->result() as $r) {
			$this->db->where('f6', $r->f6)->update('school', array(
				'id' => $i
			));
			$i++;
		}
	}
}
