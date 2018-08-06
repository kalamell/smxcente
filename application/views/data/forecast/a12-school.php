	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนเด็กเข้าเรียนอนุบาล 1 สู่ อนุบาล 2 (Admission Rate) ในแต่ละสถานศึกษา </li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนเด็กเข้าเรียนอนุบาล 1 สู่ อนุบาล 2 (Admission Rate) ในแต่ละสถานศึกษา</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <th width="120" colspan="3">อนุบาล 1</th>
			                      <th width="120" rowspan="2">Admis.</th>
			                      <th width="120" colspan="3">อนุบาล 2</th>
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
				                    						<td><?php echo $s->school_name;?></td>
						                    				
						                    				<td style="text-align: right">
								                    			<?php 
								                    			$num1 = getLevelA1School($s->school_id, 'boy');
								                    			echo $num1;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num2 = getLevelA1School($s->school_id, 'girl');
								                    			echo $num2;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$total = $num1 + $num2;
								                    			echo $total;
								                    			?>
								                    		</td>

								                    		<td style="text-align: right">0</td>

								                    		
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num1 = getLevelA2School($s->school_id, 'boy');
								                    			echo $num1;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num2 = getLevelA2School($s->school_id, 'girl');
								                    			echo $num2;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$total = $num1 + $num2;
								                    			echo $total;
								                    			?>
								                    		</td>

								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num1 = getLevelA2School($s->school_id, 'boy', 'spt');
								                    			echo $num1;


								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num2 = getLevelA2School($s->school_id, 'girl', 'spt');

								                    			echo $num2;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$total1 = $num1 + $num2;
								                    			echo $total1;
								                    			?>
								                    		</td>

								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num1 = getLevelA2School($s->school_id, 'boy', 'oth');
								                    			echo $num1;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$num2 = getLevelA2School($s->school_id, 'girl', 'oth');
								                    			echo $num2;
								                    			?>
								                    		</td>
								                    		<td style="text-align: right">
								                    			<?php 
								                    			$total2 = $num1 + $num2;
								                    			echo $total2;
								                    			?>
								                    		</td>

									                    	<td style="text-align: right"><strong><?php echo $total1;?>:<?php echo $total2;?></strong></td>
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

	
