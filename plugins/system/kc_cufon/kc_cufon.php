<?php
/**
* @package plugin kc_cufon
* @copyright (C) 2009-2013 Keashly.ca Consulting - www.keashly.ca
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Cuf�n Copyright (c) 2009 Simo Kinnunen.
* Cuf�n documentation: http://wiki.github.com/sorccu/cufon
* Cuf�n is licensed under the http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* 
* kc_cufon version 2.3.2 for Joomla 2.5.x and Joomla 3.x devloped by Keashly.ca Consulting
*
*/


defined('JPATH_BASE') or die;

jimport( 'joomla.plugin.plugin' );

/**
 * kc_cufon system plugin
 */
class plgSystemkc_cufon extends JPlugin
{
	
	/**
	 * Constructor
	 *
	 * For php4 compatibility we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @access	protected
	 * @param	object	$subject The object to observe
	 * @param 	array   $config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	function plgkc_cufon( &$subject, $config )
	{
		parent::__construct( $subject, $config );

		// Do some extra initialisation in this constructor if required
	}

	/**
	 * Load Style sheet variables onAfterInitialise 
	 */
	function onAfterRoute()
	{
		// Get the application object.
		$app = JFactory::getApplication();
	
		// Only load the Css if we are in the frontend
		if ($app->isSite()) {
			$document = JFactory::getDocument();
			$doctype    = $document->getType();
					
			// Only render for HTML output
			if ( $doctype == 'html' ) { 
			
				// Get the plugin parameters
				$fonts = $this->params->get("num_fonts", '0');  // Set the number of fonts & selectors in the parameters
				if ($fonts != 0 ) {
					// Check if any fonts are to be used
					$loading = $this->params->get("loading", '0');
					for ( $i=1; $i <= $fonts; $i++ ) {
						$selector[$i] = $this->params->get("selector$i", '');
						$fontsize[$i] = $this->params->get("font-size$i", '');
					}
					
					$css = '<style type="text/css"> /* <![CDATA[ */ ';
					$foundSelector = false;
					for ( $i=1; $i <= $fonts; $i++ ) {
						if ( $selector[$i] != '' ) {
							// Break out the different selectors using , for the delimiter
							$selectors = explode (',', $selector[$i]);
							foreach ( $selectors as $sel) {
								if ($loading == '0') {
									$css .= '.cufon-loading '.$sel.' { visibility: hidden !important; } ';							
								}
								if ($fontsize[$i] != '') {
									$css .= '.cufon-active '.$sel.' { font-size: '.$fontsize[$i].'; } ';
								}
								$foundSelector = true;
							}
						}
					}
					if ($foundSelector) {
						$css .= '/* ]]> */ </style>';
						$document->addCustomTag("$css");
					}
				}
			}
		}
	}

	/**
	 * Load Javascript files and selector javascript variables onAfterDispatch, so they are loaded after mootools 
	 */
	function onAfterDispatch()
	{
		// Get the application object.
		$app = JFactory::getApplication();
		
		// Load the language file
		$lang = JFactory::getLanguage();
		$lang->load('plg_system_kc_cufon', JPATH_ADMINISTRATOR);
	
		// Only load the Javascripts if we are in the frontend
		if ($app->isSite()) {
			$document = JFactory::getDocument();
			$doctype    = $document->getType();
					
			// Only render for HTML output
			if ( $doctype == 'html' ) { 
			
				// Get the plugin parameters
				$fonts = $this->params->get("num_fonts", '0');  // Set the number of fonts & selectors in the parameters
				$needMootools = $this->params->get("loadmootools", '1');  // Need to load Mootools first
				if ($fonts != 0 ) {
					// Have font files to load, see if we need to load Mootools first
					if ($needMootools) {
						JHtml::_('behavior.framework');
					}
					// Get the font selectors
					for ( $i=1; $i <= $fonts; $i++ ) {
						$font[$i] = $this->params->get("font$i", '');
						$fontfile[$i] = $this->params->get("fontfile$i", '');
						$selector[$i] = $this->params->get("selector$i", '');
						$hover[$i] = $this->params->get("font-hover$i", '');
						$hoverables[$i] = $this->params->get("hoverable$i", '');
						$textshadow[$i] = $this->params->get("textshadow$i", '');
						$gradient[$i] = $this->params->get("gradient$i", '');
					}
	
					$js = "plugins/system/kc_cufon/js/cufon-yui.js";
					$document->addScript($js);
					
					jimport ('joomla.filesystem.file'); // Import the file system routines
					for ( $i=1; $i <= $fonts; $i++ ) {
						if ( $fontfile[$i] != '' ) {
							$js = "plugins/system/kc_cufon/fonts/" . $fontfile[$i] . ".font.js";
							// Make sure the font file exists before adding it
							if ( JFile::exists ($js)) {
								$document->addScript($js);
							} else {
								$app->enqueueMessage(JText::_('KC_ERROR_FONT_MISSING') . $js, 'error');
							}
						}
					}
					
					$js = '<script type="text/javascript"> ';
					$foundSelector = false;
					for ( $i=1; $i <= $fonts; $i++ ) {
						if ( $selector[$i] != '' ) {
							// Break out the different selectors using , for the delimiter
							$selectors = explode (',', $selector[$i]);
							foreach ( $selectors as $sel) {
								// Make sure that we only add non-blank selectors
								if ($sel != '' && $sel != ' ') {
									$js .= 'Cufon.replace("'.$sel.'", { fontFamily: "'.$font[$i].'"';
									if ($hover[$i] == '1' ) {
										// Font is to be hoverable, so need to see if there are tags to add to the hoverables list
										if ($hoverables[$i] == '') {
											$js .= ', hover: true';
										} else {
											$hoverSelectors = explode (',', $hoverables[$i]);
											foreach ( $hoverSelectors as $tag) {
												// Skip over a tag if it is in the list
												if ($tag != 'a') {
													$tags[] = $tag . ': true';
												}
											}
											$comma_tags = implode (',', $tags);
											$js .= ', hover: true, hoverables: { ' . $comma_tags . ' }';
										}
									}
									// See if we need to add Text Shadow
									if ($textshadow[$i] != '') {
										$js .= ', textShadow: "'.$textshadow[$i].'"';
									}
									// See if we need to add linear gradient color
									if ($gradient[$i] != '') {
										$js .= ', color: "-linear-gradient('.$gradient[$i].')"';
									}
									$js .= ' });';
									$foundSelector = true;
								}
							}
						}
					}
					if ($foundSelector) {
						$js .= ' </script>';
						$document->addCustomTag("$js");
					}
				}
			}
		}
	}
	
	function onAfterRender()
	{
		// Get the application object.
		$app = JFactory::getApplication();

		// Only load the Javascripts if we are in the frontend
		if ($app->isSite()) {
			$document = JFactory::getDocument();
			$doctype    = $document->getType();
					
			// Only render for HTML output
			if ( $doctype == 'html' ) { 
					$fonts = $this->params->get("num_fonts", '0');  // Set the number of fonts & selectors in the parameters
					if ($fonts != 0 ) {
					// Make the IE Output speed up script
					$javascript = '<script type="text/javascript"> Cufon.now(); </script>';
					
					// Get the output buffer
					$buffer = JResponse::getBody();
					// Find the ending body tag
					$pos = strrpos($buffer, "</body>");
					
					if($pos > 0) {
						// Add the Javascript before the ending body tag
						$buffer = substr($buffer, 0, $pos).$javascript.substr($buffer, $pos);		
						JResponse::setBody($buffer);
					}
				}
			}
		}
	}
}
