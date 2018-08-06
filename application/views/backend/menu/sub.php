<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			   <li class=""><a href="<?php echo site_url('backend/menu');?>">Menu</a></li>
			  <li class="active">เพิ่มเมนูย่อย</li>
			</ol>
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">เมนู</div>
			  <div class="panel-body">
			  	<?php $this->load->view('backend/menu');?>
			  </div>
			</div>
		</div>

		<div class='col-md-9'>
			<div class="panel panel-default">
			  <div class="panel-heading"> Menu</div>
			  <div class="panel-body">
			  	
			  	<?php echo form_open_multipart('');?>
				  <div class="panel-body">

				  	<?php echo save();?>
				  
					  <div class="form-group">
					  	<label>ชื่อลิ้ง</label>
					  	<input type="text" name="sub_name" class="form-control" value="">
					  </div>


					  <div class="form-group">
					  	<label>ลำดับ</label>
					  	<input type="text" name="sub_sort" class="form-control" value="">
					  </div>

					  <div class="form-group">
					  	<label>URL</label>
					  	<input type="text" name="link" class="form-control" value="">
					  </div>

					  <div class="form-group">
					  	<label>ชนิดลิ้ง</label>
					  	<div class="radio">
					  		<label>
					  			<input type="radio" name="type" value="IN" checked> ลิ้งในเว็บ
					  		</label>
					  	</div>

					  	<div class="radio">
					  		<label>
					  			<input type="radio" name="type" value="OUT"> ลิ้งออกนอกเว็บ
					  		</label>
					  	</div>
					  </div>

					  <button type="submit" name='save' class="btn btn-info">บันทึก</button>

					
				  

				  

				  <?php form_close();?> <br><Br>


				  <?php echo form_open('');?>
				  <p><button type="submit" class="btn btn-sm btn-info">อัพเดตลำดับ</button></p>
				  <table class="table table-bordered table-striped"> 
				  	<thead>
				  		<tr>
				  			<th width="100">ลำดับ</th>
				  			
				  			<th>ลิ้ง</th>
				  			<th>ชื่อลิ้ง</th>
				  			<th>ชนิดลิ้ง</th>
				  			<th width="100">&nbsp;</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php foreach($rs as $r):?>
				  			<tr>
				  				<td><input class="form-control" type="tex" name="sub_id[<?php echo $r->sub_id;?>]" value="<?php echo $r->sub_sort;?>"></td>
				  				<td><input type="text" class="form-control" name="link2[<?php echo $r->sub_id;?>]" value="<?php echo $r->link;?>"></td>
				  				<td><input type="text" class="form-control" name="sub_name2[<?php echo $r->sub_id;?>]" value="<?php echo $r->sub_name;?>" /></td>
				  				<td><?php echo $r->type == 'IN' ? 'ภายใน' : 'ภายนอก';?></td>
				  				<td style="text-align: center;"><a onclick="javascript:return confirm('ต้องการลบหรือไม่ ?');" class="btn btn-sm btn-default" href="<?php echo site_url('backend/menu/del_sub/'.$r->link_id.'/'.$r->sub_id);?>"><i class="fa fa-trash"></i></a></td>
				  			</tr>
				  		<?php endforeach;?>
				  	</tbody>
				  </table>
				  <?php echo form_close();?>

				</div>

			  </div>
			</div>
		</div>


		

	</div>
</div>

	
