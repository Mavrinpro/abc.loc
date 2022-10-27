<?php
/*
 * Followig class handling text input control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Text_WPC extends WPComment_Inputs{
	
	/*
	 * input control settings
	 */
	var $title, $desc, $settings;
	
	/*
	 * this var is pouplated with current plugin meta
	*/
	var $plugin_meta;
	
	function __construct(){
		
		$this -> title 		= __ ( 'Text Input', 'wpcomment' );
		$this -> desc		= __ ( 'regular text input', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'wpcomment' );
		$this -> settings	= self::get_settings();
		
	}
	
	private function get_settings(){
		
		$regex_help_url = 'https://github.com/RobinHerbots/Inputmask#any-option-can-also-be-passed-through-the-use-of-a-data-attribute-use-data-inputmask-the-name-of-the-optionvalue';
		
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
				'placeholder' => array (
						'type' => 'text',
						'title' => __ ( 'Placeholder', 'wpcomment' ),
						'desc' => __ ( 'Optionally placeholder.', 'wpcomment' ) 
				),
				'error_message' => array (
						'type' => 'text',
						'title' => __ ( 'Error message', 'wpcomment' ),
						'desc' => __ ( 'Insert the error message for validation.', 'wpcomment' ) 
				),
				'maxlength' => array (
						'type' => 'text',
						'title' => __ ( 'Max. Length', 'wpcomment' ),
						'desc' => __ ( 'Max. characters allowed, leave blank for default', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				
				'minlength' => array (
						'type' => 'text',
						'title' => __ ( 'Min. Length', 'wpcomment' ),
						'desc' => __ ( 'Min. characters allowed, leave blank for default', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'default_value' => array (
						'type' => 'text',
						'title' => __ ( 'Set default value', 'wpcomment' ),
						'desc' => __ ( 'Pre-defined value for text input', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'class' => array (
						'type' => 'text',
						'title' => __ ( 'Class', 'wpcomment' ),
						'desc' => __ ( 'Insert an additional class(es) (separateb by comma) for more personalization.', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				// 'input_mask' => array (
				// 		'type' => 'text',
				// 		'title' => __ ( 'Input Masking', 'wpcomment' ),
				// 		'desc' => __ ( 'Click options to see all Masking Options', 'wpcomment' ),
				// 		'link' => __ ( '<a href="https://github.com/RobinHerbots/Inputmask" target="_blank">Options</a>', 'wpcomment' ),
				// 		'col_classes' => array('col-md-3','col-sm-12')
				// ),
				'width' => array (
						'type' => 'select',
						'title' => __ ( 'Width', 'wpcomment' ),
						'desc' => __ ( 'Type field width in % e.g: 50%', "wpcomment"),
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
				// 'use_regex' => array (
				// 		'type' => 'checkbox',
				// 		'title' => __ ( 'Use Regex Expresession', 'wpcomment' ),
				// 		'link' => __ ( '<a target="_blank" href="'.esc_url($regex_help_url).'">See More</a>', 'wpcomment' ),
				// 		'col_classes' => array('col-md-3','col-sm-12')
				// ),
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
						'desc' => __ ( 'Tick it to turn conditional logic to work below', 'wpcomment' ),
				),
				'conditions' => array (
						'type' => 'html-conditions',
						'title' => __ ( 'Conditions', 'wpcomment' ),
						'desc' => __ ( 'Tick it to turn conditional logic to work below', 'wpcomment' )
				),
				
		);
		
		$type = 'text';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}