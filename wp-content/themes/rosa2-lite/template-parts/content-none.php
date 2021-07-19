<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rosa2 Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section class="no-results not-found">
    <div class="entry-content">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'rosa2-lite' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {

				printf(
					'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rosa2-lite' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			} elseif ( is_search() ) { ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rosa2-lite' ); ?></p>
				<?php
				get_search_form();

			} else { ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rosa2-lite' ); ?></p>
				<?php
				get_search_form();

			} ?>
        </div><!-- .page-content -->
    </div>
</section><!-- .no-results -->
