<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/area_type');?>">หน่วยงาน</a></li>
			  <li class="active">เพิ่มหน่วยงาน</li>
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
			  <div class="panel-heading">หน่วยงาน</div>
			  <?php echo form_open('backend/area_type/dosave');?>
			  <div class="panel-body">
			  
				  <div class="form-group">
				  	<label>ชื่อหน่วยงาน</label>
				  	<input type="text" name="area_type_name" class="form-control" value="">
				  </div>

				  <div class="form-group">
				  	<label>สังกัด</label>
				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="type" value="spt"> สพฐ
				  		</label>
				  	</div>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="type" value="oth"> อื่นๆ
				  		</label>
				  	</div>


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

	
