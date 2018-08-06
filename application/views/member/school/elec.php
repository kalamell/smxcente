
<?php echo form_open('', array('id' => ''));?>

<input type="hidden" name="id" value="<?php echo $rs->id;?>">
<input type="hidden" name="tab" value="elec">


<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลไฟฟ้า</button>
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลทั่วไป</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="username"> อยู่ในเขตบริการไฟฟ้าส่วนภูมิภาค/นครหลวง?*</label>
		    <div class="radio">
		    	<label>
		    		<input type="radio" name="area_fire" value="1" <?php echo $rs->area_fire == '1' ? 'checked' : '';?>> อยู่
		    	</label>
		    </div>

		    <div class="radio">
		    	<label>
		    		<input type="radio" name="area_fire" value="0" <?php echo $rs->area_fire != '1' ? 'checked' : '';?>> ไม่อยู่
		    	</label>
		    </div>
		</div>

		<div class="form-group col-md-6">
			<label for="username">สถานศึกษามีไฟฟ้าใช้หรือไม่?*</label>
		    <div class="radio">
		    	<label>
		    		<input type="radio" name="have_fire" value="1" <?php echo $rs->have_fire == '1' ? 'checked' : '';?>> มี
		    	</label>
		    </div>

		    <div class="radio">
		    	<label>
		    		<input type="radio" name="have_fire" value="0" <?php echo $rs->have_fire != '1' ? 'checked' : '';?>> ไม่มี
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
	  				<td><input type="checkbox" name="ff1_use" value="1" <?php echo $rs->ff1_use == '1' ? 'checked' : '';?>></td>
	  				<td>การไฟฟ้า</td>
	  				<td><input type="text" class="form-control" name="ff1_kva" value="<?php echo $rs->ff1_kva;?>"></td>
	  				<td><input type="text" class="form-control" name="ff1_amp" value="<?php echo $rs->ff1_amp;?>"></td>
	  				<td><input type="text" class="form-control" name="ff1_type" value="<?php echo $rs->ff1_type;?>"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name="ff2_use" value="1" <?php echo $rs->ff2_use == '1' ? 'checked' : '';?>></td>
	  				<td>ต่อพ่วงจากชุมชน</td>
	  				<td><input type="text" class="form-control" name="ff2_kva" value="<?php echo $rs->ff2_kva;?>"></td>
	  				<td><input type="text" class="form-control" name="ff2_amp" value="<?php echo $rs->ff2_amp;?>"></td>
	  				<td><input type="text" class="form-control" name="ff2_type" value="<?php echo $rs->ff2_type;?>"></td>
	  			</tr>


	  			<tr>
	  				<td><input type="checkbox" name="ff3_use" value="1" <?php echo $rs->ff3_use == '1' ? 'checked' : '';?>></td>
	  				<td>เครื่องกำเนิดไฟฟ้า</td>
	  				<td><input type="text" class="form-control" name="ff3_kva" value="<?php echo $rs->ff3_kva;?>"></td>
	  				<td><input type="text" class="form-control" name="ff3_amp" value="<?php echo $rs->ff3_amp;?>"></td>
	  				<td><input type="text" class="form-control" name="ff3_type" value="<?php echo $rs->ff3_type;?>"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name="ff4_use" value="1" <?php echo $rs->ff4_use == '1' ? 'checked' : '';?>></td>
	  				<td>โซลาเซลล์</td>
	  				<td><input type="text" class="form-control" name="ff4_kva" value="<?php echo $rs->ff4_kva;?>"></td>
	  				<td><input type="text" class="form-control" name="ff4_amp" value="<?php echo $rs->ff4_amp;?>"></td>
	  				<td><input type="text" class="form-control" name="ff4_type" value="<?php echo $rs->ff4_type;?>"></td>
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
	  				<td><input type="text" class="form-control" name="ff5_total" value="<?php echo $rs->ff5_total;?>"></td>
	  				<td><input type="text" class="form-control" name="ff5_amp" value="<?php echo $rs->ff5_amp;?>"></td>
	  				<td><input type="text" class="form-control" name="ff5_type" value="<?php echo $rs->ff5_type;?>"></td>
	  			</tr>

	  			<tr>
	  				<td>อาคารประกอบ</td>
	  				<td><input type="text" class="form-control" name="ff6_total" value="<?php echo $rs->ff6_total;?>"></td>
	  				<td><input type="text" class="form-control" name="ff6_amp" value="<?php echo $rs->ff6_amp;?>"></td>
	  				<td><input type="text" class="form-control" name="ff6_type" value="<?php echo $rs->ff6_type;?>"></td>
	  			</tr>

	  			
	  			
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>


<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลไฟฟ้า</button>
</div>


<?php echo form_close();?>