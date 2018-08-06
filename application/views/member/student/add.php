<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class=""><a href="<?php echo site_url('member/student');?>">ข้อมูลนักเรียน</a></li>
			  <li class="active">เพิ่มนักเรียน</li>
			</ol>

			<?php echo form_open_multipart('member/save_student', array('id' => 'memberupdate'));?>		  

			<div class='row'>

				<div class='col-md-9'>
					<div class="panel panel-default">
					  <div class="panel-heading">ข้อมูลนักเรียน</div>
					  <div class="panel-body">
					  	<br><span style="color: red !important;">** สามารถอ่านได้จากเครื่องอ่านบัตรประชาชน</span>

					  	<div class="row">
							<div class="form-group col-md-6">
								<label for="idcard">เลขบัตรประชาชน</label>
							    <input type="text" class="form-control required" name="idcard" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label>คำนำหน้า</label>
								<div class='radio'>
									<label>
										<input type="radio" class='required' checked name="prefix" value="เด็กชาย"> เด็กชาย
									</label>
								
									<label>
										<input type="radio" name="prefix" value="เด็กหญิง"> เด็กหญิง
									</label>
								
									<label>
										<input type="radio" name="prefix" value="นาย"> นาย
									</label>
								
									<label>
										<input type="radio" name="prefix" value="นางสาว"> นางสาว
									</label>
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<label for="student_id">รหัสนักเรียน</label>
							    <input type="text" class="form-control required" name="student_id" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="name">ชื่อ</label>
							    <input type="text" class="form-control required" name="name" value=""  placeholder="">
							</div>


							<div class="form-group col-md-6">
								<label for="surname">นามสกุล</label>
							    <input type="text" class="form-control required" name="surname" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="name_en">ชื่อภาษาอังกฤษ</label>
							    <input type="text" class="form-control required" name="name_en" value=""  placeholder="">
							</div>


							<div class="form-group col-md-6">
								<label for="surname_en">นามสกุลภาษาอังกฤษ</label>
							    <input type="text" class="form-control required" name="surname_en" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label>เพศ</label>
								<div class='radio'>
									<label>
										<input type="radio" class='required' checked name="gender" value="ช"> ชาย
									</label>
								
									<label>
										<input type="radio" name="gender" value="ญ"> หญิง
									</label>
								
									
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<label for="age">อายุ</label>
							    <input type="number" class="form-control" name="age" value=""  placeholder="">
							</div>


							<div class="form-group col-md-6">
								<label for="term_id">ภาคเรียน</label>
							    <select name="term_id" class="form-control">
							    	<option value=""> ภาคเรียน </option>
							    	<?php foreach($term as $t):?>
							    		<option value="<?php echo $t->term_id;?>" <?php echo $t->term_id == $_term ? 'selected' : '';?>><?php echo $t->term_name;?></option>
							    	<?php endforeach;?>
							    </select>
							</div>


							<div class="form-group col-md-6">
								<label for="year_id">ปีการศึกษา</label>
							    <select name="year_id" class="form-control">
							    	<option value=""> ปีการศึกษา </option>
							    	<?php foreach($years as $y):?>
							    		<option value="<?php echo $y->year_id;?>" <?php echo $y->year_id == $_year ? 'selected' : '';?>><?php echo $y->year_name;?></option>
							    	<?php endforeach;?>
							    </select>
							</div>

							<div class="form-group col-md-6">
								<label for="birthdate">วันเกิด</label>
							    <input type="text" class="form-control date" name="birthdate" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="rmid">การศึกษาระดับชั้น</label>
							    <select name="rmid" class="form-control">
							    	<option value=""> การศึกษาระดับชั้น </option>
							    	<?php foreach($room_level as $rm):?>
							    		<option value="<?php echo $rm->rmid;?>"><?php echo $rm->rm_name;?></option>
							    	<?php endforeach;?>
							    </select>
							</div>

							<div class="form-group col-md-6">
								<label for="room_no">ห้อง</label>
							    <input type="text" class="form-control" name="room_no" value=""  placeholder="">
							</div>

							

							<div class="form-group col-md-12">
							    <label class="" for="area_type_id">สังกัด</label>
							    <select class="form-control required" name="area_type_id" id="area_type_id" >
							    	<option value="">- - - สังกัด - - -</option>
							    	<?php foreach($area as $a):?>
							    		<option value="<?php echo $a->area_type_id;?>" <?php echo $a->area_type_id == $r->area_type_id ? 'selected' : '';?>><?php echo $a->area_type_name;?></option>
							    	<?php endforeach;?>
							    </select>
							  </div>

							  <div class="form-group col-md-12">
							    <label class="" for="school">สถานศึกษา</label>
							    <select class="form-control required" name="school_id" id="school" >
							    	<option value="">- - - สถานศึกษา - - -</option>
							    	<?php foreach($school as $s):?>
							    		<option value="<?php echo $s->school_id;?>" <?php echo $s->school_id == $r->school ? 'selected' : '';?>><?php echo $s->school_name;?></option>
							    	<?php endforeach;?>
							    	
							    </select>
							  </div>

							 

							<p class="col-md-12"><strong>ข้อมูลส่วนตัว</strong></p>

							

							<div class="form-group col-md-6">
								<label for="blood">หมู่โลหิต</label>
							    <input type="text" class="form-control" name="blood" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="race">เชื้อชาติ</label>
							    <input type="text" class="form-control" name="race" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="nationality">สัญชาติ</label>
							    <input type="text" class="form-control" name="nationality" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="religion">ศาสนา</label>
							    <select name="religion" class="form-control" id="">
									<option>พุทธ</option>
									<option>คริสต์</option>
									<option>อิสลาม</option>
									<option>ซิก</option>
									<option>ฮินดู</option>
									<option>พราห์ม</option>
								</select>
							</div>

							<div class="form-group col-md-3">
								<label for="old_bro">จำนวนพี่ชาย</label>
							    <input type="text" class="form-control" name="old_bro" value=""  placeholder="">
							</div>

							<div class="form-group col-md-3">
								<label for="little_bro">จำนวนน้องชาย</label>
							    <input type="text" class="form-control" name="little_bro" value=""  placeholder="">
							</div>

							<div class="form-group col-md-3">
								<label for="old_sis">จำนวนพี่สาว</label>
							    <input type="text" class="form-control" name="old_sis" value=""  placeholder="">
							</div>

							<div class="form-group col-md-3">
								<label for="little_sis">จำนวนน้องสาว</label>
							    <input type="text" class="form-control" name="little_sis" value=""  placeholder="">
							</div>

							<div class="form-group col-md-3">
								<label for="son_of_man">เป็นบุตรคนที่</label>
							    <input type="text" class="form-control" name="son_of_man" value=""  placeholder="">
							</div>

							<div class="clearfix"></div>

							<p class="col-md-12"><strong>ข้อมูลบิดา - มารดา</strong></p>

							<div class="form-group col-md-6">
								<label for="relation_parent">สถานภาพสมรสของบิดามารดา</label>
							    <select name="relation_parent" class="form-control" id="">
									<option>อยู่ด้วยกันจดทะเบียนสมรส</option>
									<option>อยู่ด้วยกันไม่จดทะเบียนสมรส</option>
									<option>หย่า</option>
								</select>
							</div>

							<div class="clearfix"></div>

							<div class="form-group col-md-6">
								<label for="idcard_father">เลขบัตรประชาชนบิดา</label>
							    <input type="text" class="form-control" name="idcard_father" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label>คำนำหน้า</label>
								<div class='radio'>
									
								
									<label>
										<input type="radio" name="prefix_father" value="นาย"> นาย
									</label>

									<label>
										<input type="radio" name="prefix_father" value="นาง"> นาง
									</label>
								
									<label>
										<input type="radio" name="prefix_father" value="นางสาว"> นางสาว
									</label>
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<label for="name_father">ชื่อบิดา</label>
							    <input type="text" class="form-control" name="name_father" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="surname_father">นามสกุลบิดา</label>
							    <input type="text" class="form-control" name="surname_father" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="salary_father">รายได้ต่อเดือน</label>
							    <input type="text" class="form-control" name="salary_father" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="mobile_father">เบอร์ติดต่อ</label>
							    <input type="text" class="form-control" name="mobile_father" value=""  placeholder="">
							</div>

							<div class="clearfix"></div>

							<div class="form-group col-md-6">
								<label for="idcard_mother">เลขบัตรประชาชนมารดา</label>
							    <input type="text" class="form-control" name="idcard_mother" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label>คำนำหน้า</label>
								<div class='radio'>
									
								
									<label>
										<input type="radio" name="prefix_mother" value="นาย"> นาย
									</label>

									<label>
										<input type="radio" name="prefix_mother" value="นาง"> นาง
									</label>
								
									<label>
										<input type="radio" name="prefix_mother" value="นางสาว"> นางสาว
									</label>
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<label for="name_mother">ชื่อมารดา</label>
							    <input type="text" class="form-control" name="name_mother" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="surname_mother">นามสกุลมารดา</label>
							    <input type="text" class="form-control" name="surname_mother" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="salary_mother">รายได้ต่อเดือน</label>
							    <input type="text" class="form-control" name="salary_mother" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="mobile_mother">เบอร์ติดต่อ</label>
							    <input type="text" class="form-control" name="mobile_mother" value=""  placeholder="">
							</div>

							<div class="clearfix"></div>

							<p class="col-md-12"><strong>ข้อมูลผู้ปกครอง</strong></p>

							<div class="form-group col-md-12">
								<label for="relation">ความเกี่ยวข้องกับนักเรียน</label>
							    <input type="text" class="form-control" name="relation" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="idcard_relation">เลขบัตรประชาชนผู้ปกครอง</label>
							    <input type="text" class="form-control" name="idcard_relation" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label>คำนำหน้า</label>
								<div class='radio'>
									
								
									<label>
										<input type="radio" name="prefix_relation" value="นาย"> นาย
									</label>

									<label>
										<input type="radio" name="prefix_relation" value="นาง"> นาง
									</label>
								
									<label>
										<input type="radio" name="prefix_relation" value="นางสาว"> นางสาว
									</label>
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<label for="name_relation">ชื่อผู้ปกครอง</label>
							    <input type="text" class="form-control" name="name_relation" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="surname_relation">นามสกุลผู้ปกครอง</label>
							    <input type="text" class="form-control" name="surname_relation" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="salary_relation">รายได้ต่อเดือน</label>
							    <input type="text" class="form-control" name="salary_relation" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="mobile_relation">เบอร์ติดต่อ</label>
							    <input type="text" class="form-control" name="mobile_relation" value=""  placeholder="">
							</div>


							<div class="clearfix"></div>

							<p class="col-md-12"><strong>ที่อยู่ตามทะเบียนบ้าน</strong></p>

							<div class="form-group col-md-6">
								<label for="address_id">รหัสประจำบ้าน</label>
							    <input type="text" class="form-control" name="address_id" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="address_no">บ้านเลขที่</label>
							    <input type="text" class="form-control" name="address_no" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="moo">หมู่ที่</label>
							    <input type="text" class="form-control" name="moo" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="road">ถนน</label>
							    <input type="text" class="form-control" name="road" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="tumbon">ตำบล</label>
							    <input type="text" class="form-control" name="tumbon" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="amphur">อำเภอ</label>
							    <input type="text" class="form-control" name="amphur" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="province">จังหวัด</label>
							    <input type="text" class="form-control" name="province" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="zipcode">รหัสไปรษณีย์</label>
							    <input type="text" class="form-control" name="zipcode" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="address_mobile">หมายเลขโทรศัพท์</label>
							    <input type="text" class="form-control" name="address_mobile" value=""  placeholder="">
							</div>

							<div class="clearfix"></div>

							<p class="col-md-12"><strong>ที่อยู่ปัจจุบัน</strong></p>

							<div class="form-group col-md-6">
								<label for="address_id_2">รหัสประจำบ้าน</label>
								<input type="text" class="form-control" name="address_id_2" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="address_no_2">บ้านเลขที่</label>
								<input type="text" class="form-control" name="address_no_2" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="moo_2">หมู่ที่</label>
								<input type="text" class="form-control" name="moo_2" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="road_2">ถนน</label>
								<input type="text" class="form-control" name="road_2" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="tumbon_2">ตำบล</label>
								<input type="text" class="form-control" name="tumbon_2" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="amphur_2">อำเภอ</label>
								<input type="text" class="form-control" name="amphur_2" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="province_2">จังหวัด</label>
								<input type="text" class="form-control" name="province_2" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="zipcode_2">รหัสไปรษณีย์</label>
								<input type="text" class="form-control" name="zipcode_2" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="address_mobile_2">หมายเลขโทรศัพท์</label>
								<input type="text" class="form-control" name="address_mobile_2" value=""  placeholder="">
							</div>

							

							<div class="clearfix"></div>

							<p class="col-md-12"><strong>ข้อมูลเพิ่มเติม</strong></p>

							<div class="form-group col-md-6">
								<label for="height">ส่วนสูง</label>
								<input type="text" class="form-control" name="height" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="weight">น้ำหนัก</label>
								<input type="text" class="form-control" name="weight" value=""  placeholder="">
							</div>

							<div class="form-group col-md-12">
								<div class="checkbox">
									<label for="">
										<input type="checkbox" name="disadvantage" value="1"> ด้อยโอกาส
									</label>

									<label for="">
										<input type="checkbox" name="live" value="1"> นอนประจำโรงเรียน
									</label>

									<label for="">
										<input type="checkbox" name="grab" value="1"> ขาดแคลนเครื่องแบบ
									</label>

									<label for="">
										<input type="checkbox" name="stationary" value="1"> ขาดแคลนเครื่องเขียน
									</label>

									<label for="">
										<input type="checkbox" name="lose_class" value="1"> ขาดแคลนแบบเรียน
									</label>

									<label for="">
										<input type="checkbox" name="lose_food" value="1"> ขาดแคลนอาหาร
									</label>

									<label for="">
										<input type="checkbox" name="disabled" value="1"> พิการ
									</label>

									
								</div>
							</div>

							<div class="form-group col-md-12">
								<label for="religion">ความพิการ</label>
							    <select name="did" class="form-control" id="">
									<option value="0">ปกติ</option>
									<?php foreach($disabled as $ds):?>
										<option value="<?php echo $ds->did;?>"><?php echo $ds->dname;?></option>
									<?php endforeach;?>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="gravel_road">ระยะทางจากบ้านถึงโรงเรียน (ลูกรัง)</label>
								<input type="text" class="form-control" name="gravel_road" value=""  placeholder="">
							</div>


							<div class="form-group col-md-6">
								<label for="paved_road">ระยะทางจากบ้านถึงโรงเรียน (ลาดยาง)</label>
								<input type="text" class="form-control" name="paved_road" value=""  placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="home_water">ระยะทางจากบ้านถึงโรงเรียน (ทางน้ำ)</label>
								<input type="text" class="form-control" name="home_water" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="home_school">ระยะเวลาจากบ้านถึงโรงเรียน</label>
								<input type="text" class="form-control" name="home_school" value=""  placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="how_to_school">ลักษณะการเดินทาง</label>
								<select name="how_to_school" id="" class="form-control">
									<option>เดินเท้า</option>
									<option>รถส่วนตัว</option>
									<option>พาหนะเสียค่าเดินทาง</option>
									
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="student_type">ประเภทนักเรียน</label>
								<select name="student_type" id="" class="form-control">
									<option>นร. ปกติ</option>
									<option>นร. ไม่ปกติ</option>
								</select>
							</div>

							<div class="form-group col-md-12">
								<label for="remark">สาเหตุที่ไม่ได้รับจัดสรร</label>
								<textarea class="form-control" name="remark" rows="5"></textarea>
							</div>



							







							<div class="form-group col-md-12">
								<button type="submit" name="save" class="btn btn-info">บันทึก</button>
							</div>
							






						</div>
						
					  </div>
					</div>
				</div>

				<div class='col-md-3'>
					<div class="panel panel-default">
					  <div class="panel-heading">ภาพประจำตัวนักเรียน</div>
					  <div class="panel-body">
						<div class="form-group col-md-6">
							<label for="thumbnail">ภาพประจำตัวนักเรียน</label>
						    <input type="file" class="" name="thumbnail" value=""  placeholder="">
						</div>
						
					  </div>
					</div>
				</div>


			</div>

			<?php echo form_close();?>

			  
		</div>
	</div>
	
</div>