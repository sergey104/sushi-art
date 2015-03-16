<?php
/**
* @package td_optes Template
* @author joomlatd
* @file-header 
*/
defined('_JEXEC') or die;
?>

<nav class="navbar navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="sitetitle" href="<?php echo $this->baseurl; ?>"><?php echo $logo;?></a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<jdoc:include type="modules" name="mainmenu" style="none" />
</div>
</div>
</nav>
