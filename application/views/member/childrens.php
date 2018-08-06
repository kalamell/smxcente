<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class="active">บันทึกข้อมูลประชากรอายุ 1-7 ปี</li>
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
			  <div class="panel-heading">บันทึกข้อมูลประชากรอายุ 1-7 ปี</div>
			  <div class="panel-body">

			  	<?php echo save();?>
			  	
			  	<?php echo form_open('', array('id' => 'memberupdate'));?>

				  <div class="form-group col-md-6">
				    <label for="name">ปี</label>
				   	<select name="year_id" class="form-control">
				   		<?php foreach($years as $y):?>
				   			<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
				   		<?php endforeach;?>
				   	</select>
				  </div>
				  

				  <div class="form-group col-md-6">
				    <label for="name">อายุ</label>
				   	<select name="age" class="form-control">
				   		<option value="1">1 ปี</option>
				   		<option value="2">2 ปี</option>
				   		<option value="3">3 ปี</option>
				   		<option value="4">4 ปี</option>
				   		<option value="5">5 ปี</option>
				   		<option value="6">6 ปี</option>
				   		<option value="7">7 ปี</option>
				   	</select>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="surname">สถานะการศึกษา</label>
				    <div class="radio">
				    	<label>
				    		<input type="radio" name="study" value="1"> เรียน
				    	</label>
				    	<label>
				    		<input type="radio" name="study" value="0"> ไม่เรียน
				    	</label>
				    </div>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="boy">จำนวนผู้ชาย</label>
				    <input type="text" class="form-control required" value=""  id="boy" name="boy" placeholder="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="girl">จำนวนผู้หญิง</label>
				    <input type="text" class="form-control required" value="" id="girl" name="girl" placeholder="">
				  </div>


				   <div class="form-group col-md-6">
				    <label for="amphur_id">อำเภอ</label>
				    <select class="form-control required" value="" id="amphur_id" name="amphur_id">
				    	<option value=""> อำเภอ </option>
				    	<?php foreach($amphur as $a):?>
				    		<option value="<?php echo $a->AMPHUR_ID;?>"><?php echo $a->AMPHUR_NAME;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>


				   <div class="form-group col-md-6">
				    <label for="district_id">ตำบล</label>
				    <select class="form-control required" value="" id="district_id" name="district_id">
				    </select>
				  </div>



				  
				  
				  <div class='col-md-12'>
					  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> ปรับปรุงข้อมูล</button><br><br>
				  </div>

				<?php echo form_close();?>

				<br>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ปี</th>
							<th>เขต</th>
							<th>อายุ</th>
							<th>ชาย</th>
							<th>หญิง</th>
							<th>การศึกษา</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($rs as $r):?>
							<tr>
								<td><?php echo $r->year_name;?></td>
								<td>
									อำเภอ <?php echo $r->AMPHUR_NAME;?><br>
									ตำบล <?php echo $r->DISTRICT_NAME;?>
								</td>
								<td><?php echo $r->age;?> ปี</td>
								<td><?php echo $r->boy;?></td>
								<td><?php echo $r->girl;?></td>
								<td><?php echo $r->study==0 ? 'ไม่ได้เรียน' : 'เรียนอยู่';?></td>
								<td style="text-align: center;"><a class="btn btn-sm btn-default" href="<?php echo site_url('member/del_childrens/'.$r->id);?>" onclick="javascript: return confirm('ต้องการลบหรือไม่​?');"><i class="fa fa-trash"></i></a></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			  </div>
			</div>
		</div>


		

	</div>
</div>

	
