<?php
/**
* @package td_optes Template
* @author joomlatd
* @file-setts 
*/
defined('_JEXEC') or die;
?>

<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
if ($menu->getActive() == $menu->getDefault()) : ?>

<!-- Select If Header is Fixed or Static -->
<?php if ($this->params->get('fixHeader') =="1" ) { ?>	
<script type="text/javascript">	   	
if (jQuery(window).width() > 768) {
if (jQuery(window).scrollTop() > 0){
jQuery('nav').addClass('fixed');
} else {
jQuery('nav').removeClass('fixed');
}
}
else {
jQuery('nav').css("position", "absolute");
}

jQuery(window).on("scroll", function(){
var winHeight = jQuery(window).height();
var windowWidth = jQuery(window).width();
var windowScroll = jQuery(window).scrollTop();

if (jQuery(window).width() > 768) {
if (jQuery(window).scrollTop() > jQuery('').height() ){
jQuery('nav').addClass('fixed');
} else {
jQuery('nav').removeClass('fixed');
}
if (jQuery(window).scrollTop() < jQuery('').height() ){
jQuery('nav').addClass('removed');
} else {
jQuery('nav').removeClass('removed');
}
if (jQuery(window).scrollTop() < 1 ){
jQuery('nav').removeClass('removed');
}
}
else {
jQuery('nav').css("position", "relative");
}
});	

</script>
<?php } ?>   
<?php endif; ?> 

<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
if ($menu->getActive() != $menu->getDefault()) : ?>
<?php if ($this->params->get('fixHeader') =="1" ) { ?>
<script type="text/javascript">	   	
if (jQuery(window).width() > 765) {
if (jQuery(window).scrollTop() > 10){
jQuery('nav').addClass('fixed');
} 
else {
jQuery('nav').removeClass('fixed');
}
}
else {
jQuery('nav').css("position", "absolute");
}

jQuery(window).on("scroll", function(){
var winHeight = jQuery(window).height();
var windowWidth = jQuery(window).width();
var windowScroll = jQuery(window).scrollTop();

if (jQuery(window).width() > 765) {
if (jQuery(window).scrollTop() > 50 ){
jQuery('nav').addClass('fixed');
} else {
jQuery('nav').removeClass('fixed');
}
}
else {
jQuery('nav').css("position", "relative");
}
});
</script>
<?php } ?>

<?php if ($this->params->get('alphaHeader') =="1" ) { ?>
<style type="text/css">
nav{ margin-bottom:0 !important;}
</style>
<?php } ?>
<?php endif; ?> 

<script type="text/javascript">
if ( ! window.console ) console = { log: function(){} };
jQuery('.subMenu').singlePageNav({
offset: 60,
filter: ':not(.external)',
currentClass:'actview' ,
speed: 600 ,
});
</script>

<?php
// Use of Retina Display
if ($this->params->get('retinaReady') =="1" )
{
?>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/retina-1.1.0.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/less/retina-1.1.0.less" type="text/less" media="all" />
<?php
} ?>

<?php
// Use of back to top btn
if ($this->params->get('backToTop') =="1" )
{
?>
<a href="#" class="go-top"><i class="icon-angle-up icon-2x"></i></a>
<script type="text/javascript">
jQuery(document).ready(function() {
if (jQuery(window).width() > 668) {
// Show or hide the sticky footer button
jQuery(window).scroll(function() {
if (jQuery(this).scrollTop() > 410) {
jQuery('.go-top').fadeIn(200);
} else {
jQuery('.go-top').fadeOut(200);
}
});

// Animate the scroll to top
jQuery('.go-top').click(function(event) {
event.preventDefault();

jQuery('html, body').animate({scrollTop: 0}, 410);
})
}
});
</script>
<?php
} ?>

<?php
// Use of NiceScroll
if ($this->params->get('niceScroll') =="1" )
{
?>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.nicescroll.js"></script> 
<script type="text/javascript">
jQuery(document).ready(
function() { 
jQuery("html").niceScroll();
}
);	
</script>
<?php
} ?>

<script type="text/javascript">

jQuery(document).ready(function(){

if (jQuery(window).width() > 768) {
// dropdown
jQuery('.parent').addClass('dropdown');
jQuery('.parent > a').addClass('dropdown-toggle');
jQuery('.parent > a').attr('data-toggle', 'dropdown');
jQuery('.parent > ul').addClass('dropdown-menu');
jQuery('.nav-child .parent').removeClass('dropdown');
//dropdown submenus
jQuery('.nav-child .parent').addClass('dropdown-submenu');
jQuery('.dropdown-submenu > a').removeAttr('class');
jQuery('.dropdown-submenu > a').removeAttr('data-toggle', 'dropdown');
jQuery('.dropdown-submenu > a > span').remove();
}

// Small Devices Menu ( <768px )
if (jQuery(window).width() < 768) {
jQuery('.parent > a').append('<span class="caret"></span>');
jQuery('.nav > .parent > a').attr('href','#');
jQuery('.nav-child > .parent > a').attr('href','#');
jQuery('ul.nav > li > ul').css('display','none');
jQuery('ul.nav-child > li > ul').css('display','none');
jQuery('ul.nav > li').addClass('first-level');
jQuery('ul.nav-child > li').addClass('second-level');
jQuery( ".first-level" ).click(function(e) {
jQuery('ul',this).toggle();	
jQuery('ul ul',this).toggle();		
});	
jQuery( ".second-level" ).click(function(e) {
jQuery('ul',this).toggle();
jQuery(this).parent('ul').toggle();	
jQuery(this).addClass('second-open');
});	
jQuery( ".second-open" ).click(function(e) {
jQuery('ul',this).toggle();
jQuery(this).parent('ul').toggle();
jQuery(this).removeClass('second-open');

});		

}

});
</script>


<?php if ($this->params->get('fixedbottom') == "1") { ?>
<script type="text/javascript">
jQuery(document).ready(function(){
var botheight = jQuery(".bottomspot").outerHeight(true);
jQuery('#wrapper').css("margin-bottom", botheight - 5);
});
</script> 
<?php } ?>