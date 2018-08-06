<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">สถิติทางการศึกษา</li>
			</ol>
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">เมนู</div>
			  <div class="panel-body">
			  	<?php $this->load->view('state/menu');?>
			  </div>
			</div>
		</div>
		
		<div class='col-md-9'>
			<div class="panel panel-default">
			  <div class="panel-heading">สถิติทางการศึกษา</div>
			  <div class="panel-body">

                <?php echo form_open('', array('id' => 'frm-state-report'));?>
                <div class="form-group col-md-4">
                    <label for="name_relation">ปีการศึกษา</label>
										<select name="year_id" id="year_id" class="form-control">
											<option value=""> - - - ปีการศึกษา - - -</option>
											<?php foreach($year as $y):?>
												<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
											<?php endforeach;?>
										</select>
                </div>

								<div class="form-group col-md-8">
                    <label for="name_relation">ประเภทรายงาน</label>
										<select name="report_type" id="report_type" class="form-control">
											<option value=""> - - - ประเภทรายงาน - - -</option>
											<option value="province">ภาพรวมทั้งจังหวัด</option>
											<option value="area">ภาพรวมแยกสังกัด</option>
										</select>
                </div>

								<div class="form-group col-md-12">
									<button class="btn btn-sm btn-info" id="state_report_1" type="button"><i class="fa fa-search"></i> ดูข้อมูล</button>
								</div>



                <?php echo form_close();?>
			  	
			  </div>
			</div>
		</div>

		<div class="col-md-12">

			<div class="panel panel-default" id="data_result" style="display: block">
				<div class="panel-heading">แสดงข้อมูล</div>
				<div class="panel-body"></div>
			</div>
		</div>


		

	</div>
</div>



	
