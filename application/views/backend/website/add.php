<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/website');?>">ลงทะเบียนเว็บไซต์</a></li>
			  <li class="active">เพิ่มข้อมูล</li>
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
			  <div class="panel-heading">จัดการเว็บไซต์</div>
			  <?php echo form_open_multipart('backend/website/dosave');?>
			  <div class="panel-body">
			  
				  <div class="form-group">
				  	<label>ชื่อเว็บไซต์</label>
				  	<input type="text" name="name" class="form-control" value="">
				  </div>

				  

				  <div class="form-group">
				  	<label>ประเภทเว็บไซต์</label>
				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="type_website" value="province"> เว็บไซต์จังหวัด
					  	</label>
				  	</div>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="type_website" value="area"> เว็บไซต์ภูมิภาค
				  		</label>
				  	</div>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="type_website" value="nation"> เว็บไซต์ประเทศ
				  		</label>
				  	</div>
				  </div>


				  

				  <div class="form-group col-md-12">
				    <label class="" for="province_id">จังหวัด / อื่นๆ</label>
				    <select class="form-control required" name="province_id2" id="province_id">
				    	<option value="">- - - จังหวัด / อื่นๆ - - -</option>
				    	<?php foreach($province as $p):?>
				    		<option value="<?php echo $p->PROVINCE_ID;?>"><?php echo $p->PROVINCE_NAME;?></option>
				    	<?php endforeach;?>
				    </select>
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

	
