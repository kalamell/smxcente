	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนสถานศึกษาในแต่ละสังกัดจำแนกตามอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนสถานศึกษาในแต่ละสังกัดจำแนกตามอำเภอ
					
					<div class="pull-right">
							<a href="<?php echo current_url().'?export=pdf';?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>
						</div>
					
					</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120">อำเภอ</th>
			                      <?php foreach($area as $a):?>
			                      	<th><?php echo $a->area_type_name;?></th>
			                      <?php endforeach;?>
			                      <th width="100">รวม</th>
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
			                    		foreach($area as $a):?>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 

				                      			$num = countSchoolAreaCodeAmphur($a->area_type_id, $am->AMPHUR_ID);
				                      			echo $num == 0 ? 0 : anchor('data/getdata/amphur/'.$am->AMPHUR_ID.'/'.$a->area_type_id, $num, array('data-remote' => "false",
							                      				'data-toggle' => "modal",
							                      				'data-target' => "#modal",
							                      				'class' => ''));


				                      			$sum_num += $num;
												
												$ar[$a->area_type_id] = isset($ar[$a->area_type_id]) ?  $num + $ar[$a->area_type_id] : $num;
				                      			
				                      			?>
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

	
