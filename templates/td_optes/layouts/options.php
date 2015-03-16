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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

<?php if ($this->params->get('logoFile')) {
$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" />';
}
elseif ($this->params->get('sitetitle')) {
$logo = '<span class="site-title">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
} ?>

