
<?php echo form_open('', array('id' => ''));?>



<div class='col-md-6'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลรหัสสถานศึกษา</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="username">รหัสสถานศึกษา</label>
		    <input type="text" class="form-control required" name="f6" value="<?php echo $rs->f6;?>" readonly placeholder="">
		</div>
		<div class="form-group col-md-6">
			<label for="username">รหัสเขต 8 หลัก</label>
		    <input type="text" class="form-control required" name="f7" value="<?php echo $rs->f7;?>" readonly placeholder="">
		 </div>

		<div class="form-group col-md-6">
			<label for="username">รหัส 6 หลัก</label>
		    <input type="text" class="form-control required" name="f8" value="<?php echo $rs->f8;?>" readonly placeholder="">
		</div>
		<div class="form-group col-md-6">
			<label for="username">รหัสกระทรวง 10 หลัก</label>
		    <input type="text" class="form-control " name="f6" value="<?php echo $rs->f6;?>" readonly placeholder="">
		 </div>

		 <div class="form-group col-md-6">
			<label for="username">ชื่อสถานศึกษา (ภาษาไทย)</label>
		    <input type="text" class="form-control required" value="<?php echo $rs->f3;?>" name="f3" placeholder="">
		</div>
		<div class="form-group col-md-6">
			<label for="username">ชื่อสถานศึกษา (ภาษาอังกฤษ)</label>
		    <input type="text" class="form-control required" value="<?php echo $rs->f4;?>" name="f4" placeholder="">
		 </div>
	  </div>
	</div>
</div>


<div class='col-md-6'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลสังกัด</div>
	  <div class="panel-body">
		 <div class="form-group col-md-6">
			<label for="username">สังกัด</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    </select>
		</div>

		<div class="form-group col-md-6">
			<label for="username">กระทรวง</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
			</select> 
		</div>

		 <div class="form-group col-md-6">
			<label for="username">สำนัก</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
			</select> 
		</div>

		 <div class="form-group col-md-6">
			<label for="username">เขตเทศบาล</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
			</select> 
		</div>

		 <div class="form-group col-md-6">
			<label for="username">เขตตรวจราชการ</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
			</select> 
		</div>
	</div>
</div>
</div>


<div class='clearfix'></div>

<div class='col-md-6'>
	<div class="panel panel-default">
		<div class="panel-heading">ข้อมูลพื้นฐานสถานศึกษา</div>
		<div class="panel-body">
			<div class="form-group col-md-12">
				<label for="username">ชื่อผู้อำนวยการ</label>
		    	<input type="text" class="form-control required" name="f5" value="<?php echo $rs->f5;?>" placeholder="">
			</div>

			<div class="form-group col-md-12">
				<label for="username">วันก่อตั้ง</label>
		    	<input type="text" class="form-control required" name="f21" value="<?php echo $rs->f21;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">รหัสประจำบ้าน</label>
		    	<input type="text" class="form-control required" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ที่อยู่</label>
		    	<input type="text" class="form-control required" name="11" value="<?php echo $rs->f11;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">หมู่</label>
		    	<input type="text" class="form-control required" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ถนน</label>
		    	<input type="text" class="form-control required" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">จังหวัด</label>
		    	<input type="text" class="form-control required" name="f14" value="<?php echo $rs->f14;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">อำเภอ</label>
		    	<input type="text" class="form-control required" name="f13" value="<?php echo $rs->f13;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ตำบล</label>
		    	<input type="text" class="form-control required" name="f12" value="<?php echo $rs->f12;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">รหัสไปรษณีย์</label>
		    	<input type="text" class="form-control required" name="f15" value="<?php echo $rs->f15;?>" placeholder="">
			</div>

			<div class="clearfix"></div>

			<div class="form-group col-md-6">
				<label for="username">เบอร์โทรศัพท์ 1</label>
		    	<input type="text" class="form-control required" name="f19" value="<?php echo $rs->f19;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">เบอร์โทรศัพท์ 2</label>
		    	<input type="text" class="form-control" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">เบอร์โทรสาร 1</label>
		    	<input type="text" class="form-control required" name="f20" value="<?php echo $rs->f20;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">เบอร์โทรสาร 2</label>
		    	<input type="text" class="form-control " placeholder="">
			</div>

			<div class="clearfix"></div>

			<div class="form-group col-md-6">
				<label for="username">Email ติดต่อ</label>
		    	<input type="text" class="form-control required" name="f16" value="<?php echo $rs->f16;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">เว็บไซต์สถานศึกษา</label>
		    	<input type="text" class="form-control" name="f17" value="<?php echo $rs->f17;?>" placeholder="">
			</div>


			<div class="form-group col-md-6">
				<label for="username">ที่ดิน</label>
		    	<input type="text" class="form-control required" placeholder="">
			</div>


			<div class="form-group col-md-6">
				<label for="username">ที่ตั้งบริเวณวัด</label>
		    	<input type="text" class="form-control required" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ที่ตั้งทางภูมิศาสตร์</label>
		    	<input type="text" class="form-control required" placeholder="">
			</div>

		</div>
	</div>
</div>




<div class='col-md-6'>
	<div class="panel panel-default">
		<div class="panel-heading">ภาพป้ายหน้าสถานศึกษา</div>
		<div class="panel-body">
			<?php if ($rs->sign_school !=''):?>
				<img src="<?php echo base_url();?>upload/<?php echo $rs->sign_school;?>" class="img-responsive"> <br />
			<?php endif;?>

		</div>
	</div>
</div>


<div class='clearfix'></div>



<div class='col-md-12'>
	<div class="panel panel-default">
		<div class="panel-heading">แผนที่สถานศึกษา</div>
		<div class="panel-body">
			
		</div>
	</div>
</div>
<?php echo form_close();?>
	