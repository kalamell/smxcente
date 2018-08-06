	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('data');?>">ข้อมูลสารสนเทศ</a></li>
			  <li class="active">ตารางจำแนกวิทยฐานะ แยกแต่ละชั้น</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางจำแนกวิทยฐานะ แยกแต่ละชั้น</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="">ทั้งจังหวัด</th>
			                      <?php foreach($rs as $r):?>
			                      	<th ><?php echo $r->as_name;?></th>
			                      <?php endforeach;?>
			                      <th >รวมทั้งสิ้น</th>
			                    </tr>

			                    
			                  </thead>
			                  <tbody>
			                    
			                	<tr><td>เตรียมอนุบาล</td>
			                		<?php foreach($rs as $r):?>
			                			<td>&nbsp;</td>
			                		<?php endforeach;?>
			                		<td>&nbsp;</td>

			                		</tr>
								<tr><td>อนุบาล 1</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>อนุบาล 2</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>อนุบาล 3</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม อนุบาล 1-3</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>ประถมศึกษาปีที่ 1</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>ประถมศึกษาปีที่ 2</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>ประถมศึกษาปีที่ 3</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นประถมศึกษาปีที่ 1-3</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>ประถมศึกษาปีที่ 4</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>ประถมศึกษาปีที่ 5</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>ประถมศึกษาปีที่ 6</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นประถมศึกษาปีที่ 4-6</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นประถมศึกษาปีที่ 1-6</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>มัธยมศึกษาปีที่ 1</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>มัธยมศึกษาปีที่ 2</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>มัธยมศึกษาปีที่ 3</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นมัธยมศึกษาปีที่ 1-3</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>มัธยมศึกษาปีที่ 4</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>มัธยมศึกษาปีที่ 5</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>มัธยมศึกษาปีที่ 6</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นมัธยมศึกษาปีที่ 4-6</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นมัธยมศึกษาปีที่ 1-6</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

									</tr>
								<tr><td>รวม ชั้นประถมศึกษาและมัธยมศึกษา</td>
									<?php foreach($rs as $r):?>
										<td>&nbsp;</td>
										
									<?php endforeach;?>
									<td>&nbsp;</td>

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

	
