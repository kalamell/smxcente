<div class="form-group">
	<label>ประเภทเว็บไซต์</label>
	<input type="text" name="" class='form-control' readonly="readonly" value='<?php echo $r->type_website;?>'/>
</div>

<div class="form-group">
	<label>ชื่อเว็บไซต์</label>
	<input type="text" name="title" value="<?php echo $r->title;?>" class="form-control">
</div>

<div class="form-group">
	<label>จังหวัด</label>
	<select name="province_id" class="form-control">
		<option value=""> - - - เลือกจังหวัด - - -</option>
		<?php foreach($provinces as $p):?>
			<option value="<?php echo $p->PROVINCE_ID;?>" <?php echo $r->province_id == $p->PROVINCE_ID ? 'selected' : '';?>><?php echo $p->PROVINCE_NAME;?></option>
		<?php endforeach;?>
	</select>
</div>


<div class="form-group">
  <label>ภาคเรียน</label>
  <select name="term_id" class="form-control">
    <option value=""> - - - ภาคเรียน - - -</option>
    <?php foreach($terms as $t):?>
      <option value="<?php echo $t->term_id;?>" <?php echo $r->term_id == $t->term_id ? 'selected' : '';?>><?php echo $t->term_name;?></option>
    <?php endforeach;?>
  </select>
</div>


<div class="form-group">
  <label>ปีการศึกษา</label>
  <select name="year_id" class="form-control">
    <option value=""> - - - ปีการศึกษา - - -</option>
    <?php foreach($years as $y):?>
      <option value="<?php echo $y->year_id;?>" <?php echo $r->year_id == $y->year_id ? 'selected' : '';?>><?php echo $y->year_name;?></option>
    <?php endforeach;?>
  </select>
</div>


<div class="form-group">
	<label>Footer</label>
  	<textarea name="footer" class="form-control" rows="5"><?php echo $r->footer;?></textarea>
</div>
<div class="form-group">
	<label>Logo</label>
	<?php 
	if ($r->logo !=''):?>
	<img src="<?php echo base_url();?>upload/<?php echo $r->logo;?>" class='img-responsive' style='width: 100px;'><br>
	<?php endif;?>
	<input type="file" name="logo" class="form-control">
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
		<div class="panel-heading">แผนที่จังหวัด</div>
		<div class="panel-body">
			<input type="text" class="form-control" id="lat" name="lat" value="<?php echo $r->lat == '0' ? '15.806900' : $r->lat;?>">
			<input type="text" class="form-control" id="lng" name="lng" value="<?php echo $r->lng == '0' ? '102.031559' : $r->lng;?>">
			<p class="text-center" style="color: red;">** ท่านสามารถกดลากเพื่อเปลี่ยนหมุดได้</p>

			<div id="map" class='col-md-12' style='min-height: 500px;'></div>
		</div>
	</div>
</div>

<script>


var msg = document.getElementById('msg');
var lat, lng = 0;
var marker, map = null;

getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {
        msg.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    lat = position.coords.latitude;
    lng = position.coords.longitude;
    changeMarkerPosition(lat, lng)
}

function changeMarkerPosition(lat, lng) {
   map.setZoom(12);
}

function panTo(lat, lng) {
	 map.panTo( new google.maps.LatLng( lat, lng ) );
	 map.setZoom(14);
}

function initMap() {
  var myLatLng = {lat: <?php echo $r->lat == 0 ? '15.806900' : $r->lat;?>, lng: <?php echo $r->lng == 0 ? '102.031559' : $r->lng;?>};

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'ที่ตั้งของท่าน',
    draggable: true
  });

  google.maps.event.addListener(marker, 'dragend', function(evt){
  	document.getElementById('lat').value = evt.latLng.lat();
    document.getElementById('lng').value = evt.latLng.lng();

   	panTo(evt.latLng.lat(), evt.latLng.lng());

  	//document.getElementById('msg').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat() + ' Current Lng: ' + evt.latLng.lng() + '</p>';
  });

  google.maps.event.addListener(marker, 'dragstart', function(evt){
  	//document.getElementById('msg').innerHTML = '<p>Currently dragging marker...</p>';
  });

}

    </script>

