	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนเด็กเข้าเรียนอนุบาล 2 สู่ อนุบาล 3 (Admission Rate) ในแต่ละตำบล </li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงจำนวนเด็กเข้าเรียนอนุบาล 2 สู่ อนุบาล 3 (Admission Rate) ในแต่ละตำบล </div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <th width="120" colspan="3">อนุบาล 2</th>
			                      <th width="120" rowspan="2">Admis.</th>
			                      <th width="120" colspan="3">อนุบาล 3</th>
			                      <th width="120" colspan="3">สพฐ.</th>
			                      <th width="120" colspan="3">สังกัดอื่น</th>
			                      <th width="120">สัดส่วน</th>			                      
			                    </tr>
			                    <tr>
			                    	

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

		                      		<th>สพฐ:สังกัดอื่น</th>



			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php
			                    $ar = array(); 
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000; color: #fff">
			                    		<td style='' colspan="16">
			                    			<?php echo $am->AMPHUR_NAME;?>
			                    		</td>
			                    	</tr>

			                    		<?php foreach ($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
			                    					<td><?php echo $ds->DISTRICT_NAME;?></td>
				                    				
				                    				<td style="text-align: right">
						                    			<?php 
						                    			$num3 = getLevelA2District($ds->DISTRICT_ID, 'boy');
						                    			echo $num3;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num4 = getLevelA2District($ds->DISTRICT_ID, 'girl');
						                    			echo $num4;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$total1 = $num3 + $num4;
						                    			echo $total1;
						                    			?>
						                    		</td>

						                    		<td style="text-align: right">0</td>

						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num3 = getLevelA3District($ds->DISTRICT_ID, 'boy');
						                    			echo $num3;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num4 = getLevelA3District($ds->DISTRICT_ID, 'girl');
						                    			echo $num4;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$total2 = $num3 + $num4;
						                    			echo $total2;
						                    			?>
						                    		</td>

						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num3 = getLevelA3District($ds->DISTRICT_ID, 'boy', 'spt');
						                    			echo $num3;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num4 = getLevelA3District($ds->DISTRICT_ID, 'girl', 'spt');
						                    			echo $num4;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$total1 = $num3 + $num4;
						                    			echo $total1;
						                    			?>
						                    		</td>

						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num3 = getLevelA3District($ds->DISTRICT_ID, 'boy', 'oth');
						                    			echo $num3;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$num4 = getLevelA3District($ds->DISTRICT_ID, 'girl', 'oth');
						                    			echo $num4;
						                    			?>
						                    		</td>
						                    		<td style="text-align: right">
						                    			<?php 
						                    			$total2 = $num3 + $num4;
						                    			echo $total2;
						                    			?>
						                    		</td>

							                    	<td style="text-align: right"><strong><?php echo $total1.':'.$total2;?></strong></td>
							                    </tr>

			                    			<?php endif;?>

			                    		<?php endforeach;?>

			                    		
				                    </tr>
			                    <?php endforeach;?>

			                    <tr>
			                    	<td style="text-align: right">รวม</td>
			                    	
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0</strong></td>


			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>

			                    	<td style="text-align: right"><strong>0:0</strong></td>
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

	
