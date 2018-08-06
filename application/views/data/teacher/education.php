	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนครูจำแนกตามวุฒิการศึกษาในแต่ละชั้น</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงจำนวนครูจำแนกตามวุฒิการศึกษาในแต่ละชั้น
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
				                      <th width="120">อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan=""><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100">รวม</th>
				                    </tr>
				                    
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($level)) + 2;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($educations as $edu):?>
			                    			
		                    				<tr>
				                    			<td><?php echo $edu->edu_name;?></td>
				                    			<?php 
				                    			$sum = 0;
				                    			foreach($level as $l):?>
						                      		<td width="100" style="text-align: right;">
						                      			<?php 
						                      			

						                      			$num = getTeacherEducationAmphur($am->AMPHUR_ID, $edu->edu_name, $l['level_name']);

						                      			echo $num;
						                      			$sum+=$num;

						$ar[$l['level_id']] = isset($ar[$l['level_id']]) ? $ar[$l['level_id']] + $num : $num;
						                 

						                      			?>
						                      		</td>

						                      		
						                      	
						                    	<?php endforeach;?>
						                    	<td style="text-align: right;"><strong><?php echo $sum;?></strong></td>
						                    </tr>

					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
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

	
