<?php
/**
 * 	Copyright 2012
 * Created on Jan, 2012
 * @author themescreative.com
 *
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
require_once(JPATH_SITE . '/modules/mod_tcMap/elements/GElement.php');


 class JFormFieldGMap extends JFormField{
	var $type = "GMap";

	function __construct($form = null){
		parent::__construct($form);
		$version = new JVersion();
		$this->isVersion3 = substr( $version->getShortVersion(), 0, 2) == '3.0';
	}

	/**
	 * Javascript map initialization
	 */
	function initMap( $lat, $lng, $zoom, $marker, &$params){
		$document =& JFactory::getDocument();
		$js = "http://maps.google.com/maps/api/js?sensor=false";
		$mapType = $params->get('mapType', 'ROADMAP');
		$document->addScript($js);
		$markerScript = '';
		$marker_lat = $params->get('marker_lat');
		$marker_lng = $params->get('marker_lng');
		$isVersion3 = (int)$this->isVersion3;

		if($marker){
			$markerTitle = $params->get('marker_title');
			$markerScript =<<<EOL
			var opts = { draggable : true, bouncy: true };
			opts.title = "{$markerTitle}";
			opts.position = new google.maps.LatLng($marker_lat, $marker_lng);
			opts.map = map
			marker = new google.maps.Marker(opts);
			google.maps.event.addListener(marker, 'drag', function(latlng){
				var latlng = this.getPosition();
				$('jform_params_marker_lat').value = latlng.lat();
				$('jform_params_marker_lng').value = latlng.lng();
			});
EOL;
		}

		$onload =<<<EOL
			var map;
			var marker;
			var isVersion3 = {$isVersion3};

			google.maps.event.addDomListener(window,'load', load );
		    function load() {

				if(isVersion3){
					$$('.nav-tabs li a').addEvent('click', function(){
						if($(this).get('href') == '#options-basic'){
							setTimeout(function(){ $('refreshMap').fireEvent('click'); }, 250);
						}
					});
				}

				$('refreshMap').addEvent('click', function () {
					google.maps.event.trigger(map, 'resize' );
					map.setCenter( new google.maps.LatLng( $('jform_params_lat').value, $('jform_params_lng').value ) );
				});

			 	var mapOptions = {
			 	    center : new google.maps.LatLng({$lat}, {$lng}),
			 	    zoom : {$zoom},
			 	    mapTypeId: google.maps.MapTypeId.{$mapType},
      				navigationControl: true,
      				mapTypeControl: false
  				}
		        map = new google.maps.Map(document.getElementById("map"), mapOptions);

		        google.maps.event.addListener( map , 'dragend', updateLatLong);
				google.maps.event.addListener( map , 'zoom_changed', updateZoom);
				google.maps.event.addListener( map , 'drag', updateLatLong);
				$markerScript

				$('jform_params_zoom').addEvent('keyup', function(){
					value = parseInt(this.value);
					if(value)
						map.setZoom(value);
				});

				$('search_location').addEvent('keydown', function(event) {
      				if(event.key == "enter") {
         				searchlocation();
      				}
   				});

				$('searchBtn').addEvent('click', searchlocation	);

		    }

		    function searchlocation(){
				var value = $('search_location').value;
				var request = { address : value };
				if(!value) return;
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode(request, function ( results ,status ){
					if (status == google.maps.GeocoderStatus.OK) {
						latlng = results[0].geometry.location;
				        map.setCenter(latlng);
				        $('jform_params_lat').value = latlng.lat();
				        $('jform_params_lng').value = latlng.lng();
				        $('jform_params_marker_title').value = results[0].formatted_address;
				        $('jform_params_marker_lat').value = latlng.lat();
				        $('jform_params_marker_lng').value = latlng.lng();
				        if(marker){
							marker.setTitle(results[0].formatted_address);
							marker.setPosition(latlng);
				        }else{
					        marker = new google.maps.Marker({
					        	map: map,
					            position: latlng,
					            title : results[0].formatted_address
					        });
				        }
				        $('paramsmarker').checked = true;
				    } else {
				    	alert("Geocode was not successful for the following reason: " + status);
				    }

				});
			}

			function updateZoom(){
				$('jform_params_zoom').value = map.getZoom();
			}

			function updateLatLong(){
				var center = map.getCenter();
				var lat = center.lat();
				var lng = center.lng();
				$('jform_params_lat').value = lat;
				$('jform_params_lng').value = lng;
			}
EOL;

		$document->addScriptDeclaration($onload);
	}

	function getInput(){
		$params =& GElement::getParameters();

		$lat = $params->get('lat', 48.5747);
		$long = $params->get('lng', -123);
		$zoom = $params->get('zoom', 3);
		$height = $params->get('height',150);
		$marker = $params->get('marker');
		$markerTitle = $params->get('marker_info', '');
		$this->initMap($lat, $long, $zoom, $marker, $params);
		$search = JText::_("MOD_JGMAP_SEARCH");
		$searchMap = JText::_('MOD_JGMAP_SEARCH_LOCATION');
		$elements =<<<EOL
		<div style="clear:left;">
			<style>
			/* img in Admin Isis template of Joomla 3.0 set img { max-width: 100% } , a na, na! */
			#map img {
				 max-width: none;
			}
			</style>
		<div id="map" style="padding: 10px,margin:4px 4px 10px; width: 100%; height: {$height}px"> </div>
		<label for="search_location" >$searchMap</label>
		<input type="text" size="45" id="search_location" name="search_location" />
		<input type="button" value="$search" id="searchBtn" />
		<input type="button" class="btn" value="Refresh Map" id="refreshMap" />
		</div>
EOL;

		return $elements;
	}

 }
?>
<script type="text/javascript">
/**
 * Events for adjusting the size of the google map.
 */
window.addEvent('load', function(){
	var el = $('jform_params_width');
	el.addEvent('keyup', function(){
		adjustDimensions(this);
	});
	el = $('jform_params_height');
	el.addEvent('keyup' ,function(){
		adjustDimensions(this);
	});

});

/**
 * Adjust the google map size.
 * @param el Div of the Google map.
 */
function adjustDimensions(el){
	if(el.value.length > 2){
		var mapDiv = $('map');
		var width = parseInt($('jform_params_width').value) || 100;
		var height = parseInt($('jform_params_height').value)  || 100;
		mapDiv.style.width = 100%;
		mapDiv.style.height = height + 'px';
	}
}
</script>