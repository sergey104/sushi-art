<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$doc =& JFactory::getDocument();

// load cluster style
$doc->addStyleSheet($mod_path."assets/style.css");

$type = '';
if($icons_type == 'rounded')
$type = '-webkit-border-radius:50%; -moz-border-radius:50%; border-radius:50%;';

$background_type = '';
if($bg_type == 1) {
	$background_type = 'background-color:'.$icons_bg.';';
	$csstype = 'background-color';
} else {
	$csstype = 'color';
}

$css = 'ul.social_icons li a {font-size: '.$size.'px; width: '.$size.'px; height: '.$size.'px; line-height: '.$size.'px; color:'.$icons_color.'; margin:'.$margin.'; '.$background_type.'  '.$type.'}';



$robots = ($robots == 1) ? 'rel="nofollow"' : '';
?>


<ul class="social_icons">
<?php
$keys = array_keys($icon,"0");
foreach ($keys as $k)
	unset($icon[$k]);

for($i=0;$i < count($icon);$i++) {
	echo '<li><a href="'.$url[$i].'" target="'.$target.'" '.$robots.' class="social_icon'.$icon[$i].'">'.(($icon[$i] == 'Pin') ? '{' : $icon[$i]).'</a></li>';
} 
?>
</ul>

<?php

for($i=0;$i < count($icon);$i++) {
	$css .= 'body ul.social_icons li a.social_icon'.$icon[$i].(($icons_colorize == 1) ? ':hover' : '').' {'.$csstype.': '.$color[$i].';}'.
	(($icons_colorize == 0) ? 'ul.social_icons li a:hover {background-color:'.$icons_bg.';}' : '');
} 
$doc->addStyleDeclaration($css); 
?>
