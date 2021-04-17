<?php
/**
 * Theme author name
 *
 * @since 1.0.6
 *
 * @package Gutenbiz WordPress Theme
 */ ?>
<div class="col-xs-12 col-sm-4 credit-link">
	<?php
		if( Gutenbiz_Theme::is_pro() ){ ?>
			<?php echo esc_html( gutenbiz_get( 'footer-author' ) ); ?>
		<?php }else{
			?>
			<a href="<?php echo esc_url( '//risethemes.com/downloads/gutenbiz' ); ?>" target="_blank">
				<?php esc_html_e( 'Gutenbiz', 'gutenbiz' ); ?>
			</a>
			<?php esc_html_e( 'Created By ' , 'gutenbiz' ); ?>
			<a href="<?php echo esc_url( '//www.risethemes.com' ); ?>" target="_blank">
				<?php echo esc_html( 'Rise Themes' ); ?>
			</a>
		<?php }
	?>
</div>