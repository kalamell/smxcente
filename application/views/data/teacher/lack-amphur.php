	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">  ตารางวิเคราะห์ความขาดแคลนครูในแต่ละอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">  ตารางวิเคราะห์ความขาดแคลนครูในแต่ละอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
							<table class="table table-bordered table-striped">
			                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>

				                      <th width="120" rowspan="2">นักเรียน</th>
				                      <th width="120" rowspan="2">ห้องเรียน</th>
				                      
				                      <th width="100" colspan="2">ครู</th>
				                      <th width="100" colspan="2">ขาด (-)</th>
				                      <th width="100" colspan="2">เกิน (+)</th>

				                      <th width="100" >อัตราส่วน</th>
				                    </tr>

				                    <tr>
				                    	<th>มีจริง</th>
				                    	<th>ตามเกณฑ์</th>
				                    	<th>จำนวน</th>
				                    	<th>ร้อยละ</th>
				                    	<th>จำนวน</th>
				                    	<th>ร้อยละ</th>
				                    	<th>นักเรียน:ห้อง:ครู</th>
				                    </tr>
				                    
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="">
			                    		<td style='' colspan=""><?php echo $am->AMPHUR_NAME;?></td>
			                    		
			                    		
			                    		<td style="text-align: right"><?php 

			                    		$student = getStudentLackAmphur($am->AMPHUR_ID);
			                    		echo $student;
			                    		?>
			                    			
			                    		</td>
			                    		<td style="text-align: right"><?php 

			                    		$room = getRoomLackAmphur($am->AMPHUR_ID);

			                    		echo $room;
			                    		?></td>
			                    		

			                    		<?php 
			                    		$have_teacher = getTeacherTotalAmphur($am->AMPHUR_ID, 'total');
			                    		$have_standard = getTeacherTotalAmphur($am->AMPHUR_ID, 'standard');

			                    		$del1 = 0;
			                    		$per_del1 = 0;

			                    		$del2 = 0;
			                    		$per_del2 = 0;

			                    		if ($have_standard > $have_teacher) {
			                    			$del1 = $have_standard - $have_teacher;

			                    			$per_del1 = ($del1 / $have_teacher) * 100;

			                    		}

			                    		if ($have_standard < $have_teacher) {
			                    			$del2 = $have_standard - $have_teacher;

			                    			$per_del2 = ($del2 / $have_teacher) * 100;

			                    		}

			                    		if (isset($ar['student'])) {
			                    			$ar['student'] = $ar['student'] + $student;
			                    			$ar['room'] = $ar['room'] + $room;
			                    			$ar['have_teacher'] = $ar['have_teacher'] + $have_teacher;
			                    			$ar['have_standard'] = $ar['have_standard'] + $have_standard;
			                    		} else {
			                    			$ar = array(
			                    					'student' => $student,
			                    					'room' => $room,
			                    					'have_teacher' => $have_teacher,
			                    					'have_standard' => $have_standard
			                
			                    			);
			                    		}
			                    		?>

			                    		<td style="text-align: right"><?php echo $have_teacher;?></td>
			                    		<td style="text-align: right"><?php echo $have_standard;?></td>
			                    		<td style="text-align: right"><?php echo $del1;?></td>
			                    		<td style="text-align: right"><?php echo $per_del1;?></td>
			                    		<td style="text-align: right"><?php echo $del2;?></td>
			                    		<td style="text-align: right"><?php echo $per_del2;?></td>
			                    		<td style="text-align: right">0:0:0</td>
			                    	</tr>
			                    	
			                    	
			                    	
			                    <?php endforeach;?>

			                    <?php 

			                    $have_teacher = $ar['have_teacher'];
	                    		$have_standard = $ar['have_standard'];

	                    		$del1 = 0;
	                    		$per_del1 = 0;

	                    		$del2 = 0;
	                    		$per_del2 = 0;

	                    		if ($have_standard > $have_teacher) {
	                    			$del1 = $have_standard - $have_teacher;

	                    			$per_del1 = ($del1 / $have_teacher) * 100;

	                    		}

	                    		if ($have_standard < $have_teacher) {
	                    			$del2 = $have_standard - $have_teacher;

	                    			$per_del2 = ($del2 / $have_teacher) * 100;

	                    		}

			                    ?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<td style="text-align: right"><strong><?php echo $ar['student'];?></strong></td>
                    				<td style="text-align: right"><strong><?php echo $ar['room'];?></strong></td>
                    				<td style="text-align: right"><strong><?php echo $ar['have_teacher'];?></strong></td>
                    				<td style="text-align: right"><strong><?php echo $ar['have_standard'];?></strong></td>

                    				<td style="text-align: right"><strong><?php echo $del1;?></strong></td>

                    				<td style="text-align: right"><strong><?php echo $per_del1;?></strong></td>

                    				<td style="text-align: right"><strong><?php echo $del2;?></strong></td>

                    				<td style="text-align: right"><strong><?php echo $per_del2;?></strong></td>

		                    			
		                    			
		                    		<td style="text-align: right"><strong>0:0:0</strong></td>

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
	</div>

	
