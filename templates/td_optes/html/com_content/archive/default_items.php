<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$params = $this->params;
?>

<div id="archive-items">
	<?php foreach ($this->items as $i => $item) : ?>
		<?php $info = $item->params->get('info_block_position', 0); ?>
		<div class="row<?php echo $i % 2; ?>">
			<div class="page-header">
				<h2>
					<?php if ($params->get('link_titles')) : ?>
						<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug)); ?>"> <?php echo $this->escape($item->title); ?></a>
					<?php else: ?>
						<?php echo $this->escape($item->title); ?>
					<?php endif; ?>
				</h2>
			</div>
		<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
			|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category')); ?>
		<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
			<div class="article-info">
            
				<?php if ($params->get('show_publish_date')) : ?>
					<span class="published">
							 <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
					</span>
				<?php endif; ?>

				<?php if ($params->get('show_parent_category') && !empty($item->parent_slug)) : ?>
					<span class="parent-category-name">
							<?php	$title = $this->escape($item->parent_title);
							$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)).'">' . $title . '</a>'; ?>
							<?php if ($params->get('link_parent_category') && !empty($item->parent_slug)) : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
							<?php endif; ?>
					</span>
				<?php endif; ?>
				<?php if ($params->get('show_author') && !empty($item->author )) : ?>
					<span class="createdby">
					<?php $author = $item->author; ?>
					<?php $author = ($item->created_by_alias ? $item->created_by_alias : $author); ?>
						<?php if (!empty($item->contactid ) && $params->get('link_author') == true) : ?>
							<?php echo JText::sprintf(
							'COM_CONTENT_WRITTEN_BY',
							JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$item->contactid), $author)
							); ?>
						<?php else :?>
							<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>
				<?php if ($params->get('show_category')) : ?>
                
					<span class="category-name">
							<?php $title = $this->escape($item->category_title);
							$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)).'">' . $title . '</a>'; ?>
							<?php if ($params->get('link_category') && $item->catslug) : ?>
								<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
							<?php endif; ?>
					</span>
				<?php endif; ?>

				<?php if ($info == 0) : ?>
					<?php if ($params->get('show_modify_date')) : ?>
						<span class="modified">
								 <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
						</span>
					<?php endif; ?>
					<?php if ($params->get('show_create_date')) : ?>
						<span class="create">
								<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3'))); ?>
						</span>
					<?php endif; ?>

					<?php if ($params->get('show_hits')) : ?>
						<span class="hits">
								 <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
						</span>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ($params->get('show_intro')) :?>
			<div class="intro"> <?php echo JHtml::_('string.truncateComplex', $item->introtext, $params->get('introtext_limit')); ?> </div>
		<?php endif; ?>

		<?php if ($useDefList && ($info == 1 || $info == 2)) : ?>
			<div class="article-info">

				<?php if ($info == 1) : ?>
					<?php if ($params->get('show_parent_category') && !empty($item->parent_slug)) : ?>
						<span class="parent-category-name">
								<?php	$title = $this->escape($item->parent_title);
								$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)) . '">' . $title . '</a>';?>
							<?php if ($params->get('link_parent_category') && $item->parent_slug) : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
							<?php else : ?>
								<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
							<?php endif; ?>
						</span>
					<?php endif; ?>
					<?php if ($params->get('show_category')) : ?>
						<span class="category-name-last">
								<?php 	$title = $this->escape($item->category_title);
								$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '">' . $title . '</a>'; ?>
								<?php if ($params->get('link_category') && $item->catslug) : ?>
									<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
								<?php else : ?>
									<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
								<?php endif; ?>
						</span>
					<?php endif; ?>
					<?php if ($params->get('show_publish_date')) : ?>
						<span class="published">
								<span class="icon-calendar"></span> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
						</span>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($params->get('show_hits')) : ?>
					<span class="hits-bottom">
							<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
					</span>
				<?php endif; ?>
				<?php if ($params->get('show_create_date')) : ?>
					<span class="create-bottom"> 
						<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
					</span>
				<?php endif; ?>                
				<?php if ($params->get('show_modify_date')) : ?>
					<span class="modified-bottom">
						<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
					</span>
				<?php endif; ?>                
		</div>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</div>
<div class="pagination">
	<p class="counter"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
