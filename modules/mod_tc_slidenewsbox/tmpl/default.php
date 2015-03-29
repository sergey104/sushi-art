<?php

// no direct access
defined('_JEXEC') or die;
if(!defined('DS')){
define( 'DS', DIRECTORY_SEPARATOR );
}
$slide = $params->get('slides');
$cacheFolder = JURI::base(true).'/cache/';
$modID = $module->id;
$modPath = JURI::base(true).'/modules/mod_tc_slidenewsbox/';
$document = JFactory::getDocument(); 
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$jqueryload = $params->get('jqueryload');
$customone = $params->get('customone');

?>
<div id="nebox<?php echo $modID ?>">
<div id="nsbox">
<span id="team-prev" class="prev-next prev"><</span>
<span id="team-next" class="prev-next next">></span> 
</div>
<div id="owl-newsbox" class="nsbox">
<?php
if($slide) {
foreach($slide->vals as $k => $v) {
$img = $slide->img[$k];
if($params->get('resize_images',0))
$img = JURI::base(true).'/cache/'.ModIcclNews2Helper::createThumb($img, 480, 360);
$name = $slide->name[$k];
$decs = $slide->decs[$k];
$title = $slide->title[$k];
$co_bgr = $slide->co_bgr[$k];
$co_txt = $slide->co_txt[$k];
$read_more = $slide->read_more[$k];
$url = $slide->url->link[$k];
$target = $slide->url->target[$k];
$html = array();
$html[] = '<div class="newsbox2_item center">
<div class="newsbox2_sett'.$modID.'"'; if($co_bgr or $co_txt) $html[] = 'style= "color: '.$co_txt.'; background-color: '.$co_bgr.';"'; $html[] = '	>';
if($img) $html[] = '<div class="newsbox2_foto">
<img src="'.$img.'"/>
</div>';
$html[] = '	<div class="newsbox2_descr"'; if($co_bgr or $co_txt) $html[] = 'style= "color: '.$co_txt.'; background-color: '.$co_bgr.';"'; $html[] = '	>';
if($name) $html[] = '<div class="newsbox2_name">'.$name.'</div>';
if($title) $html[] = '<div class="newsbox2_post">'.$title.'</div>';
$html[] = '</div>';
if($decs) $html[] = '<div class="newsbox2_about"'; if($co_bgr or $co_txt) $html[] = 'style= "color: '.$co_txt.'; background-color: '.$co_bgr.';"';if($decs)  $html[] = '	>'.$decs.'</div>';
$html[] = '<div class="newsbox2_social">';
if($url) $html[] = '<a href="'.$url.'" target="'.$target.'" data-placement="bottom" data-toggle="tooltip" title="read more">'.$read_more.'</a>';
$html[] = '	</div>';
$html[] = '</div></div>'."\n";

echo implode("\n",$html);
} // end foreach

// add files

if($jqueryload) $document->addScript($modPath.'assets/js/jquery.min.js');
if($jqueryload) $document->addScript($modPath.'assets/js/jquery-noconflict.js');
$document->addScript($modPath.'assets/js/jquery.owl.carousel.js');
if($customone==0) $document->addScript($modPath.'assets/js/jquery.custom.one.js');
if($customone==1) $document->addScript($modPath.'assets/js/jquery.custom.js');
$document->addStyleSheet($modPath.'assets/css/style.css');
$document->addStyleSheet($modPath.'assets/css/owl.carousel.css');
$document->addStyleDeclaration(' #nebox'.$modID.' .newsbox2_sett'.$modID.' { margin-right:'.$params->get('container_fix',6).'px;margin-bottom:'.$params->get('container_fix',6).'px; background-color:#fff;} #nebox'.$modID.' .newsbox2_sett'.$modID.'{box-shadow:0 0 5px rgba(0,0,0,0.1);}
#nebox'.$modID.' .newsbox2_social a, #nebox'.$modID.' .newsbox2_sep {background-color:'.$params->get('color').';} #nebox'.$modID.' .newsbox2_social a:hover {color: #fff;}');
} else {
echo 'Load Items first!';	
}
?>
</div>
</div>

<!-- End Flex Slider code -->

