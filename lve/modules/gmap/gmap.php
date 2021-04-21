<style>
body{
	margin:0;
	padding:0;}
</style>
	<link rel="stylesheet" href="../../js/gmap/base/jquery.ui.all.css">
	<link rel="stylesheet" href="../../js/gmap/demo.css">
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

	<script src="../../js/jquery-1.7.2.js"></script>
	<script src="../../js/gmap/jquery-ui-1.8.7.min.js"></script>
	<script src="../../js/gmap/jquery.ui.addresspicker.js"></script>
	<script>
	$(function() {
		var addresspicker = $( "#addresspicker" ).addresspicker();
		var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
			regionBias: "fr",
			draggableMarker: false,
			mapOptions: {
            zoom: 16, 
            center: new google.maps.LatLng(<?php echo $_GET['lat']; ?>, <?php echo  $_GET['lng']; ?>)
			},
		  elements: {
		    map:      "#map",
		    lat:      "#lat",
		    lng:      "#lng",
		    locality: '#locality',
		    administrative_area_level_2: '#administrative_area_level_2',
		    administrative_area_level_1: '#administrative_area_level_1',
		    country:  '#country',
		    postal_code: '#postal_code',
        	type:    '#type' 
		  }
		});
		var gmarker = addresspickerMap.addresspicker("marker");
		gmarker.setVisible(true);
		addresspickerMap.addresspicker("updatePosition");
		
	});
	</script>

<div class='input' style="display:none">
<input type="hidden" id="addresspicker_map" />
<input type="hidden" id="locality" disabled=disabled>
<input type="hidden" id="administrative_area_level_2" disabled=disabled>
<input type="hidden" id="administrative_area_level_1" disabled=disabled>
<input type="hidden" id="country" disabled=disabled>
<input type="hidden" id="postal_code" disabled=disabled>
<input type="text" id="lat" name="lat" >
<input type="text" id="lng" name="lng">
</div>
    <div id="map"></div>
