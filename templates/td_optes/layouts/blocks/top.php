<?php
/**
 * @package td_optes Template
 * @author joomlatd
 * @file-top 
 */

defined('_JEXEC') or die;


$top = 0;

if ($this->countModules('top1')) $top++;

if ($this->countModules('top2')) $top++;

if ($this->countModules('top3')) $top++;

if ($this->countModules('top4')) $top++;

if ($this->countModules('top5')) $top++;

if ($this->countModules('top6')) $top++;

if ( $top == 6  ) {                   // If 6 modules are published

    $topmodwidth = 'col-md-2';    // about 16%

}if ( $top == 5  ) {                   // If 5 modules are published

    $topmodwidth = 'col-md-2a';    // Each module width will be 20%

}if ( $top == 4  ) {                   // If 4 modules are published

    $topmodwidth = 'col-md-3';    // Each module width will be 25%

}if ( $top == 3 ) {                   // If 3 modules are published

    $topmodwidth = 'col-md-4';    // Each module width will be 33.3%

}if ( $top == 2 ) {                  // If 2 modules are published

    $topmodwidth = 'col-md-6';      // Each module width will be 49%

} else if ($top == 1) {            // If 1 module is published

    $topmodwidth = 'col-md-12';    // This  module width will be 100%

}

?>
      
<?php if ($this->countModules( 'topwide or top1 or top2 or top3 or top4 or top5 or top6' )) : ?>
<section id="tops" class="topspot">
<div class="container">
<div class="row">
<?php if ($this->countModules('top1')) {?>
<jdoc:include type="modules" name="topwide" style="td_xhtml" /> 
<div class="<?php echo $topmodwidth ?>" ><jdoc:include type="modules" name="top1" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('top2')) {?>
<div class="<?php echo $topmodwidth ?>" ><jdoc:include type="modules" name="top2" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('top3')) {?>
<div class="<?php echo $topmodwidth ?>" ><jdoc:include type="modules" name="top3" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('top4')) {?>
<div class="<?php echo $topmodwidth ?>" ><jdoc:include type="modules" name="top4" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('top5')) {?>
<div class="<?php echo $topmodwidth ?>" ><jdoc:include type="modules" name="top5" style="td_xhtml" /> </div><?php } ?>
<?php if ($this->countModules('top6')) {?>
<div class="<?php echo $topmodwidth ?>" ><jdoc:include type="modules" name="top6" style="td_xhtml" /> </div><?php } ?>
</div>
</div>
</section>
<?php endif; ?>