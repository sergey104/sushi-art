<?php
/**
* @package plugin tctooltip
* @version 3.5.0
* @copyright Copyright (C) 2008 - 2014 themescreative. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @author http://www.themescreative.com
* @joomla Joomla is Free Software
*/

// No direct access
defined('_JEXEC') or die;

//$mainframe->registerEvent( 'onPrepareContent', 'tctooltip' );
//jimport('joomla.plugin.plugin');

class plgContentTctooltip extends JPlugin{	


public function onContentPrepare($context, &$article, &$params, $limitstart){

// Don't run this plugin when the content is being indexed
if ($context == 'com_finder.indexer') {
return true;
}

//check if there is a tooltip at all for performance
if(strpos($article->text, '{end-tooltip}')){

// Don't repeat the CSS for each instance of this plugin in a page!
static $included_tctooltip_css;

if (!$included_tctooltip_css) {
	$document = JFactory::getDocument();
	$url = 'plugins/content/tctooltip/css/'.$this->params->get("style").'.css';
	$document->addStyleSheet($url);	
	$included_tctooltip_css = 1;
}

$string = $article->text;

$regex = "/{tooltip(.*?){end-tooltip}/is";			
preg_match_all($regex, $string, $matches); 	
//print_r($matches);	
for($n = 0; $n < count($matches[0]); $n++){
	$temp_ori = $matches[0][$n];
	$replacement_last = '</span>';
	if(substr($temp_ori, 0, 9)!='{tooltip}'){				
		//extra arguments are giving in the tooltip tag
		$regex2 = "/{tooltip (.*?)}/is";			
		preg_match_all($regex2, $temp_ori, $matches2); 			
		$pattern_tooltip = '{tooltip '.$matches2[1][0].'}';	
		$extras = ' '.$matches2[1][0];			
		$replacement_first = '<span'.$extras.'><span class="tooltips-item">';	
		$temp = str_replace($pattern_tooltip, $replacement_first, $temp_ori);		
	}else{	
		//no extra arguments, so use the old way of doing this				
		$temp = str_replace('{tooltip}','<span class="tooltips tooltips-effect-1"><span class="tooltips-item">',$temp_ori);			
	}			
	$temp = str_replace('{end-link}','</span><span class="tooltips-content clearfix"><span class="tooltips-text"><span class="tooltips-inner">',$temp);
	$temp = str_replace('{end-tooltip}','</span></span></span></span>'.$replacement_last,$temp);
	$string = str_replace($temp_ori, $temp, $string);
}

$article->text = $string;

}//end if tooltip	

}
}

?>