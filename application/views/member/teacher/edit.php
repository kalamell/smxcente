<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class="active">ข้อมูลครู</li>
			</ol>

			
			<div class="col-md-3">
				<div class="panel panel-default">
				  <div class="panel-heading">เมนู</div>
				  <div class="panel-body">
				  	<?php $this->load->view('member/menu');?>
				  </div>
				</div>
			</div>
			<div class='col-md-6'>

				<?php echo form_open_multipart('member/teacher_update', array('class' => ''));?>
				<input type="hidden" name="id" value="<?php echo $r->id;?>">
				
				 <div class="form-group col-md-6">
				    <label for="idcard">เลขบัตรประชาชน</label>
				    <input type="text" class="form-control" maxlength="25" name="idcard" value="<?php echo $r->idcard;?>">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="teacher_id">รหัสประจำตัว</label>
				    <input type="text" class="form-control" name="teacher_id" value="<?php echo $r->teacher_id;?>">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="area_type_id">สังกัด</label>
				    <select class="form-control" id="area_type_id" name="area_type_id">
				    	<option value="">สังกัด</option>
				    	<?php foreach($area as $a):?>
				    		<option value="<?php echo $a->area_type_id;?>" <?php echo $r->area_type_id == $a->area_type_id ? 'selected' : '';?>><?php echo $a->area_type_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="school_id">สถานศึกษา</label>
				    <select class="form-control" name="school_id" id="school_id">
				    	<option value="<?php echo $r->school_id;?>" selected ><?php echo $r->school_name;?></option>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="prefix">คำนำหน้า</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="prefix" value="นาย" <?php echo $r->prefix == 'นาย' ? 'checked' :'';?>> นาย
				    	</label>

				    	<label>
				    		<input type="radio" name="prefix" value="นางสาว" <?php echo $r->prefix == 'นางสาว' ? 'checked' :'';?>> นางสาว
				    	</label>

				    	<label>
				    		<input type="radio" name="prefix" value="นาง" <?php echo $r->prefix == 'นาง' ? 'checked' :'';?>> นาง
				    	</label>
				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="gender">เพศ</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="gender" value="ช" <?php echo $r->gender == 'ช' ? 'checked' :'';?>> ชาย
				    	</label>

				    	<label>
				    		<input type="radio" name="gender" value="ญ" <?php echo $r->gender == 'ญ' ? 'checked' :'';?>> หญิง
				    	</label>


				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="name">ชื่อ</label>
				    <input type="text" class="form-control" name="name" value="<?php echo $r->name;?>">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="name">นามสกุล</label>
				    <input type="text" class="form-control" name="surname" value="<?php echo $r->surname;?>">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="age">อายุ</label>
				    <input type="number" class="form-control" name="age" value="<?php echo $r->age;?>">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="start_work">วันรับราชการ</label>
				    <input type="text" class="form-control" name="start_work" value="<?php echo $r->start_work;?>">
				  </div>

				   <div class="form-group col-md-6">
				    <label for="age_work">อายุราชการ</label>
				    <input type="text" class="form-control" name="age_work" value="<?php echo $r->age_work;?>">
				  </div>

				   <div class="form-group col-md-6">
				    <label for="study">คณะที่จบ</label>
				    <input type="text" class="form-control" name="study" value="<?php echo $r->study;?>">
				  </div>

				   <div class="form-group col-md-6">
				    <label for="study_eg">ย่อ</label>
				    <input type="text" class="form-control" name="study_eg" value="<?php echo $r->study_eg;?>">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="studey_level">วุฒิการศึกษา</label>
				    <select class="form-control" id="studey_level" name="studey_level">
				    	<?php foreach($edu as $eu):?>
				    		<option value="<?php echo $eu->edu_name;?>" <?php echo $eu->edu_name == $r->studey_level ? 'selected' : '';?>><?php echo $eu->edu_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="prefix">ตำแหน่งครู</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="teacher_co" value="ไม่ใช่" <?php echo $r->teacher_co == 'ไม่ใช่' ? 'checked' : '';?>> ครู
				    	</label>

				    	<label>
				    		<input type="radio" name="teacher_co" value="ใช่" <?php echo $r->teacher_co == 'ใช่' ? 'checked' : '';?>> ครูพี่เลี้ยง
				    	</label>

				    	
				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="prefix">จบตรงสาย</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="teach_target" value="ใช่" <?php echo $r->teach_target == 'ใช่' ? 'checked' : '';?>> ตรง
				    	</label>

				    	<label>
				    		<input type="radio" name="teach_target" value="ไม่ใช่" <?php echo $r->teach_target == 'ไม่ใช่ใช่' ? 'checked' : '';?>> ไม่ตรง
				    	</label>

				    	
				    </div>
				    
				  </div>

				  <div class="form-group col-md-6">
				    <label for="level">ชั้นที่สอน</label>
				    <select class="form-control" id="level" name="level">
				    	<?php foreach($level as $l):?>
				    		<option value="<?php echo $l['level_name'];?>" <?php echo $r->level == $l['level_name'] ? 'selected' : '';?>><?php echo $l['level_name'];?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>


				  <div class="form-group col-md-6">
				    <label for="academic">วิทยฐานะ</label>
				    <select class="form-control" id="academic" name="academic">
				    	<?php foreach($academic as $ac):?>
				    		<option value="<?php echo $ac->as_name;?>"  <?php echo $r->academic == $ac->as_name ? 'selected' : '';?>><?php echo $ac->as_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="position">ตำแหน่ง</label>
				    <input type="text" class="form-control" name="position" value="<?php echo $r->position;?>">
				  </div>




				  <button type="submit" class="btn btn-sm btn-info">บันทึก</button> 

				

			</div>

			<div class='col-md-3'>
				<div class="panel panel-default">
				  <div class="panel-heading">ภาพครู</div>
				  <div class="panel-body">
					<div class="form-group col-md-6">
						<label for="thumbnail">ภาพครู</label>
						<?php if ($r->thumbnail != NULL):?>
							<img src="<?php echo base_url();?>upload/<?php echo $r->thumbnail;?>" class='img-responsive' style='width: 200px;'>
						<?php endif;?>

					    <input type="file" class="" name="thumbnail" value=""  placeholder="">
					</div>
					
				  </div>
				</div>
			</div>




			<?php echo form_close();?>
			

			  
		</div>
	</div>
	
</div>