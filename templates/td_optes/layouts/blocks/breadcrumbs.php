<?php
/**
 * @package td_optes Template
 * @author joomlatd
 * @file-breadcrumb
 */
defined('_JEXEC') or die;
?>

<?php if ($this->countModules( 'breadcrumbs' )) : ?> 

    <section id="breadcrumbs">

        <div class="container">
        
            <div class="row">
            
                <div class="col-md-12">
                
                    <jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
                    
                </div>
                
            </div>
            
        </div>
        
    </section>  
    
<?php endif; ?>