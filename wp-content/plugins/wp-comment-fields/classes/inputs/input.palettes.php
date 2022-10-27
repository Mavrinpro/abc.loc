<?php
/*
 * Followig class handling radio input control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Palettes_WPC extends WPComment_Inputs{
	
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
		
		$this -> title 		= __ ( 'Color Palettes', 'wpcomment' );
		$this -> desc		= __ ( 'color boxes', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-user-plus" aria-hidden="true"></i>', 'wpcomment' );
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
					'desc' => __ ( 'Insert the error message for validation.', 'wpcomment' ) 
			),
			'selected_palette_bcolor' => array (
					'type' => 'color',
					'title' => __ ( 'Selected Border Color', 'wpcomment' ),
					'desc' => __ ( 'Change selected palette border color, e.g: #fff', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'class' => array (
					'type' => 'text',
					'title' => __ ( 'Class', 'wpcomment' ),
					'desc' => __ ( 'Insert an additional class(es) (separateb by comma) for more personalization.', 'wpcomment' ),
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
			'max_selected' => array (
					'type' => 'number',
					'title' => __ ( 'Max selected', 'wpcomment' ),
					'desc' => __ ( 'Max. selected, leave blank for default.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'options' => array (
						'type' => 'paired-palettes',
						'title' => __ ( 'Add colors', 'wpcomment' ),
						'desc' => __ ( 'Type color code with price (optionally). To write label, use #colorcode - White', 'wpcomment' )
			),
			'selected' => array (
					'type' => 'text',
					'title' => __ ( 'Selected color', 'wpcomment' ),
					'desc' => __ ( 'Type color code given in (Add Options) tab if you want already selected.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'color_width' => array (
					'type' => 'text',
					'title' => __ ( 'Color width', 'wpcomment' ),
					'desc' => __ ( 'default is 50, e.g: 75', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'color_height' => array (
					'type' => 'text',
					'title' => __ ( 'Color height', 'wpcomment' ),
					'desc' => __ ( 'default is 50, e.g: 100', 'wpcomment' ),
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
			'multiple_allowed' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Multiple selections?', 'wpcomment' ),
					'desc' => __ ( 'Allow users to select more then one palette?.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'circle' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show as Circle', 'wpcomment' ),
					'desc' => __ ( 'It will display color palettes as circle', 'wpcomment' ),
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
		
		$type = 'palettes';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}