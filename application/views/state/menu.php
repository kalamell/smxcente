<div class="list-group">						  
  <a href="<?php echo site_url('state');?>" class="<?php echo $this->uri->segment(2) == '' ? 'active' : '';?> list-group-item"><i class="glyphicon glyphicon-user"></i> ภาพรวมสถิติทางการศึกษา</a>
  
  <a style="" href="<?php echo site_url('state/detail');?>" class="<?php echo $this->uri->segment(2) == 'detail' ? 'active' : '';?> list-group-item"><i class="glyphicon glyphicon-home"></i> รายละเอียดสถิติทางการศึกษา</a>

  <a style="display: none;" href="<?php echo site_url('state/data');?>" class="<?php echo $this->uri->segment(2) == 'data' ? 'active' : '';?> list-group-item"><i class="fa fa-users"></i> ตารางคาดคะเนการเข้าเรียน</a>

</div>