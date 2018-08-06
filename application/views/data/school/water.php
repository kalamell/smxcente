
<?php echo form_open('', array('id' => ''));?>



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
			    		<input type="checkbox" name=""> ประปาสถานศึกษา
			    	</label>
			    </div>

			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" name=""> ประปาจากหน่วยงานอื่น
			    	</label>
			    </div>

			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" name=""> ประปาหมู่บ้าน
			    	</label>
			    </div>

			    <div class="clearfix"></div>

			    <div class="checkbox col-md-4">
			    	<label>
			    		<input type="checkbox" name=""> ประปานครหลวง
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
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 		</tr>

		 		<tr>
		 			<td>น้ำใช้</td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 			<td><input type="checkbox" name=""></td>
		 		</tr>


		 	</tbody>
		 </table>

	  </div>
	</div>
</div>



<?php echo form_close();?>
	