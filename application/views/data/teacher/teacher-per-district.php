	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงนักเรียน สพฐ./หน่วยงานอื่น จำแนกตามชั้นเรียนในแต่ละตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงนักเรียน สพฐ./หน่วยงานอื่น จำแนกตามชั้นเรียนในแต่ละตำบล</div>
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
				                      <th width="100" colspan="3">รวม</th>
				                    </tr>
				                    <tr>
				                    	<?php foreach($level as $l):?>
					                    	<th>ครู</th>
					                    	<th>นักเรียน</th>
					                    	<th>อัตราส่วน</th>
					                    <?php endforeach;?>
					                    <th>ครู</th>
				                    	<th>นักเรียน</th>
				                    	<th>อัตราส่วน</th>
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
					                    			$teacher1 = 0;
					                    			$student1 = 0;
					                    			foreach($level as $l):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			
							                      			if ($l['level_id'] == '01') {
							                      				$teacher = getTeacherTypeSchoolDistrict($ds->DISTRICT_ID, 'spt');
							                      			} else {
							                      				$teacher = getTeacherTypeSchoolDistrict($ds->DISTRICT_ID, 'oth');
							                      			}

							                      			$teacher1+=$teacher;

							                      			echo $teacher;

							                 

							                      			?>
							                      		</td>

							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			if ($l['level_id'] == '01') {
							                      				$student = getStudentTypeDistrict($ds->DISTRICT_ID, 'spt');
							                      				
							                      			} else {
							                      				$student = getStudentTypeDistrict($ds->DISTRICT_ID, 'oth');
							                      			}
							                      			$student1 +=$student;
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
							                      	
							                      	
							                    	<?php endforeach;?>
							                    	<td width="100" style="text-align: right;"><strong><?php echo $teacher1;?></strong></td>
							                    	<td width="100" style="text-align: right;"><strong><?php echo $student1;?></strong></td>
							                    	<td width="100" style="text-align: right;"><strong><?php echo getRatio($teacher1, $student1);?></strong></td>
							                    </tr>
						                    <?php endif;?>
					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
				                    	<td style="text-align: right">รวม</td>
				                    	<?php 
				                    	$total_sum = 0;
				                    	$student = 0;
				                    	$teacher = 0;

				                    	

				                    	foreach($ar as $_a => $v) {
				                    		echo '<td style="text-align: right;"><strong>'.$v['teacher'].'</strong></td>';
				                    		echo '<td style="text-align: right;"><strong>'.$v['student'].'</strong></td>';
				                    		echo '<td style="text-align: right;"><strong>'.getRatio($v['teacher'], $v['student']).'</strong></td>';
				                    		
				                    		$student+=$v['student'];
				                    		$teacher+=$v['teacher'];

				                    		
				                    	}
				                    	?>
				                    	<td style="text-align: right"><strong><?php echo $teacher;?></strong></td>
				                    	<td style="text-align: right"><strong><?php echo $student;?></strong></td>
				                    	<td style="text-align: right"><strong><?php echo getRatio($teacher, $student);?></strong></td>
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

	
