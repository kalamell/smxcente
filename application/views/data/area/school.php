	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงพื้นที่และพิกัดของแต่ละสถานศึกษา</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงพื้นที่และพิกัดของแต่ละสถานศึกษา</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="" rowspan="2">อำเภอ</th>
			                      <th width="120" colspan="3">พื้นที่</th>
			                      <th width="120" colspan="2">พิกัด</th>                    
			                    </tr>
			                    <tr>
			                    	

		                      		<th>ไร่</th>
		                      		<th>งาน</th>
		                      		<th>ตารางวา</th>

		                      		<th>Latitude</th>
		                      		<th>Longitude</th>


			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php
			                    $ar = array(); 
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000; color: #fff">
			                    		<td style='' colspan="16">
			                    			<?php echo $am->AMPHUR_NAME;?>  <a href="<?php echo site_url('data/area/map?amphur_id='.$am->AMPHUR_ID);?>" class='btn btn-sm btn-info'><i class="fa fa-map"></i> ดูแผนที่</a>
			                    		</td>
			                    	</tr>

			                    		<?php foreach ($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr style="background-color: #888; color: #fff; ">
			                    					<td colspan="16">ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
			                    				</tr>

			                    					<?php $school = getSchoolFromDistrict($ds->DISTRICT_ID);?>

			                    					<?php foreach($school as $s):?>
			                    						<tr>
				                    						<td><a href="<?php echo site_url('data/area/map?school_id='.$s->school_id);?>">สถานศึกษา<?php echo $s->school_name;?></a></td>
						                    				<td style="text-align: right"><?php echo $s->land_rai;?></td>
								                    		<td style="text-align: right"><?php echo $s->land_work;?></td>
								                    		<td style="text-align: right"><?php echo $s->land_wa;?></td>

								                    		<td style="text-align: right"><?php echo $s->lat;?></td>

								                    		<td style="text-align: right"><?php echo $s->lng;?></td>
									                    </tr>

								                    <?php endforeach;?>
							                    </tr>

			                    			<?php endif;?>

			                    		<?php endforeach;?>

			                    		
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

	
