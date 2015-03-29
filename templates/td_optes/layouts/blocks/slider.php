<?php

defined('_JEXEC') or die;

$caption         = $this->params->get ('caption');
$menu            = $this->params->get ('menu');
$slides          = $this->params->get('slides');
$shadows         = $this->params->get('shadows');
$headHeigh	     = $this->params->get('headHeigh');
$socialCode         = $this->params->get ('socialCode');
$jukenburn_thumb1 	= $this->params->get('jukenburn_thumb1', '' );
$jukenburn_thumb2 	= $this->params->get('jukenburn_thumb2', '' );
$jukenburn_thumb3 	= $this->params->get('jukenburn_thumb3', '' );
$jukenburn_thumb4 	= $this->params->get('jukenburn_thumb4', '' );
$jukenburn_thumb5 	= $this->params->get('jukenburn_thumb5', '' );
$jukenburn_thumb6 	= $this->params->get('jukenburn_thumb6', '' );
$jukenburn_image1 	= $this->params->get('jukenburn_image1', '' );
$jukenburn_image2 	= $this->params->get('jukenburn_image2', '' );
$jukenburn_image3 	= $this->params->get('jukenburn_image3', '' );
$jukenburn_image4 	= $this->params->get('jukenburn_image4', '' );
$jukenburn_image5 	= $this->params->get('jukenburn_image5', '' );
$jukenburn_image6 	= $this->params->get('jukenburn_image6', '' );
$jukenburn_texts1 	= $this->params->get('jukenburn_texts1', '' );
$jukenburn_texts2 	= $this->params->get('jukenburn_texts2', '' );
$jukenburn_texts3 	= $this->params->get('jukenburn_texts3', '' );
$jukenburn_texts4 	= $this->params->get('jukenburn_texts4', '' );
$jukenburn_texts5 	= $this->params->get('jukenburn_texts5', '' );
$jukenburn_texts6 	= $this->params->get('jukenburn_texts6', '' );
$jukenburn_text1 	= $this->params->get('jukenburn_text1', '' );
$jukenburn_text2 	= $this->params->get('jukenburn_text2', '' );
$jukenburn_text3 	= $this->params->get('jukenburn_text3', '' );
$jukenburn_text4 	= $this->params->get('jukenburn_text4', '' );
$jukenburn_text5 	= $this->params->get('jukenburn_text5', '' );
$jukenburn_text6 	= $this->params->get('jukenburn_text6', '' );
$jukenburn_desc1 	= $this->params->get('jukenburn_desc1', '' );
$jukenburn_desc2 	= $this->params->get('jukenburn_desc2', '' );
$jukenburn_desc3 	= $this->params->get('jukenburn_desc3', '' );
$jukenburn_desc4 	= $this->params->get('jukenburn_desc4', '' );
$jukenburn_desc5 	= $this->params->get('jukenburn_desc5', '' );
$jukenburn_desc6 	= $this->params->get('jukenburn_desc6', '' );
$jukenburn_info1 	= $this->params->get('jukenburn_info1', '' );
$jukenburn_info2 	= $this->params->get('jukenburn_info2', '' );
$jukenburn_info3 	= $this->params->get('jukenburn_info3', '' );
$jukenburn_info4 	= $this->params->get('jukenburn_info4', '' );
$jukenburn_info5 	= $this->params->get('jukenburn_info5', '' );
$jukenburn_info6 	= $this->params->get('jukenburn_info6', '' );
$jukenburn_desc1 	= $this->params->get('jukenburn_desc1', '' );
$jukenburn_desc2 	= $this->params->get('jukenburn_desc2', '' );
$jukenburn_desc3 	= $this->params->get('jukenburn_desc3', '' );
$jukenburn_desc4 	= $this->params->get('jukenburn_desc4', '' );
$jukenburn_desc5 	= $this->params->get('jukenburn_desc5', '' );
$jukenburn_desc6 	= $this->params->get('jukenburn_desc6', '' );

if ($jukenburn_thumb1 || $jukenburn_thumb2 || $jukenburn_thumb3 || $jukenburn_thumb4 || $jukenburn_thumb5) {
// use images from template manager
} else {
// use default images
$jukenburn_thumb1 = $this->baseurl . '/templates/' . $this->template . '/header/header01.jpg';
$jukenburn_thumb2 = $this->baseurl . '/templates/' . $this->template . '/header/header02.jpg';
}

?>

<?php if (($this->countModules('header') && $slides == 2) || ($slides == 1)): ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/header/css/style.css" type="text/css" />
<style>
.fullwidthbanner-container{
width:100% !important;		
position:relative;
padding:0;
margin: 0px;
max-height:<?php echo $this->params->get('headHeigh'); ?>px !important;
overflow:hidden;
background-repeat: repeat;
background-position:center;
}
</style>
<section id="slider" class="sliderpot">
<div class="fullwidthbanner-container">
<div class="fullwidthbanner">          
<ul>
<?php if ($jukenburn_thumb1): ?>
<!-- FADE -->
<li data-transition="fade" data-slotamount="4" > <img src="<?php echo $jukenburn_thumb1; ?>">
<div class="tp-caption lfr very_big_white" data-x="0" data-y="200" data-speed="600" data-start="300" data-easing="easeOutExpo"><?php echo $jukenburn_texts1; ?></div>
<div class="tp-caption sfl big_black" data-x="0" data-y="250" data-speed="600" data-start="1200" data-easing="easeOutExpo"><?php echo $jukenburn_desc1; ?></div>
<?php if ($jukenburn_text1): ?><div class="tp-caption lfr buttons"  data-x="0" data-y="290" data-speed="600" data-start="1800" data-easing="easeOutExpo"><a href="<?php echo $jukenburn_text1; ?>" title="<?php echo $jukenburn_text1; ?>">Read more</a></div><?php endif;?>
</li>
<?php endif;?>
<?php if ($jukenburn_thumb2): ?>
<!-- SLIDEUP -->
<li data-transition="" data-slotamount="15" > <img src="<?php echo $jukenburn_thumb2; ?>">
<div class="tp-caption lfl very_big_white"  data-x="50" data-y="200" data-speed="800" data-start="700" data-easing="easeOutBack"><?php echo $jukenburn_texts2; ?></div>
<div class="tp-caption sfr big_black" data-x="150" data-y="250" data-speed="600" data-start="1400" data-easing="easeOutExpo"><?php echo $jukenburn_desc2; ?></div>
<?php if ($jukenburn_text2): ?><div class="tp-caption lfl buttons"  data-x="50" data-y="290" data-speed="500" data-start="1900" data-easing="easeOutBack"><a href="<?php echo $jukenburn_text2; ?>" title="<?php echo $jukenburn_text2; ?>">Read more</a></div><?php endif;?>
</li>
<?php endif;?>
<?php if ($jukenburn_thumb3): ?>
<!-- SLIDEUP -->
<li data-transition="" data-slotamount="10" > <img src="<?php echo $jukenburn_thumb3; ?>">
<div class="tp-caption lfl very_big_white"  data-x="100" data-y="200" data-speed="800" data-start="200" data-easing="easeOutExpo"><?php echo $jukenburn_texts3; ?></div>
<div class="tp-caption lfr big_black" data-x="0" data-y="275" data-speed="500" data-start="1200" data-easing="easeOutExpo"><?php echo $jukenburn_desc3; ?></div>
<?php if ($jukenburn_text3): ?><div class="tp-caption lft buttons"  data-x="0" data-y="220" data-speed="400" data-start="1300" data-easing="easeOutExpo"><a href="<?php echo $jukenburn_text3; ?>" title="<?php echo $jukenburn_text3; ?>">Read more</a></div><?php endif;?>
</li>
<?php endif;?>
<?php if ($jukenburn_thumb4): ?>
<!-- SLIDEUP -->
<li data-transition="" data-slotamount="10"> <img src="<?php echo $jukenburn_thumb4; ?>">
<div class="tp-caption lfb very_big_white"  data-x="0" data-y="200" data-speed="600" data-start="400" data-easing="easeOutExpo"><?php echo $jukenburn_texts4; ?></div>
<div class="tp-caption sfl big_black" data-x="100" data-y="250" data-speed="300" data-start="1200" data-easing="easeOutExpo"><?php echo $jukenburn_desc4; ?></div>
<?php if ($jukenburn_text4): ?><div class="tp-caption lfb buttons"  data-x="0" data-y="290" data-speed="400" data-start="1900" data-easing="easeOutExpo"><a href="<?php echo $jukenburn_text4; ?>" title="<?php echo $jukenburn_text4; ?>">Read more</a></div><?php endif;?>
</li>
<?php endif;?>
<?php if ($jukenburn_thumb5): ?>
<!-- SLIDEUP -->
<li data-transition="" data-slotamount="12"> <img src="<?php echo $jukenburn_thumb5; ?>">
<div class="tp-caption sft very_big_white"  data-x="100" data-y="210" data-speed="600" data-start="700" data-easing="easeOutBack"><?php echo $jukenburn_texts5; ?></div>
<div class="tp-caption sfl big_black" data-x="-30" data-y="285" data-speed="700" data-start="1500" data-easing="easeOutExpo"><?php echo $jukenburn_desc5; ?></div>
<?php if ($jukenburn_text5): ?><div class="tp-caption sfl buttons"  data-x="-30" data-y="230" data-speed="400" data-start="2400" data-easing="easeOutBack"><a href="<?php echo $jukenburn_text5; ?>" title="<?php echo $jukenburn_text5; ?>">Read more</a></div><?php endif;?>
</li>
<?php endif;?>
<?php if ($jukenburn_thumb6): ?>
<!-- SLIDEUP -->
<li data-transition="" data-slotamount="12"> <img src="<?php echo $jukenburn_thumb6; ?>">
<div class="tp-caption sft very_big_white"  data-x="100" data-y="210" data-speed="600" data-start="700" data-easing="easeOutBack"><?php echo $jukenburn_texts6; ?></div>
<div class="tp-caption sfl big_black" data-x="-30" data-y="285" data-speed="700" data-start="1500" data-easing="easeOutExpo"><?php echo $jukenburn_desc6; ?></div>
<?php if ($jukenburn_text6): ?><div class="tp-caption sfl buttons"  data-x="-30" data-y="230" data-speed="400" data-start="2400" data-easing="easeOutBack"><a href="<?php echo $jukenburn_text6; ?>" title="<?php echo $jukenburn_text6; ?>">Read more</a></div><?php endif;?>
</li>
<?php endif;?>
</ul>
<div class="tp-bannertimer"></div>
</div>
</div>
</section>
<script type = "text/javascript" src = "<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/header/js/jquery.plugins.min.js"></script>
<script type = "text/javascript" src = "<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/header/js/jquery.revolution.min.js"></script>		
<script type="text/javascript">								
var tpj=jQuery;
tpj.noConflict();				
tpj(document).ready(function() {				
if (tpj.fn.cssOriginal!=undefined)
tpj.fn.css = tpj.fn.cssOriginal;
tpj('.fullwidthbanner').revolution(
{	
delay:<?php echo $this->params->get('speed'); ?>,												
startwidth:890,
startheight:450,							
onHoverStop:"<?php echo $this->params->get('banner'); ?>",						// Stop Banner Timet at Hover on Slide on/off
thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
thumbHeight:30,
thumbAmount:3,
hideThumbs:10,
navigationType:"<?php echo $this->params->get('menu'); ?>",					//bullet, thumb, none, both	 (No Shadow in Fullwidth Version !)
navigationArrows:"verticalcentered",		//nexttobullets, verticalcentered, none
navigationStyle:"<?php echo $this->params->get('styles'); ?>",				//round,square,navbar
touchenabled:"on",						// Enable Swipe Function : on/off
navOffsetHorizontal:0,
navOffsetVertical:20,
fullWidth:"on",
shadow:<?php echo $this->params->get('shadow'); ?>,								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
stopLoop:"off"							// on == Stop loop at the last Slie,  off== Loop all the time.		
});	
});
</script>

<?php endif; ?>	
<!-- No Slides -->
<?php if ($this->countModules('header') && $slides == 0): ?>
<section id="slider" class="sliderpot">
<jdoc:include type="modules" name="header" />
</section>
<?php endif; ?>		
<div class="clear"></div>       

