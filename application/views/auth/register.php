
	<div class='container'>

		
		<div class="row">

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">สมัครสมาชิก</div>
				  <div class="panel-body">

				  	<div class='row'>
				  		<div class='col-md-6'>
						    <div class='row'>
						    	<div class="col-md-12">
						    		<div class="alert alert-success " style="display: none;"></div>
						    	</div>
						    	
							    <?php echo form_open('auth/do_register', array('id' => 'register'));?>

								  <div class="form-group col-md-12">
								    <label for="username">ชื่อผู้ใช้งาน</label>
								    <input type="text" class="form-control required" id="username" name="username" maxlength="13" minlength="13" placeholder="ชื่อผู้ใช้งาน">
								    <span class="help-block">ใช้หมายเลขบัตรประชาชน</span>
								  </div>

								  <div class="form-group col-md-6">
								    <label for="password">รหัสผ่าน</label>
								    <input type="password" class="form-control required" minlength="8" maxlength="20" id="password" name="password" placeholder="รหัสผ่าน">
								    <span class="help-block">รหัสผ่าน 8 หลัก</span>
								  </div>

								  <div class="form-group col-md-6">
								    <label for="confirm_password">ยืนยันรหัสผ่าน</label>
								    <input type="password" class="form-control required" minlength="8" maxlength="20"  name="confirm_password" id="confirm_password" placeholder="รหัสผ่าน">
								    <span class="help-block">รหัสผ่าน 8 หลัก</span>
								  </div>

								 

								  <div class="form-group col-md-12">
								    <label for="name">ชื่อ</label>
								    <input type="text" class="form-control required" id="name" name="name" placeholder="ชื่อผู้ใช้งาน">
								  </div>

								  <div class="form-group col-md-12">
								    <label for="surname">นามสกุล</label>
								    <input type="text" class="form-control required" id="surname" name="surname" placeholder="นามสกุล">
								  </div>

								  <div class="form-group col-md-12">
								    <label for="email">อีเมล์</label>
								    <input type="text" class="form-control required" id="email" name="email" placeholder="อีเมล์">
								  </div>

								  <div class="form-group col-md-6">
								    <label for="mobile">เบอร์โทรศัพท์</label>
								    <input type="text" class="form-control required" id="mobile" maxlength="20" minlength="10" name="mobile" placeholder="">
								  </div>

								  <div class="form-group col-md-6">
								    <label for="telephone">เบอร์โทรศัพท์ที่ทำงาน</label>
								    <input type="text" class="form-control required" id="telephone"   maxlength="20" minlength="9"  name="telephone" placeholder="">
								  </div>

								  <div class="form-group col-md-12">
								    <label class="" for="area_type_id">สังกัด</label>
								    <select class="form-control required" name="area_type_id" id="area_type_id">
								    	<option value="">- - - สังกัด - - -</option>
								    	<?php foreach($area as $a):?>
								    		<option value="<?php echo $a->area_type_id;?>"><?php echo $a->area_type_name;?></option>
								    	<?php endforeach;?>
								    </select>
								  </div>

								  <div class="form-group col-md-12">
								    <label class="" for="school">สถานศึกษา</label>
								    <select name="school" class="form-control required">
								    	<option value="">สถานศึกษา</option>
								    	
								    </select>
								  </div>



								  
								  <div class='col-md-12'>
									  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> สมัครสมาชิก</button><br><br>
									  <p><a href="<?php echo site_url('login');?>">เป็นสมาชิกอยู่แล้ว เข้าสู่ระบบ</a></p>
								  </div>

								<?php echo form_close();?>
							</div>
						</div>

						<div class='col-md-6'>
						    <p><strong>หมายเหตุ</strong></p>
						   
						    <ul class="">
						    	
						    	<li>Username ใช้ หมายเลขบัตรประชาชนในการใช้งาน</li>
						    	<li>ใช้รหัสผ่าน 8 หลักในการใช้งาน</li>
						    	<!--<li>หากไม่สามารถเข้าใช้งานได้ ให้ติดต่อที่ 0903631399 และ 061646246</li>
						    	<li>เนื่องจาก ข้อมูลของสถานศึกษาและส่วนที่เกี่ยวข้องมีความหลายหลายและมีปริมาณเยอะ ซึ่งตอนนี้อยู่ในระหว่างการจัดทำ</li>
						    	<li>ผู้จัดทำ <a href="https://www.facebook.com/issaree17">https://www.facebook.com/issaree17</a></li>-->
						    </ul>
						</div>



					</div>

				  </div>
				</div>

			</div>


		</div>
	</div>

	
