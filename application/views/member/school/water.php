
<?php echo form_open('', array('id' => ''));?>

<input type="hidden" name="id" value="<?php echo $rs->id;?>">
<input type="hidden" name="tab" value="water">

<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
</div>

<div class="clearfix"></div>



<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลน้ำ</div>
	  <div class="panel-body">
		 <div class="form-group col-md-12">
			<label for="username">แหล่งน้ำที่สถานศึกษาใช้ (เลือกได้มากกว่า 1 ข้อ)</label>

			<div class="row">
			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" value="1" <?php echo $rs->pp1 == 1 ? 'checked' : '';?> name="pp1"> ประปาสถานศึกษา
			    	</label>
			    </div>

			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" value="1" <?php echo $rs->pp2 == 1 ? 'checked' : '';?> name="pp2"> ประปาจากหน่วยงานอื่น
			    	</label>
			    </div>

			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" value="1" <?php echo $rs->pp3 == 1 ? 'checked' : '';?> name="pp3"> ประปาหมู่บ้าน
			    	</label>
			    </div>

			    <div class="clearfix"></div>

			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" value="1" <?php echo $rs->pp4 == 1 ? 'checked' : '';?> name="pp4"> ประปานครหลวง
			    	</label>
			    </div>
			</div>

		 </div>
	  </div>
	</div>
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ระยะเวลาที่ใช้น้ำไม่เพียงพอ</div>
	  <div class="panel-body">
		 <p>ระยะเวลาที่ใช้น้ำไม่เพียงพอ (เลือกเดือนที่ไม่เพียงพอ)</p>

		 <table class="table table-bordered table-striped">
		 	<thead>
		 		<tr>
		 			<th>ประเภท</th>
		 			<th>ม.ค.</th>
		 			<th>ก.พ.</th>
		 			<th>มี.ค.</th>
		 			<th>เม.ษ.</th>
		 			<th>พ.ค.</th>
		 			<th>มิ.ย.</th>
		 			<th>ก.ค.</th>
		 			<th>ส.ค.</th>
		 			<th>ก.ย.</th>
		 			<th>ต.ค.</th>
		 			<th>พ.ย.</th>
		 			<th>ธ.ค.</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<tr>
		 			<td>น้ำดื่ม</td>
		 			<td><input type="checkbox" name="pp_drink_m1" value="1" <?php echo $rs->pp_drink_m1 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m2" value="1" <?php echo $rs->pp_drink_m2 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m3" value="1" <?php echo $rs->pp_drink_m3 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m4" value="1" <?php echo $rs->pp_drink_m4 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m5" value="1" <?php echo $rs->pp_drink_m5 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m6" value="1" <?php echo $rs->pp_drink_m6 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m7" value="1" <?php echo $rs->pp_drink_m7 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m8" value="1" <?php echo $rs->pp_drink_m8 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m9" value="1" <?php echo $rs->pp_drink_m9 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m10" value="1" <?php echo $rs->pp_drink_m10 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m11" value="1" <?php echo $rs->pp_drink_m11 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_drink_m12" value="1" <?php echo $rs->pp_drink_m12 == '1' ? 'checked' : '';?>></td>
		 		</tr>

		 		<tr>
		 			<td>น้ำใช้</td>
		 			<td><input type="checkbox" name="pp_use_m1" value="1" <?php echo $rs->pp_use_m1 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m2" value="1" <?php echo $rs->pp_use_m2 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m3" value="1" <?php echo $rs->pp_use_m3 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m4" value="1" <?php echo $rs->pp_use_m4 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m5" value="1" <?php echo $rs->pp_use_m5 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m6" value="1" <?php echo $rs->pp_use_m6 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m7" value="1" <?php echo $rs->pp_use_m7 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m8" value="1" <?php echo $rs->pp_use_m8 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m9" value="1" <?php echo $rs->pp_use_m9 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m10" value="1" <?php echo $rs->pp_use_m10 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m11" value="1" <?php echo $rs->pp_use_m11 == '1' ? 'checked' : '';?>></td>
		 			<td><input type="checkbox" name="pp_use_m12" value="1" <?php echo $rs->pp_use_m12 == '1' ? 'checked' : '';?>></td>
		 		</tr>


		 	</tbody>
		 </table>

	  </div>
	</div>
</div>


<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
</div>
<?php echo form_close();?>
	