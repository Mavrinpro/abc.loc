<?php
/*
 * Followig class handling text input control and their
* dependencies. Do not make changes in code
* Create on: 9 November, 2013
*/

class NM_Divider_WPC extends WPComment_Inputs{
	
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
		
		$this -> title 		= __ ( 'Divider', 'wpcomment' );
		$this -> desc		= __ ( 'regular didider input', 'wpcomment' );
		$this -> icon		= __ ( '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'wpcomment' );
		$this -> settings	= self::get_settings();
		
	}
	
	function wpcomment_divider_style(){

        return array(
        	'style1' => __( 'Style 1', 'wpcomment' ), 
        	'style2' => __( 'Style 2', 'wpcomment' ),			
        	'style3' => __( 'Style 3', 'wpcomment' ), 
            'style4' => __( 'Style 4', 'wpcomment' ),
            'style5' => __( 'Style 5', 'wpcomment' ),
       );
    }
 
     function border_style(){ 
     	
    	return array(
			'solid'  => __( 'Solid', 'wpcomment' ),
			'dotted' => __( 'Dotted', 'wpcomment' ),
			'dashed' => __( 'Dashed', 'wpcomment' ),
			'double' => __( 'Double', 'wpcomment' ),
			'groove' => __( 'Groove', 'wpcomment' ),
			'ridge'  => __( 'Ridge', 'wpcomment' ),
			'inset'  => __( 'Inset', 'wpcomment' ),
			'outset' => __( 'Outset', 'wpcomment' ),
		);
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
				'divider_styles' => array (
						'type' => 'select',
						'title' => __ ( 'Select style', 'wpcomment' ),
						'desc' => __ ( 'Select style you want to render', "wpcomment"),
						'options'	=> $this->wpcomment_divider_style(),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'style1_border' => array (
						'type' => 'select',
						'title' => __ ( 'Style border', 'wpcomment' ),
						'desc' => __ ( 'It will only apply on style 1.', "wpcomment"),
						'options'	=> $this-> border_style(),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'divider_height' => array (
						'type'  => 'text',
						'title' => __ ( 'Divider height', 'wpcomment' ),
						'desc'  => __ ( 'Provide the divider height e.g: 3px.', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'divider_txtsize' => array (
						'type' => 'text',
						'title' => __ ( 'Font size', 'wpcomment' ),
						'desc' => __ ( 'Provide divider text font size e.g: 18px', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'divider_color' => array (
						'type' => 'color',
						'title' => __ ( 'Divider color', 'wpcomment' ),
						'desc' => __ ( 'Choose the divider color.', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				'divider_txtclr' => array (
						'type' => 'color',
						'title' => __ ( 'Divider text color', 'wpcomment' ),
						'desc' => __ ( 'Choose the divider text color.', 'wpcomment' ),
						'col_classes' => array('col-md-3','col-sm-12')
				),
				
		);
		
		$type = 'divider';
		return apply_filters("poom_{$type}_input_setting", $input_meta, $this);
	}
}