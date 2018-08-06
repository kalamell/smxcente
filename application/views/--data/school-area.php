	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('data');?>">ข้อมูลสารสนเทศ</a></li>
			  <li class="active">ตารางแสดงที่ตั้งสถานศึกษา การจัดการการศึกษา</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงที่ตั้งสถานศึกษา การจัดการการศึกษา</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120">อำเภอ</th>
			                      <?php foreach($school_type as $st):?>
			                      	<th><?php echo $st->area_code_name;?></th>
			                      <?php endforeach;?>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo count($school_type) + 1;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php foreach($school_type as $st):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			$num = countSchoolAreaCodeDistrcit($st->area_code, $ds->DISTRICT_ID);
							                      			echo $num == 0 ? '&nbsp;' : $num;
							                      			?>
							                      		</td>
							                    	<?php endforeach;?>
							                    </tr>
						                    <?php endif;?>
					                    <?php endforeach;?>
			                    	
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

	
