<?php
/**
 * Gutenbiz Dark functions and definitions
 * Gutenbiz Dark only works in WordPress 4.7 or later.
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * @package Gutenbiz Dark
 */
final class Gutenbiz_Dark_Theme{
	public function __construct(){
		# enqueue script
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'scripts' ) );

		# adds blog layout classes in body tag 
		add_filter( 'body_class' , array( __CLASS__ , 'adds_body_classes' ) );

		# Register or modify customizer options
		add_action( 'customize_register', array( __CLASS__, 'customize_register' ), 99 );

		#change section name
		add_filter( 'gutenbiz_customizer_get_panel_arg', array( __CLASS__, 'change_pannel_title' ), 20, 2 );

		# add dark mode option
		add_action( 'after_setup_theme', array( __CLASS__, 'after_parent_theme' ) );

		# adds class on body to customize blog layouts
		add_filter( 'body_class' , array( __CLASS__ , 'add_body_classes' ) );
	}

	/**
	 * adds class on body to customize blog layouts
	 *
	 * @static
	 * @access public
	 * @return object
	 * @since  1.0.0
	 *
	 * @package Gutenbiz Dark
	 */
	public static function add_body_classes( $classes ){
		if( gutenbiz_get( 'dark-sticky-header' ) ){
			$classes[] = Gutenbiz_Helper::with_prefix( 'dark-sticky-header' );
		}

		return $classes;
	}

	/**
	* Register or modify customizer options
	*
	* @static
	* @access public
	* @since  1.0.0
	* @return void
	*
	* @package Darkbiz WordPress Theme
	*/
	public static function customize_register( $wp_customize ){
		$wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';
		$wp_customize->get_setting( 'background_color' )->default = '#000000';	
	}

	/**
	 * Add class to display blog ( list or grid ).
	 *
	 * @static
	 * @access public
	 * @return array
	 * @since  1.0.0
	 *
	 * @package Darkbiz WordPress Theme
	 */		
	public static function adds_body_classes ( $classes ){
		# adds class for dark mode
		if( gutenbiz_get( 'dark-mode' ) ){
			$classes[] = Gutenbiz_Helper::with_prefix( 'dark-mode' );
		}		
		return $classes;
	}

	/**
	 * After parent theme
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Dark
	 */
	public static function after_parent_theme(){
		remove_action( 'init', 'gutenbiz_advanced_options' );

		# displays the inner banner and breadcrumb
		remove_action( Gutenbiz_Helper::fn_prefix( 'after_header' ), array( 'Gutenbiz_Theme' , 'the_inner_banner_content' ) );
		add_action( Gutenbiz_Helper::fn_prefix( 'after_header' ), array( __CLASS__ , 'the_inner_banner_content' ) );

		# include options file
		Gutenbiz_Helper::include( array(
			'header-options',
			'banner-slider',
			'advance-options',
		), 'includes/theme-options', '');

		# include dynamic css
		Gutenbiz_Helper::include( array(
			'common'
		), 'includes/dynamic-css', '');

		# include custom control
		Gutenbiz_Helper::include( array(
			'cat-dropdown/cat-dropdown'
		), 'classes/custom-control', '');

		Gutenbiz_Helper::include( array(
			'class-excerpt'
		), 'classes', '' );

		# filter to modify priority
		add_filter( Gutenbiz_Helper::with_prefix( 'customizer_get_defaults','_' ), array( __CLASS__ , 'change_defaults' ), 99 ,2 );

		#filter to change default on admin
		add_filter( Gutenbiz_Helper::fn_prefix( 'customizer_get_setting_arg' ), array( __CLASS__, 'change_default_admmin' ), 10, 2 );

		#search icon hide/show
		add_action( Gutenbiz_Helper::fn_prefix( 'before_header' ), array( __CLASS__, 'toggle_search_icon' ) );
	}

	public static function toggle_search_icon(){ 
		
		if( !gutenbiz_get( 'hide-search-icon' ) ){
			remove_action( Gutenbiz_Helper::with_prefix( 'after_primary_menu', '_' ), array( 'Gutenbiz_Theme', 'add_search_icon' ), 20 );
		}
	}

	/**
	* Add a wrapper on inner banner and breadcrumb
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Gutenbiz Dark WordPress Theme
	*/
	public static function the_inner_banner_content( ){

		$disable = false;
		# inner banner should not load in 404 page,
		if( 
			# don't load it in 404 page
			is_404() ||
			( ( is_page() || 								# don't load if disabled on page					
				Gutenbiz_Theme::is_woo_shop_page() || 				# don't load if disabled on woocommerce shop page
				Gutenbiz_Theme::is_static_blog_page() ||				# don't load if disabled on static blog page
				Gutenbiz_Theme::is_static_front_page()				# don't load if disabled on static homepage
 			  ) && Gutenbiz_Theme::get_meta( 'disable-inner-banner' ) 
			) ||
			# remove banner on woocommerce category page
			Gutenbiz_Theme::is_woo_product_category() ||
			# don't load it if it is blog page and title is empty
			( is_home() && is_front_page() && !Gutenbiz_Theme::get_blog_title() )
		){ 
			$disable = true;
		}

		# since 1.0.0
		if( apply_filters( Gutenbiz_Theme::fn_prefix( 'disable_inner_banner_content' ), $disable) ){
			return;
		}

		if( is_home() || is_front_page() ){
			if( !gutenbiz_get( 'dark-show-slider' ) ){
				return;
			}

			get_template_part( 'templates/content/content', 'slider' );
		}else{
			get_template_part( 'templates/content/content', 'banner' );
		}
	}

	/**
	 * Change default value on admin
	 *
	 * @static
	 * @access public
	 * @since  1.0.1
	 *
	 * @package Gutenbiz Dark
	 */	
	public static function change_default_admmin( $args, $field ){
		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'footer-copyright-text' ) ){
			$args[ 'default' ] = esc_html__( 'Copyright &copy; 2020 | Gutenbiz Dark', 'gutenbiz-dark' );
		}

		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'primary-menu-item-color' ) ){
			$args[ 'default' ] = '#ffffff';
		}

		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'primary-color' ) ){
			$args[ 'default' ] = '#ff4265';
		}

		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'site-info-font' ) ){
			$args[ 'default' ] = 'font-3';
		}

		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'body-font' ) ){
			$args[ 'default' ] = 'font-3';
		}

		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'heading-font' ) ){
			$args[ 'default' ] = 'font-3';
		}

		return $args;
	}

	/**
	 * Change default value
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 *
	 * @package Gutenbiz Dark
	 */	
	public static function change_defaults( $def, $instance ){
		$id = Gutenbiz_Helper::with_prefix( 'footer-copyright-text' );
		$menu_color = Gutenbiz_Helper::with_prefix( 'primary-menu-item-color' );
		$primary_color = Gutenbiz_Helper::with_prefix( 'primary-color' );
		$site_font = Gutenbiz_Helper::with_prefix( 'site-info-font' );
		$body_font = Gutenbiz_Helper::with_prefix( 'body-font' );
		$heading_font = Gutenbiz_Helper::with_prefix( 'heading-font' );
		$def[ $id ] = esc_html__( 'Copyright &copy; 2020 | Gutenbiz Dark', 'gutenbiz-dark' );
		$def[ $menu_color ] = '#ffffff';
		$def[ $primary_color ] = '#ff4265';
		$def[ $site_font ] = 'font-3';
		$def[ $body_font ] = 'font-3';
		$def[ $heading_font ] = 'font-3';

		return $def;
	}

	/**
	 *  Change panel name
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Dark
	 */
	public static function add_dark_options( $args, $section, $field ){

		if( 'advance-options' == $section[ 'id' ] ){
			$field[] = array(
				'id'	=> 'dark-mode',
				'label' => esc_html__( 'Enable Darkmode', 'gutenbiz-dark' ),
				'default' => true,
				'type'  => 'toggle',
			);
		}
		return $args;
	}

	/**
	* Enqueue styles and scripts
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Gutenbiz Dark
	*/
	public static function scripts(){
		$scripts = array(
			# enqueue parent stylesheet
			array(
				'handler'  => 'gutenbiz-dark',
				'style'    => get_template_directory_uri() . '/style.css',
				'version'  => wp_get_theme()->get('Version'),
				'absolute' => true,
				'minified' => false
			),			
            array(
                'handler' => 'jquery-sticky-script',
                'script'  => 'assets/js/jquery.sticky.js',
                'minified' => false
            ),
            array(
                'handler' => 'gutenbiz-dark-script',
                'script'  => 'assets/js/script.js',
                'minified' => false
            )
		);

		if( !Gutenbiz_Helper::is_active_plugin( 'woocommerce' ) ){
			$slick_scripts = array(
				array(
			        'handler' => 'slick',
			        'script'  => 'assets/js/slick.js',
			        'minified' => false
			    ),
		    	array(
		            'handler' => 'slick',
		            'style'  => 'assets/css/slick.css',
		            'minified' => false
		        )
			);
			$scripts = array_merge( $scripts, $slick_scripts );
		}
		Gutenbiz_Helper::enqueue( $scripts );
	}

	/**
	 * Changed panel title
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Dark
	 */
	public static function change_pannel_title( $args, $panel ){
		if( $panel[ 'id' ] == 'panel' ){
			$panel[ 'title' ] = esc_html__( 'Gutenbiz Dark Options', 'gutenbiz-dark' );
		}
		return $panel;
	}

	/**
	* return image or backround color for post
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Gutenbiz Dark
	*/
	public static function the_default_image( $post_id = false ){
		$src = get_the_post_thumbnail_url( $post_id, array( 360, 252 ) );
		if( $post_id && has_post_thumbnail( $post_id ) ){
			echo 'background-image: url( '. esc_url( $src ) .' )';
		}else{
			echo 'background-color: #27271fcf';
		}
	}

	/**
	 * Get according to type
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Dark WordPress Theme
	 */
	public static function get_posts_by_type( $type, $cat_id, $post_to_display = false ){
		$posts = array();
		if( 'latest' == $type ){
			$recent_posts = wp_get_recent_posts(array(
			    'numberposts' => $post_to_display ? $post_to_display : -1,
			    'post_status' => 'publish'
			));

			foreach ( $recent_posts as $post) {
				$posts[] = $post[ 'ID' ]; 
			}
		}elseif( 'category' == $type ){			
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_to_display ? $post_to_display : -1,
				'ignore_sticky_posts' => 1,
				'orderby' => 'date',
				'order' => 'DESC'
			);
			if( $cat_id ){
				$args[ 'cat' ] = $cat_id; 
			}

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
			    while ( $query->have_posts() ) {
			        $query->the_post();
			        $posts[] = get_the_ID();
			    }
			}
			wp_reset_postdata();
		}
		if( empty( $posts ) ){
			return false;
		}else{
			return $posts;
		}
	}
}

new Gutenbiz_Dark_Theme();