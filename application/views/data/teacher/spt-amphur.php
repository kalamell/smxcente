	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">  ตารางแสดงครูใน สพฐ.กับหน่วยงานอื่น จำแนกตามอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">  ตารางแสดงครูใน สพฐ.กับหน่วยงานอื่น จำแนกตามอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
								<table class="table table-bordered table-striped">
				                  <thead>
				                    <tr>
				                      <th width="120" >อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan=""><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100" >อัตราส่วน</th>
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
				                    		$num1 = 0;
				                    		$num2 = 0;
				                    		foreach($level as $l):?>
					                      		<td width="100" style="text-align: right;">
					                      			<?php 

					                      			if ($l['level_id'] == '01') {
					                      				$num = getTeacherTypeSchoolAmphur($am->AMPHUR_ID, 'spt');
					                      				$num1 = $num;
					                      			
					                      			} else {
					                      				$num = getTeacherTypeSchoolAmphur($am->AMPHUR_ID, 'otp');
					                      				$num2 = $num;
					                      			}

					                      			

					                      			echo $num;
					                      			$sum_num += $num;

													$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;
					                      			
					                      			?>
					                      		</td>


					                      		
					                      		</td>

					                    	<?php endforeach;?>
					                    	<td style="text-align: right"><strong><?php echo $sum_num;?></strong></td>
					                    </tr>
				                    <?php endforeach;?>

				                    <tr>
				                    	<td style="text-align: right">รวม</td>
				                    	<?php 
				                    	$total_sum = 0;
				                    	foreach($ar as $_a => $v) {
				                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
				                    		$total_sum += $v;
				                    	}
				                    	?>
				                    	<td style="text-align: right"><strong><?php echo $total_sum;?></strong></td>
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

	
