	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงอัตราส่วน ครู:นักเรียน ในสังกัด สพฐ. กับหน่วยงานอื่น จำแนกตามอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงอัตราส่วน ครู:นักเรียน ในสังกัด สพฐ. กับหน่วยงานอื่น จำแนกตามอำเภอ
				  <div class="pull-right">
							<a href="<?php echo current_url();?>?export=pdf" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>
						</div>



				  </div>
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
				                    	<tr>
				                    		<td style='' colspan="">
				                    			<?php echo $am->AMPHUR_NAME;?>
				                    			
				                    		</td>
				                    	
				                    		<?php 
				                    		$sum_num = 0;
				                    		$level1 = 0;
				                    		$level2 = 0;
				                    		foreach($level as $l):?>
					                      		<td width="100" style="text-align: right;">
					                      			<?php 

					                      			
					                      			if ($l['level_id'] == '01') {
					                      				$teacher = getTeacherTypeSchoolAmphur($am->AMPHUR_ID, 'spt');
					                      				$level1+=$teacher;
					                      			} else {
					                      				$teacher = getTeacherTypeSchoolAmphur($am->AMPHUR_ID, 'oth');
					                      				$level2+=$teacher;
					                      			}

					                      			echo $teacher;

					                      			
					                      			?>
					                      		</td>


					                      		<td width="100" style="text-align: right;">
					                      			<?php 

					                      			if ($l['level_id'] == '01') {
					                      				$student = getStudentTypeAmphur($am->AMPHUR_ID, 'spt');
					                      				$level1+=$student;
					                      				
					                      			} else {
					                      				$student = getStudentTypeAmphur($am->AMPHUR_ID, 'oth');
					                      				$level2+=$student;
					                      			}

					                      			echo $student;
					                      			
					                      			?>
					                      		</td>

					                      		<td width="100" style="text-align: right;">
					                      			

					                      			<?php 
$ar[$l['level_id']]['teacher'] = isset($ar[$l['level_id']]['teacher']) ? $ar[$l['level_id']]['teacher'] + $teacher : $teacher;

$ar[$l['level_id']]['student'] = isset($ar[$l['level_id']]['student']) ? $ar[$l['level_id']]['student'] + $student : $student;

												echo getRatio($teacher, $student);
	?>

					                      		</td>


					                      		
					                      		</td>

					                    	<?php endforeach;?>

					                    	<td width="100" style="text-align: right"><strong><?php echo $level1;?></strong></td>
					                    	<td width="100" style="text-align: right"><strong><?php echo $level2;?></strong></td>
					                    </tr>
				                    <?php endforeach;?>

				                    <tr>
				                    	<td style="text-align: right">รวม</td>
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

	
