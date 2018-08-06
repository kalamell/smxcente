	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">แผนที่ดาวเทียวแยกสังกัด แยกอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">แผนที่ดาวเทียวแยกสังกัด แยกอำเภอ</div>
				  <div class="panel-body">

				  	<?php 
				  	$sl1 = '';
				  	$sl2 = '';

				  	?>
				  	

					<div class="row">

						<?php echo form_open('data/area/map', array('class' => 'form-inline'));?>
							<div class='col-md-12'>
								<div class="form-group">
									<label>สังกัด</label>
									<select name="area_type_id" class="form-control">
										<option value="">สังกัด</option>
										<?php foreach($area as $a):?>

											<?php 
											if (!$this->input->get('amphur_id')) {
												$sl1 = $a->area_type_id == $this->session->userdata('area_type_id') ? 'selected' : '';
											}
											?>
											<option value="<?php echo $a->area_type_id;?>" <?php echo $sl1;?>><?php echo $a->area_type_name;?></option>
										<?php endforeach;?>
									</select>
								</div>


								<div class="form-group">
									<label>อำเภอ</label>
									<select name="amphur_id" class="form-control">
										<option value="">อำเภอ</option>
										<?php foreach($amphur as $am):?>

											<?php 
											if (!$this->input->get('amphur_id')) {
												$sl2 = $a->area_type_id == $this->session->userdata('area_type_id') ? 'selected' : '';
											} else {
												$sl2 = $this->input->get('amphur_id') == $AMPHUR_ID ? 'selected' : '';
											}
											?>

											<option value="<?php echo $am->AMPHUR_ID;?>" <?php echo $sl2;?>><?php echo $am->AMPHUR_NAME;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<button class="btn btn-sm btn-default" type="submit">ค้นหา</button>
							</div>
							<br><br><div class='clearfix'></div>
						<?php echo form_close();?>
						
						<div id="map" class='col-md-12' style='min-height: 700px;'></div>

			        </div>

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
   map.setZoom(10);
}

var customLabel = {
        restaurant: {
          label: 'R'
        },
        school: {
          label: 'S'
        }
      };

function panTo(lat, lng) {
	 map.panTo( new google.maps.LatLng( lat, lng ) );
	 map.setZoom(10);
}
<?php 
$latlng = getLatLng();
$lat = $latlng->lat;
$lng = $latlng->lng;

if ($this->input->get('school_id')) {
	foreach($rs as $r) {
		$lat = (string)$r->lat;
		$lng = (string)$r->lng;
	}
}

?>

function initMap() {
  var myLatLng = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: myLatLng
  });

  /*
  marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'ที่ตั้งของท่าน',
    draggable: false
  });
*/

	loadMap();
  
}

function loadMap() {
	<?php 
	$location = '[';
	foreach($rs as $r) {
		$lat = (string)$r->lat;
		$lng = (string)$r->lng;
		$name = $r->school_name;
		$student = getStudentSchool($r->school_id);
		$teacher = getTeacherSchool($r->school_id);
		$location.= "[".$lat.", ".$lng.", '".$name."', ".$student.", ".$teacher."],";
	}
	$location .=']';
	?>

	var locations = <?php echo $location;?>;
	var i;
	for (i = 0; i < locations.length; i++) { 

		var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">' + locations[i][2] +'</h1>'+
            '</div>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

	  marker = new google.maps.Marker({
	    position: new google.maps.LatLng(locations[i][0], locations[i][1]),
	    map: map,
	    title: locations[i][2],
	   });

	  marker.addListener('click', function() {
          infowindow.open(map, marker);
        });


	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
	    return function() {
	      infowindow.setContent('รร: ' + locations[i][2] + '<br>นร: ' + locations[i][3] + ' คน<br> ครู: ' + locations[i][4] +' คน');
	      infowindow.open(map, marker);
	    }
	  })(marker, i));
	}

	
}

function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
	    new ActiveXObject('Microsoft.XMLHTTP') :
	    new XMLHttpRequest;

	request.onreadystatechange = function() {
	  if (request.readyState == 4) {
	    request.onreadystatechange = doNothing;
	    callback(request, request.status);
	  }
	};

	request.open('GET', url, true);
	request.send(null);
}

function doNothing() {}
    </script>
