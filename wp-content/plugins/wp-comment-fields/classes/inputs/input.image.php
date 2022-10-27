<?php
/*
 * Followig class handling pre-uploaded image control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Image_WPC extends WPComment_Inputs{
	
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
		
		$this -> title 		= __ ( 'Images', 'wpcomment' );
		$this -> desc		= __ ( 'Images selection', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-picture-o" aria-hidden="true"></i>', 'wpcomment' );
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
			'selected_img_bordercolor' => array (
					'type' => 'color',
					'title' => __ ( 'Selected Image Border Color', 'wpcomment' ),
					'desc' => __ ( 'Change selected images border color, e.g: #fff', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'images' => array (
					'type' => 'pre-images',
					'title' => __ ( 'Select images', 'wpcomment' ),
					'desc' => __ ( 'Select images from media library', 'wpcomment' )
			),	
			'selected' => array (
					'type' => 'text',
					'title' => __ ( 'Selected image', 'wpcomment' ),
					'desc' => __ ( 'Type option title given in (Add Images) tab if you want it already selected.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'image_width' => array (
					'type' => 'text',
					'title' => __ ( 'Image Width', 'wpcomment' ),
					'desc' => __ ( 'Change image width e,g: 50px or 50%.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'image_height' => array (
					'type' => 'text',
					'title' => __ ( 'Image Height', 'wpcomment' ),
					'desc' => __ ( 'Change image height e,g: 50px or 50%. ', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'min_checked' => array (
					'type' => 'text',
					'title' => __ ( 'Min. Image Select', "wpcomment" ),
					'desc' => __ ( 'How many Images can be checked by user e.g: 2. Leave blank for default.', "wpcomment" ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'max_checked' => array (
					'type' => 'text',
					'title' => __ ( 'Max. Image Select', "wpcomment" ),
					'desc' => __ ( 'How many Images can be checked by user e.g: 3. Leave blank for default.', "wpcomment" ),
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
			'legacy_view' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Enable legacy view', 'wpcomment' ),
					'desc' => __ ( 'Tick it to turn on old boxes view for images', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'multiple_allowed' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Multiple selections?', 'wpcomment' ),
					'desc' => __ ( 'Allow users to select more then one images?.', 'wpcomment' ),
					'col_classes' => array('col-md-3','col-sm-12')
			),
			'show_popup' => array (
					'type' => 'checkbox',
					'title' => __ ( 'Popup', 'wpcomment' ),
					'desc' => __ ( 'Show big image on hover', 'wpcomment' ),
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
		
		$type = 'image';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}