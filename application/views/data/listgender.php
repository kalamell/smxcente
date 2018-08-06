	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('data');?>">ข้อมูลสารสนเทศ</a></li>
			  <li class="active">ตารางแสดงจำนวนนักเรียน ชายหญิง</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนนักเรียน ชายหญิง</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="" rowspan="2">ที่ตั้ง (อำเภอ)</th>
			                      <th width="" colspan="2">สพม.30</th>
			                      <th width="" colspan="2">สพป.ชย1</th>
			                      <th width="" colspan="2">สพป.ชย2</th>
			                      <th width="" colspan="2">สพป.ชย3</th>
			                      <th width="" colspan="2">เอกชน</th>
			                      <th width="" colspan="2">อื่นๆ</th>
			                      <th width="" colspan="2">รวม</th>
			                    </tr>
			                    <tr>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    	<th width="80">ชาย</th>
			                    	<th width="80">หญิง</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php foreach($rs as $r):?>
			                      <tr>
			                        <td><?php echo $r->f13;?></td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>
			                        <td>&nbsp;</td>

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

	
