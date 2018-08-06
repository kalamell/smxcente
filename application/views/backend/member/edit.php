<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/member');?>">ข้อมูลผู้ใช้งาน</a></li>
			  <li class="active">แก้ไขข้อมูล</li>
			</ol>
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">เมนู</div>
			  <div class="panel-body">
			  	<?php $this->load->view('backend/menu');?>
			  </div>
			</div>
		</div>

		<div class='col-md-9'>
			<div class="panel panel-default">
			  <div class="panel-heading">ข้อมูลผู้ใช้งาน</div>
			  <?php echo form_open_multipart('backend/member/update');?>
			  <input type="hidden" name="id" value="<?php echo $r->id;?>">
			  <div class="panel-body">
			  
				  <div class="form-group">
				  	<label>ชื่อ</label>
				  	<input type="text" name="name" class="form-control" value="<?php echo $r->name;?>">
				  </div>

				  <div class="form-group">
				  	<label>นามสกุล</label>
				  	<input type="text" name="surname" class="form-control" value="<?php echo $r->surname;?>">
				  </div>

				  <div class="form-group">
				  	<label>Username</label>
				  	<input type="text" name="username" class="form-control" value="<?php echo $r->username;?>">
				  </div>

				  <div class="form-group">
				  	<label>Password</label>
				  	<input type="text" name="password" class="form-control" value="">
				  </div>


				  <div class="form-group">
				  	<label>สถานะ</label>
				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="active" <?php echo $r->active == 'Y'? 'checked' : '';?> value="Y"> ใช้งาน
					  	</label>
				  	</div>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="active" <?php echo $r->active == 'N'? 'checked' : '';?> value="N"> ไม่ใช้งาน
				  		</label>
				  	</div>
				  </div>


				 <div class="form-group">
				  	<label>การใช้งาน</label>

				  	<?php if (isSuperAdmin()):?>
				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="status" <?php echo $r->status == 'superadmin' ? 'checked' : '';?> value="superadmin"> ผู้ดูแลระบบสูงสุด
					  	</label>
				  	</div>

				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="status" <?php echo $r->status == 'admin' ? 'checked' : '';?> value="admin"> ผู้ดูแลระบบระดับภาค
					  	</label>
				  	</div>

				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="status" <?php echo $r->status == 'admin_province' ? 'checked' : '';?> value="admin_province"> ผู้ดูแลระบบระดับจังหวัด
					  	</label>
				  	</div>
				  <?php endif;?>

				  <?php if (isAdminProvince() || isSuperAdmin() || isAdminArea()):?>

				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="status" <?php echo $r->status == 'admin_area' ? 'checked' : '';?>  value="admin_area"> ผู้ดูแลระบบระดับหน่วยงาน
					  	</label>
				  	</div>

				  <?php endif;?>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="status" <?php echo $r->status == 'staff' ? 'checked' : '';?> value="staff"> ผู้ใช้งานทั่วไป
				  		</label>
				  	</div>
				  </div>

				  <div class="form-group col-md-12">
				    <label class="" for="province_id">สังกัด</label>
				    <select class="form-control required" name="area_type_id" id="a">
				    	<?php foreach($area as $a):?>
				    		<option value="<?php echo $a->area_type_id;?>" <?php echo $a->area_type_id == $r->area_type_id ? 'selected' : '';?>><?php echo $a->area_type_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>


				  <div class="form-group col-md-12">
				    <label class="" for="province_id">จังหวัด</label>
				    <select class="form-control required" name="province_id2" id="province_id">
				    	<?php foreach($province as $p):?>
				    		<option value="<?php echo $p->PROVINCE_ID;?>" <?php echo $p->PROVINCE_ID == $r->province_id ? 'selected' : '';?>><?php echo $p->PROVINCE_NAME;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-12">
				    <label class="" for="school">สถานศึกษา</label>
				    <select name="school_id" id="school" class="form-control">
				    	<option value="">สถานศึกษา</option>
				    	<?php foreach($school as $s):?>
				    		<option value="<?php echo $s->school_id;?>" <?php echo $s->school_id == $r->school ? 'selected' : '';?>><?php echo $s->school_name;?></option>
				    	<?php endforeach;?>
				    	
				    </select>
				  </div>


				  <?php if (isSuperAdmin()):?>

				  	<div class="form-group col-md-12">
				    <label class="" for="school">สังกัดเว็บไซต์</label>
				    <select name="config_id" id="school" class="form-control">
				    	<?php foreach($config_data as $c):?>
				    		<option value="<?php echo $c->id;?>" <?php echo $c->id == $r->config_id ? 'selected' : '';?>><?php echo $c->title;?></option>
				    	<?php endforeach;?>
				    	
				    </select>
				  </div>

				  <?php else:?>
				  	<input type="hidden" name="config_id" value="<?php echo $r->config_id;?>">
				  <?php endif;?>




				
			  </div>

			  <div class="panel-footer">
			  	<button type="submit" name='save' class="btn btn-info">บันทึก</button>
			  </div>

			  <?php form_close();?>
			</div>
		</div>


		

	</div>
</div>

	
