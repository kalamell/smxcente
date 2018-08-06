<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">ข้อมูลสถิติทางการศึกษา (เฉพาะปฐมวัย)
  </h4>
</div>
<div class="modal-body">
  <p><strong>ข้อมูลสถิติทางการศึกษา (เฉพาะปฐมวัย)</strong></p>
  <table class="table table-bordered table-striped mb-none">
       <thead>
           <tr>
                <th rowspan="2">ปีการศึกษา</th>
                <th colspan="2" class="text-center">เตรียมอนุบาล</th>
                <th colspan="2" class="text-center">อนุบาล 1(สช.)</th>
                <th colspan="2" class="text-center">อนุบาล 2 (สช.)/อนุบาล 1</th>
                <th colspan="2" class="text-center">อนุบาล 3 (สช.)/อนุบาล 2</th>
                <th colspan="2" class="text-center">เด็กเล็ก</th>
                <th rowspan="2" class="text-center">รวมนักเรียน</th>
           </tr>
           <tr>
               <th class="text-center">ชาย</th>
               <th class="text-center">หญิง</th>
               <th class="text-center">ชาย</th>
               <th class="text-center">หญิง</th>
               <th class="text-center">ชาย</th>
               <th class="text-center">หญิง</th>
               <th class="text-center">ชาย</th>
               <th class="text-center">หญิง</th>
               <th class="text-center">ชาย</th>
               <th class="text-center">หญิง</th>                                       
           </tr>
       </thead>
       <tbody>
         <?php foreach($year as $y):?>
          <tr>
            <td><?php echo $y->year_name;?></td>
            <td>0</td><td>0</td>
            <td>0</td><td>0</td>
            <td>0</td><td>0</td>
            <td>0</td><td>0</td>
            <td>0</td><td>0</td>

            <td>0</td>
          </tr>
         <?php endforeach;?>
       </tbody>
   </table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
</div>