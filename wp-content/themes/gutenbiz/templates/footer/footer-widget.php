<?php
/**
 * Content for footer widget
 *
 * @since 1.0.6
 *
 * @package Gutenbiz WordPress Theme
 */
 if( !apply_filters( Gutenbiz_Helper::fn_prefix( 'disable_footer_widget' ), false ) ): ?>
    <footer <?php Gutenbiz_Helper::schema_body( 'footer' ); ?> class="footer-top-section">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                 	<?php
                 		$num_footer = gutenbiz_get( 'layout-footer' );
                 		for( $i = 1; $i <= $num_footer ; $i++ ){ ?>
                 			<?php if ( is_active_sidebar( Gutenbiz_Helper::fn_prefix( 'footer_sidebar' ) . '_' . $i ) ) : ?>
		                 		<aside class="col footer-widget-wrapper py-5">
		                 	    	<?php dynamic_sidebar( Gutenbiz_Helper::fn_prefix( 'footer_sidebar' ) . '_' . $i ); ?>
		                 		</aside>
	                 		<?php endif; ?>
                 	<?php } ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif;
