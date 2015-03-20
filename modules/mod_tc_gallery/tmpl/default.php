<?php
/**
 * @package Gallery Module
 * @version 2.5
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2012. All Rights Reserved.
 * @author http://www.themescreative.com
 *
 */
defined('_JEXEC') or die;

JHtml::stylesheet('modules/mod_tc_gallery/assets/css/gallery.css');
JHtml::stylesheet('modules/mod_tc_gallery/assets/css/jquery.fancybox-1.3.4.css');
if( !defined('SMART_JQUERY') && $params->get('include_jquery', 0) == "1" ){
	JHtml::script('modules/mod_tc_gallery/assets/js/jquery-1.8.2.min.js');
	JHtml::script('modules/mod_tc_gallery/assets/js/jquery-noconflict.js');
	define('SMART_JQUERY', 1);
}
JHtml::script('modules/mod_tc_gallery/assets/js/jsmart.easing.1.3.js');
JHtml::script('modules/mod_tc_gallery/assets/js/jquery.fancybox-1.3.4.pack.js');
JHtml::script('modules/mod_tc_gallery/assets/js/jcarousel.js');

$document = JFactory::getDocument(); 
$document->addStyleDeclaration('.tc-gallery .tc-content{ background:'.$params->get('imgcfg_background',6).';}');

ImageHelper::setDefault($params);
if (count($items)>0){
	$instance	= rand().time();
	$transition				= $params->get("transition", 'none');
	$show_bullets			= $params->get('show_bullets', 1);
	$show_nextprev			= $params->get('show_nextprev', 1);
	$count = count($items);
	$total = (int)$params->get('numberImage',27);
	if($total > $count){
		$total = $count;
	}
	$total_image_pag = $params->get('items_page', 9);
	$pags = (int)ceil($total/$total_image_pag);
	$play = $params->get('play', 1);
	if (!$play){
		$interval = 0;
	} else {
		$interval = $params->get('interval', 5000);
	}?>


<div id="tc_gallery_<?php echo $instance;?>" class="tc-gallery <?php if( $params->get("effect") == 'slide' ){ echo $params->get("effect");}?> <?php echo $params->get("deviceclass_sfx");?>" data-interval="<?php echo $interval;?>" data-pause="hover">
	<!--[if IE 8]> <div class="ie8 presets"> <![endif]-->
	<div class="pre-text">
		<?php echo $params->get('pretext'); ?>
	</div>	
	<div class="tc-content">
		<?php if($show_nextprev==1 || $show_bullets==1){ ?>
		<div class="tc-navigation clearfix">
			<div class="tc-buttons">
				<ul>
					<?php if($show_nextprev==1){ ?>
					<li class="tc-prev" href="#tc_gallery_<?php echo $instance;?>" data-jslide="prev"></li>
					<?php } ?>
					<?php if($show_bullets==1){ ?>
					<?php for($j=0; $j<$pags; $j++): ?>
						<li class="tc-nav <?php if( $j == 0 ){echo ' sel';}?>"  href="#tc_gallery_<?php echo $instance;?>" data-jslide="<?php echo $j;?>"></li>
					<?php endfor; ?>
					<?php } ?>						
					<?php if($show_nextprev==1){ ?>
					<li class="tc-next"  href="#tc_gallery_<?php echo $instance;?>" data-jslide="next"></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
		<div class="tc-items">
			<?php
			for($i=0; $i<$pags; $i++){ ?>
			<div class="tc-item <?php if($i==0){echo "active";}?> item">
				<?php $start = $i * $total_image_pag;
					$end   = ($i + 1) * $total_image_pag;
					$qu = 0;
					foreach ($items as $key => $item){ 
						if($qu == $total_image_pag){
							$qu = 0;
						}
						$qu++;
						
 						if ($key >= $start && $key < $end) {?>
					<div class="item-info">
						<a class="item-info-image" rel="tc_gallery_image_<?php echo $instance;?>" href="<?php echo $item['url']; ?>" title="<?php echo $item['title'] ;?>">
							<?php echo TcGalleryReader::imageTag($item['image']);?>
							<span class="bg-hover"></span>
							<span class="icon-hover"></span>
						</a>
						
					</div>
			    	<?php
			    		$clear = 'clr1';
			    		if ($qu % 2 == 0) $clear .= ' clr2';
			    		if ($qu % 3 == 0) $clear .= ' clr3';
			    		if ($qu % 4 == 0) $clear .= ' clr4';
			    		if ($qu % 5 == 0) $clear .= ' clr5';
			    		if ($qu % 6 == 0) $clear .= ' clr6';
			    	?>
	    			<div class="<?php echo $clear; ?>"></div> 					
				<?php
					}} ?>
			</div>
		<?php
			}
			?>
		</div>
	</div>
	<div class="post-text">
		<?php echo $params->get('posttext'); ?>
	</div>
</div>


<?php } else{ echo JText::_('There are no image inside folder: ') . $params->get('folder');}?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function($) {
	$('#tc_gallery_<?php echo $instance;?>').each(function(){
		var $this = $(this), options = options = !$this.data('modal') && $.extend({}, $this.data());
		$this.jcarousel(options);
		$this.bind('jslide', function(e){
			var index = $(this).find(e.relatedTarget).index();

			// process for nav
			$('[data-jslide]').each(function(){
				var $nav = $(this), $navData = $nav.data(), href, $target = $($nav.attr('data-target') || (href = $nav.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''));
				if ( !$target.is($this) ) return;
				if (typeof $navData.jslide == 'number' && $navData.jslide==index){
					$nav.addClass('sel');
				} else {
					$nav.removeClass('sel');
				}
			});

		});
	});
	
	$("a[rel=tc_gallery_image_<?php echo $instance;?>]").fancybox({
		'transitionIn'	: '<?php echo $transition; ?>',
		'transitionOut'	: '<?php echo $transition; ?>',
		'titlePosition' : 'outside',
		'titleFormat'	: function(title, currentArray, currentIndex, currentOpts) {
			return 'Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? '  - ' + title : '') + '';
		},
		easingIn: 'easeInOutQuad',
		easingOut: 'easeInOutQuad',
		onStart: function(){
			var $btn = $('#tc_gallery_<?php echo $instance; ?>');
			$btn.jcarousel('pause');
		},
		onClosed: function(){
			var $btn = $('#tc_gallery_<?php echo $instance; ?>');
			$btn.jcarousel('cycle');
		}
	});
	
});
//]]>
</script>

