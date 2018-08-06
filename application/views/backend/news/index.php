<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ข่าว</li>
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
			  <div class="panel-heading">ข่าวประชาสัมพันธ์</div>
			  <div class="panel-body">
			  	<p><a href="<?php echo site_url('backend/news/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>

			  	<?php echo save();?>

			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>ชื่อข่าว</th>
			  				<th>วันที่สร้าง</th>
			  				
			  				<th>&nbsp;</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>
			  				<tr>
			  					<td><?php echo $r->title;?></td>
			  					<td><?php echo $r->created_date;?></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							<a href="<?php echo site_url('backend/news/edit/'.$r->id);?>" class="btn btn-default btn-sm">แก้ไข</a>
			  							<a href="<?php echo site_url('backend/news/delete/'.$r->id);?>" class="btn btn-default btn-sm" onclick="javascript:return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><i class="fa fa-trash"></i></a>
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

	
