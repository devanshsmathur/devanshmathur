<?php
/* Plugin Name: Page Animations And Transitions
Description: Page Animations And Transition is provide multiple Animation effect to your WordPress site. Show your page with stylish transition.
Version: 2.3.0
Author: weblizar
Author URI: https://weblizar.com/plugins/
Plugin URI: https://wordpress.org/plugins/page-animations-and-transitions/
* Text Domain: weblizar-page-anim-trans
* Domain Path: /languages
*/


// Translate all text & labels of plugin
defined('ABSPATH') || die();
define( 'WL_PAT_DOMAIN', 'weblizar-page-anim-trans' );
define('WL_Page_Ainm_URI', plugins_url('',__FILE__));

add_action('plugins_loaded', 'Page_anim_ReadyTranslation');

function Page_anim_ReadyTranslation() {
	load_plugin_textdomain('weblizar-page-anim-trans', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

function weblizar_page_anim_activate() {
	$wl_page_trans_options = array();
	$wl_page_trans_options['weblizar_page_in_trans']="none";
	$wl_page_trans_options['weblizar_bg_clr']="#000000";
	$wl_page_trans_options['weblizar_preload_txt_clr']="#fff";
	$wl_page_trans_options['weblizar_pre_load_delay']="5000";
	$wl_page_trans_options['weblizar_icon_pre_load']="1";
	$wl_page_trans_options['weblizar_pre_load_switch']="1";
	$wl_page_trans_options['weblizar_pg_anim_txt_append']="Welcome in Weblizar Preloader";
	add_option('wl_page_trans_options', $wl_page_trans_options);
}
register_activation_hook( __FILE__, 'weblizar_page_anim_activate' );

// Admin dashboard Menu Pages For Page animation and transition
add_action('admin_menu','weblizar_page_anim_widget_menu');
function weblizar_page_anim_widget_menu() {
    //Main menu of Page animation and transition
    $menu = add_menu_page('Page Animation And Transition', esc_html__('Page Animations', WL_PAT_DOMAIN), 'administrator', 'weblizar-page-animation', '','dashicons-admin-page');
    // Page Animation settings page
    $SubMenu1 = add_submenu_page( 'weblizar-page-animation', 'Page Animation Settings', esc_html__('Page Animation Settings', WL_PAT_DOMAIN), 'administrator', 'weblizar-page-animation', 'display_page_anim_setting_page' );

	add_action('admin_print_styles-'.$menu, 'pagr_anim_admin_enqueue_script');
    add_action('admin_print_styles-'.$SubMenu1, 'pagr_anim_admin_enqueue_script');
}

 /**
 * Weblizar Admin Menu CSS
 */
function pagr_anim_admin_enqueue_script() {
	// Enquee style
	wp_enqueue_style('weblizar-option-style-google', WL_Page_Ainm_URI .'/css/weblizar-option-style.css');
	wp_enqueue_style('recom', WL_Page_Ainm_URI .'/css/recom.css');
	wp_enqueue_style('wl_bootstrap', WL_Page_Ainm_URI. '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', WL_Page_Ainm_URI.'/css/all.min.css');

	// Enquee script
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'Page-color-picker-script', plugins_url('js/wl-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	wp_enqueue_script('weblizar-tab-js-google', WL_Page_Ainm_URI .'/js/option-js.js',array('media-upload', 'jquery-ui-sortable'));
	wp_enqueue_script('bootjs-google', WL_Page_Ainm_URI.'/js/bootstrap.min.js');
	
}
function weblizar_page_anim_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'weblizar-page-animate', WL_Page_Ainm_URI.'/css/animate.min.css' );
	
}
add_action( 'wp_enqueue_scripts', 'weblizar_page_anim_scripts' );
add_action( 'wp_enqueue_style', 'weblizar_page_anim_scripts' );

function display_page_anim_setting_page() { ?>
	<div class="wrap" id="weblizar_wrap" >
		<div id="content_wrap">
			<div class="weblizar-header" >
				<h2><span><?php esc_html_e('Page Animations & Transitions',WL_PAT_DOMAIN); ?></span></h2>
				<div class="weblizar-submenu-links" id="weblizar-submenu-links">
					<ul>
						<li class=""><img src="<?php echo esc_url(WL_Page_Ainm_URI.'/images/star_PNG1590.png');?>"/> <a href="http://wordpress.org/plugins/page-animations-and-transitions/" target="_blank" title="Support Forum"><?php esc_html_e('Rate Us On WordPress',WL_PAT_DOMAIN); ?></a></li>
					</ul>
				</div>
			</div>
			<div id="content">
				<div id="options_tabs" class="ui-tabs ">
					<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
						<li class="active"><a href="#" id="general"><div class="dashicons dashicons-admin-home"></div><?php esc_html_e('Page Animations',WL_PAT_DOMAIN);?></a></li>

					</ul>
					<?php require_once('option-settings.php'); ?>
				</div>
			</div>
			<div class="weblizar-header" style="margin-top:0px; border-radius: 0px 0px 6px 6px;">
				<div class="weblizar-submenu-links"  style="margin-top:15px;">
				<ul>
					<li style="color:#fff">  <a href="http://weblizar.com" style="color:#fff;text-decoration: underline;" target="_blank" title="Support Forum"><?php esc_html_e('Developed By Weblizar',WL_PAT_DOMAIN); ?></a></li>
				</ul>
				<div>
				<!-- weblizar-submenu-links -->
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php
}

// Add specific CSS class by filter
add_filter( 'body_class', 'weblizar_page_anim_class_names' );
function weblizar_page_anim_class_names($classes) {

	if( is_user_logged_in() ) {
        return $classes;
	}

	$wl_page_trans_options = get_option('wl_page_trans_options');
	extract($wl_page_trans_options);
    // $weblizar_page_in_trans = 'animate__backInDown';

	if ( ((int) $weblizar_pre_load_switch != 2) && ( $weblizar_page_in_trans !== 'none') ) {
		$classes[] = 'animate__animated ' . $weblizar_page_in_trans;
	} else {
		$classes[] = 'animate__animated ';
	}

	// return the $classes array
	return $classes;
	// add 'class-name' to the $classes array

}

function weblizar_page_anim_footer() {
	$wl_page_trans_options		= get_option('wl_page_trans_options');
	$weblizar_page_in_trans		= $wl_page_trans_options['weblizar_page_in_trans'];
	$weblizar_pre_load_delay 	 = $wl_page_trans_options['weblizar_pre_load_delay'];
	$weblizar_pg_anim_txt_append 	 = $wl_page_trans_options['weblizar_pg_anim_txt_append'];
	$weblizar_pre_load_switch 	 = $wl_page_trans_options['weblizar_pre_load_switch'];



	$hasstring   = "overlay";
	if( strpos( $weblizar_page_in_trans, $hasstring ) !== false) {
	  	$animvalue = "true";
	}else{ $animvalue = "false"; }
    ?>
    <script>
		jQuery(document).ready(function() {
			jQuery('#page-anim-preloader').delay(<?php if(isset($weblizar_pre_load_delay)) { echo esc_attr( $weblizar_pre_load_delay ); } else { echo esc_attr(5000); } ?>).fadeOut("slow");
			jQuery("#page-anim-preloader")<?php if($weblizar_pre_load_switch==2){ ?>.append("<div class='weblizar_pg_anim_txt_append' ><?php if(isset($weblizar_pg_anim_txt_append)) { echo esc_attr($weblizar_pg_anim_txt_append); } else { echo esc_html("Welcome in Weblizar Preloader"); } ?></div>")<?php } ?>;

			setTimeout( page_anim_remove_preloader, <?php if(isset($weblizar_pre_load_delay)) { echo esc_attr($weblizar_pre_load_delay); } else { echo esc_attr(5000); } ?>);
			function page_anim_remove_preloader() {
				jQuery('#page-anim-preloader').remove();
				<?php if( ( (int) $weblizar_pre_load_switch == 2 ) && ( $weblizar_page_in_trans !== "none") ): ?>
					jQuery('body').addClass('<?php echo esc_attr( isset($weblizar_page_in_trans) ? $weblizar_page_in_trans :' '); ?>');
				<?php endif; ?>

			}
		});
	</script>
   <?php
}
add_action('wp_footer', 'weblizar_page_anim_footer');


// Add CSS
function page_anim_preloader_css(){

	$wl_page_trans_options		= get_option('wl_page_trans_options');
	$weblizar_bg_clr = $wl_page_trans_options['weblizar_bg_clr'];
	$weblizar_icon_pre_load = $wl_page_trans_options['weblizar_icon_pre_load'];
	$weblizar_preload_txt_clr = $wl_page_trans_options['weblizar_preload_txt_clr'];

	if(isset($weblizar_bg_clr)){
		$weblizar_bg_clr = $wl_page_trans_options['weblizar_bg_clr'];
	}else{
		$weblizar_bg_clr = "#000000";
	}

	if(isset($weblizar_preload_txt_clr)){
		$weblizar_preload_txt_clr = $wl_page_trans_options['weblizar_preload_txt_clr'];
	}else{
		$weblizar_preload_txt_clr = "#fff";
	}

	if(isset($weblizar_icon_pre_load)){
		$weblizar_icon_pre_load = $wl_page_trans_options['weblizar_icon_pre_load'];
	}else{
		$weblizar_icon_pre_load = 1;
	}

	if($weblizar_icon_pre_load==1){
		$icon_val     = "preloader1.GIF";
		$image_width  = 64;
		$image_height = 64;
	}else if($weblizar_icon_pre_load==2){
		$icon_val     = "preloader2.gif";
		$image_width  = 64;
		$image_height = 64;
	}else if($weblizar_icon_pre_load==3){
		$icon_val     = "loader1.gif";
		$image_width  = 124;
		$image_height = 124;
	}
	else if($weblizar_icon_pre_load==4){
		$icon_val     = "loader2.gif";
		$image_width  = 124;
		$image_height = 124;
	}else if($weblizar_icon_pre_load==5){
		$icon_val     = "loader3.gif";
		$image_width  = 124;
		$image_height = 124;
	}

	$preloader_image_val = plugins_url( '/images/'.$icon_val, __FILE__ ); ?>


	<style type="text/css">
		#page-anim-preloader {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background:url(<?php echo esc_attr($preloader_image_val); ?>) no-repeat <?php echo esc_attr($weblizar_bg_clr); ?> 50%;
			-moz-background-size:<?php echo esc_attr($image_width); ?>px <?php echo esc_attr($image_height); ?>px;
			-o-background-size:<?php echo esc_attr($image_width); ?>px <?php echo esc_attr($image_height); ?>px;
			-webkit-background-size:<?php echo esc_attr($image_width); ?>px <?php echo esc_attr($image_height); ?>px;
			background-size:<?php echo esc_attr($image_width); ?>px <?php echo esc_attr($image_height); ?>px;
			z-index: 99998;
			width:100%;
			height:100%;
		}
		.weblizar_pg_anim_txt_append {
			font-size: 40px;
			color:<?php echo esc_attr($weblizar_preload_txt_clr); ?>;
			text-align: center;
			margin-top: 550px;
		}

		@media(max-width: 767px) {
			.weblizar_pg_anim_txt_append {
			    margin-top: 368px;
			}
		}
	</style>

	<noscript>
		<style type="text/css">
			#page-anim-preloader{
				display:none !important;
			}
		</style>
	</noscript>

    <?php
}

$wl_page_trans_options = get_option('wl_page_trans_options');
if(isset($wl_page_trans_options['weblizar_pre_load_switch'])){
	$weblizar_pre_load_switch = $wl_page_trans_options['weblizar_pre_load_switch'];
} else{
	$weblizar_pre_load_switch = 1;
}

if($weblizar_pre_load_switch==2){
	add_action('wp_head', 'page_anim_preloader_css');
}