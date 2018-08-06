<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ลงทะเบียนเว็บไซต์</li>
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
			  <div class="panel-heading">ลงทะเบียนเว็บไซต์</div>
			  <div class="panel-body">

			  	<p><a href="<?php echo site_url('backend/website/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>




			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>ชื่อเว็บไซต์</th>
			  				<th>URL</th>
			  				<th>จังหวัดที่รับผิดชอบ</th>
			  				<th>ประเภทเว็บไซต์</th>
			  				<th>&nbsp;</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):
			  				$url = 'http://'.$r->PROVINCE_CODE.'.smxcenter.com';
			  				?>
			  				<tr>
			  					<td><?php echo $r->title;?></td>
			  					<td><?php echo anchor($url, $url);?></td>
			  					<td><?php echo $r->PROVINCE_NAME;?></td>
			  					<td><?php echo $r->type_website;?></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							<a href="<?php echo site_url('backend/member/edit/'.$r->id);?>" class="btn btn-default btn-sm">แก้ไข</a>
			  							<a href="<?php echo site_url('backend/member/delete/'.$r->id);?>" onclick="javascript: return confirm('ต้องการลบข้อมูลหรือไม่ ?');" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
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

	
