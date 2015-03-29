<?php

// no direct access
defined('_JEXEC') or die;

$mid = $module->id;
$doc =& JFactory::getDocument();

$base = JURI::base();
$mod_path = $base."modules/mod_ju_social_icons/";

if(is_object($params->get('icons_color')))
$icons_color = $params->get('icons_color')->color;
else 
$icons_color = $params->get('icons_color');

if(is_object($params->get('icons_bg')))
$icons_bg = $params->get('icons_bg')->color;
else 
$icons_bg = $params->get('icons_bg');

$bg_type = $params->get('bg_type');
$size = $params->get('size');
$margin = $params->get('margin');
$icons_colorize = $params->get('icons_colorize');
$icons_type = $params->get('icons_type');
$target = $params->get('target');
$robots = $params->get('robots');

$icon = array(
	$params->get('icon1'), $params->get('icon2'), $params->get('icon3'), $params->get('icon4'), $params->get('icon5'),
	$params->get('icon6'), $params->get('icon7'), $params->get('icon8'), $params->get('icon9'), $params->get('icon10'),
	$params->get('icon11'), $params->get('icon12'), $params->get('icon13'), $params->get('icon14'), $params->get('icon15'),
	$params->get('icon16'), $params->get('icon17'), $params->get('icon18'), $params->get('icon19'), $params->get('icon20'),
	$params->get('icon21'), $params->get('icon22'), $params->get('icon23'), $params->get('icon24'), $params->get('icon25'),
	$params->get('icon26'), $params->get('icon27'));
$url = array(
	$params->get('url1'), $params->get('url2'), $params->get('url3'), $params->get('url4'), $params->get('url5'),
	$params->get('url6'), $params->get('url7'), $params->get('url8'), $params->get('url9'), $params->get('url10'),
	$params->get('url11'), $params->get('url12'), $params->get('url13'), $params->get('url14'), $params->get('url15'),
	$params->get('url16'), $params->get('url17'), $params->get('url18'), $params->get('url19'), $params->get('url20'),
	$params->get('url21'), $params->get('url22'), $params->get('url23'), $params->get('url24'), $params->get('url25'),
	$params->get('url26'), $params->get('url27'));
$colors = array(
	$params->get('color1'), $params->get('color2'), $params->get('color3'), $params->get('color4'), $params->get('color5'),
	$params->get('color6'), $params->get('color7'), $params->get('color8'), $params->get('color9'), $params->get('color10'),
	$params->get('color11'), $params->get('color12'), $params->get('color13'), $params->get('color14'), $params->get('color15'),
	$params->get('color16'), $params->get('color17'), $params->get('color18'), $params->get('color19'), $params->get('color20'),
	$params->get('color21'), $params->get('color22'), $params->get('color23'), $params->get('color24'), $params->get('color25'),
	$params->get('color26'), $params->get('color27'));

$color = array();
foreach($colors as $col) {
	if(is_object($col))
		$color[] = $col->color;
	else
		$color[] = $col;
}
