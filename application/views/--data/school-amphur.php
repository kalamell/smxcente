	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('data');?>">ข้อมูลสารสนเทศ</a></li>
			  <li class="active">ตารางสถานศึกษา แยกอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางสถานศึกษา  แยกอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120">อำเภอ</th>
			                      <?php foreach($school_type as $st):?>
			                      	<th><?php echo $st->school_type_name;?></th>
			                      <?php endforeach;?>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php foreach($amphur as $am):?>
			                    	<tr>
			                    		<td style='' colspan="">
			                    			<?php echo $am->AMPHUR_NAME;?>
			                    			
			                    		</td>
			                    	
			                    		<?php foreach($school_type as $st):?>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 
				                      			$num = countSchoolAmphur($st->school_type_id, $am->PROVINCE_ID, $am->AMPHUR_ID);
				                      			echo $num == 0 ? '&nbsp;' : $num;
				                      			?>
				                      		</td>
				                    	<?php endforeach;?>
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

	
