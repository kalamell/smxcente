
	<div class='container'>

		<?php $banner = banner(); $inx = 0;?>



		<?php if(count($banner)>0):?>

		<div class="row" style="margin-bottom: 20px">
			<div class="col-md-12">

				

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <?php foreach($banner as $b):?>
				    	<li data-target="#carousel-example-generic" data-slide-to="<?php echo $inx;?>" class="active"></li>
				    <?php $inx++; endforeach;?>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php $no = 0; foreach ($banner as $b):?>
				  	
				    <div class="item <?php echo $no==0?'active':'';?>">
				      <img src="<?php echo base_url();?>upload/banner/<?php echo $b->path;?>" />
				    </div>

					<?php $no++; endforeach;?>
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  </a>
				</div>

			</div>
		</div>
		<?php endif;?>

		<div class="row">
			
			<div class='col-md-3'>
				<div class="panel panel-default">
				  <div class="panel-heading">school mapping</div>
				  <div class="panel-body">
				    <ul class="nav">
				    	
				    	<?php echo getMenuWebsite();?>
				    	
				    </ul>
				  </div>
				</div>
			</div>


			<div class='col-md-6'>
				<div class="panel panel-default">
				  <div class="panel-heading">ข่าวประชาสัมพันธ์</div>
				  <div class="panel-body">
				    
				    <?php foreach($news as $n):?>

				    	<div class="media" style="border-bottom: 1px solid #e4e4e4; padding-bottom: 20px;">
						  
						  <div class="media-body">
						    <h4 class="media-heading"><?php echo $n->title;?></h4>
						    <?php echo $n->description;?>
						  </div>
						</div>

				    <?php endforeach;?>
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
					    <input type="text" class="form-control required" maxlength="20" minlength="1" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
					    <span class="help-block">ใช้หมายเลขบัตรประชาชน</span>
					  </div>
					  <div class="form-group">
					    <label for="password">รหัสผ่าน</label>
					    <input type="password" class="form-control required" minlength="1" id="password"  name="password" placeholder="รหัสผ่าน">
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

				<div class="panel panel-default">
					<div class="panel-heading">ลิ้งที่เกี่ยวข้อง</div>

					<div class="panel-body">
						<?php $link = getLink();?>
						<div class="list-group">
						<?php foreach($link as $l):?>
							<a href="<?php echo $l->link_url;?>" class='list-group-item'>
								<?php if ($l->link_thumbnail !=''):?>
									<img src="<?php echo base_url();?>upload/<?php echo $l->link_thumbnail;?>" class="img-responsive">
								<?php else:?>
									<?php echo $l->link_name;?>
								<?php endif;?>
							</a>
						<?php endforeach;?>
						</div>	

					</div>
				</div>

			</div>


		</div>
	</div>

	
