<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class="active">ข้อมูลนักเรียน</li>
			</ol>

			<?php echo form_open('', array('id' => 'memberupdate', 'class' => 'form-inline'));?>		  

			  <div class="form-group">
			    <label for="password">ภาคเรียน</label>
			    <select name="term" class="form-control">
			    	<option value=""> ภาคเรียน </option>
			    	<?php foreach($term as $t):?>
			    		<option value="<?php echo $t->term_id;?>" <?php echo $t->term_id == $_t ? 'selected' : '';?>><?php echo $t->term_name;?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="confirm_password">ปีการศึกษา</label>
			    <select name="years" class="form-control">
			    	<option value=""> ปีการศึกษา </option>
			    	<?php foreach($years as $y):?>
			    		<option value="<?php echo $y->year_id;?>"  <?php echo $y->year_id == $_y ? 'selected' : '';?>><?php echo $y->year_name;?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>
			  <button type="submit" class="btn btn-info">แสดงข้อมูล</button>
			  
			  <a style="text-shadow: 0px 0px 0px" class='btn btn-default btn-info' href="<?php echo site_url('member/student_add');?>">เพิ่มข้อมูลนักเรียน</a>

			  <a href="<?php echo site_url('member/reset_student');?>" class="btn btn-sm btn-default" onclick="javascript:return confirm('ต้องการล้างข้อมูลทั้งหมดหรือไม่');">ล้างข้อมูลนักเรียน</a>

			<?php echo form_close();?>


			<br><br>

			<?php echo form_open_multipart('member/upload_student', array('class' => 'form-inline'));?>
			<p>Upload</p>
			 <div class="form-group">
			    <label for="password">ภาคเรียน</label>
			    <select name="term" class="form-control">
			    	<option value=""> ภาคเรียน </option>
			    	<?php foreach($term as $t):?>
			    		<option value="<?php echo $t->term_id;?>"><?php echo $t->term_name;?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="confirm_password">ปีการศึกษา</label>
			    <select name="years" class="form-control">
			    	<option value=""> ปีการศึกษา </option>
			    	<?php foreach($years as $y):?>
			    		<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>

			 <div class="form-group">
			    <label for="password">Upload รายชื่อนักเรียนจากระบบ DMC (*.csv)</label>
			    <input type="file" class="form-control" name="file" value="">
			  </div>

			  <button type="submi" class="btn btn-sm btn-info">Upload</button> 
			  <br>
			  <br><a href="<?php echo base_url('assets/student-file.csv');?>" class="btn btn-sm btn-success"><i class="fa fa-cloud"></i> Download ไฟล์ ตัวอย่างการนำเข้าข้อมูลนักเรียน</a>

			<?php echo form_close();?>


			<h2 class="page-header">ข้อมูลนักเรียน
				<div class="pull-right">
					<?php echo form_open('member/update_age');?><button type="submit" class="btn btn-sm btn-info"><i class="fa fa-users"></i> ปรับปรุงข้อมูลประชากร</button><?php echo form_close();?></div>
			</h2>

			<?php echo $this->pagination->create_links();?>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ภาพประจำตัว</th>
						<th>ชื่อ - นามสกุล</th>
						<th>ระดับชั้น</th>
						<th>ผู้ปกครอง</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($rs) == 0):?>
						<tr><td colspan="4"> - - ไม่มีข้อมูล - -</td></tr>
					<?php else:?>
						<?php foreach($rs as $r):?>
							<tr>
								<td>
									<?php if ($r->thumbnail != ''):?>
									<img src="<?php echo base_url();?>upload/student/<?php echo $r->thumbnail;?>" class='img-responsive' style='width: 200px;'>
									<?php else:?>
										-
									<?php endif;?>
								</td>
								<td><?php echo $r->prefix.' '.$r->name.' '.$r->surname;?></td>
								<td><?php echo $r->rm_name == null ? $r->room_level : $r->rm_name;?> / <?php echo $r->room_no;?></td>
								<td>
									ชื่อบิดา :<br>
									<?php echo $r->prefix_father.' '.$r->name_father.' '.$r->surname_father;?><br>
									ชื่อมารดา : <br>
									<?php echo $r->prefix_mother.' '.$r->name_mother.' '.$r->surname_mother;?><br>
								</td>
								<td style="text-align: center;">
									<div class="btn-groups">
										<a href="<?php echo site_url('member/student_edit/'.$r->id);?>" class="btn btn-sm btn-default">แก้ไข</a>
										<a href="<?php echo site_url('member/student_delete/'.$r->id);?>" onclick="javascript: return confirm('ต้องการลบหรือไม่');" class="btn btn-sm btn-default">ลบ</a>
										
									</div>
								</td>
							</tr>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
				
			</table>

			<?php echo $this->pagination->create_links();?>

			  
		</div>
	</div>
	
</div>