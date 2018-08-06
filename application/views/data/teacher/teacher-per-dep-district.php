	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงอัตราส่วน ครู:นักเรียน ในสังกัด สพฐ. กับหน่วยงานอื่น จำแนกตามตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงอัตราส่วน ครู:นักเรียน ในสังกัด สพฐ. กับหน่วยงานอื่น จำแนกตามตำบล</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
							<table class="table table-bordered table-striped">
			                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan="3"><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100"  colspan="2">ข้อมูลเปรียบเทียบ</th>
				                    </tr>
				                    <tr>
				                    	<?php foreach($level as $l):?>
					                    	<th>ครู</th>
					                    	<th>นักเรียน</th>
					                    	<th>อัตราส่วน</th>
					                    <?php endforeach;?>
					                    
					                    <?php foreach($level as $l):?>
				                      		<th><?php echo $l['level_name'];?></th>
				                      	<?php endforeach;?>

				                    </tr>
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($level) * 3) + 4;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php 
					                    			$sum = 0;
					                    			$level1 = 0;
					                    			$level2 = 0;
					                    			foreach($level as $l):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			
							                      			if ($l['level_id'] == '01') {
							                      				$teacher = getTeacherTypeSchoolDistrict($ds->DISTRICT_ID, 'spt');
							                      				$level1+=$teacher;
							                      			} else {
							                      				$teacher = getTeacherTypeSchoolDistrict($ds->DISTRICT_ID, 'oth');
							                      				$level2+=$teacher;
							                      			}

							                      			echo $teacher;

							                 

							                      			?>
							                      		</td>

							                      		<td width="100" style="text-align: right;">
							                      			
							                      			<?php 
							                      			if ($l['level_id'] == '01') {
							                      				$student = getStudentTypeDistrict($ds->DISTRICT_ID, 'spt');
							                      				$level1+=$student;
							                      				
							                      			} else {
							                      				$student = getStudentTypeDistrict($ds->DISTRICT_ID, 'oth');
							                      				$level2+=$student;
							                      			}

							                      			echo $student;
							                      			?>

							                      		</td>
							                      	

							                      		<td width="100" style="text-align: right;">
							                      			
							                      			<?php 
							                      			

							                      			echo getRatio($teacher, $student);
$ar[$l['level_id']]['teacher'] = isset($ar[$l['level_id']]['teacher']) ? $ar[$l['level_id']]['teacher'] + $teacher : $teacher;

$ar[$l['level_id']]['student'] = isset($ar[$l['level_id']]['student']) ? $ar[$l['level_id']]['student'] + $student : $student;
							                 

							                      			?>

							                      		</td>
							                      	
							                      	
							                    	<?php endforeach;?>

							                    	<td width="100" style="text-align: right"><strong><?php echo $level1;?></strong></td>
					                    			<td width="100" style="text-align: right"><strong><?php echo $level2;?></strong></td>

							                    </tr>
						                    <?php endif;?>
					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<?php 
				                    	$total_sum = 0;
				                    	$num1 = 0;
				                    	$num2 = 0;

				                    	
				                    	//print_r($ar);

				                    	foreach($ar as $_a => $v) {
				                    		echo '<td style="text-align: right;"><strong>'.$v['teacher'].'</strong></td>';
				                    		echo '<td style="text-align: right;"><strong>'.$v['student'].'</strong></td>';
				                    		echo '<td style="text-align: right;"><strong>'.getRatio($v['teacher'], $v['student']).'</strong></td>';


				                    		
				                    		if ($_a == '01') {
				                    			$num1 += $v['teacher'];
				                    			$num1 += $v['student'];
				                    		}

				                    		if ($_a == '02') {
				                    			$num2 += $v['teacher'];
				                    			$num2 += $v['student'];
				                    		}


				                    		
				                    	}
				                    	?>
			                    	
			                    	<td width="100" style="text-align: right"><strong><?php echo $num1;?></strong></td>
					                <td width="100" style="text-align: right"><strong><?php echo $num2;?></strong></td>
					                
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
	</div>

	
