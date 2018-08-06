<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ตั้งค่าข้อมูลเว็บไซต์</li>
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
			  <div class="panel-heading">ตั้งค่าข้อมูลเว็บไซต์</div>
			  <?php echo form_open_multipart('backend/config/update');?>
			  <input type="hidden" name="id" value="<?php echo $r->id;?>"/>
			  <div class="panel-body">

			  	<?php echo save();?>

			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">ตั้งค่าเว็บไซต์</a></li>
			    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">ตั้งค่าเมนู</a></li>

			     <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">ตั้งลิ้งค์</a></li>
			    
			  </ul>

			  <div class="tab-content">
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane active" id="tab1">
			    	<?php $this->load->view('backend/config/config', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab2">
			    	<?php $this->load->view('backend/config/menu', $this);?>
			    </div>

			     <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab3">
			    	<?php $this->load->view('backend/config/link', $this);?>
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

	
