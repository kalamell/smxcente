<div class='row'>
    <h2 class="col-md-12" style="font-size: 16px;"> รายงานภาพรวมทั้งจังหวัดของจำนวนนักเรียนปฐมวัย ปีการศึกษา: <?php echo $year_id + 543;?></h2>

    <div class='col-md-6'>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align: center; vertical-align: middle;" rowspan="2">ระดับการศึกษา</th>
                    <th style="text-align: center; vertical-align: middle;" colspan="2">จำนวนนักเรียน</th>
                    <th style="text-align: center; vertical-align: middle;" rowspan="2">รวมนักเรียน</th>
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align: middle;">ชาย</th>
                    <th style="text-align: center; vertical-align: middle;">หญิง</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>เตรียมอนุบาล</td>
                    <td style="text-align: right">0</td>
                    <td style="text-align: right">0</td>
                    <td style="text-align: right">0</td>
                </tr>

                <tr>
                    <td>อนุบาล 1</td>
                    <td style="text-align: right"><?php $num1 =  getRoomGenderProvince('01', $province, 'boy'); echo $num1;?></td>
                    <td style="text-align: right"><?php $num2 = getRoomGenderProvince('01', $province, 'girl'); echo $num2;?></td>
                    <td style="text-align: right"><?php $total1 = $num1 + $num2; echo $total1;?></td>
                </tr>

                <tr>
                    <td>อนุบาล 2 / อนุบาล 1</td>
                    <td style="text-align: right"><?php $num1 =  getRoomGenderProvince('02', $province, 'boy'); echo $num1;?></td>
                    <td style="text-align: right"><?php $num2 = getRoomGenderProvince('02', $province, 'girl'); echo $num2;?></td>
                    <td style="text-align: right"><?php $total2 = $num1 + $num2; echo $total2;?></td>
                </tr>

                <tr>
                    <td>อนุบาล 3 / อนุบาล 2</td>
                    <td style="text-align: right"><?php $num1 =  getRoomGenderProvince('03', $province, 'boy'); echo $num1;?></td>
                    <td style="text-align: right"><?php $num2 = getRoomGenderProvince('03', $province, 'girl'); echo $num2;?></td>
                    <td style="text-align: right"><?php $total3 = $num1 + $num2; echo $total3;?></td>
                </tr>

                <tr>
                    <td>เด็กเล็ก</td>
                    <td style="text-align: right">0</td>
                    <td style="text-align: right">0</td>
                    <td style="text-align: right">0</td>
                </tr>

                <tr>
                    <td>รวมนักเรียน</td>
                    <td style="text-align: right">0</td>
                    <td style="text-align: right">0</td>
                    <td style="text-align: right">0</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="col-md-6" id="">
    <div id="pie_sum" style="width:600px;height:300px"></div>
    </div>
</div>



	<script type="text/javascript" src="<?php echo base_url();?>assets/js/canvasjs.min.js"></script>


<script>
	$(function() {

        var total = <?php  echo $total1 + $total2 + $total3;?>;
        var total1 = <?php echo $total1;?>;
        var total2 = <?php echo $total2;?>;
        var total3 = <?php echo $total3;?>;

        total1 = (parseInt(total1) / parseInt(total)) * 100;
        total2 = (parseInt(total2) / parseInt(total)) * 100;
        total3 = (parseInt(total3) / parseInt(total)) * 100;

		
        var chart = new CanvasJS.Chart("pie_sum", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "รายงานภาพรวมทั้งจังหวัดของจำนวนนักเรียนปฐมวัย"
            },
            subtitles: [{
                text: "ปีการศึกษา <?php echo $year_id + 543;?>",
                fontSize: 16
            }],
            data: [{
                type: "pie",
                indexLabelFontSize: 18,
                radius: 80,
                indexLabel: "{label} - {y}",
                yValueFormatString: "###0.0'%'",
                
                dataPoints: [
                    { y: total1, label: "อนุบาล 1" },
                    { y: total2, label: "อนุบาล 2"},
                    { y: total3, label: "อนุบาล 3" },
                ]
            }]
        });
        chart.render();
    })
</script>