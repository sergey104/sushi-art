<?php /**  * @copyright	2013 - All Rights Reserved. **/?>
<?php require(dirname(__FILE__)."/modules/req_parameters.php");?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<?php require(dirname(__FILE__)."/modules/req_css.php");?>
<?php require(dirname(__FILE__)."/functions.php");?>


</head>


<body class="background">

		<div id="header-w">
			<div id="header">
			<div class="logo-container">
			<?php if ($logotype == 'image' ) : ?><?php if ($logo != null ) : ?>
			<div class="logo"><a href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>" alt="logo" /></a></div><?php else : ?>
			<div class="logo"><a href="<?php echo $this->baseurl ?>/"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.png" alt="logo" ></a></div><?php endif; ?><?php endif; ?> 
			<?php if ($logotype == 'text' ) : ?><div class="logo"><a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle);?></a></div><?php endif; ?> 
			</div>
			
			<?php if ($this->params->get( 'socialdisable' )) : ?><?php endif; ?>
			<?php if ($this->params->get( 'slogandisable' )) : ?><div class="slogan"><?php echo ($slogan); ?></div><?php endif; ?>    
			

				<nav class="clearfix">
					<div id="nav"><jdoc:include type="modules" name="mainmenu" style="none" /></div>
					<a href="#" id="pull"></a>
				</nav>	
			
			
			</div> <!-- end header -->
		</div><!-- end header-w -->

	
 <!-- Slideshow -->
 <div id="firstbox" >
	<div id="slideshow"><?php if ($this->params->get( 'slidehome' )) : ?>	
		<?php $app = JFactory::getApplication(); $menu = $app->getMenu(); $lang = JFactory::getLanguage();
			if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>
			<?php include "slideshow/slideshow.php"; ?><?php endif; ?>
		<?php else : ?>
			<?php include "slideshow/slideshow.php"; ?><?php endif; ?>
	</div>
</div>	
<!-- END Slideshow -->		
		
		

		
 <div class="container-fluid" id="relative">   
<div id="wrapper">

<?php $app = JFactory::getApplication(); $menu = $app->getMenu(); $lang = JFactory::getLanguage(); if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>
<?php if($this->countModules('top1') or $this->countModules('top2') or $this->countModules('top3')) : ?>
		<div id="top" class="clearfix">
			<div class="top1"><jdoc:include type="modules" name="top1" style="xhtml" /></div>
			<div class="top2"><jdoc:include type="modules" name="top2" style="xhtml" /></div>
			<div class="top3"><jdoc:include type="modules" name="top3" style="xhtml" /></div>
		</div>
<?php endif; ?><?php endif; ?>		  		
	
	<div id="main-content">	
    <?php if($this->countModules('left') xor $this->countModules('right')) $maincol_sufix = '_one';
	  elseif(!$this->countModules('left') and !$this->countModules('right'))$maincol_sufix = '_none';
	  else $maincol_sufix = '_both'; ?><?php include "html/com_content/archive/function.php"; ?>

<!-- Left Sidebar -->		  
    <?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="leftbar-w">
			<div id="sidebar"><jdoc:include type="modules" name="left" style="hq" /></div>
			</div>
    <?php endif; ?>	  

<!-- Center -->	
	<div id="centercontent<?php echo $maincol_sufix; ?>">
		<div class="clearpad"><jdoc:include type="component" /></div>			
		<?php if ($this->countModules('breadcrumb')) : ?>
        <jdoc:include type="modules" name="breadcrumb"  style="none"/>
        <?php endif; ?>	
	</div>		
	
<!-- Right Sidebar -->	
    <?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="rightbar-w">
			<div id="sidebar"><jdoc:include type="modules" name="right" style="hq" /></div>
			</div>
    <?php endif; ?>	
	
		<div class="clr"></div>
    </div>   		

<!-- TABS -->		

<div id="box">
<jdoc:include type="modules" name="position-0" style="hq" />
<div id="right"><?php if ($this->countModules('newsflash')) : ?><jdoc:include type="modules" name="newsflash" style="xhtml" /><?php endif; ?></div> 

<?php if (($this->countModules('tab1')) || ($this->countModules('tab2')) || ($this->countModules('tab3'))) :?>
<div class="tabs" id="left">
 
<?php if ($this->countModules('tab1')) : ?>
       <div class="tab">
           <input id="tab-4" name="tab-group-2" checked="checked" type="radio">
           <label for="tab-4">Tab1</label>
           <div class="content">
               <p><jdoc:include type="modules" name="tab1" style="xhtml" /></p>
           </div> 
       </div>
<?php endif; ?>   	   
        
<?php if ($this->countModules('tab2')) : ?>		
       <div class="tab">
           <input id="tab-5" name="tab-group-2" type="radio">
           <label for="tab-5">Tab2</label>
           <div class="content">
               <p><jdoc:include type="modules" name="tab2" style="xhtml" /></p>
           </div> 
       </div>
<?php endif; ?>   		   
        
<?php if ($this->countModules('tab3')) : ?>			
        <div class="tab">
           <input id="tab-6" name="tab-group-2" type="radio">
           <label for="tab-6">Tab3</label>
           <div class="content">
              <p><jdoc:include type="modules" name="tab3" style="xhtml" /></p>
           </div> 
       </div>
<?php endif; ?> 	   
   </div>
<?php endif; ?>   
<div id="left" style="width:100%"><?php include "modules/socialbuttons.php"; ?></div>
</div> 
	
   
<!-- END TABS -->	
</div><!-- wrapper end -->
	<?php require("user.php"); ?>
	</div><!--/.relative -->
	</div><!--/.fluid-container -->
	
	
</body>
</html>