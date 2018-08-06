<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">สถานศึกษา</li>
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
			  <div class="panel-heading">สถานศึกษา</div>
			  <div class="panel-body">

			  	<ul class="nav nav-tabs">
				 
				  <li class="active"><a data-toggle="tab" href="#menu1">อัพโหลดรายชื่อสถานศึกษาในสังกัด</a></li>
				   <li class=""><a data-toggle="tab" href="#menu2">อัพโหลดข้อมูลพื้นที่</a></li>
				    <li class=""><a data-toggle="tab" href="#menu3">อัพโหลดแผนที่ตั้ง</a></li>

				    <li class=""><a data-toggle="tab" href="#menu4">อัพโหลดสถานศึกษา</a></li>
				</ul>

				<div class="tab-content" style="padding: 20px;">
					<div id="menu3" class="tab-pane">

				    <?php echo form_open_multipart('backend/school/import_map_school', array('class' => 'form-inline'));?>
				    	
				    	<a href="http://www.smxcenter.com/assets/school-latlng.csv"  class='btn btn-default btn-sm'><i class="fa fa-cloud"></i> Download ตัวอย่าง</a>


				  		<div class="form-group col-md-6">
				  			<label>อัพโหลดแผนที่ตั้งสถานศึกษา .csv</label>
				  			<input type="file" name="file" cl>
				  			<button type="submit" class="btn btn-info btn-sm">อัพโหลด</button>
				  		</div>
				  		
				  	<?php echo form_close();?> <br><br>
				  </div>
				  <div id="menu2" class="tab-pane">

				    <?php echo form_open_multipart('backend/school/import_data_school', array('class' => 'form-inline'));?>
				    	
				    	<a href="http://www.smxcenter.com/assets/area-land.csv" class='btn btn-default btn-sm'><i class="fa fa-cloud"></i> DOwnload ตัวอย่าง</a>


				  		<div class="form-group col-md-6">
				  			<label>อัพโหลดข้อมูลพื้นที่สถานศึกษา .csv</label>
				  			<input type="file" name="file" cl>
				  			<button type="submit" class="btn btn-info btn-sm">อัพโหลด</button>
				  		</div>
				  		
				  	<?php echo form_close();?> <br><br>
				  </div>
				  <div id="menu1" class="tab-pane fade  fade in active">

				  	<p><a class='btn btn-sm btn-success' href="http://www.smxcenter.com/assets/school-data-student.csv">ดาวน์โหลดไฟล์ตัวอย่าง</a></p>

				  	
				    <?php echo form_open_multipart('backend/school/import_student_data', array('class' => 'form-inline'));?>

				  		 <div class="form-group  col-md-6">
						    <label for="password">ภาคเรียน</label>
						    <select name="term" class="form-control">
						    	<option value=""> ภาคเรียน </option>
						    	<?php foreach($term as $t):?>
						    		<option value="<?php echo $t->term_id;?>"><?php echo $t->term_name;?></option>
						    	<?php endforeach;?>
						    </select>
						  </div>

						  <div class="form-group col-md-6">
						    <label for="confirm_password">ปีการศึกษา</label>
						    <select name="years" class="form-control">
						    	<option value=""> ปีการศึกษา </option>
						    	<?php foreach($years as $y):?>
						    		<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
						    	<?php endforeach;?>
						    </select>
						  </div>


						  <div class="form-group col-md-6">
							<label for="district_id">สพฐ / หน่วยงานอื่นๆ</label>
					    	<div class="radio">
					    		<label>
					    			<input type="radio" name="type_school" value="spt"> สพฐ
					    		</label>				    		
					    	</div>

					    	<div class="radio">
					    		<label>
					    			<input type="radio" name="type_school" value="oth"> อื่นๆ
					    		</label>				    		
					    	</div>
						</div>

						<div class="form-group col-md-6">
							<label for="username">หน่วยงาน</label>
						    <select name="area_type_id2" class="form-control">
						    	<?php foreach($area as $a):?>
						    		<option value="<?php echo $a->area_type_id;?>"><?php echo $a->area_type_name;?></option>
						    	<?php endforeach;?>
						    </select>
						</div>

						<div class="form-group col-md-6">
							<label for="">กระทรวง</label>
						    <select class="form-control" name="m_id">
						    	<option value=""> - - - เลือกข้อมูล - - -</option>
						    	<?php foreach($ministry as $m):?>
						    		<option value="<?php echo $m->m_id;?>" <?php echo $m->m_id == '12' ? 'selected' : '';?>><?php echo $m->m_name;?></option>
						    	<?php endforeach;?>
							</select> 
						</div>


						<div class="form-group col-md-6">
							<label for="username">เขตตรวจราชการ</label>
						    <select class="form-control" name="ins_id">
						    	<option value=""> - - - เลือกข้อมูล - - -</option>
						    	<?php foreach($inspect as $m):?>
						    		<option value="<?php echo $m->ins_id;?>" <?php echo $m->ins_id == '18' ? 'selected' : '';?>><?php echo $m->ins_name;?></option>
						    	<?php endforeach;?>
							</select>  
						</div>


						  
				  		<div class="form-group col-md-6">
				  			<label>อัพโหลดไฟล์รายชื่อสถานศึกษา (*.csv)</label>
				  			<input type="file" name="file" cl>
				  		</div>
				  		<button type="submit" class="btn btn-info btn-sm">อัพโหลด</button>
				  	<?php echo form_close();?> <br><br>

				  </div>


				  <div id="menu4" class="tab-pane fade  fade in">

				  	<p><a class='btn btn-sm btn-success' href="http://www.smxcenter.com/assets/school-data-private.csv">ดาวน์โหลดไฟล์ตัวอย่าง</a></p>

				  	
				    <?php echo form_open_multipart('backend/school/import_private', array('class' => 'form-inline'));?>

				  		 
						  <div class="form-group col-md-6">
							<label for="district_id">สพฐ / หน่วยงานอื่นๆ</label>
					    	<div class="radio">
					    		<label>
					    			<input type="radio" name="type_school" value="spt"> สพฐ
					    		</label>				    		
					    	</div>

					    	<div class="radio">
					    		<label>
					    			<input type="radio" name="type_school" value="oth"> อื่นๆ
					    		</label>				    		
					    	</div>
						</div>

						<div class="form-group col-md-6">
							<label for="username">หน่วยงาน</label>
						    <select name="area_type_id2" class="form-control">
						    	<?php foreach($area as $a):?>
						    		<option value="<?php echo $a->area_type_id;?>"><?php echo $a->area_type_name;?></option>
						    	<?php endforeach;?>
						    </select>
						</div>

						<div class="form-group col-md-6">
							<label for="">กระทรวง</label>
						    <select class="form-control" name="m_id">
						    	<option value=""> - - - เลือกข้อมูล - - -</option>
						    	<?php foreach($ministry as $m):?>
						    		<option value="<?php echo $m->m_id;?>" <?php echo $m->m_id == '12' ? 'selected' : '';?>><?php echo $m->m_name;?></option>
						    	<?php endforeach;?>
							</select> 
						</div>


						<div class="form-group col-md-6">
							<label for="username">เขตตรวจราชการ</label>
						    <select class="form-control" name="ins_id">
						    	<option value=""> - - - เลือกข้อมูล - - -</option>
						    	<?php foreach($inspect as $m):?>
						    		<option value="<?php echo $m->ins_id;?>" <?php echo $m->ins_id == '18' ? 'selected' : '';?>><?php echo $m->ins_name;?></option>
						    	<?php endforeach;?>
							</select>  
						</div>


						  
				  		<div class="form-group col-md-6">
				  			<label>อัพโหลดไฟล์รายชื่อสถานศึกษา (*.csv)</label>
				  			<input type="file" name="file" cl>
				  		</div>
				  		<button type="submit" class="btn btn-info btn-sm">อัพโหลด</button>
				  	<?php echo form_close();?> <br><br>

				  </div>
				  
				</div>


			  	


			  	

			  	<p><a href="<?php echo site_url('backend/school/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>

			  	<p><a href="<?php echo site_url('backend/school/data');?>" class="btn btn-info btn-sm">ปรับปรุงข้อมูลสถานศึกษา</a></p>

			  	<?php echo save();?>

			  	<?php echo form_open('backend/school/do_search', array('class' => 'form-inline'));?>
			  		<div class="form-group">
			  			<label>ค้นหา</label>
			  			<input type="text" name="txt" class="form-control" value="<?php echo $this->session->userdata('txt');?>">
			  		</div>
			  		<button name="search" class="btn btn-sm btn-default">ค้นหา</button>

			  	<?php echo form_close();?>

			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>รหัสสถานศึกษา</th>
			  				<th>สถานศึกษา</th>
			  				<!--<th>สพฐ/อื่นๆ</th>-->
			  				<th>หน่วยงาน</th>
			  				<th>สังกัด</th>			  				
			  				<th>&nbsp;</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>

			  				
			  				<tr>
			  					<td><?php echo $r->school_id;?></td>
			  					<td><?php echo $r->school_name;?></td>
			  					<!--<td><?php echo $r->type_school;?></td>-->
			  					<td><?php echo $r->area_type_name;?></td>
			  					<td><?php echo $r->type_school == 'spt' ? 'สพฐ' : 'อื่นๆ';?></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							<a href="<?php echo site_url('backend/school/edit/'.$r->id);?>" class="btn btn-default btn-sm">แก้ไข</a>
			  							<a href="<?php echo site_url('backend/school/delete/'.$r->id);?>" class="btn btn-default btn-sm" onclick="javascript:return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><i class="fa fa-trash"></i></a>
			  						</div>
			  					</td>
			  				</tr>
			  			<?php endforeach;?>
			  		</tbody>
			  	</table>

			  	<?php echo $this->pagination->create_links();?>
			  </div>
			</div>
		</div>
	</div>
</div>

