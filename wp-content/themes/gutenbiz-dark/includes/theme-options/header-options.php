<?php
/**
* Register Header Options
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz Dark
*/
function gutenbiz_dark_header_options(){
	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'header',
		    'title' => esc_html__( 'Header Options', 'gutenbiz-dark' ),
		    'priority'    => 3,
		),
		'fields' => array(
			array(
				'id'	  => 'dark-sticky-header',
				'label'   => esc_html__( 'Enable Sticky Header', 'gutenbiz-dark' ),
				'default' => true,
				'type'    => 'toggle',
			),
			array(
				'id'	  => 'hide-search-icon',
				'label'   => esc_html__( 'Enable Search', 'gutenbiz-dark' ),
				'default' => true,
				'type'    => 'toggle',
			),
			array(
				'id'	=> 'header-menu-bg-color',
				'label' => esc_html__( 'Menu Background Color', 'gutenbiz-dark' ),
				'default' => '#141414',
 				'type'  => 'color-picker',
 				'priority'    => 30
			)
		)
	));
}
add_action( 'init', 'gutenbiz_dark_header_options' );