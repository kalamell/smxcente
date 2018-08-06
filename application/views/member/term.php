<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class="active">ปีการศึกษา</li>
			</ol>
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">เมนู</div>
			  <div class="panel-body">
			  	<?php $this->load->view('member/menu');?>
			  </div>
			</div>
		</div>
		<div class='col-md-9'>
			<div class="panel panel-default">
			  <div class="panel-heading">เลือกปีการศึกษา</div>
			  <div class="panel-body">

			  	
			  	
			  	<?php echo form_open('', array('id' => 'memberupdate'));?>

				  

				  <div class="form-group col-md-6">
				    <label for="password">ภาคเรียน</label>
				    <select name="term" class="form-control">
				    	<option value=""> ภาคเรียน </option>
				    	<?php foreach($term as $t):?>
				    		<option value="<?php echo $t->term_id;?>"><?php echo $t->term_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="confirm_password">ปีการศึกษา</label>
				    <select name="years" class="form-control">
				    	<option value=""> ปีการศึกษา </option>
				    	<?php foreach($years as $y):?>
				    		<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				 

				  
				  
				  <div class='col-md-12'>
					  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> แสดงข้อมูล</button><br><br>
				  </div>

				<?php echo form_close();?>
			  </div>
			</div>
		</div>


		

	</div>
</div>

	
