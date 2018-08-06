<div class="list-group">	

  
<?php if (isSuperAdmin() || isAdminProvince()):?>					  
  <a href="<?php echo site_url('backend');?>" class="list-group-item <?php echo $this->uri->segment(2)=='' || $this->uri->segment(2) == 'config' ? 'active': '';?>"><i class="fab fa-whmcs"></i> ตั้งค่าเว็บไซต์</a>

  
  
  <a href="<?php echo site_url('backend/banner');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='banner'? 'active': '';?>"><i class="fa fa-image"></i> ตั้งค่า Banner</a>
  


  <a href="<?php echo site_url('backend/news');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='news'? 'active': '';?>"><i class="fa fa-edit"></i> จัดการข่าว</a>

  <a href="<?php echo site_url('backend/area_type');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='area_type'? 'active': '';?>"><i class="fa fa-building"></i> ตั้งค่าหน่วยงาน</a>
<?php endif;?>

  <a href="<?php echo site_url('backend/school');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='school'? 'active': '';?>"><i class="fa fa-home"></i> สถานศึกษา</a>


  <a href="<?php echo site_url('backend/student');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='student'? 'active': '';?>"><i class="fa fa-users"></i> นักเรียน</a>



  <a href="<?php echo site_url('backend/teacher');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='student'? 'active': '';?>"><i class="fa fa-users"></i> ครู</a>

  <a href="<?php echo site_url('backend/member');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='member'? 'active': '';?>"><i class="fa fa-user"></i> จัดการผู้ใช้งาน</a>



</div>


<?php if (isSuperAdmin()):?>
<hr>

<h2 class="page-header">สำหรับผู้ดูแลสูงสุด</h2>

<div class="list-group">					

	<a href="<?php echo site_url('backend/menu');?>" class="list-group-item <?php echo $this->uri->segment(2)=='menu'? 'active': '';?>"><i class="fa fa-list-ul"></i> เมนู</a>
		  
  <a href="<?php echo site_url('backend/website');?>" class="list-group-item <?php echo $this->uri->segment(2) == 'website' ? 'active': '';?>"><i class="fa fa-whmcs"></i> ลงทะเบียนเว็บไซต์</a>


  
  <a href="<?php echo site_url('backend/member');?>" class="list-group-item  <?php echo $this->uri->segment(2)=='member'? 'active': '';?>"><i class="fa fa-user"></i> จัดการผู้ใช้งาน</a>


</div>
<?php endif;?>

