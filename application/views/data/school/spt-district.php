	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนสถานศึกษาใน สพฐ.กับหน่วยงานอื่น จำแนกตามตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนสถานศึกษาใน สพฐ.กับหน่วยงานอื่น จำแนกตามตำบล</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120">อำเภอ</th>
			                      <?php foreach($level as $l):?>
			                      	<th><?php echo $l['level_name'];?></th>
			                      <?php endforeach;?>
			                      <th width="100">อัตราส่วน</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo count($level) + 2;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php 
					                    			$sum = 0;
					                    			$num1 = 0;
					                    			$num2 = 0;
					                    			foreach($level as $l):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			
$num = countSchoolSptDistrictOnly($ds->DISTRICT_ID, $l['level_id']);
							                      			
							                      			echo $num;

							                      			if ($l['level_id'] == 'spt') {
							                      				$num1 = $num;
							                      			} else {
							                      				$num2 = $num;
							                      			}
							                      			
							                      			$sum+= $num;

							                      			$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;

							                 

							                      			?>
							                      		</td>
							                      	
							                    	<?php endforeach;?>
							                    	<td style="text-align: right;"><strong><?php echo getRatio($num1, $num2);?></strong></td>
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
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		if ($_a == 0) {
			                    			$num1 = $v;
			                    		}

			                    		if ($_a == 1) {
			                    			$num2 = $v;
			                    		}

			                    		$total_sum += $v;
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo getRatio($num1, $num2);?></strong></td>
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

	
