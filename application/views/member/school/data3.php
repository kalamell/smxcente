
<?php echo form_open('', array('id' => ''));?>


<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 3</button>
</div>

<div class="clearfix"></div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">เขตบริการของสถานศึกษา (สถานศึกษาบริการหลายหมู่บ้าน)</div>
	  <div class="panel-body">
	  	<p><strong>เขตบริการของสถานศึกษา (สถานศึกษาบริการหลายหมู่บ้าน)</strong></p>
	  	<p>ในกรณีที่สถานศึกษาใดมีเขตบริการครอบคลุมทั้งตำบล/แขวง หรือครอบคลุมทั้งอำเภอ/เขต ให้กรอกเฉพาะชื่อตำบล/แขวง หรือชื่ออำเภอ/เขต เท่านั้น </p>
	  	<br>
	  	<p><strong>หมายเหตุ</strong></p>
	  	<p>ชื่อหมู่บ้าน, หมู่ ถ้าไม่มีให้ใส่ - , จังหวัด ต้องเลือก, อำเภอ ตำบล ถ้ามีให้เลือกด้วย<br>ถ้าสถานศึกษาไม่มีเขตบริการให้ใส่ หมู่บ้านเป็น - หมู่เป็น - และเลือกแค่จังหวัดที่สถานศึกษาอยู่ เฉพาะแถวแรกแถวเดียวเท่านั้น</p>

	  	<br>

	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th>ชื่อหมู่บ้าน</th>
	  				<th>หมู่</th>
	  				<th>จังหวัด</th>
	  				<th>อำเภอ</th>
	  				<th>ตำบล</th>
	  				<th width="100">ติดต่อกับรอยตะเข็บชายแดน (เลือกถ้าติด)</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option><option value=""> - - - เลือกข้อมูล - - -</option><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><input type="checkbox"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><input type="checkbox"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><input type="checkbox"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><input type="checkbox"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><input type="checkbox"></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><select class="form-control"><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  				<td><input type="checkbox"></td>
	  			</tr>


	  		</tbody>
	  	</table>
	  </div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ระยะทางจากสถานศึกษาถึงหน่วยงานที่เกี่ยวข้องในเขตพื้นที่การศึกษาเดียวกัน</div>
	  <div class="panel-body">
	  	
	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th rowspan="2">หน่วยงาน</th>
	  				<th rowspan="2">ชื่อ</th>
	  				<th rowspan="2">สังกัด</th>
	  				<th colspan="2">ระยะทางจำแนกตามสภาพถนน/ทางสัญจร (กิโลเมตร)</th>
	  			</tr>
	  			<tr>
	  				<th width="120">คอนกรีต/ลาดยาง<br>(ไม่มีใส่ 0)</th>
	  				<th width="120">ลูกรัง<br>(ไม่มีใส่ 0)</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td>สถานศึกษาที่เปิดสอนระดับประถมศึกษาที่ใกล้ที่สุด</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td>สถานศึกษาที่เปิดสอนระดับมัธมศึกษาที่ใกล้ที่สุด</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td>องค์กรปกครองส่วนท้องถิ่น	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td>เขต/อำเภอ/กิ่งอำเภอ</td>
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
	  <div class="panel-heading">ที่ดินของสถานศึกษา (ต้องมีอย่างน้อย 1 แปลงเป็นที่ดินหลักของสถานศึกษา)</div>
	  <div class="panel-body">
	  	
	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th rowspan="2" width="80">ลำดับ</th>
	  				<th rowspan="2" width="300">แปลงที่</th>
	  				<th colspan="3">ขนาดพื้นที่ (ต้องมีข้อมูลอย่างน้อย 1 หัวข้อ)ไม่สามารถใส่ว่ามีไร่ 0 , งาน 0 , ตรว. 0</th>
					<th rowspan="2">กรรมสิทธิ์การถือครอง</th>
	  			</tr>
	  			<tr>
	  				<th width="120">ไร่ (ไม่มีใส่ 0)</th>
	  				<th width="120">งาน (ไม่มีใส่ 0)	</th>
	  				<th width="120">ตารางวา</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control" name=""><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control" name=""><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  			</tr>

	  			<tr>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><select class="form-control" name=""><option value=""> - - - เลือกข้อมูล - - -</option></select></td>
	  			</tr>

	  			


	  		</tbody>
	  	</table>
	  </div>
	</div>
</div>



<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ปัญหาสภาพแวดล้อมของสถานศึกษาและอาคารเรียน (ถ้ามี เลือกได้มากกว่า 1 อย่าง)</div>
	  <div class="panel-body">
	  	
	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th rowspan="2" width="200">ปัญหา</th>
	  				<th colspan="5">แหล่งที่มา</th>
	  			</tr>
	  			<tr>
	  				<th width="">โรงงาน/สารเคมี</th>
	  				<th width="">เคมีการเกษตร</th>
	  				<th width="">ขยะ/สิ่งปฏิกูล</th>
	  				<th width="">การจราจร</th>
	  				<th width="">สาเหตุอื่นๆ (โปรดระบุสาเหตุ)</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				
	  				<td>เสียง</td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="text" name="" class="form-control"></td>
	  			</tr>

	  			<tr>
	  				<td>อากาศ</td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="text" name="" class="form-control"></td>
	  			</tr>

	  			<tr>
	  				<td>น้ำ</td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="checkbox" name=""></td>
	  				<td><input type="text" name="" class="form-control"></td>
	  			</tr>

	  			

	  		</tbody>
	  	</table>
	  </div>
	</div>
</div>




<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 3</button>
</div>
<?php echo form_close();?>
	