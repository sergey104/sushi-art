<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldIconlist extends JFormField {

    protected $type = 'Iconlist';

    protected function getInput() {		
		$output = '';
		$icons = array(
			"-- Select Icon --" => "0",
			"Amazon" => "A",
			"Bebo" => "B",
			"AppStore" => "C",
			"Dribbble" => "D",
			"Behance" => "E",
			"Facebook" => "F",
			"Github" => "G",
			"Skype" => "H",
			"Linkedin" => "I",
			"Deviantart" => "J",
			"Bing" => "K",
			"Myspace" => "M",
			"Flickr" => "N",
			"Tumblr" => "O",
			"Paypal" => "P",
			"Pinterest" => "{",
			"Quora" => "Q",
			"RSS" => "R",
			"Stumble Upon" => "S",
			"Twitter" => "T",
			"Twitter 2" => "L",
			"Blogger" => "U",
			"Vimeo" => "V",
			"Wordpress" => "W",
			"Youtube" => "X",
			"Yahoo!" => "Y",
			"AIM" => "Y"
			);
        
		$output .= "<select name=\"".$this->name."\">";
		$default_icon = (isset($this->value)) ? $this->value : $this->element['default'];
		foreach ($icons as $icon=>$value) {
			$output .= "<option value=\"".$value."\" ".($default_icon == $value ? "selected=\"selected\"" : "").">".$icon."</option>";
		}
		$output .= "</select>";
		//$output .= "<input class=\"\" autocomplete=\"off\"  type=\"text\" size=\"7\" maxlength=\"11\" value=\"".$this->value."\" />";

		return $output;
    }
}
?>