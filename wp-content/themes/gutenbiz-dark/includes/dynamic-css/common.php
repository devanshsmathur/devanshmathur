<?php
  /**
  * Register dynamic css
  *
  * @since 1.0.0
  *
  * @package Gutenbiz Mag
  */
function gutenbiz_dark_common_css(){
 	$style = array(
 		array(
 			'selector' => '.site-branding .site-title a, .site-branding .site-description',
 			'props' => array(
 				'color' => array(
 					'customizer' => false,
 					'value'		=> '#' . get_theme_mod( 'header_textcolor' ,'ffffff' ),
 					'unit' => ''
 				)
 			)
 		),
		 array(
			'selector' => '.gutenbiz-dark-mode .gutenbiz-main-menu div > ul > li > a:hover, 
			.gutenbiz-dark-mode .entry-meta .author-info .posted-on a:hover,
			.gutenbiz-dark-mode .comments-area .comment-list .comment-body p a:hover,
			.gutenbiz-dark-mode .comment-respond .logged-in-as a:hover,
			.gutenbiz-dark-mode .footer-widget ul li a:hover, body a:hover, 
			.gutenbiz-dark-mode .entry-meta a.url:hover, 
			.gutenbiz-dark-mode .entry-meta.single .url:hover,
			.gutenbiz-dark-mode .gutenbiz-search-icons.gutenbiz-toggle-search:hover,
			.gutenbiz-dark-mode .post .post-title a:hover,
			.gutenbiz-dark-mode .site-branding .site-title a:hover,
			.gutenbiz-dark-mode .post-content-wrap .post-categories li a:hover,
			.gutenbiz-dark-mode .post .gutenbiz-comments a:hover,
			.gutenbiz-dark-mode .footer-bottom-section .credit-link a:hover, 
			.gutenbiz-dark-mode .gutenbiz-main-menu div > ul li a:hover,
			.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > a:hover,
			.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > ul li > a:hover, 
			.gutenbiz-dark-mode .footer-widget ul > li a:hover',
			'props' => array(
				'color' => 'link-hover-color',
			)
		),
		array(
			'selector' => '.post-content-wrap p > a:hover,
			.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > ul li > a div:hover,
			.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > ul li > a p:hover,
			.gutenbiz-dark-mode .nav-previous a span:hover',
			'props' => array(
				'color' => array(
					'customizer' => true,
					'value'		=>  'link-hover-color',
					'unit' => ' !important'
				)
			)
		),
		array(
			'selector' => '.gutenbiz-dark-mode .gutenbiz-main-menu div > ul li a, 
			.gutenbiz-dark-mode .gutenbiz-main-menu>ul li>ul, 
			.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > a', 
			'props' => array(
				'color' => array(
					'customizer' => true,
					'value'		=>  'primary-menu-item-color',
					'unit' => ''
				)
			)
		),

		array(
			'selector' => '.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > ul li > a div,
			.gutenbiz-dark-mode .gutenbiz-main-menu > ul > li > ul li > a p, 
			.gutenbiz-dark-mode .mr-mobile-menu ul > li > a, 
			.gutenbiz-dark-mode .mr-mobile-menu ul > li > a > div > p,
			.gutenbiz-dark-mode .mr-mobile-menu ul > li > a > div > div',
			'props' => array(
				'color' => array(
					'customizer' => true,
					'value'		=>  'primary-menu-item-color',
					'unit' => ' !important'
				)
			)
		),

		array(
			'selector' => '.gutenbiz-dark-mode .footer-widget ul > li a',
			'props' => array(
				'color' => array(
					'customizer' => true,
					'value'		=>  'footer-content-color',
					'unit' => ' '
				)
			)
		),

		array(
			'selector' => 'header#masthead',
			'props' => array(
				'background' => array(
					'customizer' => true,
					'value'		=>  'header-menu-bg-color',
					'unit' => ' !important'
				)
			)
		),
 	);
 	Gutenbiz_Css::add_styles( $style, 'md' );
 }
 add_action( 'init', 'gutenbiz_dark_common_css' );