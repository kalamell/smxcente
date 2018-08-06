	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">  ตารางแสดงจำนวนเด็กเข้าเรียนอนุบาล 1 (Admission Rate) ในแต่ละอำเภอ </li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">  ตารางแสดงจำนวนเด็กเข้าเรียนอนุบาล 1 (Admission Rate) ในแต่ละอำเภอ 
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
			                      <th width="120" colspan="3">ประชากร 3 ปี</th>
			                      <th width="120" rowspan="2">Admis.</th>
			                      <th width="120" colspan="3">อนุบาล 1</th>
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
			                    	<tr>
			                    		<td style='' colspan="">
			                    			<?php echo $am->AMPHUR_NAME;?>
			                    		</td>
			                    		<td style="text-align: right">
	                    					<?php 
	                    					$num1 = getAge7Amphur($am->AMPHUR_ID, 3, 'boy');
	                    					if (count($num1) ==0) {
	                    						$num1 = 0;
	                    						echo $num1;
	                    					} else {
	                    						$num1 = $num1->count_boy;
	                    						echo $num1;
	                    					}
	                    					?>
	                    				</td>
			                    		<td style="text-align: right">
			                    			<?php 
	                    					$num2 = getAge7Amphur($am->AMPHUR_ID, 3, 'girl');
	                    					if (count($num2) ==0) {
	                    						$num2 = 0;
	                    						echo $num2;
	                    					} else {
	                    						$num2 = $num2->count_girl;
	                    						echo $num2;
	                    					}
	                    					?>
			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php $total = $num1 + $num2;
			                    			echo $total;
			                    			?>

			                    		</td>

			                    		<td style="text-align: right">0</td>

			                    		<td style="text-align: right">
			                    			<?php 
			                    			$num3 = getLevelA1Amphur($am->AMPHUR_ID, 'boy');
			                    			echo $num3;
			                    			?>
			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php 
			                    			$num4 = getLevelA1Amphur($am->AMPHUR_ID, 'girl');
			                    			echo $num4;
			                    			?>
			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php 
			                    			$total = $num3 + $num4;
			                    			echo $total;
			                    			?>
			                    		</td>

			                    		<td style="text-align: right">
			                    			<?php 
			                    			$num5 = getLevelA1Amphur($am->AMPHUR_ID, 'boy', 'spt');
			                    			echo $num5;
			                    			?>
			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php 
			                    			$num6 = getLevelA1Amphur($am->AMPHUR_ID, 'girl', 'spt');
			                    			echo $num6;
			                    			?>

			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php 
			                    			$total1 = $num5 + $num6;
			                    			echo $total1;
			                    			?>
			                    		</td>

			                    		<td style="text-align: right">
			                    			<?php 
			                    			$num7 = getLevelA1Amphur($am->AMPHUR_ID, 'boy', 'oth');
			                    			echo $num7;
			                    			?>
			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php 
			                    			$num8 = getLevelA1Amphur($am->AMPHUR_ID, 'girl', 'oth');
			                    			echo $num8;
			                    			?>

			                    		</td>
			                    		<td style="text-align: right">
			                    			<?php 
			                    			$total2 = $num7 + $num8;
			                    			echo $total2;
			                    			?>
			                    		</td>


				                    	<td style="text-align: right"><strong><?php echo $total1;?>:<?php echo $total2;?></strong></td>
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

	
