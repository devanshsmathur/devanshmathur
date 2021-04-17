<?php
/**
* Active callback function for footer author
*
* @static
* @access public
* @return boolen
* @since 1.0.7
*
* @package Gutenbiz WordPress theme
*/
if( !function_exists( 'gutenbiz_acb_footer_author' ) ){
	function gutenbiz_acb_footer_author( $control ){
		$value = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'footer-author-show' ) )->value();
		return $value;
	}
}

/**
 * Creates option for footer author
 * Register footer Options author section
 *
 * @since 1.0.7
 * @package Gutenbiz WordPress Theme
 */
function gutenbiz_footer_author_options(){

	if( !Gutenbiz_Theme::is_pro() ){
		return;
	}

	Gutenbiz_Customizer::set(array(
		'panel' => 'panel',
		'section' => array(
			'id' => 'footer',
			'title' => esc_html__( 'Footer Options', 'gutenbiz' ),
		),
		'fields' => array(
			array(
				'id'      => 'footer-author-show',
				'label'   => esc_html__( 'Show Author', 'gutenbiz' ),
				'default' => true,
				'type'    => 'toggle',
			),
			array(
				'id'      => 'footer-author',
				'label'   => esc_html__( 'Author Text', 'gutenbiz' ),
				'default' => esc_html__( 'Created By: Rise Themes', 'gutenbiz' ),
				'active_callback' => 'acb_footer_author',
				'type'    => 'text',
			    'partial' =>	array(
			    	'selector'	=>	'.credit-link'
				)
			)
		)
	));
}
add_action( 'init', 'gutenbiz_footer_author_options' );