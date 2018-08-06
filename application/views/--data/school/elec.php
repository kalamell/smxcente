
<?php echo form_open('', array('id' => ''));?>



<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลทั่วไป</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="username"> อยู่ในเขตบริการไฟฟ้าส่วนภูมิภาค/นครหลวง?*</label>
		    <div class="radio">
		    	<label>
		    		<input type="radio" name=""> อยู่
		    	</label>
		    </div>

		    <div class="radio">
		    	<label>
		    		<input type="radio" name=""> ไม่อยู่
		    	</label>
		    </div>
		</div>

		<div class="form-group col-md-6">
			<label for="username">สถานศึกษามีไฟฟ้าใช้หรือไม่?*</label>
		    <div class="radio">
		    	<label>
		    		<input type="radio" name=""> มี
		    	</label>
		    </div>

		    <div class="radio">
		    	<label>
		    		<input type="radio" name=""> ไม่มี
		    	</label>
		    </div>

		    
		 </div>


	  </div>
	</div>
</div>



<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">การมีไฟฟ้าในสถานศึกษา (ถ้ามีไฟฟ้าใช้)</div>
	  <div class="panel-body">
		<p>- ขนาดมิเตอร์ไฟฟ้าที่มีวงเล็บข้างหลัง เช่น 15(45) คือมิเตอร์ขนาด 15 AMP (รับโหลดได้สูงสุด 45 AMP) ให้ใส่แค่ 15 ในช่อง AMP เท่านั้น</p>

		<br>

		<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th width="100">เลือกถ้ามี</th>
	  				<th>แหล่่งไฟฟ้า</th>
	  				<th width="">ขนาดหม้อแปลง (KVA) </th>
	  				<th width="">มิเตอร์ไฟฟ้า (AMP)</th>
	  				<th width="">ประเภทเฟสไฟฟ้า </th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การไฟฟ้า</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>ต่อพ่วงจากชุมชน</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>


	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เครื่องกำเนิดไฟฟ้า</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โซลาเซลล์</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>




<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">การใช้ไฟฟ้าในสถานศึกษา</div>
	  <div class="panel-body">

		<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th rowspan="2" width="">อาคาร</th>
	  				<th rowspan="2">จำนวนทั้งหมด</th>
	  				<th colspan="2" width="">หลัง </th>
	  			</tr>
	  			<tr>
	  				<th width="">มิเตอร์ไฟฟ้า (AMP)</th>
	  				<th width="">ประเภทเฟสไฟฟ้า </th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td>อาคารเรียน</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td>อาคารประกอบ</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			
	  			
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>




<?php echo form_close();?>