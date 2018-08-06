
<?php echo form_open('', array('id' => ''));?>

<input type="hidden" name="id" value="<?php echo $rs->id;?>">
<input type="hidden" name="tab" value="2">

<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 2</button>
</div>

<div class="clearfix"></div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">เป็นสถานศึกษาสาขา</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="username">สังกัด</label>
		    <select name="area_id" id="list_area_id" class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    	<?php foreach($area as $a):?>
		    		<option value="<?php echo $a->area_id;?>" <?php echo $rs->area_id == $a->area_id ? 'selected' : '';?>><?php echo $a->area_type_name;?></option>
		    	<?php endforeach;?>
		    </select>
		</div>

		<div class="form-group col-md-6">
			<label for="username">เป็นสถานศึกษาสาขาของห้องเรียนของ</label>
		    <select class="form-control" id="school_sub_id" name="school_sub_id">
		    	<option value=""> เลือกสถานศึกษา </option>
		    	<?php foreach($school_sub as $ss):?>
		    		<option value="<?php echo $ss->school_id;?>" <?php echo $rs->school_sub_id == $ss->school_id ? 'selected' : '';?>><?php echo $ss->school_name;?></option>
		    	<?php endforeach;?>
		    </select>
		</div>

	  </div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ถ้าเป็นสถานศึกษามาเรียนรวม ระดับชั้นที่มาเรียนรวมคือ</div>
	  	<div class="panel-body">
	  		<p><a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>
			<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th rowspan="2" width="300">ชั้น</th>
					<th colspan="2">จำนวนนักเรียน</th>
					<th rowspan="2">ชื่อสถานศึกษาหลัก</th>
					<th rowspan="2" width="80">&nbsp;</th>
				</tr>
				<tr>
					<th width="150">ชาย</th>
					<th width="150">หญิง</th>
				</tr>
			</thead>
			<tbody>
				<?php if (count($school_room_sub)==0):?>
					<tr><td colspan="5"> ไม่มีข้อมูล </td></tr>
				<?php else:?>
					<?php foreach($school_room_sub as $srs):?>
						<tr>
							<td><?php echo $srs->level;?></td>
							<td style="text-align: right;"><?php echo $srs->boy;?></td>
							<td style="text-align: right;"><?php echo $srs->girl;?></td>
							<td><?php echo $srs->school_main_name;?></td>
							<td><a href="javascript:void(0)" class="btn btn-sm btn-danger delete-level"  data-id="<?php echo $srs->ssid;?>"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="level" class="control-label">ชั้น</label>
            <input type="text" class="form-control" id="level"  name="level">
          </div>

          <div class="form-group">
            <label for="boy" class="control-label">นักเรียนชาย</label>
            <input type="text" class="form-control" id="boy" name="boy">
            <p>* ตัวเลข</p>
          </div>

          <div class="form-group">
            <label for="girl" class="control-label">นักเรียนหญิง</label>
            <input type="text" class="form-control" id="girl" name="girl">
            <p>* ตัวเลข</p>
          </div>

          <div class="form-group">
            <label for="school_main_name" class="control-label">ชื่อสถานศึกษาหลัก</label>
            <input type="text" class="form-control" id="school_main_name" name="school_main_name">

          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="save_level">บันทึก</button>
      </div>

    </div>
  </div>
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลเพิ่มเติม</div>
	  <div class="panel-body">
	  	<div class='col-md-6'>
	  		<div class="checkbox">
				<label>
			      <input type="checkbox" name="state_focus" value="1"  <?php echo $rs->state_focus == 1 ? 'checked' : '';?>> เป็นสถานศึกษาที่ดูแลและรับผิดชอบพื้นที่จุดบอดทางการศึกษา
			    </label>
			</div>
	  	</div>

	  	<div class='col-md-6'>
	  		<div class="checkbox">
				<label>
			      <input type="checkbox" name="state_live" value="1" <?php echo $rs->state_live == 1 ? 'checked' : '';?>> เป็นสถานศึกษาที่อยู่ในโครงการพักนอนประจำ
			    </label>
			</div>
	  	</div>


	  </div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">เป็นสถานศึกษาในโครงการพระราชดำริ (เลือกได้มากกว่า 1 ข้อ)</div>
	  <div class="panel-body">
	  	<table class="table table-striped table-bordered">
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>ไม่อยู่ในโครงการ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการราชประชานุเคราะห์</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการพระราชดำริของสมเด็จพระเทพรัตนราชสุดาฯ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการพระราชดำริด้วยรักและห่วงใย</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>สถานศึกษาที่ตั้งอยู่ในศูนย์การศึกษาการพัฒนาเนื่องมาจากพระราชดำริ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>โครงการพระราชดำริบ้านเล็กในป่าใหญ่</td>
	  			</tr>
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ประเภทและลักษณะโครงการของสถานศึกษา,โครงการที่สถานศึกษาเข้าร่วม (เลือกได้มากกว่า 1 ข้อ)</div>
	  <div class="panel-body">
	  	<table class="table table-striped table-bordered">
	  		<tbody>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้หน่วยงานทางการศึกษาใช้เป็นสถานที่ตั้งสำนักงาน / เปิดทำการสอน</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้ กศน. ใช้เป็นสถานที่ตั้งสำนักงาน / เปิดทำการสอน</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้องค์กรปกครองส่วนท้องถิ่นใช้เป็นสถานที่ตั้งสำนักงาน</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาที่อนุญาตให้องค์กรปกครองส่วนท้องถิ่นใช้จัดการเรียนการสอนอนุบาล 3 ขวบ</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาสาขาของสถานศึกษา</td>
	  			</tr>
	  			<tr>
	  				<td><input type="checkbox" name=""></td>
	  				<td>เป็นสถานศึกษาสาขาห้องเรียนของสถานศึกษา</td>
	  			</tr>
	  		</tbody>
	  	</table>

	  </div>
	</div>
</div>


<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 2</button>
</div>
<?php echo form_close();?>

	