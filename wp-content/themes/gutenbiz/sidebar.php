<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0.0
 *
 * @package Gutenbiz WordPress Theme
 */

if ( ! is_active_sidebar( 'gutenbiz_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
		$sidebar = apply_filters( Gutenbiz_Theme::fn_prefix( 'sidebar' ), 'gutenbiz_sidebar' );
		dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->