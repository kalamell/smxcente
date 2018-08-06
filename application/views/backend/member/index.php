<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ข้อมูลผู้ใช้งาน</li>
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
			  <div class="panel-body">

			  	<?php echo form_open('', array('class' => 'form-inline'));?>
			  	<div class="form-group">
			  		<label>ค้นหา</label>
			  		<input type="text" name="txt" class="form-control" value="<?php echo $this->session->userdata('txt');?>">

			  		<label>
			  			<input type="checkbox" name="active" value="N" <?php echo $this->session->userdata('active')== "N" ? "checked" : "";?>> แสดงเฉพาะผู้ยังไ่มได้อนุมัติ
			  		</label>
			  	</div>
			  	<button type="submit" name="search" class="btn btn-sm btn-default">ค้นหา</button>
			  	<?php echo form_close();?>
			  	<p><a href="<?php echo site_url('backend/member/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>




			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>ชื่อ - นามสกุล</th>
			  				<th>Username</th>
			  				<th>ประเภทผู้ใช้งาน</th>
			  				<th>สถานะ</th>
			  				<th>&nbsp;</th>
			  				<th>Login</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>
			  				<tr>
			  					<td><?php if ($r->active != 'Y') echo '<font color="red">';?><?php echo $r->name.' '.$r->surname;?><?php if ($r->active != 'Y') echo '</font>';?></td>
			  					<td><a href="<?php echo base_url();?>assets/<?php echo $r->username;?>.pdf"><?php echo $r->username;?></a></td>
			  					<td>
			  						<?php 
			  						if ($r->status == 'staff' || $r->status == 'member') {
			  							echo 'ผู้ใช้งานทั่วไป';
			  						} elseif ($r->status == 'superadmin') {
			  							echo 'ผู้ดูแลระบบสูงสุด';
			  						} elseif ($r->status == 'admin') {
			  							echo 'ผู้ดูแลระบบระดับภาค';
			  						} elseif ($r->status =='admin_province') {
			  							echo 'ผู้ดูแลระบบระดับจังหวัด';
			  						} elseif ($r->status == 'admin_area') {
			  							echo 'ผู้ดูแลระบบระดับสังกัด';
			  						}
			  						?>
			  						<br>
			  						สังกัด <?php echo $r->area_type_name;?><br>

			  						สถานศึกษา <?php echo $r->school_name;?>

			  						
			  					</td>
			  					<td><label class=""><?php echo $r->active == 'Y' ? 'ใช้งาน' : 'ไม่ใช้งาน';?></label></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							<a href="<?php echo site_url('backend/member/edit/'.$r->member_id);?>" class="btn btn-default btn-sm">แก้ไข</a>
			  							<a href="<?php echo site_url('backend/member/delete/'.$r->member_id);?>" onclick="javascript: return confirm('ต้องการลบข้อมูลหรือไม่ ?');" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
			  						</div>
			  					</td>
			  					<td><a href="<?php echo site_url('backend/member/login/'.$r->member_id);?>" class='btn btn-info btn-sm'>เข้าระบบ</a></td>
			  				</tr>
			  			<?php endforeach;?>
			  		</tbody>
			  	</table>
			  </div>
			</div>
		</div>


		

	</div>
</div>

	
