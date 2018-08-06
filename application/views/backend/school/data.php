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

			  	
			  	<?php echo form_open('');?>
			  	<button type="submit" name="save" class="btn btn-info btn-sm">ปรับปรุงข้อมูล</button><br>
			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>รหัสสถานศึกษา</th>
			  				<th>สถานศึกษา</th>
			  				<th>จำนวนครู</th>
			  				<th>ตามเกณฑ์</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>

			  				
			  				<tr>
			  					<td><?php echo $r->school_id;?></td>
			  					<td><?php echo $r->school_name;?></td>
			  					<td><input type="text" class="form-control" name="teacher_total[<?php echo $r->school_id;?>]" value="<?php echo $r->teacher_total;?>"></td>
			  					<td><input type="text" class="form-control" name="teacher_standard[<?php echo $r->school_id;?>]" value="<?php echo $r->teacher_standard;?>"></td>
			  				</tr>
			  			<?php endforeach;?>
			  		</tbody>
			  	</table>

			  	<button type="submit" name="save" class="btn btn-info btn-sm">ปรับปรุงข้อมูล</button><br>
			  	

			  	<?php echo form_close();?>

			  	<?php echo $this->pagination->create_links();?>
			  </div>
			</div>
		</div>
	</div>
</div>

