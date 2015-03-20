<?php 
/**
* @package MB Flex Slider Module
* @Copyright (C) 2012 marbol2
* @ All rights reserved
* @ Joomla! is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* Contact to : mariuszboloz@gmail.com
* @version 1.1
**/

defined('_JEXEC') or die; 
$doc = JFactory::getDocument();
$base_url = JURI::base();

/*define path to style and scripts*/
$style_url = ''.$base_url.'modules/mod_mbFlexSlider/css';
$js_url = ''.$base_url.'modules/mod_mbFlexSlider/js';


/*load module parameters*/
$jquery = $params->get('jquery');
$jquery_version = $params->get('jquery_version');
$jquery_no_conflict = $params->get('jquery_no_conflict');
$animation_type = $params->get('animation_type');
$direction = $params->get('direction');
$slideshow_speed = $params->get('slideshow_speed');
$animation_speed = $params->get('animation_speed');  
$control_nav = $params->get('control_nav');
$direction_nav = $params->get('direction_nav');
$slider_width = $params->get('slider_width');  


$image1 			= $params->get('slide1_image');
$caption_bg1		= $params->get('slide1_caption_bg');
$title1 			= $params->get('slide1_title');
$sub_title1 		= $params->get('slide1_sub_title');
$desc1 				= $params->get('slide1_desc');
$desc_color1 		= $params->get('slide1_desc_color');
$desc_bg1 			= $params->get('slide1_desc_bg');
$top_position1		= $params->get('slide1_top_position');
$width1				= $params->get('slide1_width');
$align1				= $params->get('slide1_align');
$title_size1		= $params->get('slide1_title_size');
$sub_title_size1	= $params->get('slide1_sub_title_size');
$title_color1		= $params->get('slide1_title_color');
$sub_title_color1	= $params->get('slide1_sub_title_color');
$title_bg1			= $params->get('slide1_title_bg');
$sub_title_bg1		= $params->get('slide1_sub_title_bg');

$image2 			= $params->get('slide2_image');
$caption_bg2		= $params->get('slide2_caption_bg');
$title2 			= $params->get('slide2_title');
$sub_title2 		= $params->get('slide2_sub_title');
$desc2 				= $params->get('slide2_desc');
$desc_bg2 			= $params->get('slide2_desc_bg');
$desc_color2 		= $params->get('slide2_desc_color');
$top_position2		= $params->get('slide2_top_position');
$width2				= $params->get('slide2_width');
$align2				= $params->get('slide2_align');
$title_size2		= $params->get('slide2_title_size');
$sub_title_size2	= $params->get('slide2_sub_title_size');
$title_color2		= $params->get('slide2_title_color');
$sub_title_color2	= $params->get('slide2_sub_title_color');
$title_bg2			= $params->get('slide2_title_bg');
$sub_title_bg2		= $params->get('slide2_sub_title_bg');

$image3 			= $params->get('slide3_image');
$caption_bg3		= $params->get('slide3_caption_bg');
$title3 			= $params->get('slide3_title');
$sub_title3 		= $params->get('slide3_sub_title');
$desc3 				= $params->get('slide3_desc');
$desc_bg3 			= $params->get('slide3_desc_bg');
$desc_color3 		= $params->get('slide3_desc_color');
$top_position3		= $params->get('slide3_top_position');
$width3				= $params->get('slide3_width');
$align3				= $params->get('slide3_align');
$title_size3		= $params->get('slide3_title_size');
$sub_title_size3	= $params->get('slide3_sub_title_size');
$title_color3		= $params->get('slide3_title_color');
$sub_title_color3	= $params->get('slide3_sub_title_color');
$title_bg3			= $params->get('slide3_title_bg');
$sub_title_bg3		= $params->get('slide3_sub_title_bg');

$image4 			= $params->get('slide4_image');
$caption_bg4		= $params->get('slide4_caption_bg');
$title4 			= $params->get('slide4_title');
$sub_title4 		= $params->get('slide4_sub_title');
$desc4 				= $params->get('slide4_desc');
$desc_bg4 			= $params->get('slide4_desc_bg');
$desc_color4 		= $params->get('slide4_desc_color');
$top_position4		= $params->get('slide4_top_position');
$width4				= $params->get('slide4_width');
$align4				= $params->get('slide4_align');
$title_size4		= $params->get('slide4_title_size');
$sub_title_size4	= $params->get('slide4_sub_title_size');
$title_color4		= $params->get('slide4_title_color');
$sub_title_color4	= $params->get('slide4_sub_title_color');
$title_bg4			= $params->get('slide4_title_bg');
$sub_title_bg4		= $params->get('slide4_sub_title_bg');


$image5 			= $params->get('slide5_image');
$caption_bg5		= $params->get('slide5_caption_bg');
$title5 			= $params->get('slide5_title');
$sub_title5 		= $params->get('slide5_sub_title');
$desc5 				= $params->get('slide5_desc');
$desc_bg5 			= $params->get('slide5_desc_bg');
$desc_color5 		= $params->get('slide5_desc_color');
$top_position5		= $params->get('slide5_top_position');
$width5				= $params->get('slide5_width');
$align5				= $params->get('slide5_align');
$title_size5		= $params->get('slide5_title_size');
$sub_title_size5	= $params->get('slide5_sub_title_size');
$title_color5		= $params->get('slide5_title_color');
$sub_title_color5	= $params->get('slide5_sub_title_color');
$title_bg5			= $params->get('slide5_title_bg');
$sub_title_bg5		= $params->get('slide5_sub_title_bg');

$image6 			= $params->get('slide6_image');
$caption_bg6		= $params->get('slide6_caption_bg');
$title6 			= $params->get('slide6_title');
$sub_title6 		= $params->get('slide6_sub_title');
$desc6 				= $params->get('slide6_desc');
$desc_bg6 			= $params->get('slide6_desc_bg');
$desc_color6 		= $params->get('slide6_desc_color');
$top_position6		= $params->get('slide6_top_position');
$width6				= $params->get('slide6_width');
$align6				= $params->get('slide6_align');
$title_size6		= $params->get('slide6_title_size');
$sub_title_size6	= $params->get('slide6_sub_title_size');
$title_color6		= $params->get('slide6_title_color');
$sub_title_color6	= $params->get('slide6_sub_title_color');
$title_bg6			= $params->get('slide6_title_bg');
$sub_title_bg6		= $params->get('slide6_sub_title_bg');

$image7 			= $params->get('slide7_image');
$caption_bg7		= $params->get('slide7_caption_bg');
$title7 			= $params->get('slide7_title');
$sub_title7 		= $params->get('slide7_sub_title');
$desc7 				= $params->get('slide7_desc');
$desc_bg7 			= $params->get('slide7_desc_bg');
$desc_color7 		= $params->get('slide7_desc_color');
$top_position7		= $params->get('slide7_top_position');
$width7				= $params->get('slide7_width');
$align7				= $params->get('slide7_align');
$title_size7		= $params->get('slide7_title_size');
$sub_title_size7	= $params->get('slide7_sub_title_size');
$title_color7		= $params->get('slide7_title_color');
$sub_title_color7	= $params->get('slide7_sub_title_color');
$title_bg7			= $params->get('slide7_title_bg');
$sub_title_bg7		= $params->get('slide7_sub_title_bg');

$image8 			= $params->get('slide8_image');
$caption_bg8		= $params->get('slide8_caption_bg');
$title8 			= $params->get('slide8_title');
$sub_title8 		= $params->get('slide8_sub_title');
$desc8 				= $params->get('slide8_desc');
$desc_bg8 			= $params->get('slide8_desc_bg');
$desc_color8 		= $params->get('slide8_desc_color');
$top_position8		= $params->get('slide8_top_position');
$width8				= $params->get('slide8_width');
$align8				= $params->get('slide8_align');
$title_size8		= $params->get('slide8_title_size');
$sub_title_size8	= $params->get('slide8_sub_title_size');
$title_color8		= $params->get('slide8_title_color');
$sub_title_color8	= $params->get('slide8_sub_title_color');
$title_bg8			= $params->get('slide8_title_bg');
$sub_title_bg8		= $params->get('slide8_sub_title_bg');

$image9 			= $params->get('slide9_image');
$caption_bg9		= $params->get('slide9_caption_bg');
$title9 			= $params->get('slide9_title');
$sub_title9 		= $params->get('slide9_sub_title');
$desc9 				= $params->get('slide9_desc');
$desc_bg9 			= $params->get('slide9_desc_bg');
$desc_color9 		= $params->get('slide9_desc_color');
$top_position9		= $params->get('slide9_top_position');
$width9				= $params->get('slide9_width');
$align9				= $params->get('slide9_align');
$title_size9		= $params->get('slide9_title_size');
$sub_title_size9	= $params->get('slide9_sub_title_size');
$title_color9		= $params->get('slide9_title_color');
$sub_title_color9	= $params->get('slide9_sub_title_color');
$title_bg9			= $params->get('slide9_title_bg');
$sub_title_bg9		= $params->get('slide9_sub_title_bg');

$image10 			= $params->get('slide10_image');
$caption_bg10		= $params->get('slide10_caption_bg');
$title10 			= $params->get('slide10_title');
$sub_title10 		= $params->get('slide10_sub_title');
$desc10 			= $params->get('slide10_desc');
$desc_bg10 			= $params->get('slide10_desc_bg');
$desc_color10 		= $params->get('slide10_desc_color');
$top_position10		= $params->get('slide10_top_position');
$width10			= $params->get('slide10_width');
$align10			= $params->get('slide10_align');
$title_size10		= $params->get('slide10_title_size');
$sub_title_size10	= $params->get('slide10_sub_title_size');
$title_color10		= $params->get('slide10_title_color');
$sub_title_color10	= $params->get('slide10_sub_title_color');
$title_bg10			= $params->get('slide10_title_bg');
$sub_title_bg10		= $params->get('slide10_sub_title_bg');

/*deafine array's*/
$arr_image = array($image1,$image2,$image3,$image4,$image5,$image6,$image7,$image8,$image9,$image10);
$arr_caption_bg = array($caption_bg1,$caption_bg2,$caption_bg3,$caption_bg4,$caption_bg5,$caption_bg6,$caption_bg7,$caption_bg8,$caption_bg9,$caption_bg10);
$arr_title = array($title1,$title2,$title3,$title4,$title5,$title6,$title7,$title8,$title9,$title10);
$arr_sub_title = array($sub_title1,$sub_title2,$sub_title3,$sub_title4,$sub_title5,$sub_title6,$sub_title7,$sub_title8,$sub_title9,$sub_title10);
$arr_desc = array($desc1,$desc2,$desc3,$desc4,$desc5,$desc6,$desc7,$desc8,$desc9,$desc10);
$arr_desc_color = array($desc_color1,$desc_color2,$desc_color3,$desc_color4,$desc_color5,$desc_color6,$desc_color7,$desc_color8,$desc_color9,$desc_color10);
$arr_desc_bg = array($desc_bg1,$desc_bg2,$desc_bg3,$desc_bg4,$desc_bg5,$desc_bg6,$desc_bg7,$desc_bg8,$desc_bg9,$desc_bg10);
$arr_top_position = array($top_position1,$top_position2,$top_position3,$top_position4,$top_position5,$top_position6,$top_position7,$top_position8,$top_position9,$top_position10);
$arr_width = array($width1,$width2,$width3,$width4,$width5,$width6,$width7,$width8,$width9,$width10);
$arr_align = array($align1,$align2,$align3,$align4,$align5,$align6,$align7,$align8,$align9,$align10);
$arr_title_size = array($title_size1,$title_size2,$title_size3,$title_size4,$title_size5,$title_size6,$title_size7,$title_size8,$title_size9,$title_size10);
$arr_sub_title_size = array($sub_title_size1,$sub_title_size2,$sub_title_size3,$sub_title_size4,$sub_title_size5,$sub_title_size6,$sub_title_size7,$sub_title_size8,$sub_title_size9,$sub_title_size10);
$arr_title_color = array($title_color1,$title_color2,$title_color3,$title_color4,$title_color5,$title_color6,$title_color7,$title_color8,$title_color9,$title_color10);
$arr_sub_title_color = array($sub_title_color1,$sub_title_color2,$sub_title_color3,$sub_title_color4,$sub_title_color5,$sub_title_color6,$sub_title_color7,$sub_title_color8,$sub_title_color9,$sub_title_color10);
$arr_title_bg = array($title_bg1,$title_bg2,$title_bg3,$title_bg4,$title_bg5,$title_bg6,$title_bg7,$title_bg8,$title_bg9,$title_bg10);
$arr_sub_title_bg = array($sub_title_bg1,$sub_title_bg2,$sub_title_bg3,$sub_title_bg4,$sub_title_bg5,$sub_title_bg6,$sub_title_bg7,$sub_title_bg8,$sub_title_bg9,$sub_title_bg10);


/*load styles and scripts*/
$doc->addStyleSheet($style_url.'/flexslider.css');
$doc->addStyleSheet($style_url.'/style.css');


if($jquery==1){
$doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/'.$jquery_version.'/jquery.min.js');
}
if($jquery_no_conflict==1){
$doc->addScript($js_url.'/no-conflict.js');
}
$doc->addScript($js_url.'/jquery.flexslider.js');


//slide type
if($animation_type =='fade'){
	$is_animation_type = '"fade"';
}
elseif($animation_type =='slide'){
	$is_animation_type = '"slide"';	
}


//direction
if($direction =='horizontal'){
	$is_direction = '"horizontal"';
}
elseif($direction =='vertical'){
	$is_direction = '"vertical"';	
}

$doc->addScriptDeclaration('
$(window).load(function() {		
$(".flexslider").flexslider({	  
animation: '.$is_animation_type.',
direction:'.$is_direction.',
slideshowSpeed: '.$slideshow_speed.',       //Integer: Set the speed of the slideshow cycling, in milliseconds
animationSpeed: '.$animation_speed.',       //Integer: Set the speed of animations, in milliseconds
    
// Primary Controls
controlNav: '.$control_nav.',               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
directionNav: '.$direction_nav.'
		 
		 	      
          //Boolean: Create navigation for previous/next navigation? (true/false)

});  
});
');
?>

<div class="flexslider" style="width:<?php echo $slider_width;?>;max-width:100%;margin-left:auto;margin-right:auto;">
  <ul class="slides">
        
<?php 	
for($i=0;$i<10;$i++) {	
		
	//caption alignment
	if($arr_align[$i]!='center') {
		$is_align = 'float:'.$arr_align[$i].';';	
	}
	else{
		$is_align = 'margin:0 auto;';	
	}
	
	//caption background
	if($arr_caption_bg[$i]==1) {
		$is_caption_bg = 'caption-bg';	
	}
	else{
		$is_caption_bg = '';	
	}
	
	
	//title color and bg
	if($arr_title_color[$i]!='') {
		$is_title_color = 'color:'.$arr_title_color[$i].';';	
	}
	else{
		$is_title_color = '';	
	}
	
	if($arr_title_bg[$i]!='') {
		$is_title_bg = 'background-color:'.$arr_title_bg[$i].';background-image:none;';	
	}
	else{
		$is_title_bg = '';	
	}
	
	
	//sub-title color and bg
	if($arr_sub_title_color[$i]!='') {
		$is_sub_title_color = 'color:'.$arr_sub_title_color[$i].';';	
	}
	else{
		$is_sub_title_color = '';	
	}
	
	if($arr_sub_title_bg[$i]!='') {
		$is_sub_title_bg = 'background-color:'.$arr_sub_title_bg[$i].';background-image:none;';	
	}
	else{
		$is_sub_title_bg = '';	
	}
		
	
	//description color and bg
	if($arr_desc_color[$i]!='') {
		$is_desc_color = 'color:'.$arr_desc_color[$i].';';	
	}
	else{
		$is_desc_color = '';	
	}
	
	if($arr_desc_bg[$i]!='') {
		$is_desc_bg = 'background-color:'.$arr_desc_bg[$i].';background-image:none;';	
	}
	else{
		$is_desc_bg = '';	
	}
	
	if($arr_desc_color[$i]!='' || $arr_desc_bg[$i]!='') {
		$is_desc_color_or_bg = 'style="'.$is_desc_color.''.$is_desc_bg.'"';	
	}
	else {
		$is_desc_color_or_bg = '';	
	}
	
		
	
	//title
	if($arr_title[$i]!='') {
		$is_title = '<h3 class="slide-title" style="font-size:'.$arr_title_size[$i].';'.$is_title_color.''.$is_title_bg.'">'.$arr_title[$i].'</h3><div class="clear"></div>';	
	}
	else{
		$is_title = '';	
	}	
	
	//subtitle
	if($arr_sub_title[$i]!='') {
		$is_sub_title = '<h4 class="slide-sub-title" style="font-size:'.$arr_sub_title_size[$i].';'.$is_sub_title_color.''.$is_sub_title_bg.'">'.$arr_sub_title[$i].'</h4><div class="clear"></div>';	
	}
	else{
		$is_sub_title = '';	
	}	
	
		
	//description
	if($arr_desc[$i]!='') {
		$is_desc = '<div class="slide-desc" '.$is_desc_color_or_bg.'>'.$arr_desc[$i].'</div>';	
	}
	else{
		$is_desc = '';	
	}
		
	
	//caption
	if($arr_title[$i]!='' || $arr_sub_title[$i]!='' || $arr_desc[$i]!='') {
		$caption = '<div class="caption '.$is_caption_bg.'" style="top:'.$arr_top_position[$i].';"><div class="container"><div class="container-inner" style="width:'.$arr_width[$i].';'.$is_align.'">'.$is_title.''.$is_sub_title.''.$is_desc.'</div><div class="clear"></div></div></div>';
	}
	else {
		$caption = '';	
	}
	
	//slider element
	if($arr_image[$i]!='') {
		$slide[$i]='<li class="slide" data-thumb="'.$base_url.''.$arr_image[$i].'"><img src="'.$base_url.''.$arr_image[$i].'" alt="" />'.$caption.'</li>';	
	}
	else{
		$slide[$i]='';
	}
	
}

echo $slide[0],$slide[1],$slide[2],$slide[3],$slide[4],$slide[5],$slide[6],$slide[7],$slide[8],$slide[9];
?>      
  </ul>
</div>