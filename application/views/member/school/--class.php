
<?php echo form_open('', array('id' => ''));?>

<input type="hidden" name="id" value="<?php echo $rs->id;?>">
<input type="hidden" name="tab" value="class">

<div class="clearfix"></div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ชั้นเรียนที่เปิดสอน</div>
	  <div class="panel-body">
			 <div class="form-group col-md-6">
				<label for="username">ชั้นเรียนที่สอนต่ำสุด</label>
			    <select class="form-control" name="rmid_start">
			    	<option value=""> - - - เลือกข้อมูล - - -</option>
			    	<?php foreach($room_level as $rl):?>
			    		<option value="<?php echo $rl->rmid;?>" <?php echo $rl->rmid == $rs->rmid_start ? 'selected' : '';?>><?php echo $rl->rm_name;?></option>
			    	<?php endforeach;?>
			    </select>
			</div>

			<div class="form-group col-md-6">
				<label for="username">ชั้นเรียนที่สอนสูงสุด</label>
			    <select class="form-control" name="rmid_end">
			    	<option value=""> - - - เลือกข้อมูล - - -</option>
			    	<?php foreach($room_level as $rl):?>
			    		<option value="<?php echo $rl->rmid;?>" <?php echo $rl->rmid == $rs->rmid_end ? 'selected' : '';?>><?php echo $rl->rm_name;?></option>
			    	<?php endforeach;?>
				</select> 
			</div>

		
		</div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">จำนวนนักเรียนในแต่ละระดับชั้น</div>
	  	<div class="panel-body">
	  		<!--<p><a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>-->
			<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th rowspan="2" width="300">ชั้น</th>
					<th colspan="2">จำนวนนักเรียน</th>
					<th rowspan="2" width="80">&nbsp;</th>
				</tr>
				<tr>
					<th width="150">ชาย</th>
					<th width="150">หญิง</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($room_level as $rl):?>
					<?php if ($rl->rmid >= $rs->rmid_start && $rl->rmid <= $rs->rmid_end):?>
						<tr>
							<td colspan="4"><strong>ข้อมูลระดับชั้น <?php echo $rl->rm_name;?></strong> <a data-toggle="modal" href="<?php echo site_url('member/add_room_level/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$rl->rmid);?>" class="btn btn-sm btn-default pull-right" data-remote="false" data-target="#md"><i class="fa fa-plus"></i> เพิ่มข้อมูลห้อง</a></td>
						</tr>

						<?php $getroom = getRoomLevel($rs->school_id, $this->uri->segment(3), $this->uri->segment(4), $rl->rmid);?>

						<?php if(count($getroom)>0):?>
							<?php foreach($getroom as $gr):?>
								<tr>
									<td>- <?php echo $gr->room_no;?></td>
									<td><?php echo $gr->room_boy;?></td>
									<td><?php echo $gr->room_girl;?></td>
								</tr>
							<?php endforeach;?>
						<?php endif;?>

					<?php endif;?>
				<?php endforeach;?>
			</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade md" id="md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h4>
      </div>
      <div class="modal-body">
        
          
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="save_room">บันทึก</button>
      </div>

    </div>
  </div>
</div>


<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
</div>
<?php echo form_close();?>
	