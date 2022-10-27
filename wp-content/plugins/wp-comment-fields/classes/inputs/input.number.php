<?php
/*
 * Followig class handling number input control and their
* dependencies. Do not make changes in code
* Create on: 21 May, 2014
*/

class NM_Number_WPC extends WPComment_Inputs{
	
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
		
		$this -> title 		= __ ( 'Number Input', "wpcomment" );
		$this -> desc		= __ ( 'regular number input', "wpcomment" );
		$this -> icon		= __ ( '<i class="fa fa-hashtag" aria-hidden="true"></i>', 'wpcomment' );
		$this -> settings	= self::get_settings();
		
	}
	
	private function get_settings(){
		
		$input_meta = array (
			'title' => array (
					'type' => 'text',
					'title' => __ ( 'Title', "wpcomment" ),
					'desc' => __ ( 'It will be shown as field label', "wpcomment" ) 
			),
			'data_name' => array (
					'type' => 'text',
					'title' => __ ( 'Data name', "wpcomment" ),
					'desc' => __ ( 'REQUIRED: The identification name of this field, that you can insert into body email configuration. Note:Use only lowercase characters and underscores.', "wpcomment" ) 
			),
			'description' => array (
					'type' => 'textarea',
					'title' => __ ( 'Description', "wpcomment" ),
					'desc' => __ ( 'Small description, it will be display near name title.', "wpcomment" ) 
			),
			'placeholder' => array (
					'type' => 'text',
					'title' => __ ( 'Placeholder', 'wpcomment' ),
					'desc' => __ ( 'Optionally placeholder.', 'wpcomment' ) 
			),
			'error_message' => array (
					'type' => 'text',
					'title' => __ ( 'Error message', "wpcomment" ),
					'desc' => __ ( 'Insert the error message for validation.', "wpcomment" ) 
			),
			'max' => array (
					'type' => 'text',
					'title' => __ ( 'Max. values', "wpcomment" ),
					'desc' => __ ( 'Max. values allowed, leave blank for default', "wpcomment" ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'min' => array (
					'type' => 'text',
					'title' => __ ( 'Min. values', "wpcomment" ),
					'desc' => __ ( 'Min. values allowed, leave blank for default', "wpcomment" ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'step' => array (
					'type' => 'text',
					'title' => __ ( 'Steps', "wpcomment" ),
					'desc' => __ ( 'specified legal number intervals', "wpcomment" ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'default_value' => array (
					'type' => 'text',
					'title' => __ ( 'Set default value', "wpcomment" ),
					'desc' => __ ( 'Pre-defined value for text input', "wpcomment" ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'class' => array (
					'type' => 'text',
					'title' => __ ( 'Class', "wpcomment" ),
					'desc' => __ ( 'Insert an additional class(es) (separateb by comma) for more personalization.', "wpcomment" ),
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
			),
			'visibility_role' => array (
					'type' => 'text',
					'title' => __ ( 'User Roles', 'wpcomment' ),
					'desc' => __ ( 'Role separated by comma.', "wpcomment"),
					'hidden' => true,
			),
			'desc_tooltip' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show tooltip (PRO)', 'wpcomment' ),
					'desc' => __ ( 'Show Description in Tooltip with Help Icon', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'required' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Required', "wpcomment" ),
					'desc' => __ ( 'Select this if it must be required.', "wpcomment" ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'logic' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Enable Conditions', "wpcomment" ),
					'desc' => __ ( 'Tick it to turn conditional logic to work below', "wpcomment" )
			),
			'conditions' => array (
					'type' => 'html-conditions',
					'title' => __ ( 'Conditions', "wpcomment" ),
					'desc' => __ ( 'Tick it to turn conditional logic to work below', "wpcomment" )
			),
				
		);
		
		$type = 'number';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}