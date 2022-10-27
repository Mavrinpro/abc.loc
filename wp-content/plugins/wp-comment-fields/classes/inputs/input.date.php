<?php
/*
 * Followig class handling date input control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Date_WPC extends WPComment_Inputs{
	
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
		
		$this -> title 		= __ ( 'Date Input', 'wpcomment' );
		$this -> desc		= __ ( 'regular date input', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-calendar" aria-hidden="true"></i>', 'wpcomment' );
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
			'placeholder' => array (
					'type' => 'text',
					'title' => __ ( 'Placeholder', 'wpcomment' ),
					'desc' => __ ( 'Optional.', 'wpcomment' ) 
			),
			'error_message' => array (
					'type' => 'text',
					'title' => __ ( 'Error message', 'wpcomment' ),
					'desc' => __ ( 'Insert the error message for validation.', 'wpcomment' ) 
			),
			'class' => array (
					'type' => 'text',
					'title' => __ ( 'Class', 'wpcomment' ),
					'desc' => __ ( 'Insert an additional class(es) (separateb by comma) for more personalization.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'default_value' => array (
					'type' => 'text',
					'title' => __ ( 'Default Date', 'wpcomment' ),
					'desc' => __ ( 'User format YYYY-MM-DD e.g: 2017-05-25.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'date_formats' => array (
					'type' => 'select',
					'title' => __ ( 'Date formats', 'wpcomment' ),
					'desc' => __ ( 'Select date format. (if jQuery enabled below)', 'wpcomment' ),
					'options' => wpcomment_get_date_formats(),
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
			'max_date' => array (
					'type' => 'text',
					'title' => __ ( 'Max Date', 'wpcomment' ),
					'desc' => __ ( 'Max. date, enter a date or use shortcode (example: +10d)', 'wpcomment' ),
					'link' => __ ( '<a target="_blank" href="http://api.jqueryui.com/datepicker/#option-yearRange">Example</a>', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'year_range' => array (
					'type' => 'text',
					'title' => __ ( 'Year Range', 'wpcomment' ),
					'desc' => __ ( 'e.g: 1950:2016. (if jQuery enabled below) Set start/end year like used example.', 'wpcomment' ),
					'link' => __ ( '<a target="_blank" href="http://api.jqueryui.com/datepicker/#option-yearRange">Example</a>', 'wpcomment' ),
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
			'jquery_dp' => array (
					'type' => 'checkbox',
					'title' => __ ( 'jQuery Datepicker', 'wpcomment' ),
					'desc' => __ ( 'It will load jQuery fancy datepicker.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'no_weekends' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Disable Weekends', 'wpcomment' ),
					'desc' => __ ( 'It will disable Weekends.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'past_dates' => array (
			    'type' => 'checkbox',
			    'title' => __ ( 'Disable Past Dates', 'wpcomment' ),
			    'desc' => __ ( 'Disable dates.', 'wpcomment' ),
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
		
		$type = 'date';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}