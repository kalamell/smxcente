	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนครู/ครูพี่เลี้ยง ที่มี/ไม่มี วุฒิการศึกษาตรงสาขาในแต่ละชั้น</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงจำนวนครู/ครูพี่เลี้ยง ที่มี/ไม่มี วุฒิการศึกษาตรงสาขาในแต่ละชั้น</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
							<table class="table table-bordered table-striped">
			                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan="2"><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100" colspan="2">รวม</th>
				                    </tr>

				                    <tr>

				                    <?php foreach($level as $l):?>
				                      	<th colspan="">ตรง</th>
				                      	<th colspan="">ไม่ตรง</th>
				                      <?php endforeach;?>
				                      <th colspan="">ตรง</th>
				                      	<th colspan="">ไม่ตรง</th>
				                  </tr>
				                    
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($level) * 2) + 3;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($cert as $c):?>
			                    			
		                    				<tr>
				                    			<td><?php echo $c['name'];?></td>
				                    			<?php 
				                    			$sum1 = 0;
				                    			$sum2 = 0;
				                    			foreach($level as $l):?>
						                      		<td width="100" style="text-align: right;">
						                      			<?php 
						                      			

						                      			$num1 = getTeacherCoTarget($am->AMPHUR_ID, $c['name'], 'ไม่ใช่', $l['level_name']);

						                      			echo $num1;

						                      			$sum1+=$num1;
						                      			
						                      			?>
						                      		</td>

						                      		<td width="100" style="text-align: right;">
						                      			<?php 
						                      			$num2 = getTeacherCoTarget($am->AMPHUR_ID, $c['name'], 'ใช่', $l['level_name']);

						                      			echo $num2;

						                      			$sum2+=$num2;

$ar[$l['level_id']]['y'] = isset($ar[$l['level_id']]['y']) ? $ar[$l['level_id']]['y'] + $num1 : $num1;
$ar[$l['level_id']]['n'] = isset($ar[$l['level_id']]['n']) ? $ar[$l['level_id']]['n'] + $num2 : $num2;
						
						                      			?>
						                      		</td>

						                      		
						                      	
						                    	<?php endforeach;?>
						                    	<td style="text-align: right;"><strong><?php echo $sum1;?></strong></td>
						                    	<td style="text-align: right;"><strong><?php echo $sum2;?></strong></td>
						                    </tr>

					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<?php 
			                    	$total_sum1 = 0;
			                    	$total_sum2 = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v['y'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v['n'].'</strong></td>';
			                    		$total_sum1 += $v['y'];
			                    		$total_sum2 += $v['n'];
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo $total_sum1;?></strong></td>
			                    	<td style="text-align: right"><strong><?php echo $total_sum2;?></strong></td>
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

	
