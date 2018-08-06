	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ข้อมูลสารสนเทศ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ข้อมูลสารสนเทศ</div>
				  <div class="panel-body">

				  	<div class='row' style="margin-bottom: 10px;">
				  		<div class='col-md-12'>
				    
						    <?php echo form_open('data/search', array('class' => 'form-inline'));?>
							  <div class="form-group">
							    <label class="sr-only" for="exampleInputEmail3">เขตพื้นที่การศึกษา</label>
							    <select class="form-control" name="area_type_id">
							    	<option value="">- - - เขตพื้นที่การศึกษา - - -</option>
							    	<?php foreach($area as $a):?>
							    		<option value="<?php echo $a->area_type_id;?>" <?php echo $a->area_type_id == $this->session->userdata('area_id')  ? 'selected':'';?>><?php echo $a->area_type_name;?></option>
							    	<?php endforeach;?>
							    </select>
							  </div>

							  <?php
					            $type_dat = array(
					              'ป' => 'อื่นๆ',
					              'type1' => 'เล็ก',
					              'type2' => 'กลาง',
					              'type3' => 'ใหญ่',
					              'type4' => 'ใหญ่พิเศษ',
					            ); 
					            ?>

							  <div class="form-group">
							    <label class="sr-only" for="exampleInputEmail3">ขนาดสถานศึกษา</label>
							    <select class="form-control" name="school_size_id">
							    	<option value="">- - - ขนาดสถานศึกษา - - -</option>
							    	<?php foreach($type_dat as $t => $v):?>
					                  <option value="<?php echo $t;?>" <?php echo $t == $this->session->userdata('school_size_id') ? 'selected' : '';?>><?php echo $v;?></option>
					                <?php endforeach;?>
							    </select>
							  </div>

							  <div class="form-group">
							  	<label>ชื่อสถานศึกษา</label>
							  	<input type="text" name="school_name" value="<?php echo $this->session->userdata('school_name');?>" class='form-control'>
							  </div>
							  
							  <button type="submit" class="btn btn-default btn-sm">เรียกข้อมูล</button>
							<?php echo form_close();?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120">รหัสสถานศึกษา</th>
			                      <th>สถานศึกษา</th>
			                      <th width="260">ประเภทการศึกษา</th>
			                      <th width="100">เว็บไซต์</th>
			                      <th width="100">อปท</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php foreach($rs as $r):?>
			                      <tr>
			                        <td><a href="<?php echo site_url('data/id/'.$r->school_id);?>"><?php echo $r->school_id;?></a></td>
			                        <td><?php echo $r->school_name;?></td>
			                        <td><a href="<?php echo site_url('data/id/'.$r->school_id);?>"><?php echo $r->f9;?></a></td>
			                        <td><a href="<?php echo url($r->website);?>" target="_blank"><?php echo $r->website;?></a></td>
			                        <td><a href="<?php echo site_url('data/id/'.$r->school_id);?>"><?php echo $r->f18;?></a></td>
			                      </tr>
			                    <?php endforeach;?>
			                  </tbody>
			                  
			                </table>
			            </div>
			        </div>

				  </div>
				</div>
			</div>


			

		</div>
	</div>

	
