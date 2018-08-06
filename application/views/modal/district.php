<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">ข้อมูลสถานศึกษา
    <div class="pull-right">
      <a class='btn btn-sm btn-info' href="<?php echo site_url('data/area/map');?>?<?php echo $field;?>=<?php echo $id;?>"><i class="fa fa-map"></i> ดูแผนที่รวม</a>
    </div>
  </h4>
</div>
<div class="modal-body">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>รหัสสถานศึกษา</th>
        <th>ชื่อสถานศึกษา</th>
        <th>จำนวนนักเรียน</th>
        <th>จำนวนครู</th>
        <th>ละติจูด ลองติจูด</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($rs as $r):?>
        <tr>
          <td><a href="<?php echo site_url('data/id/'.$r->school_id);?>"><?php echo $r->school_id;?></a></td>
          <td><?php echo $r->school_name;?></td>
          <td style="text-align: right;"><?php echo getStudentSchool($r->school_id);?></td>
          <td style="text-align: right;"><?php echo getTeacherSchool($r->school_id);?></td>
          <td style="text-align: right;"><?php echo $r->lat.', '.$r->lng;?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
</div>