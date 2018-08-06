	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนเด็กอายุ 1-7 ขวบในแต่ละตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงจำนวนเด็กอายุ 1-7 ขวบในแต่ละตำบล 
				  <div class="pull-right">
							<a href="<?php echo current_url();?>?export=pdf" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>
						</div>
						
				  </div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <?php foreach($age as $a):?>
			                      	<th colspan="3"><?php echo $a['name'];?></th>
			                      <?php endforeach;?>
			                      <th width="100" colspan="3">รวม</th>
			                    </tr>
			                    <tr>
			                    	 <?php foreach($age as $l):?>
			                      		<th>ชาย</th>
			                      		<th>หญิง</th>
			                      		<th>รวม</th>
		                      		<?php endforeach;?>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php
			                    $ar = array(); 
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000; color: #fff;">
			                    		<td style='' colspan="<?php echo (count($age) * 3) + 4;?>">
			                    			<?php echo $am->AMPHUR_NAME;?>
			                    		</td>
			                    	</tr>

			                    	
			                    		<?php 
			                    		foreach($district as $ds):
			                    			if ($ds->AMPHUR_ID == $am->AMPHUR_ID):
					                    		$sum_boy = 0;
					                    		$sum_girl = 0;
					                    		$sum_total = 0;
					                    		$sum = 0;

					                    		echo '<tr><td>'.$ds->DISTRICT_NAME.'</td>';
					                    		foreach($age as $l):?>

					                    			<?php 
					                    			$data_age = getAge7District($ds->DISTRICT_ID, (int)$l['id']);
					                    			$total = 0;
					                    			$count_boy = 0;
					                    			$count_girl = 0;

					                    			if (count($data_age) == 0) {
					                    				?>

					                    				<td width="100" style="text-align: right;">0</td>
					                    				<td width="100" style="text-align: right;">0</td>
					                    				<td width="100" style="text-align: right;">0</td>
					                    				<?php 
					                    			} else {
					                    				$count_boy = $data_age['count_boy'];
					                    				$count_girl = $data_age['count_girl'];
					                    				$total = $data_age['count_boy'] + $data_age['count_girl'];
					                    				$sum_boy+=$count_boy;
					                    				$sum_girl+=$count_girl;
					                    				$sum_total+=$total;
					                    				?>
					                    				<td width="100" style="text-align: right;"><?php echo $count_boy;?></td>
					                    				<td width="100" style="text-align: right;"><?php echo $count_girl;?></td>
					                    				<td width="100" style="text-align: right;">
					                    					<?php 
					                    					
					                    					echo '<strong style="color: green;">'.$total.'</strong>';
					                    					$sum+=$total;
					                    					?>

					                    					
					                    				</td>
					                    				<?php 
					                    			}

	$ar[$l['id']]['boy'] = isset($ar[$l['id']]['boy']) ? $ar[$l['id']]['boy'] + $count_boy : $count_boy;

	$ar[$l['id']]['girl'] = isset($ar[$l['id']]['girl']) ? $ar[$l['id']]['girl'] + $count_girl : $count_girl;

	$ar[$l['id']]['total'] = isset($ar[$l['id']]['total']) ? $ar[$l['id']]['total'] + $total : $total;
					                    			
					                    			?>

						                      		
						                    	<?php endforeach;?>
							                    	<td style="text-align: right"><strong><?php echo $sum_boy;?></strong></td>
							                    	<td style="text-align: right"><strong><?php echo $sum_girl;?></strong></td>
							                    	<td style="text-align: right"><strong><?php echo $sum_total;?></strong></td>
							                    </tr>
					                    <?php 
					                    	endif;
					                    endforeach;?>
					                <?php endforeach;?>

			                    <tr>
			                    	<td style="text-align: right">รวม</td>
			                    	<?php 
			                    	$total_sum1 = 0;
			                    	$total_sum2 = 0;
			                    	$all = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v['boy'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v['girl'].'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v['total'].'</strong></td>';
			                    		$total_sum += $v['total'];
			                    		$total_sum1+=$v['boy'];
			                    		$total_sum2+=$v['girl'];
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo $total_sum1;?></strong></td>
			                    	<td style="text-align: right"><strong><?php echo $total_sum2;?></strong></td>
			                    	<td style="text-align: right"><strong><?php echo $total_sum1 + $total_sum2;?></strong></td>
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

	
