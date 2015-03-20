<?php
/**
 * @package td_optes Template
 * @author joomlatd
 * @file-info 
 */

defined('_JEXEC') or die;


$info = 0;

if ($this->countModules('info1')) $info++;

if ($this->countModules('info2')) $info++;

if ($this->countModules('info3')) $info++;

if ($this->countModules('info4')) $info++;

if ($this->countModules('info5')) $info++;

if ($this->countModules('info6')) $info++;

if ( $info == 6  ) {                   // If 6 modules are published

    $infomodwidth = 'col-md-2';    // about 16%

}if ( $info == 5  ) {                   // If 5 modules are published

    $infomodwidth = 'col-md-2a';    // Each module width will be 20%

}if ( $info == 4  ) {                   // If 4 modules are published

    $infomodwidth = 'col-md-3';    // Each module width will be 25%

}if ( $info == 3 ) {                   // If 3 modules are published

    $infomodwidth = 'col-md-4';    // Each module width will be 33.3%

}if ( $info == 2 ) {                  // If 2 modules are published

    $infomodwidth = 'col-md-6';      // Each module width will be 49%

} else if ($info == 1) {            // If 1 module is published

    $infomodwidth = 'col-md-12';    // This  module width will be 100%

}

?>
      
<?php if ($this->countModules( 'infotop or info1 or info2 or info3 or info4 or info5 or info6' )) : ?>
<section id="info" class="infospot">
<div class="container">
<div class="row">
<jdoc:include type="modules" name="infotop" style="td_xhtml" /> 
<?php if ($this->countModules('info1')) {?>
<div class="<?php echo $infomodwidth ?>" ><jdoc:include type="modules" name="info1" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('info2')) {?>
<div class="<?php echo $infomodwidth ?>" ><jdoc:include type="modules" name="info2" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('info3')) {?>
<div class="<?php echo $infomodwidth ?>" ><jdoc:include type="modules" name="info3" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('info4')) {?>
<div class="<?php echo $infomodwidth ?>" ><jdoc:include type="modules" name="info4" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('info5')) {?>
<div class="<?php echo $infomodwidth ?>" ><jdoc:include type="modules" name="info5" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('info6')) {?>
<div class="<?php echo $infomodwidth ?>" ><jdoc:include type="modules" name="info6" style="td_xhtml" /> </div><?php } ?>
</div>
</div>
</section>
<?php endif; ?>