<?php
/**
* Register Go to pro button
*
* @return void
* @since 1.0.5
*
* @package Gutenbiz WordPress theme
*/
function gutenbiz_got_to_pro(){
	if( Gutenbiz_Theme::is_pro() ){
		return;
	}
	Gutenbiz_Customizer::set(array(
		'section' => array(
			'id'       => 'premium_addons_section', 
			'type'     => 'anchor',
			'title'    => esc_html__( 'Gutenbiz Pro - Unlock Features', 'gutenbiz' ),
			'url'      => esc_url( 'https://risethemes.com/downloads/gutenbiz-pro/' ),
			'priority' => 0
		)
	));
}
add_action( 'init', 'gutenbiz_got_to_pro' );