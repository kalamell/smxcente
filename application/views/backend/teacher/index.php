<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ข้อมูลครู</li>
			</ol>

			<?php echo form_open('', array('id' => 'memberupdate', 'class' => 'form-inline'));?>		  

			 
			  <a style="text-shadow: 0px 0px 0px" class='btn btn-default btn-info' href="<?php echo site_url('backend/teacher/teacher_add');?>">เพิ่มข้อมูลครู</a>

			  <a href="<?php echo site_url('backend/teacher/reset_teacher');?>" class="btn btn-sm btn-default" onclick="javascript:return confirm('ต้องการล้างข้อมูลทั้งหมดหรือไม่');">ล้างข้อมูลครู</a>

			<?php echo form_close();?>
			<br><br>

			<a href="<?php echo base_url();?>assets/data-teacher.csv" class='btn btn-default btn-sm'><i class="fa fa-cloud"></i> Download ไฟล์ตัวอย่างข้อมูลครู</a>


			<br><br>

			<?php echo form_open_multipart('backend/teacher//upload_teacher', array('class' => 'form-inline'));?>
			<p>Upload</p>
			 
			 <div class="form-group">
			    <label for="password">Upload รายชื่อครู (*.csv)</label>
			    <input type="file" class="form-control" name="file" value="">
			  </div>

			  <button type="submit" class="btn btn-sm btn-info">Upload</button> 

			<?php echo form_close();?>


			<h2 class="page-header">ข้อมูลครู</h2>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>รหัสประจำตัว</th>
						<th>ชื่อ - นามสกุล</th>
						<th>ระดับชั้น</th>
						<th>ครูพี่เลี้ยง</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($rs) == 0):?>
						<tr><td colspan="4"> - - ไม่มีข้อมูล - -</td></tr>
					<?php else:?>
						<?php foreach($rs as $r):?>
							<tr>
								<td><?php echo $r->teacher_id;?></td>
								<td><?php echo $r->prefix.' '.$r->name.' '.$r->surname;?></td>
								<td><?php echo $r->level;?></td>
								<td><?php echo $r->teacher_co == 'ใช่' ? 'ใช่' : 'ไม่ใช่';?></td>
								<td style="text-align: center;">
									<div class="btn-groups">
										<a href="<?php echo site_url('backend/teacher/teacher_edit/'.$r->id);?>" class="btn btn-sm btn-default">แก้ไข</a>
										<a href="<?php echo site_url('backend/teacher/teacher_delete/'.$r->id);?>" onclick="javascript: return confirm('ต้องการลบหรือไม่');" class="btn btn-sm btn-default">ลบ</a>
										
									</div>
								</td>
							</tr>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
				
			</table>

			  
		</div>
	</div>
	
</div>