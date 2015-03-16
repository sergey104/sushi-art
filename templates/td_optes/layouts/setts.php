<?php
/**
* @package td_optes Template
* @author joomlatd
* @file-setts 
*/
defined('_JEXEC') or die;
?>


<script type="text/javascript">
if ( ! window.console ) console = { log: function(){} };
jQuery('.subMenu').singlePageNav({
offset: 60,
filter: ':not(.external)',
currentClass:'actview' ,
speed: 600 ,
});
</script>

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
