<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ข้อมูลครู</li>
			</ol>

			
			<div class="col-md-3">
				<div class="panel panel-default">
				  <div class="panel-heading">เมนู</div>
				  <div class="panel-body">
				  	<?php $this->load->view('backend/menu');?>
				  </div>
				</div>
			</div>
			<div class='col-md-9'>

				<?php echo form_open_multipart('backend/teacher/teacher_save', array('class' => ''));?>
				
				 <div class="form-group col-md-6">
				    <label for="idcard">เลขบัตรประชาชน</label>
				    <input type="text" class="form-control" name="idcard" value="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="teacher_id">รหัสประจำตัว</label>
				    <input type="text" class="form-control" name="teacher_id" value="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="area_type_id">สังกัด</label>
				    <select class="form-control" id="area_type_id" name="area_type_id">
				    	<option value="">สังกัด</option>
				    	<?php foreach($area as $a):?>
				    		<option value="<?php echo $a->area_type_id;?>"><?php echo $a->area_type_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="school_id">สถานศึกษา</label>
				    <select class="form-control" name="school_id" id="school_id">
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="prefix">คำนำหน้า</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="prefix" value="นาย"> นาย
				    	</label>

				    	<label>
				    		<input type="radio" name="prefix" value="นางสาว"> นางสาว
				    	</label>

				    	<label>
				    		<input type="radio" name="prefix" value="นาง"> นาง
				    	</label>
				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="gender">เพศ</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="gender" value="ช"> ชาย
				    	</label>

				    	<label>
				    		<input type="radio" name="gender" value="ญ"> หญิง
				    	</label>


				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="name">ชื่อ</label>
				    <input type="text" class="form-control" name="name" value="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="name">นามสกุล</label>
				    <input type="text" class="form-control" name="surname" value="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="age">อายุ</label>
				    <input type="number" class="form-control" name="age" value="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="start_work">วันรับราชการ</label>
				    <input type="text" class="form-control" name="start_work" value="">
				  </div>

				   <div class="form-group col-md-6">
				    <label for="age_work">อายุราชการ</label>
				    <input type="text" class="form-control" name="age_work" value="">
				  </div>

				   <div class="form-group col-md-6">
				    <label for="study">คณะที่จบ</label>
				    <input type="text" class="form-control" name="study" value="">
				  </div>

				   <div class="form-group col-md-6">
				    <label for="study_eg">ย่อ</label>
				    <input type="text" class="form-control" name="study_eg" value="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="studey_level">วุฒิการศึกษา</label>
				    <select class="form-control" id="studey_level" name="studey_level">
				    	<?php foreach($edu as $eu):?>
				    		<option value="<?php echo $eu->edu_name;?>"><?php echo $eu->edu_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="prefix">ตำแหน่งครู</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="teacher_co" value="ไม่ใช่"> ครู
				    	</label>

				    	<label>
				    		<input type="radio" name="teacher_co" value="ใช่"> ครูผู้ช่วย
				    	</label>

				    	
				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="prefix">จบตรงสาย</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="teach_target" value="ใช่"> ตรง
				    	</label>

				    	<label>
				    		<input type="radio" name="teach_target" value="ไม่ใช่"> ไม่ตรง
				    	</label>

				    	
				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="level">ชั้นที่สอน</label>
				    <select class="form-control" id="level" name="level">
				    	<?php foreach($level as $l):?>
				    		<option value="<?php echo $l['level_name'];?>"><?php echo $l['level_name'];?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>


				  <div class="form-group col-md-6">
				    <label for="academic">วิทยฐานะ</label>
				    <select class="form-control" id="academic" name="academic">
				    	<?php foreach($academic as $ac):?>
				    		<option value="<?php echo $ac->as_name;?>"><?php echo $ac->as_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="position">ตำแหน่ง</label>
				    <input type="text" class="form-control" name="position" value="">
				  </div>




				  <button type="submit" class="btn btn-sm btn-info">บันทึก</button> 

				<?php echo form_close();?>

			</div>
			

			  
		</div>
	</div>
	
</div>