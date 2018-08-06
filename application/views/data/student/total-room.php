	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนนักเรียน 3-5 ขวบในแต่ละตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนนักเรียน 3-5 ขวบในแต่ละตำบล


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
			                      <th width="220" rowspan="2">อำเภอ</th>
			                      <th width="150" colspan="3">อายุ 3 - 5 ขวบ</th>
			                    </tr>
			                    <tr>
			                    	<th>ชาย</th>
			                    	<th>หญิง</th>
			                    	<th>รวม</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="5"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr style="background-color: #ccc;">
					                    			<td colspan="5">ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    		</tr>
					                    		

					                    			<?php $school = getSchoolFromDistrict($ds->DISTRICT_ID);?>

					                    			<?php foreach($school as $s):?>
					                    				<tr>
						                    			<td><?php echo 'สถานศึกษา '.$s->school_name;?></td>
						                    			<td style="text-align: right;">0</td>
						                    			<td style="text-align: right;">0</td>					                    	
					                    				<td style="text-align: right"><strong>0</strong></td>
					                    				</tr>
				                    				<?php endforeach;?>
							                    
						                    <?php endif;?>
					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
			                    	<td style="text-align: right"><strong>0</strong></td>
				                    <td style="text-align: right"><strong>0</strong></td>
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

	
