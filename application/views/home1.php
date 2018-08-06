
	<div class='container'>

		
		<div class="row">
			
			<div class='col-md-9'>
				<div class="panel panel-default">
				  <div class="panel-heading">ปริมานงานของการสำรวจและจัดทำ school mapping</div>
				  <div class="panel-body">
				    <ul>
				    	<li>สำรวจและจัดทำข้อมูลประกอบด้วย
				    		<ul>
				    			<li><a href="<?php echo site_url('data/listschool');?>">ตารางแสดงที่ตั้งสถานศึกษา แยกสังกัด แยกอำเภอ</a></li>
				    			<li>ตารางแสดงจำนวนนักเรียน
				    				<ul>
				    					<li><a href="<?php echo site_url('data/listgender');?>">ชาย หญิง</a></li>
				    					<li><a href="<?php echo site_url('data/listgender_level');?>">ชาย หญิง แยกแต่ละชั้น</a></li>
				    					<li><a href="<?php echo site_url('data/listroom');?>">ห้องเรียน แยกแต่ละชั้น</a></li>
				    					<li><a href="<?php echo site_url('data');?>">แยกสังกัด</a></li>
				    					<li><a href="<?php echo site_url('data');?>">จำนวนนักเรียน เฉาพะ 3-5 ขวบ ทั้งหมดในเขตบริการ (ทร 14)</a></li>
				    					<li><a href="<?php echo site_url('data');?>">จำนวนนักเรียนทั้งหมดในเขตบริการ (ทร  14) ท่เข้าเรียนในสถานศึกษารายโรง / คน</a></li>
				    				</ul>
				    			</li>
				    			<li>ตารางแสดงจำนวนครู
				    				<ul>
				    					<li><a href="<?php echo site_url('data/listteacher');?>">จำแนกตามวุฒิการศึกษา แยกแต่ละชั้น</a></li>
				    					<li><a href="<?php echo site_url('data/academic_standing');?>">วิทยฐานะ แยกแต่ละชั้น</a></li>
				    					<li><a href="">อายุ แยกแต่ละชั้น</a></li>
				    					<li><a href="">แยกสังกัด แยกแต่ละชั้น</a></li>
				    					<li><a href="">จำนวนครูที่มีวุฒิการศึกษาตรงตามสาา (การศึกษาปฐมวัย)/คน แยกแต่ละชั้น</a></li>
				    					<li><a href="">จำนวนครู<u>ที่ไม่มี</u>วุฒิการศึกษาตรงตามสาา (การศึกษาปฐมวัย)/คน แยกแต่ละชั้น</a></li>
				    					<li><a href="">จำนวนครูพี่เลี้ยงที่มีวุฒิการศึกษาตรงตามสาา (การศึกษาปฐมวัย)/คน แยกแต่ละชั้น</a></li>
				    					<li><a href="">จำนวนครูพี่เลี้ยง <u>ที่ไม่มี</u>วุฒิการศึกษาตรงตามสาา (การศึกษาปฐมวัย)/คน แยกแต่ละชั้น</a></li>
				    				</ul>
				    			</li>
				    			<li>
				    				ตารางคาดคะเนจำนวนนักเรียน ระดับจังหวัด
				    				<ul>
				    					<li><a href="">คาดประชากรอายุ 1-7 ปี</a></li>
				    					<li><a href="">คาดคะเนอัตรการเข้าเรียน (Admission rate) ของนักเรียนชั้น อ.1( 3 ขวบ)</a></li>
				    					<li><a href="">คาดคะเนอัตราการเลื่อนชั้น (Admission rate) อ.1 - อ.3</a></li>
				    					<li><a href=""></a></li>
				    					<li><a href="">คาดคะเนอัตรการเข้าเรียนต่อ (Admission rate) ของนักเรียนชั้น อ.3</a></li>
				    				</ul>
				    			</li>
				    			<li>
				    				าตารางคาดคะเนจำนวนนักเรียน ระดับสถานศึกษา
				    				<ul>
				    					<li><a href="">คาดประชากรอายุ 1-7 ปี</a></li>
				    					<li><a href="">คาดคะเนอัตรการเข้าเรียน (Admission rate) ของนักเรียนชั้น อ.1( 3 ขวบ)</a></li>
				    					<li><a href="">คาดคะเนอัตราการเลื่อนชั้น (Admission rate) อ.1 - อ.3</a></li>
				    					<li><a href=""></a></li>
				    					<li><a href="">คาดคะเนอัตรการเข้าเรียนต่อ (Admission rate) ของนักเรียนชั้น อ.3</a></li>
				    					<li><a href="">ตารางแสดงขนาดพื้นที่สถานศึกษา</a></li>
				    					<li><a href="">พิกัดดาวเทียม GPS</a></li>
				    				</ul>
				    			</li>
				    			<li>
				    				<a href="">แผนที่ดาวเทียวแยกสังกัด แยกอำเภอ</a>
				    			</li>

				    		</ul>
				    	</li>

				    </ul>
				  </div>
				</div>
			</div>


			<div class='col-md-3'>
				<div class="panel panel-default">

				  <?php if (isMember()):?>
				  	<div class="panel-heading">ยินดีต้อนรับ</div>
					  <div class="panel-body">
					    
					    <div class="list-group">
						  
						  <a href="<?php echo site_url('member');?>" class="list-group-item"><i class="glyphicon glyphicon-user"></i> ข้อมูลผู้ใช้งาน</a>

						  <a href="<?php echo site_url('member/school');?>" class="list-group-item"><i class="glyphicon glyphicon-home"></i> ข้อมูลพื้นฐานสถานศึกษา</a>


  <a href="<?php echo site_url('logout');?>" onclick="javascript: return confirm('ต้องการออกจากระบบหรือไม่');" class="list-group-item"><i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ</a>
						</div>
					  </div>

				  <?php else:?>
				  <div class="panel-heading">เข้าสู่ระบบ</div>
				  <div class="panel-body">
				    <?php echo form_open('auth/do_login', array('id' => 'login'));?>
					  <div class="form-group">
					    <label for="username">ชื่อผู้ใช้งาน</label>
					    <input type="text" class="form-control required" maxlength="13" minlength="13" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
					    <span class="help-block">ใช้หมายเลขบัตรประชาชน</span>
					  </div>
					  <div class="form-group">
					    <label for="password">รหัสผ่าน</label>
					    <input type="password" class="form-control required" minlength="8" id="password"  name="password" placeholder="รหัสผ่าน">
					    <span class="help-block">รหัสผ่าน 8 หลัก</span>
					  </div>
					  
					  <div class="checkbox">
					    <label>
					      <input type="checkbox"> จดจำฉันไว้
					    </label>
					  </div>
					  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> เข้าสู่ระบบ</button>
					  <p><a href="<?php echo site_url('register');?>">สมัครสมาชิก</a></p>
					<?php echo form_close();?>
				  </div>
				  <?php endif;?>

				</div>

			</div>


		</div>
	</div>

	
