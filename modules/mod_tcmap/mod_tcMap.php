<?php
/**
 * 	Copyright 2012
 * Created on Jan, 2012
 * @author themescreative.com
 *
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
$document =& JFactory::getDocument();
$height = $params->get('height', 120);
$lat = $params->get('lat', 49);
$long = $params->get('lng', -122);
$zoom = $params->get('zoom', 3);
$mapName = $params->get('mapName', 'map');
$mapName = 'mod_tcMap'.$module->id;
$mapType = $params->get('mapType', 'ROADMAP');
$js = "http://maps.google.com/maps/api/js?sensor=false";

$document->addScript($js);
$mapOptions = '';
$markerOptions = '';

if($params->get('marker')){
	$title = $params->get('marker_title', '');
	$marker_lat = $params->get('marker_lat');
	$marker_lng = $params->get('marker_lng');
	$markerOptions =<<<EOL

	var opts = new Object;
	opts.title = "{$title}";
	opts.position = new google.maps.LatLng({$marker_lat}, {$marker_lng});
	opts.map = $mapName;
	marker = new google.maps.Marker(opts);
EOL;
}
$navControls = true;
if($params->get('static') || $params->get('navControls', false) == 0){
	$mapOptions .= ',disableDefaultUI: false'. PHP_EOL;
	$mapOptions .= ',streetViewControl: false' . PHP_EOL;
	$navControls = false;
}
if($params->get('smallmap')){
	$mapOptions .=  ', navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL} ' . PHP_EOL;
	$navControls = true;
}

if(!$navControls)
	$mapOptions .= ',navigationControl: false' . PHP_EOL;


if($params->get('static')){
	$mapOptions .= 	', draggable: false' .PHP_EOL;
}
$mapTypeControl = $params->get('mapTypeControl',false) ? 'true' : 'false';

$mapOptions .= ",mapTypeControl: {$mapTypeControl}". PHP_EOL;

$script =<<<EOL
	google.maps.event.addDomListener(window, 'load', {$mapName}load);

    function {$mapName}load() {
		var options = {
			zoom : {$zoom},
			center: new google.maps.LatLng({$lat}, {$long}),
			mapTypeId: google.maps.MapTypeId.{$mapType}
			{$mapOptions}
		}

        var {$mapName} = new google.maps.Map(document.getElementById("{$mapName}"), options);
		{$markerOptions}
    }

EOL;

$version = new JVersion;
$joomla = $version->getShortVersion();
if(substr($joomla,0,3) > '3.0'){
	JHTML::_('behavior.framework');
}else{
	JHTML::_('behavior.mootools');
}

$document->addScriptDeclaration($script);
$document->addStyleSheet('modules/mod_tcMap/assets/mod_jgmap.css');
require(JModuleHelper::getLayoutPath('mod_tcMap'));