<?php
/**
 * 	Copyright 2012
 * Created on Jan, 2012
 * @author themescreative.com
 *
 */
// jimport('joomla.html.parameter.element');
class GElement {

	static function getParameters($mod = 'mod_GMap'){
		static $params;
		$file = JPATH_SITE . 'modules/' .DIRECTORY_SEPARATOR . $mod . DIRECTORY_SEPARATOR . $mod . '.xml';
		if(!is_object($params) ){

			$app = JFactory::getApplication();
			$id = JRequest::getInt('id');
			if($id){
				$db = JFactory::getDBO();
				$sql = 'select * from #__modules where ';
				$sql .= 'id = ' . $id;
				$db->setQuery($sql);
				$module = $db->loadObject();
				$params = new JRegistry($module->params, $file);
			}else{
				$params = new JRegistry(null, $file);
			}

		}

		return $params;
	}
}