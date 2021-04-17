<?php

if( !function_exists( 'gutenbiz_dark_acb_type_cat' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Gutenbiz dark WordPress Theme
	*/
	function gutenbiz_dark_acb_type_cat( $control ){
		$enable = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'dark-show-slider' ) )->value();
		$cat = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'dark-slider-type' ) )->value();
		$val = $enable && 'category' == $cat;
		return $val;
	}
endif;

if( !function_exists( 'gutenbiz_dark_acb_slider' ) ):
	/**
	* Active callback function of slider
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Gutenbiz dark WordPress Theme
	*/
	function gutenbiz_dark_acb_slider( $control ){
		$val = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'dark-show-slider' ) )->value();
		return $val;
	}
endif;

/**
* Banner Slider Options
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz dark WordPress Theme
*/
function gutenbiz_dark_slider_options(){

	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'slider',
		    'title' => esc_html__( 'Home Page Slider', 'gutenbiz-dark' ),
		    'priority' => 0
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
			    'id'	  => 'dark-show-slider',
			    'label'   => esc_html__( 'Enable Slider', 'gutenbiz-dark' ),
			    'default' => true,
			    'type'    => 'toggle',
			),
			array(
				'id' => 'dark-slider-more-text',
				'label' => esc_html__( 'Read More Text', 'gutenbiz-dark' ),
				'default' => esc_html__( 'Read More', 'gutenbiz-dark' ),
				'active_callback' => 'dark_acb_slider',
				'type' => 'text'
			),
			array(
			    'id'      => 'dark-slider-type',
			    'label'   => esc_html__( 'Get Content From', 'gutenbiz-dark' ),
			    'type'    => 'buttonset',
			    'default' => 'category',
			    'active_callback' => 'dark_acb_slider',
			    'choices' => array(
			        'post' => esc_html__( 'Recent Post', 'gutenbiz-dark' ),
			        'category'  => esc_html__( 'Category', 'gutenbiz-dark' ),
			    )
			),
			array(
				'id' => 'dark-cat-post',
				'label' => esc_html__( 'Select Category', 'gutenbiz-dark' ),
				'default' => 0,
				'type' => 'gutenbiz-category-dropdown',
				'active_callback' => 'dark_acb_type_cat'
			)
		)
	));
}
add_action( 'init', 'gutenbiz_dark_slider_options' );