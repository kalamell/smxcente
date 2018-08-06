<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ข้อมูลนักเรียน</li>
			</ol>

			<?php echo form_open('backend/student/update_age_data', array('id' => 'memberupdate', 'class' => 'form-inline'));?>		  

			  <div class="form-group">
			    <label for="password">ภาคเรียน</label>
			    <select name="term" class="form-control">
			    	<option value=""> ภาคเรียน </option>
			    	<?php foreach($term as $t):?>
			    		<option value="<?php echo $t->term_id;?>"><?php echo $t->term_name;?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="confirm_password">ปีการศึกษา</label>
			    <select name="years" class="form-control">
			    	<option value=""> ปีการศึกษา </option>
			    	<?php foreach($years as $y):?>
			    		<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>
			  <button type="submit" class="btn btn-info">ปรับปรุงข้อมูลอายุนักเรียน</button>


			<?php echo form_close();?>


			<br><br>

			

			<h2 class="page-header">ข้อมูลอายุนักเรียน</h2>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>เพศ</th>
						<th>อายุ</th>
						<th>จำนวน</th>
					</tr>
				</thead>
				<tbody>
					<?php $sum=0;
					if(count($rs) == 0):?>
						<tr><td colspan="4"> - - ไม่มีข้อมูล - -</td></tr>
					<?php else:?>
						<?php foreach($rs as $r):
							$sum+=$r->total;
							?>
							<tr>
								<td><?php echo $r->gender;?></td>
								<td><?php echo $r->age;?></td>
								<td><?php echo $r->total;?></td>
							</tr>
						<?php endforeach;?>
					<?php endif;?>
					<td colspan="2">รวม</td>
					<td><?php echo $sum;?></td>
				</tbody>
				
			</table>

			  
		</div>
	</div>
	
</div>