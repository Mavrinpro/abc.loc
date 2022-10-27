<?php
/*
 * Followig class handling date input control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Color_WPC extends WPComment_Inputs{
	
	/*
	 * input control settings
	 */
	var $title, $desc, $settings;
	
	/*
	 * this var is pouplated with current plugin meta
	*/
	var $plugin_meta;
	
	function __construct(){
		
		[];
		
		$this -> title 		= __ ( 'Color picker', 'wpcomment' );
		$this -> desc		= __ ( 'Color pallete input', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-modx" aria-hidden="true"></i>', 'wpcomment' );
		$this -> settings	= self::get_settings();
	
	}
	
	private function get_settings(){
		
		$input_meta = array (
			'title' => array (
					'type' => 'text',
					'title' => __ ( 'Title', 'wpcomment' ),
					'desc' => __ ( 'It will be shown as field label', 'wpcomment' ) 
			),
			'data_name' => array (
					'type' => 'text',
					'title' => __ ( 'Data name', 'wpcomment' ),
					'desc' => __ ( 'REQUIRED: The identification name of this field, that you can insert into body email configuration. Note:Use only lowercase characters and underscores.', 'wpcomment' ) 
			),
			'description' => array (
					'type' => 'textarea',
					'title' => __ ( 'Description', 'wpcomment' ),
					'desc' => __ ( 'Small description, it will be display near name title.', 'wpcomment' ) 
			),
			'error_message' => array (
					'type' => 'text',
					'title' => __ ( 'Error message', 'wpcomment' ),
					'desc' => __ ( 'Insert the error message for validation.', 'wpcomment' ),
			),		
			'default_color' => array (
					'type' => 'text',
					'title' => __ ( 'Default color', 'wpcomment' ),
					'desc' => __ ( 'Define default color e.g: #effeff', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'palettes_colors' => array (
					'type' => 'text',
					'title' => __ ( 'Palettes colors', 'wpcomment' ),
					'desc' => __ ( "Color codes seperated by comma e.g: #125, #459, #78b", 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'palettes_width' => array (
					'type' => 'text',
					'title' => __ ( 'Palettes width', 'wpcomment' ),
					'desc' => __ ( "e.g: 500", 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'palettes_mode' => array (
					'type' => 'select',
					'title' => __ ( 'Palettes mode', 'wpcomment' ),
					'desc' => __ ( "Select Mode", 'wpcomment' ),
					'options'=> array('hsl'=>'Hue, Saturation, Lightness','hsv'=>'Hue, Saturation, Value'),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'width' => array (
					'type' => 'select',
					'title' => __ ( 'Width', 'wpcomment' ),
					'desc' => __ ( 'Select width column.', "wpcomment"),
					'options'	=> wpcomment_get_input_cols(),
					'default'	=> 12,
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'visibility' => array (
					'type' => 'select',
					'title' => __ ( 'Visibility', 'wpcomment' ),
					'desc' => __ ( 'Set field visibility based on user.', "wpcomment"),
					'options'	=> wpcomment_field_visibility_options(),
					'default'	=> 'everyone',
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'visibility_role' => array (
					'type' => 'text',
					'title' => __ ( 'User Roles', 'wpcomment' ),
					'desc' => __ ( 'Role separated by comma.', "wpcomment"),
					'hidden' => true,
			),
			'show_palettes' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show palettes', 'wpcomment' ),
					'desc' => __ ( 'Tick if need to show a group of common colors beneath the square', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'show_onload' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show on load', 'wpcomment' ),
					'desc' => __ ( 'Display color picker by default, otherwise show on click', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'desc_tooltip' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show tooltip (PRO)', 'wpcomment' ),
					'desc' => __ ( 'Show Description in Tooltip with Help Icon', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'required' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Required', 'wpcomment' ),
					'desc' => __ ( 'Select this if it must be required.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'logic' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Enable Conditions', 'wpcomment' ),
					'desc' => __ ( 'Tick it to turn conditional logic to work below', 'wpcomment' )
			),
			'conditions' => array (
					'type' => 'html-conditions',
					'title' => __ ( 'Conditions', 'wpcomment' ),
					'desc' => __ ( 'Tick it to turn conditional logic to work below', 'wpcomment' )
			),
		);
		
		$type = 'color';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}