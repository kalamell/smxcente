
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?php echo getTitle();?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datetimepicker/bootstrap-datetimepicker.min.css">

	<style type="text/css">
		@media (max-width: 768px) { 
			.navbar-brand { width: 50%; }
		}


		@media (min-width: 768px) {
			.modal-dialog {
				width: 900px;
			}
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="<?php echo site_url();?>" style="">
	      	<?php echo getLogo();?> <?php echo getTitle();?></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="<?php echo $this->uri->segment(1)==''?'active':'';?>"><a href="<?php echo site_url();?>"><i class="glyphicon glyphicon-home"></i> หน้าหลัก</a></li>

	        <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงานข้อมูลสารสนเทศ<span class="caret"></span></a>
		        <ul class="dropdown-menu">
							<li><a href="<?php echo site_url('data');?>">รายงานข้อมูลสารสนเทศ</a></li>
							<li><a href="<?php echo site_url('state');?>">สถิติทางการศึกษา</a></li>
							</ul>
					</li>



	        
	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right">
	      	<?php if (isWebsiteNation()):?>
	      	<li>
	      		<a href="http://2.smxcenter.com">ภาคกลาง</a>
	      	</li>
	      	<li>
	      		<a href="http://3.smxcenter.com">ภาคเหนือ</a>
	      	</li>
	      	<li>
	      		<a href="http://4.smxcenter.com">ภาคตะวันออกเฉียงเหนือ</a>
	      	</li>
	      	<li>
	      		<a href="http://5.smxcenter.com">ภาคใต้</a>
	      	</li>
	      <?php endif;?>
	      	<?php if (isMember()):?>
	      		<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> สวัสดี <?php echo isMember()->name.' '.isMember()->surname;?> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo site_url('member');?>">ข้อมูลผู้ใช้งาน</a></li>
		            <li><a href="<?php echo site_url('member/school');?>">ข้อมูลพื้นฐานสถานศึกษา</a></li>

		            <?php if (isBackend()):?>
		            	<li role="separator" class="divider"></li>
		            	<li>
		            		<a href="<?php echo site_url('backend');?>">เข้าจัดการ Backend</a>
		            	</li>
		            <?php endif;?>
		            <li role="separator" class="divider"></li>
		            <li><a href="<?php echo site_url('logout');?>" onclick="javascript: return confirm('ต้องการออกจากระบบหรือไม่ ?');">ออกจากระบบ</a></li>

		          </ul>
		        </li>
		    <?php else:?>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> สำหรับสมาชิก <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo site_url('login');?>">เข้าสู่ระบบ</a></li>
		            <li><a href="<?php echo site_url('register');?>">สมัครสมาชิก</a></li>
		          </ul>
		        </li>
		    <?php endif;?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
