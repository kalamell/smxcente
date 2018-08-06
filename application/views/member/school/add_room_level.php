<div class="form-group">
  <label for="room_no" class="control-label">ห้องเรียน</label>
  <input type="text" class="form-control" id="room_no"  name="room_no">
</div>

<input type="hidden" name="rmid" id="rmid" value="<?php echo $this->uri->segment(5);?>">

<div class="form-group">
  <label for="room_boy" class="control-label">นักเรียนชาย</label>
  <input type="text" class="form-control" id="room_boy" name="room_boy">
  <p>* ตัวเลข</p>
</div>

<div class="form-group">
  <label for="room_girl" class="control-label">นักเรียนหญิง</label>
  <input type="text" class="form-control" id="room_girl" name="room_girl">
  <p>* ตัวเลข</p>
</div>


