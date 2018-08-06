
<?php echo form_open('', array('id' => ''));?>




<div class="clearfix"></div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">เป็นสถานศึกษาสาขา</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="username">สังกัด</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    </select>
		</div>

		<div class="form-group col-md-6">
			<label for="username">เป็นสถานศึกษาสาขาของห้องเรียนของ</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    </select>
		</div>

	  </div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ถ้าเป็นสถานศึกษามาเรียนรวม ระดับชั้นที่มาเรียนรวมคือ</div>
	  	<div class="panel-body">
			<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th rowspan="2">ชั้น</th>
					<th colspan="2">จำนวนนักเรียน</th>
					<th rowspan="2">ชื่อสถานศึกษาหลัก</th>
				</tr>
				<tr>
					<th width="150">ชาย</th>
					<th width="150">หญิง</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
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
	  <div class="panel-heading">ข้อมูลเพิ่มเติม</div>
	  <div class="panel-body">
	  	<div class='col-md-6'>
	  		<div class="checkbox">
				<label>
			      <input type="checkbox"> เป็นสถานศึกษาที่ดูแลและรับผิดชอบพื้นที่จุดบอดทางการศึกษา
			    </label>
			</div>
	  	</div>

	  	<div class='col-md-6'>
	  		<div class="checkbox">
				<label>
			      <input type="checkbox"> เป็นสถานศึกษาที่อยู่ในโครงการพักนอนประจำ
			    </label>
			</div>
	  	</div>


	  </div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">เป็นสถานศึกษาในโครงการพระราชดำริ (เลือกได้มากกว่า 1 ข้อ)</div>
	  <div class="panel-body">
	  	<table class="table table-striped table-bordered">
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>ไม่อยู่ในโครงการ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการราชประชานุเคราะห์</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการพระราชดำริของสมเด็จพระเทพรัตนราชสุดาฯ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการพระราชดำริด้วยรักและห่วงใย</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>สถานศึกษาที่ตั้งอยู่ในศูนย์การศึกษาการพัฒนาเนื่องมาจากพระราชดำริ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการพระราชดำริบ้านเล็กในป่าใหญ่</td>
	  			</tr>
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ประเภทและลักษณะโครงการของสถานศึกษา,โครงการที่สถานศึกษาเข้าร่วม (เลือกได้มากกว่า 1 ข้อ)</div>
	  <div class="panel-body">
	  	<table class="table table-striped table-bordered">
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้หน่วยงานทางการศึกษาใช้เป็นสถานที่ตั้งสำนักงาน / เปิดทำการสอน</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้ กศน. ใช้เป็นสถานที่ตั้งสำนักงาน / เปิดทำการสอน</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้องค์กรปกครองส่วนท้องถิ่นใช้เป็นสถานที่ตั้งสำนักงาน</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้องค์กรปกครองส่วนท้องถิ่นใช้จัดการเรียนการสอนอนุบาล 3 ขวบ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาสาขาของสถานศึกษา</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาสาขาห้องเรียนของสถานศึกษา</td>
	  			</tr>
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>


<?php echo form_close();?>
	