<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">รายละเอียดสถิติทางการศึกษา</li>
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
			  <div class="panel-heading">รายละเอียดสถิติทางการศึกษา</div>
			  <div class="panel-body">

                <?php echo form_open('state/search', array('id' => ''));?>
                

				<div class="form-group col-md-6">
                    <label for="name_relation">ชื่อโรงเรียน</label>
					<input type="text" name="school_name" class="form-control" value="<?php echo $this->session->userdata('txt');?>">
                </div>

                

                <div class="form-group col-md-6">
                    <label for="name_relation">สังกัด</label>
					<select name="area_type_id" class="form-control">
						<option value=""> - - - สังกัด - - - </option>
						<?php foreach($area as $a):?>
							<option value="<?php echo $a->area_type_id;?>" <?php echo $this->session->userdata('area_type_id') == $a->area_type_id ? 'selected' : '';?>><?php echo $a->area_type_name;?></option>
						<?php endforeach;?>
					</select>
                </div>


                <div class="form-group col-md-6" style="">
                    <label for="name_relation">ชั้นที่เปิดสอน</label>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="school_type[]" value="t1">เตรียมอนุบาล 
						</label>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="school_type[]" value="a1">อนุบาล 1 
						</label>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="school_type[]" value="a2">อนุบาล 2
						</label>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="school_type[]" value="a3">อนุบาล 3
						</label>
					</div>
                </div>

				<div class="form-group col-md-12">
					<button class="btn btn-sm btn-info"  type="submit"><i class="fa fa-search"></i> ดูข้อมูล</button>
				</div>



                <?php echo form_close();?>
			  	
			  </div>
			</div>

			<div class="panel panel-default" id="data_result" style="display: block">
				<div class="panel-heading">แสดงข้อมูล</div>
				<div class="panel-body">
					<?php if (count($school) > 0):?>

						<table class="table table-bordered table-striped">
		                  <thead>
		                    <tr>
		                      <th width="120">รหัสสถานศึกษา</th>
		                      <th>สถานศึกษา</th>
		                      <th width="260">ประเภทการศึกษา</th>
		                      <th width="100">เว็บไซต์</th>
		                      <th width="100">อปท</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                    <?php foreach($school as $r):?>
		                      <tr>
		                        <td><a href="<?php echo site_url('state/school/'.$r->school_id);?>" data-remote="false" data-toggle="modal" data-target="#modal"><?php echo $r->school_id;?></a></td>
		                        <td><?php echo $r->school_name;?></td>
		                        <td><a xhref="<?php echo site_url('data/id/'.$r->school_id);?>"><?php echo $r->f9;?></a></td>
		                        <td><a xhref="<?php echo url($r->website);?>" target="_blank"><?php echo $r->website;?></a></td>
		                        <td><a xhref="<?php echo site_url('data/id/'.$r->school_id);?>"><?php echo $r->f18;?></a></td>
		                      </tr>
		                    <?php endforeach;?>
		                  </tbody>
		                  
		                </table>

					<?php endif;?>
					
				</div>
			</div>
		</div>


		

	</div>
</div>



	
