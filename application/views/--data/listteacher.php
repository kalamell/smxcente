	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('data');?>">ข้อมูลสารสนเทศ</a></li>
			  <li class="active">ตารางจำแนกครู แยกสังกัด แยกอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางจำแนกครู แยกสังกัด แยกอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<?php 
							$sum = count($school_type);
							$sum += count($school_type) * 2;
							?>
							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="3">อำเภอ</th>
			                     </tr>
				                     <tr>
					                      <?php foreach($school_type as $st):?>
					                      	<th colspan="2"><?php echo $st->school_type_name;?></th>
					                      <?php endforeach;?>
					                  </tr>
					                  <tr>
					                  	<?php foreach($school_type as $st):?>
					                      	<th>ชาย</th><th>หญิง</th>
					                      <?php endforeach;?>
					                  </tr>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo $sum;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php foreach($school_type as $st):?>
							                      		<td>0</td><td>0</td>
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

	
