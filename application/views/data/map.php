	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงอัตราการรับนักเรียนระดับมัธยมศึกษาตอนต้น (Enrolment Rate) ในแต่ละอำเภอ  </li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงอัตราการรับนักเรียนระดับมัธยมศึกษาตอนต้น (Enrolment Rate) ในแต่ละอำเภอ  </div>
				  <div class="panel-body">
				  	<div id="map" class='col-md-12' style='min-height: 500px;'></div>
				  </div>
				</div>
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
  var myLatLng = {lat: 15.806900, lng: 102.031559};

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: myLatLng
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'ที่ตั้งของท่าน',
    draggable: false
  });

  

}

    </script>
