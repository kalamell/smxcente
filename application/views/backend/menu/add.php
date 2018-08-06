<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/menu');?>">Menu</a></li>
			  <li class="active">เพิ่มเมนู</li>
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
			  <div class="panel-heading"> Menu</div>
			  <div class="panel-body">
			  	
			  	<?php echo form_open_multipart('backend/menu/dosave');?>
				  <div class="panel-body">
				  
					  <div class="form-group">
					  	<label>ชื่อเมนูหลัก</label>
					  	<input type="text" name="name" class="form-control" value="">
					  </div>


					  <div class="form-group">
					  	<label>ลำดับ</label>
					  	<input type="text" name="sort" class="form-control" value="">
					  </div>

					
				  </div>

				  <div class="panel-footer">
				  	<button type="submit" name='save' class="btn btn-info">บันทึก</button>
				  </div>

				  <?php form_close();?>

			  </div>
			</div>
		</div>


		

	</div>
</div>

	
