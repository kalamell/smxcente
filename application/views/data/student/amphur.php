	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนนักเรียน ชาย หญิง รวม ในแต่ละสังกัดจำแนกตามอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนนักเรียน ชาย หญิง รวม ในแต่ละสังกัดจำแนกตามอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <?php foreach($area as $a):?>
			                      	<th colspan="3"><?php echo $a->area_type_name;?></th>
			                      <?php endforeach;?>
			                      <th rowspan="2"width="100">รวม</th>
			                    </tr>
			                    <tr>
			                    	<?php foreach($area as $a):?>
			                      	<th>ชาย</th>
			                      	<th>หญิง</th>
			                      	<th>รวม</th>
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
			                    		$sum = 0;
			                    		foreach($area as $a):?>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 

				                      			$num1 = countDataStudentAmphur($a->area_type_id, $am->AMPHUR_ID, 'boy');
							                    echo $num1;
							                    ?>
				                      			
				                      		</td>
				                      		<td style="text-align: right;">
				                      			<?php 

				                      			$num2 = countDataStudentAmphur($a->area_type_id, $am->AMPHUR_ID, 'girl');
							                    echo $num2;
							                    ?>

				                      		</td>
				                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			$total = $num1 + $num2;
							                      			$sum+=$total;
							                      			echo $total;
							                      			?>
							                      		</td>


							                     <?php 
							                     
							                      $ar[$a->area_type_id]['boy'] = isset($ar[$a->area_type_id]['boy']) ?  $ar[$a->area_type_id]['boy'] + $num1 : $num1;
				                      			
				              $ar[$a->area_type_id]['girl'] = isset($ar[$a->area_type_id]['girl']) ?  $ar[$a->area_type_id]['girl'] + $num2 : $num2;

				              $ar[$a->area_type_id]['total'] = isset($ar[$a->area_type_id]['total']) ?  $ar[$a->area_type_id]['total'] + $total : $total;
				                      			
				                      			

							                     ?>
							                      	
				                    	<?php endforeach;?>
				                    	<td style="text-align: right"><strong><?php echo $sum;?></strong></td>
				                    </tr>
			                    <?php endforeach;?>

			                    <tr>
			                    	<td style="text-align: right">รวม</td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong style="font-size: 11px;">'.$v['boy'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong style="font-size: 11px;">'.$v['girl'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong style="font-size: 11px;">'.$v['total'].'</strong></td>';

			                    		$total_sum+=$v['total'];
			                    		
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

	
