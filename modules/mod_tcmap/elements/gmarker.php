<?php
/**
 * 	Copyright 2012
 * Created on Jan, 2012
 * @author themescreative.com
 *
 */
require_once(JPATH_SITE . '/modules/mod_tcMap/elements/GElement.php');

 class JFormFieldGMarker extends JFormField{
	var $type = 'GMarker';
	/**
	 * Javascript map initialization
	 * Javascript variable 'marker' must be defined.
	 */
	function addJavascript(&$params){
		$document = JFactory::getDocument();
		$lat = $params->get('lat');
		$long = $params->get('longitude');
		$js =<<<EOL
			var marker;
			function updateMarker(element){
				var lat = $('jform_params_lat').value;
				var lng = $('jform_params_lng').value;
				var opts = { draggable : true, bouncy: true };

				if(element.checked == true){
						opts.title = $('jform_params_marker_title').value;
						opts.map = map;
						opts.position = new google.maps.LatLng( lat, lng);
						marker = new google.maps.Marker(opts);
						google.maps.event.addListener(marker, 'drag', function(latlng){
							var latlng = this.getPosition();
							$('jform_params_marker_lat').value = latlng.lat();
							$('jform_params_marker_lng').value = latlng.lng();
						});

						$('jform_params_marker_lat').value = lat;
						$('jform_params_marker_lng').value = lng;

			  	}else{
			  		if(marker){
			  			marker.setVisible(false);
			  			delete marker;
			  			marker = null;

			  		}
			  	}
			}
EOL;

		$document->addScriptDeclaration($js);
	}

	function getInput  ( ){
		$params =& GElement::getParameters();

		$this->addJavascript($params);
		$marker = ($params->get('marker', '')) ? 'checked' : '' ;
		$html = '<input type="checkbox" id="paramsmarker" name="jform[params][marker]" ' . $marker .
				' onclick="updateMarker(this);" value="1" />';

		return $html;
	}
 }
?>