<?php
/*
 * Followig class handling date input control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Daterange_WPC extends WPComment_Inputs{
	
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
		
		$this -> title 		= __ ( 'DateRange Input', 'wpcomment' );
		$this -> desc		= __ ( '<a href="http://www.daterangepicker.com/" target="_blank">More detail</a>', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-table" aria-hidden="true"></i>', 'wpcomment' );
		$this -> settings	= self::get_settings();
		
	}
	
	private function get_settings(){
		
		$input_meta = array (
			'title' => array (
					'type' => 'text',
					'title' => __ ( 'Title', 'wpcomment' ),
					'desc' => __ ( 'All about Daterangepicker, see daterangepicker', 'wpcomment' ), 
					'link' => __ ( '<a href="http://www.daterangepicker.com/" target="_blank">Daterangepicker</a>', 'wpcomment' ) 
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
			'open_style' => array (
					'type' => 'select',
					'title' => __ ( 'Open Style', 'wpcomment' ),
					'desc' => __ ( 'Default is down.', 'wpcomment' ),
					'options' => array('down'=>'Down', 'up'=>'Up'),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'date_formats' => array (
					'type' => 'text',
					'title' => __ ( 'Format', 'wpcomment' ),
					'desc' => __ ( 'e.g MM-DD-YYYY, DD-MMM-YYYY', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'tp_increment' => array (
					'type' => 'text',
					'title' => __ ( 'Timepicker increment', 'wpcomment' ),
					'desc' => __ ( 'e.g: 30', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'start_date' => array (
					'type' => 'text',
					'title' => __ ( 'Start Date', 'wpcomment' ),
					'desc' => __ ( 'Must be same format as defined in above (Format) field.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'end_date' => array (
					'type' => 'text',
					'title' => __ ( 'End Date', 'wpcomment' ),
					'desc' => __ ( 'Must be same format as defined in above (Format) field.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'min_date' => array (
					'type' => 'text',
					'title' => __ ( 'Min Date', 'wpcomment' ),
					'desc' => __ ( 'e.g: 2017-02-25', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'max_date' => array (
					'type' => 'text',
					'title' => __ ( 'Max Date', 'wpcomment' ),
					'desc' => __ ( 'e.g: 2017-09-15', 'wpcomment' ),
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
			'time_picker' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show Timepicker', 'wpcomment' ),
					'desc' => __ ( 'Show Timepicker.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'tp_24hours' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show Timepicker 24 Hours', 'wpcomment' ),
					'desc' => __ ( 'Left blank for default', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'tp_seconds' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show Timepicker Seconds', 'wpcomment' ),
					'desc' => __ ( 'Left blank for default', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'drop_down' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show Dropdown', 'wpcomment' ),
					'desc' => __ ( 'Left blank for default', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'show_weeks' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Show Week Numbers', 'wpcomment' ),
					'desc' => __ ( 'Left blank for default.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'auto_apply' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Auto Apply Changes', 'wpcomment' ),
					'desc' => __ ( 'Hide the Apply/Cancel button.', 'wpcomment' ),
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
		
		$type = 'daterange';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}