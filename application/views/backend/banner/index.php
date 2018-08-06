<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active"> Banner</li>
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
			  <div class="panel-heading"> Banner</div>
			  <div class="panel-body">
			  	<p><a href="<?php echo site_url('backend/banner/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>

			  	<?php echo save();?>

			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>Banner</th>
			  				
			  				<th>&nbsp;</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>
			  				<tr>
			  					<td><img src="<?php echo base_url();?>upload/banner/<?php echo $r->path;?>" class="img-responsive"></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							
			  							<a href="<?php echo site_url('backend/banner/delete/'.$r->id);?>" class="btn btn-default btn-sm" onclick="javascript:return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><i class="fa fa-trash"></i></a>
			  						</div>
			  					</td>
			  				</tr>
			  			<?php endforeach;?>
			  		</tbody>
			  	</table>
			  </div>
			</div>
		</div>


		

	</div>
</div>

	
