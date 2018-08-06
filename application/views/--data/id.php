<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('data');?>">ข้อมูลสารสนเทศ</a></li>
			  <li class="active">ข้อมูลสถานศึกษา</li>
			</ol>

			<h2 class="page-header">ข้อมูลพื้นฐานสถานศึกษา</h2>

			<div class="panel panel-default">
	  			<div class="panel-heading">ช่วงปีการศึกษา</div>
				  <div class="panel-body">
				  	<div class="form-group col-md-6">
						<label for="username">ปีการศึกษา</label>
					    <select class="form-control">
					    	<option value=""> - - - เลือกข้อมูล - - -</option>
					    </select>
					</div>

					<div class="form-group col-md-6">
						<label for="username">เทอม</label>
					    <select class="form-control">
					    	<option value=""> - - - เลือกข้อมูล - - -</option>
						</select> 
					</div>

					 
				   </div>
				</div>

			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">ข้อมูลพื้นฐาน 1</a></li>
			    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">ข้อมูลพื้นฐาน 2</a></li>
			    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">ข้อมูลพื้นฐาน 3</a></li>
			    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">ข้อมูลคอมพิวเตอร์</a></li>
			    <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">ข้อมูลไฟฟ้า</a></li>
			    <li role="presentation"><a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab">ข้อมูลแหล่งน้ำ</a></li>

			    <li role="presentation"><a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab">ชั้นเรียนที่เปิดสอน</a></li>
			    <li role="presentation"><a href="#tab8" aria-controls="tab8" role="tab" data-toggle="tab">จำนวนห้องในแต่ละชั้น</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane active" id="tab1">
			    	<?php $this->load->view('data/school/data1', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab2">
			    	<?php $this->load->view('data/school/data2', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab3">
			    	<?php $this->load->view('data/school/data3', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab4">
			    	<?php $this->load->view('data/school/computer', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab5">
			    	<?php $this->load->view('data/school/elec', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab6">
			    	<?php $this->load->view('data/school/water', $this);?>

			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab7">
			    	<?php $this->load->view('data/school/class', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab8">
			    	<?php $this->load->view('data/school/room', $this);?>
			    </div>
			  </div>



		</div>
	</div>
	
</div>