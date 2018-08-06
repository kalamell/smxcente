	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงอัตราการเรียนต่อชั้น ม.4 (Transition Rate) ในแต่ละสถานศึกษา </li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงอัตราการเรียนต่อชั้น ม.4 (Transition Rate) ในแต่ละสถานศึกษา</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <th width="120" colspan="3">ม.3</th>
			                      <th width="120" rowspan="2">Trans.</th>
			                      <th width="120" colspan="3">ม.4</th>
			                      <th width="120" colspan="3">สพฐ.</th>
			                      <th width="120" colspan="3">สังกัดอื่น</th>
			                      <th width="120">สัดส่วน</th>			                      
			                    </tr>
			                    <tr>
			                    	

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>สพฐ:สังกัดอื่น</th>



			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php
			                    $ar = array(); 
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000; color: #fff">
			                    		<td style='' colspan="16">
			                    			<?php echo $am->AMPHUR_NAME;?>
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
				                    						<td>สถานศึกษา<?php echo $s->school_name;?></td>
						                    				<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>

								                    		<td style="text-align: right">0</td>

								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>

								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>

								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>
								                    		<td style="text-align: right">0</td>

									                    	<td style="text-align: right"><strong>0:0</strong></td>
									                    </tr>

								                    <?php endforeach;?>
							                    </tr>

			                    			<?php endif;?>

			                    		<?php endforeach;?>

			                    		
				                    </tr>
			                    <?php endforeach;?>

			                    <tr>
			                    	<td style="text-align: right">รวม</td>
			                    	
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0</strong></td>


			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0:0</strong></td>
			                    </tr>
			                  </tbody>
			                  
			                </table>

			            </div>
			        </div>

				  </div>
				</div>
			</div>


			

		</div>
	</div>

	
