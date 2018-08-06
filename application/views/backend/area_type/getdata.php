<?php 
foreach($rs as $r):?>

<option value="<?php echo $r->area_type_id;?>"><?php echo $r->area_type_name;?></option>

<?php endforeach;?>