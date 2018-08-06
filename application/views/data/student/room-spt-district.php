	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงนักเรียน สพฐ./หน่วยงานอื่น จำแนกตามชั้นเรียนในแต่ละตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงนักเรียน สพฐ./หน่วยงานอื่น จำแนกตามชั้นเรียนในแต่ละตำบล
				  
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
				                      	<th colspan="<?php echo count($level2) + 1;?>"><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100" rowspan="2">อัตราส่วน</th>
				                    </tr>
				                    <tr>
				                    	<?php foreach($level as $l):?>
					                    	<?php foreach($level2 as $l2):?>
					                    		<th><?php echo $l2['level_name'];?></th>
					                    	<?php endforeach;?>
					                    	<th>0:0</th>
					                    <?php endforeach;?>
				                    </tr>
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($level) * 3) + 2;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php 
					                    			$sum = 0;
					                    			$sum1 = 0;
					                    			$sum2 = 0;
					                    			foreach($level as $l):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			$num1 = getStudentTypeSchoolDistrict($l['level_id'], $ds->DISTRICT_ID, 'spt');
							                      			
							                      		

							                      			
							                      			echo $num1;

							                      			$sum1+=$num1;
							                      			
							                      			

							                      			?>
							                      		</td>

							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			$num2 = getStudentTypeSchoolDistrict($l['level_id'], $ds->DISTRICT_ID, 'opt');
							                      			
							                      			
							                      			
							                      			echo $num2;
							                      			$sum2+=$num;
							                      			
							                      			

							                      			//$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;

							                 

							                      			?>
							                      		</td>
							                      	

							                      	<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			
							                      			
							                      			echo getRatio($num1, $num2);
							                      			
							                      			

							                      			//$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  
  $ar[$l['level_id']]['spt'] = isset($ar[$l['level_id']]['spt']) ? $ar[$l['level_id']]['spt'] + $num1 : $num1;
  $ar[$l['level_id']]['opt'] = isset($ar[$l['level_id']]['opt']) ? $ar[$l['level_id']]['opt'] + $num2 : $num2;

							                 

							                      			?>
							                      		</td>
							                      	
							                      	
							                    	<?php endforeach;?>
							                    	<td style="text-align: right;"><strong><?php echo getRatio($sum1, $sum2);?></strong></td>
							                    </tr>
						                    <?php endif;?>
					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	$sum1 = 0;
			                    	$sum2 = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v['spt'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v['opt'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.getRatio($v['spt'], $v['opt']).'</strong></td>';
			                    		$sum1 += $v['spt'];
			                    		$sum2 += $v['opt'];
			                    		
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo getRatio($sum1, $sum2);?></strong></td>
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

	
