<?php
/**
 * 	Copyright 2012
 * Created on Jan, 2012
 * @author themescreative.com
 *
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

class JFormFieldGMapType extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	public $type = 'gmaptype';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{

		// Initialize JavaScript field attributes.
		$mapVariable = isset($this->element['var']) ? $this->element['var']: 'map';
		$options[] = array('value' => 'ROADMAP', 'text' => 'Map');
		$options[] = array('value' => 'SATELLITE', 'text' => 'Satellite');
		$options[] = array('value' => 'HYBRID', 'text' => 'Hybrid');
		$options[] = array('value' => 'TERRAIN', 'text' => 'Terrain');
		$onchange = 'onchange="'.$mapVariable.'.setMapTypeId(eval(\'google.maps.MapTypeId.\' + this.options[this.selectedIndex].value))"';
		return JHTML::_('select.genericlist', $options, $this->name, $onchange ,'value', 'text', $this->value);
	}
}