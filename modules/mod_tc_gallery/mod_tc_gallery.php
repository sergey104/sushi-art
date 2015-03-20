<?php
/**
 * @package Gallery Module
 * @version 3.5
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2012. All Rights Reserved.
 * @author http://www.themescreative.com
 * 
 */
defined('_JEXEC') or die;
require_once dirname( __FILE__ ).'/core/helper.php';
$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
// Class call from cache
$cacheparams->class = 'TcGalleryReader';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$items = TcGalleryReader::getList($params);
require JModuleHelper::getLayoutPath('mod_tc_gallery', $params->get('layout', 'default'));?>