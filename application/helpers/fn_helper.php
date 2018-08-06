
<?php 


function parseToXML($htmlStr){ $xmlStr=str_replace('<','&lt;',$htmlStr); $xmlStr=str_replace('>','&gt;',$xmlStr); $xmlStr=str_replace('"','&quot;',$xmlStr); $xmlStr=str_replace("'",'&#39;',$xmlStr); $xmlStr=str_replace("&",'&amp;',$xmlStr);return $xmlStr;}

function prefix($type)
{
	if ($type == 'ช' || $type == 'เด็กชาย' || $type == 'ด.ช.') {
		return 'เด็กชาย';
	}

	if ($type == 'ญ' || $type == 'เด็กหญิง' || $type == 'ด.ญ.') {
		return 'เด็กหญิง';
	}

}


function isMember()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row();
	}

	return false;
}

function isStaffSchool()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row()->status == 'staff' ||  $rs->row()->status == 'member' ? true : false;
	}

	return false;
}

function isStaff()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row()->status == 'staff' ||  $rs->row()->status == 'superadmin' || $rs->row()->status == 'admin_province' || $rs->row()->status == 'admin_area' ? true : false;
	}

	return false;

}


function isBackend()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row()->status == 'superadmin' || $rs->row()->status == 'admin_province' || $rs->row()->status == 'admin_area' ? true : false;
	}

	return false;

}



function isAdminProvince() {
	$ci =& get_instance();
	$id = $ci->session->userdata('id');



	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		
		return $rs->row()->status == 'admin_province' ? true : false;
	}
	return false;
}

function isAdminArea() {
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		
		return $rs->row()->status == 'admin_area' ? true : false;
	}
	return false;
}

function isSuperAdmin()
{
	$ci =& get_instance();
	$id = $ci->session->userdata('id');

	$ci->db->reset_query();
	$rs = $ci->db->where('id', $id)->get('member');
	if ($rs->num_rows()>0) {
		return $rs->row()->status == 'superadmin' ? true : false;
	}

	return false;

}

function save()
{
	$ci =& get_instance();

	if ($ci->session->flashdata('save')) {
		return '<div class="alert alert-success">บันทึกข้อมูลเรียบร้อย</div>';
	}

	if ($ci->session->userdata('save_data')) {
		$ci->session->set_userdata('save_data', '');
		return '<div class="alert alert-success">บันทึกข้อมูลเรียบร้อย</div>';
	}
	return '';
}


function footer()
{
	$ci =& get_instance();

	$config_id = getProvinceWebsite()->id;


	$rs = $ci->db->limit(1)->where('id', $config_id)->get('config');
	if ($rs->num_rows()>0) {
		return $rs->row()->footer;
	}

	return '&2018';
}



function getTitle()
{
	$ci =& get_instance();

	$config_id = getProvinceWebsite()->id;
	$rs = $ci->db->where('id', $config_id)->get('config');
	if ($rs->num_rows()>0) {
		return $rs->row()->title;
	}

	return 'School Mapping ';
}


function getLogo()
{
	/*
	<img src="<?php echo base_url();?>assets/img/logo.png" style="    width: 40px;
    margin-left: -9px;
    margin-top: -11px; float: left; margin-right: 4px;">
    */
	$ci =& get_instance();

	$config_id = getProvinceWebsite()->id;

	$rs = $ci->db->where('id', $config_id)->get('config');
	if ($rs->num_rows()>0) {
		if ($rs->row()->logo !='') {
			return '<img src="'.base_url('upload/'.$rs->row()->logo).'" style="width: 40px;margin-left: -9px; margin-top: -11px; float: left; margin-right: 4px;">';
		}
	}

	return '';
}


function getLatLng()
{
	$ci =& get_instance();

	$config_id = getProvinceWebsite()->id;

	$rs = $ci->db->where('id', $config_id)->get('config');
	if ($rs->num_rows()>0) {
		return $rs->row();
	}

	return '';
}

function banner()
{
	$ci =& get_instance();

	$rs = getProvinceWebsite();

	$rs = $ci->db->where('config_id', $rs->id)->get('banner');
	return $rs->result();
}

function getRoomLevel($school_id, $term, $year, $rmid)
{
	$ci =& get_instance();

	$rs = $ci->db->where(array(
		'school_id' => $school_id,
		'term_id' => $term,
		'year_id' => $year,
		'rmid' => $rmid
	))->get('school_room_level');
	return $rs->result();
}

function countSchool($school_type_id, $province_id, $amphur_id, $district_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'school_type_id' => $school_type_id,
		'province_id' => $province_id,
		'amphur_id' => $amphur_id,
		'district_id' => $district_id
	))->count_all_results('school');
}


function countSchoolAmphur($school_type_id, $province_id, $amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'school_type_id' => $school_type_id,
		'province_id' => $province_id,
		'amphur_id' => $amphur_id,
	))->count_all_results('school');
}


function countSchoolArea($school_type_id, $province_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'school_type_id' => $school_type_id,
		'province_id' => $province_id,
	))->count_all_results('school');
}

function countSchoolAreaCode($code_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'area_id' => $code_id,
	))->count_all_results('school');

}

function countDataStudentDistrict($area_type_id, $district_id, $type) {
	$ci =& get_instance();
	$rs = $rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.') + SUM(p2_'.$type.') + SUM(p3_'.$type.') + SUM(p4_'.$type.') + SUM(p5_'.$type.') + SUM(p6_'.$type.')  + SUM(m1_'.$type.')  + SUM(m2_'.$type.')  + SUM(m3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('area_type_id', $area_type_id)
			->where('district_id', $district_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function countDataStudentAmphur($area_type_id, $amphur_id, $type) {
	$ci =& get_instance();
	$rs = $rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.') + SUM(p2_'.$type.') + SUM(p3_'.$type.') + SUM(p4_'.$type.') + SUM(p5_'.$type.') + SUM(p6_'.$type.')  + SUM(m1_'.$type.')  + SUM(m2_'.$type.')  + SUM(m3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('area_type_id', $area_type_id)
			->where('amphur_id', $amphur_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function countSchoolAreaCodeAmphur($code_id, $amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'area_type_id' => $code_id,
		'amphur_id' => $amphur_id
	))->count_all_results('school');

}


function countSchoolSptAmphurOnly($amphur_id, $type)
{
	$ci =& get_instance();
	$count = $ci->db->where(array(
		'amphur_id' => $amphur_id,
		'type_school' => $type,
	))->count_all_results('school');



	return $count;

}

function countSchoolAmphurOnly($amphur_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'amphur_id' => $amphur_id
	))->count_all_results('school');

}

function countSchoolSptDistrictOnly($district_id, $type)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'district_id' => $district_id,
		'type_school' => $type
	))->count_all_results('school');

}

function countSchoolDistrictOnly($district_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'district_id' => $district_id
	))->count_all_results('school');

}

function countSchoolAreaCodeDistrcit($code_id, $district_id)
{
	$ci =& get_instance();
	return $ci->db->where(array(
		'area_type_id' => $code_id,
		'district_id' => $district_id
	))->count_all_results('school');



}

function getMenuWebsite()
{
	$ci =& get_instance();
	$province_code = getProvinceWebsite()->PROVINCE_CODE;

	$rs = $ci->db->where('PROVINCE_CODE', $province_code)->get('province');
	$province_id = $rs->row()->PROVINCE_ID;

	$menu_config = $ci->db->order_by('sort', 'asc')->get('menu_config')->result();
	$menu_sub = $ci->db->order_by('sub_sort', 'asc')->get('menu_sub')->result();
	$config = $ci->db->select('*')->where('province_id', $province_id)->get('config');

	if ($config->num_rows() > 0) {
		if (count($menu_config) > 0) {
			foreach($menu_config as $mc) {
				$m = $ci->db->where('config_id', $config->row()->id)
					->where('link_id', $mc->id)
					->join('menu_sub', 'menu_website.sub_id = menu_sub.sub_id')
					->order_by('sub_sort', 'asc')
					->get('menu_website');
				
				if ($m->num_rows() > 0) {

				
					echo '<li>'.$mc->name;
					echo '<ul>';
					foreach($m->result() as $_m) {
						if ($_m->type == 'IN') {
							$link = anchor($_m->link, $_m->sub_name);
						} else {
							$link = '<a href="'.$_m->link.'">'.$_m->sub_name."</a>";
						}
						echo '<li>';
						echo $link;
						echo '</li>';
					}
					echo '</ul>';
					echo '</li>';
				}
			}
		}
	}
}

function url($var)
{
	if(strpos($var, 'http://') !== 0) {
	  return 'http://' . $var;
	} else {
	  return $var;
	}
}

function getProvinceWebsite()
{
	$ci =& get_instance();
	$dat = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
	$rs = $ci->db->select('config.province_id, type_website, PROVINCE_CODE, config.id')
			->where('province.PROVINCE_CODE', $dat)
			->join('province', 'config.province_id = province.PROVINCE_ID')->get('config');

	return $rs->row();
}

function isWebsiteNation()
{
	$type_website = getProvinceWebsite()->type_website;

	if ($type_website == 'nation') {
		return true;
	}
	return false;

}

function getSchoolFromDistrict($district_id)
{
	$ci =& get_instance();
	return $ci->db->where('district_id', $district_id)->get('school')->result();
}

function getLevelDistrcit($level, $district_id)
{
	$ci =& get_instance();

	if ($level == '01') {
		$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('district_id', $district_id)
			->count_all_results('school_data');
		return $rs;

	}

	if ($level == '02') {
		$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room) + SUM(p1_room) + SUM(p2_room) + SUM(p3_room) + SUM(p4_room) + SUM(p5_room) + SUM(p6_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('district_id', $district_id)
			->count_all_results('school_data');
		return $rs;

	}

	if ($level == '03') {
		$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room) + SUM(p1_room) + SUM(p2_room) + SUM(p3_room) + SUM(p4_room) + SUM(p5_room) + SUM(p6_room)  + SUM(m1_room)  + SUM(m2_room)  + SUM(m3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('district_id', $district_id)
			->count_all_results('school_data');
		return $rs;

	}

	/*

	if ($level == '04') {
		$rs = $ci->db->select('(SUM(m1_room)  + SUM(m2_room)  + SUM(m3_room) + SUM(m4_room) + SUM(m5_room) + SUM(m6_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('district_id', $district_id)
			->count_all_results('school_data');
		return $rs;

	}

	if ($level == '05') {
		$rs = $ci->db->select('(SUM(pvc1_room)  + SUM(pvc2_room)  + SUM(pvc3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('district_id', $district_id)
			->count_all_results('school_data');
		return $rs;

	}
	*/

}


function getLevelAmphur($level, $amphur_id)
{
	$ci =& get_instance();

	if ($level == '01') {
		$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('amphur_id', $amphur_id)
			->count_all_results('school_data');
		return $rs;

	}

	if ($level == '02') {
		$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room) + SUM(p1_room) + SUM(p2_room) + SUM(p3_room) + SUM(p4_room) + SUM(p5_room) + SUM(p6_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('amphur_id', $amphur_id)
			->count_all_results('school_data');
		return $rs;

	}

	if ($level == '03') {
		$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room) + SUM(p1_room) + SUM(p2_room) + SUM(p3_room) + SUM(p4_room) + SUM(p5_room) + SUM(p6_room)  + SUM(m1_room)  + SUM(m2_room)  + SUM(m3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('amphur_id', $amphur_id)
			->count_all_results('school_data');
		return $rs;

	}


	/*
	if ($level == '04') {
		$rs = $ci->db->select('(SUM(m1_room)  + SUM(m2_room)  + SUM(m3_room) + SUM(m4_room) + SUM(m5_room) + SUM(m6_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('amphur_id', $amphur_id)
			->count_all_results('school_data');
		return $rs;

	}

	if ($level == '05') {
		$rs = $ci->db->select('(SUM(pvc1_room)  + SUM(pvc2_room)  + SUM(pvc3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->having('count >', 0)
			->where('amphur_id', $amphur_id)
			->count_all_results('school_data');
		return $rs;

	}
	*/

}




function getLevelDistrcitGender($level, $district_id, $type)
{
	$ci =& get_instance();

	if ($level == '01') {
		$rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	if ($level == '02') {
		$rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.') + SUM(p2_'.$type.') + SUM(p3_'.$type.') + SUM(p4_'.$type.') + SUM(p5_'.$type.') + SUM(p6_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	if ($level == '03') {
		$rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.') + SUM(p2_'.$type.') + SUM(p3_'.$type.') + SUM(p4_'.$type.') + SUM(p5_'.$type.') + SUM(p6_'.$type.')  + SUM(m1_'.$type.')  + SUM(m2_'.$type.')  + SUM(m3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	/*
	if ($level == '04') {
		$rs = $ci->db->select('(SUM(m1_'.$type.')  + SUM(m2_'.$type.')  + SUM(m3_'.$type.') + SUM(m4_'.$type.') + SUM(m5_'.$type.') + SUM(m6_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	if ($level == '05') {
		$rs = $ci->db->select('(SUM(pvc1_'.$type.')  + SUM(pvc2_'.$type.')  + SUM(pvc3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}
	*/

}

function getLevelAmphurGender($level, $amphur_id, $type)
{
	$ci =& get_instance();

	if ($level == '01') {
		$rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	if ($level == '02') {
		$rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.') + SUM(p2_'.$type.') + SUM(p3_'.$type.') + SUM(p4_'.$type.') + SUM(p5_'.$type.') + SUM(p6_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	if ($level == '03') {
		$rs = $ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.') + SUM(p2_'.$type.') + SUM(p3_'.$type.') + SUM(p4_'.$type.') + SUM(p5_'.$type.') + SUM(p6_'.$type.')  + SUM(m1_'.$type.')  + SUM(m2_'.$type.')  + SUM(m3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	/*

	if ($level == '04') {
		$rs = $ci->db->select('(SUM(m1_'.$type.')  + SUM(m2_'.$type.')  + SUM(m3_'.$type.') + SUM(m4_'.$type.') + SUM(m5_'.$type.') + SUM(m6_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}

	if ($level == '05') {
		$rs = $ci->db->select('(SUM(pvc1_'.$type.')  + SUM(pvc2_'.$type.')  + SUM(pvc3_'.$type.')) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');
		if ($rs->num_rows() == 0 ) {
			return '0';
		} else {
			return $rs->row()->count;	
		}

	}
	*/

}

function getRoomDistrict($level, $district_id) {
	$ci =& get_instance();
	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}

	

	$rs = $ci->db->select('(SUM('.$field.'_room)) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
	
}


function getStudentSchool($school_id) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(d2_boy) + SUM(d2_girl) + SUM(d3_boy) + SUM(d3_girl) + SUM(d4_boy) + SUM(d4_girl) +SUM(d5_boy) + SUM(d5_girl) + SUM(a1_boy) + SUM(a2_boy) + SUM(a3_boy) + SUM(p1_boy) + SUM(p2_boy) + SUM(p3_boy) + SUM(p4_boy) + SUM(p5_boy) + SUM(p6_boy)  + SUM(m1_boy)  + SUM(m2_boy)  + SUM(m3_boy) + SUM(a1_girl) + SUM(a2_girl) + SUM(a3_girl) + SUM(p1_girl) + SUM(p2_girl) + SUM(p3_girl) + SUM(p4_girl) + SUM(p5_girl) + SUM(p6_girl)  + SUM(m1_girl)  + SUM(m2_girl)  + SUM(m3_girl)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('school_data.school_id')
			->where('school_data.school_id', $school_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count == null ? '0' : $rs->row()->count;
	}
}


function getStudentTypeDistrict($district_id, $type) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(d2_boy) + SUM(d2_girl) + SUM(d3_boy) + SUM(d3_girl) + SUM(d4_boy) + SUM(d4_girl) +SUM(d5_boy) + SUM(d5_girl) + SUM(a1_boy) + SUM(a2_boy) + SUM(a3_boy) + SUM(p1_boy) + SUM(p2_boy) + SUM(p3_boy) + SUM(p4_boy) + SUM(p5_boy) + SUM(p6_boy)  + SUM(m1_boy)  + SUM(m2_boy)  + SUM(m3_boy)  + SUM(a1_girl) + SUM(a2_girl) + SUM(a3_girl) + SUM(p1_girl) + SUM(p2_girl) + SUM(p3_girl) + SUM(p4_girl) + SUM(p5_girl) + SUM(p6_girl)  + SUM(m1_girl)  + SUM(m2_girl)  + SUM(m3_girl)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('type_school', $type)
			->where('district_id', $district_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count == null ? '0' : $rs->row()->count;
	}
}



function getStudentTypeAmphur($amphur_id, $type) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(d2_boy) + SUM(d2_girl) + SUM(d3_boy) + SUM(d3_girl) + SUM(d4_boy) + SUM(d4_girl) +SUM(d5_boy) + SUM(d5_girl) + SUM(a1_boy) + SUM(a2_boy) + SUM(a3_boy) + SUM(p1_boy) + SUM(p2_boy) + SUM(p3_boy) + SUM(p4_boy) + SUM(p5_boy) + SUM(p6_boy)  + SUM(m1_boy)  + SUM(m2_boy)  + SUM(m3_boy) + SUM(a1_girl) + SUM(a2_girl) + SUM(a3_girl) + SUM(p1_girl) + SUM(p2_girl) + SUM(p3_girl) + SUM(p4_girl) + SUM(p5_girl) + SUM(p6_girl)  + SUM(m1_girl)  + SUM(m2_girl)  + SUM(m3_girl)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('type_school', $type)
			->where('amphur_id', $amphur_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count == null ? '0' : $rs->row()->count;
	}
}


function getRoomGenderDistrict($level, $district_id, $type) {
	$ci =& get_instance();
	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}

	

	$rs = $ci->db->select('(SUM('.$field.'_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
	
}

function getRoomGenderProvince($level, $province_id, $type) {
	$ci =& get_instance();
	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}

	

	$rs = $ci->db->select('(SUM('.$field.'_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('province_id')
		->where('province_id', $province_id)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
	
}


function getRoomGenderAmphur($level, $amphur_id, $type) {
	$ci =& get_instance();
	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}

	

	$rs = $ci->db->select('(SUM('.$field.'_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
	
}




function getRoomAmphur($level, $amphur_id) {
	$ci =& get_instance();
	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}

	

	$rs = $ci->db->select('(SUM('.$field.'_room)) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
	
}

function getStudentTypeSchoolDistrict($level, $district_id, $type) {
	$ci =& get_instance();

	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}



	$rs = $ci->db->select('(SUM('.$field.'_boy) + SUM('.$field.'_girl)) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->where('type_school', $type)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function getStudentTypeSchoolAmphur($level, $amphur_id, $type) {
	$ci =& get_instance();

	$ar = array(
		array(
			'level_id' => '01', 
			'level_name' => 'a1'
		),
		array(
			'level_id' => '02', 
			'level_name' => 'a2'
		),
		array(
			'level_id' => '03', 
			'level_name' => 'a3'
		),
		
		array(
			'level_id' => '06', 
			'level_name' => 'p1'
		),
		array(
			'level_id' => '07', 
			'level_name' => 'p2'
		),
		array(
			'level_id' => '08', 
			'level_name' => 'p3'
		),
		array(
			'level_id' => '09', 
			'level_name' => 'p4'
		),
		array(
			'level_id' => '10', 
			'level_name' => 'p5'
		),
		array(
			'level_id' => '11', 
			'level_name' => 'p6'
		),
		array(
			'level_id' => '12', 
			'level_name' => 'm1'
		),
		array(
			'level_id' => '13', 
			'level_name' => 'm2'
		),
		array(
			'level_id' => '14', 
			'level_name' => 'm3'
		),
		array(
			'level_id' => '15', 
			'level_name' => 'm4'
		),
		array(
			'level_id' => '16', 
			'level_name' => 'm5'
		),
		array(
			'level_id' => '17', 
			'level_name' => 'm6'
		),
		array(
			'level_id' => '18', 
			'level_name' => 'pvc1'
		),
		array(
			'level_id' => '19', 
			'level_name' => 'pvc2'
		),
		array(
			'level_id' => '20', 
			'level_name' => 'pvc3'
		),
	);

	$field = '';
	
	foreach($ar as $a) {
		if ($a['level_id'] == $level) {
			$field = $a['level_name'];
			break;
		}
	}



	$rs = $ci->db->select('(SUM('.$field.'_boy) + SUM('.$field.'_girl)) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->where('type_school', $type)
		->get('school_data');
	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function get3to5All($province_id)
{
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(boy) + SUM(girl)) as count')
			->where('province_id', $province_id)
			->group_by('province_id')
			->get('childrens');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}

}

function get3to5District($district_id) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(boy) + SUM(girl)) as count')
			->where('district_id', $district_id)
			->group_by('district_id')
			->get('childrens');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}



function get3to5Amphur($amphur_id) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(boy) + SUM(girl)) as count')
			->where('amphur_id', $amphur_id)
			->group_by('amphur_id')
			->get('childrens');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function getTeacherSchool($school_id) {
	$ci =& get_instance();
	$rs = $ci->db->where('teacher.school_id', $school_id)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');
	return $rs;
}



function getTeacherDistrict($district_id, $type, $gender) {
	$gender = $gender == 'man' ? 'ช' : 'ญ';
	$ci =& get_instance();
	$rs = $ci->db->where('district_id', $district_id)
				->where('area_type_id', $type)
				->like('gender', $gender)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');
	

	return $rs;
}


function getAllTeacherDistrict($district_id) {
	
	$ci =& get_instance();
	$rs = $ci->db->where('district_id', $district_id)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');

	return $rs;
}


function getTeacherAmphur($amphur_id, $type, $gender) {
	$gender = $gender == 'man' ? 'ช' : 'ญ';
	$ci =& get_instance();
	$rs = $ci->db->where('amphur_id', $amphur_id)
				->where('area_type_id', $type)
				->like('gender', $gender)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');
	

	return $rs;
}


function getAllTeacherAmphur($amphur_id) {
	
	$ci =& get_instance();
	$rs = $ci->db->where('amphur_id', $amphur_id)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');
	return $rs;
}


function getTeacherTypeSchoolDistrict($district_id, $type) {
	$ci =& get_instance();
	$rs = $ci->db->where('district_id', $district_id)
				->where('type_school', $type)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');
	return $rs;
}

function getTeacherTypeSchoolAmphur($amphur_id, $type) {
	$ci =& get_instance();
	$rs = $ci->db->where('amphur_id', $amphur_id)
				->where('type_school', $type)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');
	return $rs;
}

//getTeacherEducationAmphur($am->AMPHUR_ID, $edu->edu_name, $l['level_name']);

function getTeacherEducationAmphur($amphur_id, $study_level, $level) {
	$ci =& get_instance();
	$rs = $ci->db->where('amphur_id', $amphur_id)
				->like('study_level', $study_level)
				->like('level', $level)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');	
	return $rs;
}



function getTeacherAcademicAmphur($amphur_id, $academic, $level) {
	$ci =& get_instance();
	$rs = $ci->db->where('amphur_id', $amphur_id)
				->like('academic', $academic)
				->like('level', $level)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');	
	return $rs;
}


function getTeacherAgeAmphur($amphur_id, $type, $level) {
	$ci =& get_instance();
	if ($type == '01') {
		$ci->db->where('age <', 25);
	}

	if ($type == '02') {
		$ci->db->where('age >=', 25);
		$ci->db->where('age <=', 35);
	}

	
	if ($type == '03') {
		$ci->db->where('age >=', 36);
		$ci->db->where('age <=', 45);
	}


	if ($type == '04') {
		$ci->db->where('age >=', 46);
		$ci->db->where('age <=', 55);
	}


	if ($type == '05') {
		$ci->db->where('age >=', 56);
	}

	$rs = $ci->db->where('amphur_id', $amphur_id)
				->like('level', $level)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');	

	return $rs;
}




function getTeacherCoTarget($amphur_id, $co, $target, $level) {
	$ci =& get_instance();
	
	$co = $co == 'ครู' ? 'ใช่' : 'ไม่ใช่';

	$rs = $ci->db->where('amphur_id', $amphur_id)
				->where('teacher_co', $co)
				->where('teach_target', $target)
				->like('level', $level)
				->join('school', 'teacher.school_id = school.school_id')
				->count_all_results('teacher');	

				//echo $ci->db->last_query();
	
	
	return $rs;
}



function getStudentLackAmphur($amphur_id, $type = '') {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(a1_boy) + SUM(a2_boy) + SUM(a3_boy) + SUM(p1_boy) + SUM(p2_boy) + SUM(p3_boy) + SUM(p4_boy) + SUM(p5_boy) + SUM(p6_boy)  + SUM(m1_boy)  + SUM(m2_boy)  + SUM(m3_boy) + SUM(a1_girl) + SUM(a2_girl) + SUM(a3_girl) + SUM(p1_girl) + SUM(p2_girl) + SUM(p3_girl) + SUM(p4_girl) + SUM(p5_girl) + SUM(p6_girl)  + SUM(m1_girl)  + SUM(m2_girl)  + SUM(m3_girl)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function getStudentLackDistrict($district_id, $type = '') {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(a1_boy) + SUM(a2_boy) + SUM(a3_boy) + SUM(p1_boy) + SUM(p2_boy) + SUM(p3_boy) + SUM(p4_boy) + SUM(p5_boy) + SUM(p6_boy)  + SUM(m1_boy)  + SUM(m2_boy)  + SUM(m3_boy) + SUM(a1_girl) + SUM(a2_girl) + SUM(a3_girl) + SUM(p1_girl) + SUM(p2_girl) + SUM(p3_girl) + SUM(p4_girl) + SUM(p5_girl) + SUM(p6_girl)  + SUM(m1_girl)  + SUM(m2_girl)  + SUM(m3_girl)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}


function getRoomLackDistrict($district_id) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room) + SUM(p1_room) + SUM(p2_room) + SUM(p3_room) + SUM(p4_room) + SUM(p5_room) + SUM(p6_room)  + SUM(m1_room)  + SUM(m2_room)  + SUM(m3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}


function getRoomLackAmphur($amphur_id) {
	$ci =& get_instance();
	$rs = $ci->db->select('(SUM(a1_room) + SUM(a2_room) + SUM(a3_room) + SUM(p1_room) + SUM(p2_room) + SUM(p3_room) + SUM(p4_room) + SUM(p5_room) + SUM(p6_room)  + SUM(m1_room)  + SUM(m2_room)  + SUM(m3_room)) as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function getAge7District($district_id, $age, $gender = '') {
	$ci =& get_instance();

	if ($gender =='') {
		$ci->db->select('SUM(boy) as count_boy, SUM(girl) as count_girl');
	} else {
		$ci->db->select('SUM('.$gender.') as count_'.$gender);
	}
	$rs = $ci->db->where('age', $age)
			->where('district_id', $district_id)
			->group_by('district_id')
			->get('childrens');

	$boy = getSchoolStudentAgeDistrict($district_id, $age, 'boy');
	$girl = getSchoolStudentAgeDistrict($district_id, $age, 'girl');

	


	$ar = array(
		'count_boy' => $rs->row()->count_boy + $boy,
		'count_girl' => $rs->row()->count_girl + $girl,
	);


	return $ar;
}

function getSchoolStudentAgeDistrict($district_id, $age, $gender = '') {
	$ci =& get_instance();
	if ($gender =='boy') {
		$gender = 'ช';
		$ci->db->like('gender', $gender);
	} 

	if ($gender =='girl') {
		$gender = 'ญ';
		$ci->db->like('gender', $gender);
	} 

	$rs = $ci->db->select('SUM(total) as total')
			->join('school', 'school_student_age.school_id = school.school_id')
			->where('age', $age)
			->where('district_id', $district_id)
			->group_by('district_id')
			->get('school_student_age');
			if ($district_id == '6133') {
			//echo $ci->db->last_query();
		}



	if ($rs->num_rows() == 0) {

		return 0;
	} else {
		//print_r($rs->row());
		return $rs->row()->total;
	}

}


function getAge7Amphur($amphur_id, $age) {
	$ci =& get_instance();
	$rs = $ci->db->select('SUM(boy) as count_boy, SUM(girl) as count_girl')
			->where('age', $age)
			->where('amphur_id', $amphur_id)
			->group_by('amphur_id')
			->get('childrens');

	$boy = getSchoolStudentAgeAmphur($amphur_id, $age, 'boy');
	$girl = getSchoolStudentAgeAmphur($amphur_id, $age, 'girl');

	


	$ar = array(
		'count_boy' => $rs->row()->count_boy + $boy,
		'count_girl' => $rs->row()->count_girl + $girl,
	);


	return $ar;
			
	
}


function getSchoolStudentAgeAmphur($amphur_id, $age, $gender = '') {
	$ci =& get_instance();
	if ($gender =='boy') {
		$gender = 'ช';
		$ci->db->like('gender', $gender);
	} 

	if ($gender =='girl') {
		$gender = 'ญ';
		$ci->db->like('gender', $gender);
	} 

	$rs = $ci->db->select('SUM(total) as total')
			->join('school', 'school_student_age.school_id = school.school_id')
			->where('age', $age)
			->where('amphur_id', $amphur_id)
			->group_by('amphur_id')
			->get('school_student_age');
			if ($amphur_id == '6133') {
			//echo $ci->db->last_query();
		}



	if ($rs->num_rows() == 0) {

		return 0;
	} else {
		//print_r($rs->row());
		return $rs->row()->total;
	}

}



function getLevelA1School($school_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}

	$rs = $ci->db->select('(SUM(a1_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('school_data.school_id')
		->where('school_data.school_id', $school_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA1District($district_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(a1_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA1Amphur($amphur_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(a1_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA2School($school_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
		$ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.')) as count');
	} else {
		$ci->db->select('(SUM(a2_'.$type.')) as count');
	}

	$rs = $ci->db->join('school', 'school_data.school_id = school.school_id')
		->group_by('school_data.school_id')
		->where('school_data.school_id', $school_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA2District($district_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(a2_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA2Amphur($amphur_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(a2_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}



function getLevelA3School($school_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
		$ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.')) as count');
	} else {
		$ci->db->select('(SUM(a3_'.$type.')) as count');
	}

	$rs = $ci->db->join('school', 'school_data.school_id = school.school_id')
		->group_by('school_data.school_id')
		->where('school_data.school_id', $school_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA3District($district_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(a3_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelA3Amphur($amphur_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(a3_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}



function getLevelP1School($school_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
		$ci->db->select('(SUM(a1_'.$type.') + SUM(a2_'.$type.') + SUM(a3_'.$type.') + SUM(p1_'.$type.')) as count');
	} else {
		$ci->db->select('(SUM(p1_'.$type.')) as count');
	}

	$rs = $ci->db->join('school', 'school_data.school_id = school.school_id')
		->group_by('school_data.school_id')
		->where('school_data.school_id', $school_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelP1District($district_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(p1_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('district_id')
		->where('district_id', $district_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}


function getLevelP1Amphur($amphur_id, $type, $type_school = '') {
	$ci = get_instance();
	if ($type_school != '') {
		$ci->db->where('type_school', $type_school);
	}
	
	$rs = $ci->db->select('(SUM(p1_'.$type.')) as count')
		->join('school', 'school_data.school_id = school.school_id')
		->group_by('amphur_id')
		->where('amphur_id', $amphur_id)
		->get('school_data');
	if ($rs->num_rows() == 0 ) {
		return '0';
	} else {
		return $rs->row()->count;	
	}
}

function gcd($a, $b) {
    $_a = abs($a);
    $_b = abs($b);

    while ($_b != 0) {

        $remainder = $_a % $_b;
        $_a = $_b;
        $_b = $remainder;   
    }
    return $a;
}


function getRatio()
{
    $inputs = func_get_args();
    $c = func_num_args();
    if($c < 1)
        return ''; //empty input
    if($c == 1)
        return $inputs[0]; //only 1 input
    if ($inputs[0] == '0' && $inputs[1] == '0') 
    	return '0:0';
    if ($inputs[0] == '0')
    	return '0:1';

    $gcd = gcd($inputs[0], $inputs[1]); //find gcd of inputss
    for($i = 2; $i < $c; $i++) 
        $gcd = gcd($gcd, $inputs[$i]);
    $var = $inputs[0] / $gcd; //init output
    for($i = 1; $i < $c; $i++)
    	$num = ($inputs[$i] / $gcd);
    	if ($num > 0) {
    		$num = number_format($num, 2);
    	}
        $var .= ':' . $num; //calc ratio
    return $var; 
}

function getTeacherTotalDistrict($district_id, $type) {
	$ci =& get_instance();
	$rs = $ci->db->select('SUM(teacher_'.$type.') as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('district_id')
			->where('district_id', $district_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}


function getTeacherTotalAmphur($amphur_id, $type) {
	$ci =& get_instance();
	$rs = $ci->db->select('SUM(teacher_'.$type.') as count')
			->join('school', 'school_data.school_id = school.school_id')
			->group_by('amphur_id')
			->where('amphur_id', $amphur_id)
			->get('school_data');

	if ($rs->num_rows() == 0) {
		return 0;
	} else {
		return $rs->row()->count;
	}
}

function getLink() {
	$ci =& get_instance();
	$config_id = getProvinceWebsite()->id;


	return $ci->db->where('config_id', $config_id)->get('config_link')->result();

}