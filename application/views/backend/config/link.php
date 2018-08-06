<div class="form-group">
	<label>ชื่อลิ้งค์</label>
	<input type="text" name="link_name" class='form-control' value=''/>
</div>

<div class="form-group">
	<label>URL</label>
	<input type="text" name="link_url" value="" class="form-control">
</div>



<div class="form-group">
	<label>แนบไฟล์ภาพลิ้ง</label>
	<input type="file" name="link_thumbnail" class="form-control">
</div>

<br>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ชื่อลิ้ง</th>
      <th>URL</th>
      <th>ภาพ</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($link as $l):?>
      <tr>
        <td><?php echo $l->link_name;?></td>
        <td><?php echo $l->link_url;?></td>
        <td><?php if ($l->link_thumbnail !=null):?>
          <img src="<?php echo base_url();?>upload/<?php echo $l->link_thumbnail;?>" style='width: 200px;'>
          <?php else:?>
            -
          <?php endif;?>
        </td>
        <td><a href="<?php echo site_url('backend/config/delete_link/'.$l->link_id);?>" class='btn btn-sm btn-default' onclick="javascript: return confirm('ต้องการลบหรือไม่ ?');">ลบ</a></td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>