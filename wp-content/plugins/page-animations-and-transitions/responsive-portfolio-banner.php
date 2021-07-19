<?php
if (!defined('ABSPATH')) {
    exit;
}
wp_enqueue_style('respport-banner', WL_Page_Ainm_URI . '/css/banner.css');
$gp_imgpath = WL_Page_Ainm_URI . "/images/resp_pro.png";
?>
<div class="wb_plugin_feature notice  is-dismissible">
    <div class="wb_plugin_feature_banner default_pattern pattern_ ">
        <div class="wb-col-md-6 wb-col-sm-12 box">
            <div class="ribbon"><span><?php esc_html_e('Go Pro', WL_PAT_DOMAIN); ?></span></div>
            <img class="wp-img-responsive" src="<?php echo esc_url($gp_imgpath); ?>" alt="img">
        </div>
        <div class="wb-col-md-6 wb-col-sm-12 wb_banner_featurs-list">
            <span class="gp_banner_head">
                <h2><?php esc_html_e('Responsive Portfolio Pro Features', WL_PAT_DOMAIN); ?> </h2>
            </span>
            <ul>
                <li><?php esc_html_e('8 Gallery Layout', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Unlimited Hover Color', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Album View Gallery', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Isotope or Masonary Effects', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('8 Type of Hover Animations', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('500 plus Font Style', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Multiple Image uploader', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('8 Types of Lightbox Integrated', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Drag and Drop image Position', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Shortcode Button on post or page', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Font Icon Customization & Many More', WL_PAT_DOMAIN); ?></li>
                <li><?php esc_html_e('Hide or Show Gallery Title and Label', WL_PAT_DOMAIN); ?></li>
            </ul><br> <br>
            <div class="wp_btn-grup">
                <a class="wb_button-primary" href="http://demo.weblizar.com/responsive-portfolio-pro/" target="_blank"><?php esc_html_e('View Demo', WL_PAT_DOMAIN); ?></a>
                <a class="wb_button-primary" href="https://weblizar.com/plugins/responsive-portfolio-pro/" target="_blank"><?php esc_html_e('Buy Now', WL_PAT_DOMAIN); ?> <?php esc_html_e('$19', WL_PAT_DOMAIN); ?></a>
            </div>
        </div>
    </div>
</div>