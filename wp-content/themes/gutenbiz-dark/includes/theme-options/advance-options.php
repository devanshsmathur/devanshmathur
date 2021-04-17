<?php
if( !function_exists( 'gutenbiz_acb_child_custom_header_one' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Gutenbiz WordPress theme
	*/
	function gutenbiz_acb_child_custom_header_one( $control ){
		$value = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'container-width' ) )->value();
		return 'default' == $value;
	}
endif;

/**
* Register Advanced Options
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz WordPress theme
*/
function gutenbiz_child_advanced_options(){

	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'advance-options',
		    'title' => esc_html__( 'Advanced Options', 'gutenbiz-dark' ),
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'	=> 'pre-loader',
				'label' => esc_html__( 'Show Preloader', 'gutenbiz-dark' ),
				'default' => false,
				'type'  => 'toggle',
			),
			array(
				'id'	=> 'dark-mode',
				'label' => esc_html__( 'Enable DarkMode', 'gutenbiz-dark' ),
				'default' => true,
				'type'  => 'toggle',
			),
			array(
			    'id'      => 'assets-version',
			    'label'   => esc_html__( 'Assets Version', 'gutenbiz-dark' ),
			    'type'    => 'buttonset',
			    'default' => 'development',
			    'choices' => array(
			        'development' => esc_html__( 'Development', 'gutenbiz-dark' ),
			        'production'  => esc_html__( 'Production', 'gutenbiz-dark' ),
			    )
			),
			array(
			    'id'      =>  'container-width',
			    'label'   => esc_html__( 'Site Layout', 'gutenbiz-dark' ),
			    'type'    => 'buttonset',
			    'default' => 'default',
			    'choices' => array(
			        'default' => esc_html__( 'Default', 'gutenbiz-dark' ),
			        'box'	  => esc_html__( 'Boxed', 'gutenbiz-dark' ),
			    )
			),
		    array(
		        'id'          	  => 'container-custom-width',
		        'label'   	  	  => esc_html__( 'Container Width', 'gutenbiz-dark' ),
		        'active_callback' => 'acb_child_custom_header_one',
		        'type'        	  => 'range',
		        'default'     	  => '1140',
	    		'input_attrs' 	  =>  array(
	                'min'   => 400,
	                'max'   => 2000,
	                'step'  => 5,
	            ),
		    ),
		)
	));
}
add_action( 'init', 'gutenbiz_child_advanced_options' );