	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนสถานศึกษาในแต่ละสังกัดจำแนกตามตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนสถานศึกษาในแต่ละสังกัดจำแนกตามตำบล
						<div class="pull-right">
							<a href="<?php echo site_url('data/school/district?export=pdf');?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>
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
			                      <th width="120" style="text-align:  right;">รวม</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo count($area) + 2;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php 
					                    			$sum = 0;
					                    			foreach($area as $a):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			$num = countSchoolAreaCodeDistrcit($a->area_type_id, $ds->DISTRICT_ID);

							                      			echo $num == 0 ? 0 : anchor('data/getdata/district/'.$ds->DISTRICT_ID.'/'.$a->area_type_id, $num, array('data-remote' => "false",
							                      				'data-toggle' => "modal",
							                      				'data-target' => "#modal",
							                      				'class' => ''));

							                      			$sum+= $num;

							                      			$ar[$a->area_type_id] = isset($ar[$a->area_type_id]) ?  $num + $ar[$a->area_type_id] : $num;

							                 

							                      			?>
							                      		</td>
							                      	
							                    	<?php endforeach;?>
							                    	<td style="text-align: right;"><strong><?php echo $sum;?></strong></td>
							                    </tr>
						                    <?php endif;?>
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

	
