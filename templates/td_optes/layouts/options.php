<?php
/**
* @package td_optes Template
* @author joomlatd
* @file- Template Options
*/
defined('_JEXEC') or die;
?>

<?php if ($this->params->get('jquery') == "1") { ?>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.min.js"></script> 
<?php } ?>  
<?php if ($this->params->get('BodyFontType') == "1") { ?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('BodyFontName');?>:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
<?php } ?>
<?php if ($this->params->get('MenuFontType') == "1") { ?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('MenuFontName');?>:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
<?php } ?>
<?php if ($this->params->get('HeadingFontType') == "1") { ?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('HeadingFontName');?>:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
<?php } ?>
<style type="text/css">
body {
font-family: '<?php echo str_replace('+', ' ', $this->params->get('BodyFontName'));?>', sans-serif !important;
font-size: <?php echo $this->params->get('BodyFontSize');?> !important;
font-weight:<?php echo $this->params->get('BodyFontWeight');?> !important;
}
h1, h2, h3, h4, h5, h6 {
font-family: '<?php echo str_replace('+', ' ', $this->params->get('HeadingFontName'));?>', sans-serif !important;
font-weight: <?php echo $this->params->get('HeadingFontWeight');?> !important;
}
nav {
font-family: '<?php echo str_replace('+', ' ', $this->params->get('MenuFontName'));?>', sans-serif !important;
font-size: <?php echo $this->params->get('MenuFontSize');?> !important;
font-weight: <?php echo $this->params->get('MenuFontWeight');?> !important;
}	
</style>

<?php if ($this->params->get('logoFile')) {
$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" />';
}
elseif ($this->params->get('sitetitle')) {
$logo = '<span class="site-title">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
} ?>

<?php if ($this->params->get('alphaHeader') == "1") { ?>
<style type="text/css">
nav { background: rgba(255, 255, 255, 0.5); margin-bottom:-80px !important; position:absolute;}
nav a {color:<?php echo $this->params->get('headStartFont') ?>; }
.fixed { background:<?php echo $this->params->get('headFixedColor') ?> !important;-webkit-box-shadow: 0px 1px 4px 0px rgba(226,226,226,1);-moz-box-shadow: 0px 1px 4px 0px rgba(226,226,226,1);box-shadow: 0px 1px 4px 0px rgba(226,226,226,1);-webkit-transition: all 0.4s ease-in-out;-moz-transition: all 0.4s ease-in-out;-ms-transition: all 0.4s ease-in-out;-o-transition: all 0.4s ease-in-out;transition: all 0.4s ease-in-out; top:0;}
.fixed a { color:<?php echo $this->params->get('headFixedFont') ?> !important;} 
.removed{top:-80px !important; padding:0 !important;margin:0 !important;line-height:80px !important;}
</style>
<?php } ?>
<?php if ($this->params->get('alphaHeader') == "2") { ?>
<style>
.removed{top:-80px !important; padding:0 !important;margin:0 !important;line-height:80px !important;}
nav { background:<?php echo $this->params->get('headStartColor') ?> !important; margin-bottom:0px !important; position:absolute;}
nav a {color:<?php echo $this->params->get('headStartFont') ?>; }
.fixed { background:<?php echo $this->params->get('headFixedColor') ?> !important;-webkit-box-shadow: 0px 1px 4px 0px rgba(226,226,226,1);-moz-box-shadow: 0px 1px 4px 0px rgba(226,226,226,1);box-shadow: 0px 1px 4px 0px rgba(226,226,226,1);-webkit-transition: all 0.4s ease-in-out;-moz-transition: all 0.4s ease-in-out;-ms-transition: all 0.4s ease-in-out;-o-transition: all 0.4s ease-in-out;transition: all 0.4s ease-in-out;top:0;}
.fixed a { color:<?php echo $this->params->get('headFixedFont') ?> !important;} 
</style>
<?php } ?>

<style type="text/css">
.container { max-width: <?php echo $this->params->get('maxwidth') ?>px !important; }
#slider{ color:<?php echo $this->params->get('sliderfontColor') ?> !important;background-color:<?php echo $this->params->get('sliderColor') ?> !important;background-image:url(<?php echo $this->params->get('sliderBgr') ?>);background-repeat: no-repeat; background-position: top center;background-size:cover;background-attachment:fixed;}
#tops{ color:<?php echo $this->params->get('topfontColor') ?> !important;background-color:<?php echo $this->params->get('topColor') ?> !important;}
#tops a { color:<?php echo $this->params->get('topfontColor') ?> !important; }
#info{ color:<?php echo $this->params->get('infofontColor') ?> !important;background-color:<?php echo $this->params->get('infoColor') ?> !important;}
#info a { color:<?php echo $this->params->get('infofontColor') ?> !important; }
.bottomspot{ color:<?php echo $this->params->get('bottomfontColor') ?> !important; background-color:<?php echo $this->params->get('bottomColor') ?> !important;}
</style>

<?php if ($this->params->get('fixedbottom') == "1") { ?>
<style>
.bottomspot{position:fixed;z-index:1 !important;bottom:0;width:100%;overflow:hidden !important;}
</style>
<?php } ?>  
<?php if ($this->params->get('fixedbottom') == "0") { ?>
<style>
.bottomspot{position:relative;z-index:50;overflow:hidden;}
</style>
<?php } ?> 