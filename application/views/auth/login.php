
	<div class='container'>

		
		<div class="row">

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">เข้าสู่ระบบ</div>
				  <div class="panel-body">

				  	<div class='row'>
				  		<div class='col-md-4'>
				  			<?php if ($this->session->flashdata('error')):?>
				  				<div class="alert alert-danger">
				  					กรุณาตรวจสอบ username และ password
				  				</div>
				  			<?php endif;?>
						    <?php echo form_open('auth/do_login', array('id' => 'login'));?>
							  <div class="form-group">
							    <label for="username">ชื่อผู้ใช้งาน</label>
							    <input type="text" class="form-control required" id="username" name="username" maxlength="20" minlength="1" placeholder="ชื่อผู้ใช้งาน">
							    <span class="help-block">ใช้หมายเลขบัตรประชาชน</span>
							  </div>
							  <div class="form-group">
							    <label for="password">รหัสผ่าน</label>
							    <input type="password" class="form-control required" id="password"  name="password" placeholder="รหัสผ่าน">
							    <span class="help-block">รหัสผ่าน 8 หลัก</span>
							  </div>
							  
							  <div class="checkbox">
							    <label>
							      <input type="checkbox"> จดจำฉันไว้
							    </label>
							  </div>
							  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> เข้าสู่ระบบ</button><br><br>
							  <p><a href="<?php echo site_url('register');?>">สมัครสมาชิก</a></p>
							<?php echo form_close();?>
						</div>

						<div class='col-md-8'>
						    <p><strong>หมายเหตุ</strong></p>
						    <ul class="">
						    	
						    	<li>Username ใช้ หมายเลขบัตรประชาชนในการใช้งาน</li>
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

	
