
<?php echo form_open('', array('id' => ''));?>

<input type="hidden" name="id" value="<?php echo $rs->id;?>">
<input type="hidden" name="tab" value="room">

<div class="clearfix"></div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">จำนวนห้องในแต่ละชั้น</div>
	  <div class="panel-body">
			<div class="form-group col-md-6">
				<label for="username">อนุบาล 1 (ชื่อเดิม อนุบาล 3 ขวบ)</label>
			    <input type="text" class="form-control" name="a1_room" value="<?php echo $school_room->a1_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">อนุบาล 2 (ชื่อเดิม อนุบาล 1)</label>
			    <input type="text" class="form-control" name="a2_room" value="<?php echo $school_room->a2_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">อนุบาล 3 (ชื่อเดิม อนุบาล 2)</label>
			    <input type="text" class="form-control" name="a3_room" value="<?php echo $school_room->a3_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ประถมศึกษาปีที่ 1</label>
			    <input type="text" class="form-control" name="p1_room" value="<?php echo $school_room->p1_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ประถมศึกษาปีที่ 2</label>
			    <input type="text" class="form-control" name="p2_room" value="<?php echo $school_room->p2_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ประถมศึกษาปีที่ 3</label>
			    <input type="text" class="form-control" name="p3_room" value="<?php echo $school_room->p3_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ประถมศึกษาปีที่ 4</label>
			    <input type="text" class="form-control" name="p4_room" value="<?php echo $school_room->p4_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ประถมศึกษาปีที่ 5</label>
			    <input type="text" class="form-control" name="p5_room" value="<?php echo $school_room->p5_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ประถมศึกษาปีที่ 6</label>
			    <input type="text" class="form-control" name="p6_room" value="<?php echo $school_room->p6_room;?>">
			</div>

			
			<div class="form-group col-md-6">
				<label for="username">มัธยมศึกษาปีที่ 1</label>
			    <input type="text" class="form-control" name="m1_room" value="<?php echo $school_room->m1_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">มัธยมศึกษาปีที่ 2</label>
			    <input type="text" class="form-control" name="m2_room" value="<?php echo $school_room->m2_room;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">มัธยมศึกษาปีที่ 3</label>
			    <input type="text" class="form-control" name="m3_room" value="<?php echo $school_room->m3_room;?>">
			</div>
			<!--

			<div class="form-group col-md-6">
				<label for="username">มัธยมศึกษาปีที่ 4</label>
			    <input type="text" class="form-control" name="m4" value="<?php echo $school_room->m4;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">มัธยมศึกษาปีที่ 5</label>
			    <input type="text" class="form-control" name="m5" value="<?php echo $school_room->m5;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">มัธยมศึกษาปีที่ 6</label>
			    <input type="text" class="form-control" name="m6" value="<?php echo $school_room->m6;?>">
			</div>


			<div class="form-group col-md-6">
				<label for="username">ปวช. 1</label>
			    <input type="text" class="form-control" name="pvc1" value="<?php echo $school_room->pvc1;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ปวช. 2</label>
			    <input type="text" class="form-control" name="pvc2" value="<?php echo $school_room->pvc2;?>">
			</div>

			<div class="form-group col-md-6">
				<label for="username">ปวช. 3</label>
			    <input type="text" class="form-control" name="pvc3" value="<?php echo $school_room->pvc3;?>">
			</div>
		-->

		
		</div>
	</div>
</div>



<?php echo form_close();?>
	