	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนนักเรียน 3-5 ขวบในแต่ละอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนนักเรียน 3-5 ขวบในแต่ละอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th >อำเภอ</th>
			                      <th width="150">อายุ 3 - 5 ขวบ</th>
			                      <th width="150">ร้อยละ</th>
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
			                    	
			                    		
				                      	<td style="text-align: right;">
		                    				<?php 
		                    				$num = get3to5Amphur($am->AMPHUR_ID);
		                    				echo $num;
		                    				$total += $num;
		                    				?>
		                    			</td>
	                    				
	                    				<?php 
	                    				$percent = ($num / $all_total) * 100;
	                    				?>
	                    				<td style="text-align: right"><strong><?php echo $percent;?></strong></td>

				                    </tr>
			                    <?php endforeach;?>

			                    
			                  </tbody>
			                  
			                </table>

			            </div>
			        </div>

				  </div>
				</div>
			</div>


			

		</div>
	</div>

	
