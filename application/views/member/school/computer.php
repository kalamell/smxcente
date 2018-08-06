
<?php echo form_open('', array('id' => ''));?>


<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลคอมพิวเตอร์</button>
</div>

<div class="clearfix"></div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ห้องปฏิบัติการ</div>
	  <div class="panel-body">
	  	

	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th width="100">เลือกถ้ามี</th>
	  				<th>ชนิด</th>
	  				<th width="150">จำนวนห้อง</th>
	  				<th width="150">จำนวนที่นั่ง</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>ห้องปฏิบัติการทางภาษา</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>ห้องเรียนคอมพิวเตอร์</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>ห้องวิทยาศาสตร์</td>
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
	  <div class="panel-heading">สถานศึกษามีคอมพิวเตอร์</div>
	  <div class="panel-body">
	  	

	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th rowspan="2" width="100">เลือกถ้ามี</th>
	  				<th rowspan="2">ชนิด</th>
	  				<th rowspan="2" width="">จำนวนทั้งหมด</th>
	  				<th rowspan="2" width="">ได้รับจากเงินงบประมาณกี่เครื่อง</th>
	  				<th rowspan="2" width="">รับการบริการ / เอกชนกี่เครื่อง</th>
	  				<th colspan="2">ใช้เพื่อการบริหารจัดการ</th>
	  				<th colspan="2">ใช้ในการจัดการเรียนการสอน</th>
	  			</tr>
	  			<tr>
	  				<th>ทั้งหมด</th>
	  				<th>ที่ใช้งานได้</th>
	  				<th>ทั้งหมด</th>
	  				<th>ที่ใช้งานได้</th>
	  			</tr>

	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เครื่องคอมพิวเตอร์ชนิดตั้งโต๊ะ</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เครื่องคอมพิวเตอร์ชนิดพกพา (Notebook, Netbook )</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เครื่องแท็บเล็ต (Tablet)</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
	  				<td><input type="text" class="form-control" name=""></td>
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
	  <div class="panel-heading">การพัฒนาบุคลากรด้านคอมพิวเตอร์</div>
	  <div class="panel-body">
	  	

	  	<table class="table table-bordered table-striped">
	  		<thead>
	  			<tr>
	  				<th width="100">เลือกถ้ามี</th>
	  				<th>ชนิด</th>
	  				<th width="150">จำนวนคนที่ไปอบรม</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>คอมพิวเตอร์เบื้องต้น	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การใช้อินเตอร์เน็ตเบื้องต้น	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การจัดทำ Web Site</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การใช้โปรแกรมGraphic ต่างๆ</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การผลิตสื่อการสอนด้วยคอมพิวเตอร์	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การดูแลระบบเครือข่าย (Administrator)</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การซ่อมบำรุงคอมพิวเตอร์	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>


	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การสร้างระบบE-Learning	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>การเขียนโปรแกรมต่างๆ	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>อื่นๆ	</td>
	  				<td><input type="text" class="form-control" name=""></td>
	  			</tr>

	  		</tbody>
	  	</table>

	  	<div class="form-group col-md-6">
			<label for="username">จำนวนเครื่องระบบคอมพิวเตอร์ Stand alone*</label>
		    <input type="text" class="form-control required" placeholder="">
		 </div>

		<div class="form-group col-md-6">
			<label for="username">จำนวนเครื่องระบบคอมพิวเตอร์ Network*</label>
		    <input type="text" class="form-control required" placeholder="">
		 </div>

		 <div class="form-group col-md-6">
			<label for="username">การเชื่อมต่ออินเตอร์เน็ต (เลือกได้มากกว่า 1 ข้อ)</label>
		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> วงจรเช่า Leades line
		    	</label>
		    </div>

		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> IP STAR
		    	</label>
		    </div>

		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> ไม่มีการเชื่อมอินเตอร์เน็ต
		    	</label>
		    </div>
		 </div>


		 <div class="form-group col-md-6">
			<label for="username"> โครงการ/กิจกรรมที่เกี่ยวข้องเพื่อสนับสนุน IT (เลือกได้มากกว่า 1 ข้อ)</label>
		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> โครงการ NED-net
		    	</label>
		    </div>

		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> โครงการ MOE-net
		    	</label>
		    </div>

		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> โครงการ Uni-net
		    	</label>
		    </div>

		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> โครงการ IT ตำบล
		    	</label>
		    </div>

		    <div class="checkbox">
		    	<label>
		    		<input type="checkbox" name=""> โครงการเพื่อนเด็กของยูนิเซฟ
		    	</label>
		    </div>
		 </div>







	  </div>
	</div>
</div>


<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลคอมพิวเตอร์</button>
</div>
<?php echo form_close();?>
	