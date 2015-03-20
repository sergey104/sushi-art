<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldColorpicker extends JFormField {
        protected $type = 'Colorpicker';
		protected static $initialised = false;
	
        protected function getInput() {

		if (!self::$initialised) {	
			
$scripts = '
;(function($) {
$(window).load( function() {	
	$( ".uislider" ).each(function(i, el) {
		
		var sliderContainer = $(this),
			uislider = sliderContainer.find(".slider"),
			amount = sliderContainer.find(".amount"),
			display_amount = sliderContainer.find(".display_amount"),
			am_val = amount.val();
			
		uislider.slider({
			min: 0,
			max: 10,
			value: am_val,
			slide: function( event, ui ) {
				display_amount.val(ui.value/10);
				amount.val(ui.value);
			}
		});
		amount.val(  uislider.slider( "value" ));
		display_amount.val(  uislider.slider( "value" )/10 );
	});
});
})(jQuery);
';
	
			JFactory::getDocument()->addScriptDeclaration($scripts);
			self::$initialised = true;
		}
			//$request = json_decode($this->value);
			$json_request = (is_array($this->value) != NULL) ? true : false;
			
			if($json_request == false) {
				$default_color = $this->value;
				$default_opacity = 10;
			} else {
				$default_color = $this->value['color'];
				$default_opacity = $this->value['opacity'];
			}
			
			$output = '';
			$output .= '
			<div class="colorpickerField">
				<input id="'.$this->name.'" autocomplete="on" name="'.$this->name.'[color]" type="text" size="7" maxlength="10" value="'.$default_color.'" class="color-picker" />
			</div>

			';
			
			
			return $output;
        }
}

?>