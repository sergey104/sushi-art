<?php
/**
 * @package td_optes Template
 * @author joomlatd
 * @file-bottom 
 */

defined('_JEXEC') or die;


$bottom = 0;

if ($this->countModules('bottom1')) $bottom++;

if ($this->countModules('bottom2')) $bottom++;

if ($this->countModules('bottom3')) $bottom++;

if ($this->countModules('bottom4')) $bottom++;

if ($this->countModules('bottom5')) $bottom++;

if ($this->countModules('bottom6')) $bottom++;

if ( $bottom == 6  ) {                   // If 6 modules are published

    $bottommodwidth = 'col-md-2';    // about 16%

}if ( $bottom == 5  ) {                   // If 5 modules are published

    $bottommodwidth = 'col-md-2a';    // Each module width will be 20%

}if ( $bottom == 4  ) {                   // If 4 modules are published

    $bottommodwidth = 'col-md-3';    // Each module width will be 25%

}if ( $bottom == 3 ) {                   // If 3 modules are published

    $bottommodwidth = 'col-md-4';    // Each module width will be 33.3%

}if ( $bottom == 2 ) {                  // If 2 modules are published

    $bottommodwidth = 'col-md-6';      // Each module width will be 49%

} else if ($bottom == 1) {            // If 1 module is published

    $bottommodwidth = 'col-md-12';    // This  module width will be 100%

}
//parameters
$footer_info = $this->params->get('footer_info');
$show_Designed = $this->params->get('show_Designed');

?>


<div class="bottomspot">
<div class="container clear">
<?php if ($this->countModules( 'bottomwide or bottom1 or bottom2 or bottom3 or bottom4 or bottom5 or bottom6' )) : ?>
<div class="row">
<jdoc:include type="modules" name="bottomwide" style="td_xhtml" />
<?php if ($this->countModules('bottom1')) {?>
<div class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom1" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('bottom2')) {?>
<div class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom2" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('bottom3')) {?>
<div class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom3" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('bottom4')) {?>
<div class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom4" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('bottom5')) {?>
<div class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom5" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('bottom6')) {?>
<div class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom6" style="td_xhtml" /> </div><?php } ?>
</div>
<?php endif; ?>
</div>

<section id="footer" class="footerspot">
<div class="container">
<div class="col-md-6">
<?php echo $footer_info; ?>
</div>
<div id="designed_by" class="col-md-6">
<?php if($this->params->get('show_Designed',1)) : ?>
Designed by <a href="http://www.joomlatd.com/" title="Visit joomlatd.com!" target="blank">joomlatd.com</a>
<?php endif;?>
</div>
</div>	
</section>
</div>
