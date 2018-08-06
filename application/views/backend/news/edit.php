<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/news');?>">ข่าว</a></li>
			  <li class="active">แก้ไข</li>
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
			  <div class="panel-heading">ข่าวประชาสัมพันธ์</div>
			  <?php echo form_open('backend/news/update');?>
			  <input type="hidden" name="id" value="<?php echo $r->id;?>"/>
			  <div class="panel-body">
			  
				  <div class="form-group">
				  	<label>ชื่อข่าว</label>
				  	<input type="text" name="title" class="form-control" value="<?php echo $r->title;?>">
				  </div>

				  <div class="form-group">
				  	<label>ข้อมูล</label>
				  	<textarea name="description" id="editor1" class="form-control" rows="5"><?php echo $r->description;?></textarea>
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

	
