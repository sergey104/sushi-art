<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldAsset extends JFormField {

    protected $type = 'Asset';

    protected function getInput() {		
		//JHTML::_('behavior.mootools');

		$checkJqueryLoaded = false;
		$document	= &JFactory::getDocument();
		$header = $document->getHeadData();
		foreach($header['scripts'] as $scriptName => $scriptData)
		{
			if(substr_count($scriptName,'jquery')){
				$checkJqueryLoaded = true;
			}
		}
		
		if (!version_compare(JVERSION, '3.0', 'ge')) {
			$checkJqueryLoaded = false;
			$header = $document->getHeadData();
			foreach($header['scripts'] as $scriptName => $scriptData)
			{
				if(substr_count($scriptName,'/jquery')){
					$checkJqueryLoaded = true;
				}
			}	
			//Add js
			if(!$checkJqueryLoaded) 
		$document->addScript(JURI::root().$this->element['path'].'js/jquery.min.js');
		$document->addScript(JURI::root().$this->element['path'].'js/jquery.noconflict.js');
		$document->addScript(JURI::root().$this->element['path'].'js/chosen.jquery.min.js');		
        $document->addScript(JURI::root().$this->element['path'].'js/scripts.js');
		}
					
		//Add js
		//if(!$checkJqueryLoaded) 
        

		
		//Add css         
        $document->addStyleSheet(JURI::root().$this->element['path'].'css/chosen.css');       
		
		//add colorpicker
		$document->addStyleSheet(JURI::root().$this->element['path'].'minicolors/jquery.miniColors.css');
		$document->addScript(JURI::root().$this->element['path'].'minicolors/jquery.miniColors.min.js');
		$document->addScript(JURI::root().$this->element['path'].'minicolors/layout.js');
                
        return null;
    }
}
?>