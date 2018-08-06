<div class="row">
	<div class='col-md-12'><p>จัดการเมนู</p></div>
	<div class="col-md-12">
	<p><label for="checkall"><input type="checkbox" id="checkall"> เลือกทั้งหมด</label></p>
	<?php foreach($menu_config as $mc):?>
		<p><?php echo $mc->name;?></p>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>เลือก</th>
					<th>เมนู</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($menu_sub as $ms):?>
					<?php if($ms->link_id == $mc->id):?>

						<?php 
						$check = '';
						if (count($menu_website) > 0) {
							foreach($menu_website as $m) {
								if ($m->sub_id == $ms->sub_id) {
									$check = 'checked';
									break;
								}
							}
						}
						?>
						<tr>
							<td><input type="checkbox" name="menu_sub[]" <?php echo $check;?> value="<?php echo $ms->sub_id;?>"></td>
							<td><?php echo $ms->sub_name;?></td>
						</tr>
					<?php endif;?>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endforeach;?>
	</div>
</div>