<?php
/**
 * egali functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package egali
 */

if ( ! function_exists( 'egali_setup' ) ) :
	/**
	 * Runs before the init hook. The init hook is too late for some features, such as indicating support for post thumbnails.
	 */
	function egali_setup() {
		load_theme_textdomain( 'egali' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'egali' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'egali_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'egali_setup' );

/**
 * Mount enqueue styles
 */
function egali_enqueue_styles() {
    wp_enqueue_style( 'egali-material-design-iconic-font-styles', get_stylesheet_directory_uri() . '/css/fonts/material-design-iconic-font.css' );
    wp_enqueue_style( 'egali-oswald-font-styles', 'https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' );
    wp_enqueue_style( 'egali-open-sans-font-styles', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i' );
	wp_enqueue_style( 'egali-bootstrap-min-styles', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'egali-styles', get_stylesheet_directory_uri() . '/css/style-master.min.css' );
	wp_enqueue_style( 'egali-home-styles', get_stylesheet_directory_uri() . '/css/home.min.css' );
	wp_enqueue_style( 'egali-owl-carousel-styles', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'egali-owl-theme-default-styles', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css' );
}
add_action( 'wp_enqueue_scripts', 'egali_enqueue_styles' );
/* END Mount enqueue styles */

/**
 * Custom Scripting to Move JavaScript from the Head to the Footer
 */
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);
 
   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
/* END Custom Scripting to Move JavaScript from the Head to the Footer */

/**
 * Add scripts child to footer
 */
function enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'egali-popper-min-script', get_theme_file_uri().'/js/popper.min.js', 'jquery'  );
	wp_enqueue_script( 'egali-bootstrap-min-script', get_theme_file_uri().'/js/bootstrap.min.js', 'jquery'  );
	wp_enqueue_script( 'egali-owl-carousel-script', get_theme_file_uri().'/js/owl.carousel.js', 'jquery'  );
	wp_enqueue_script( 'egali-functions-script', get_theme_file_uri().'/js/functions.js', 'jquery'  );
}
add_action( 'wp_footer', 'enqueue_scripts' );
/* END Add scripts child to footer */

/**
 * REMOVE unnecessary styles and scripts to the head 
 */
// Removes the emoji styles
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Removes the wlwmanifest link
remove_action( 'wp_head', 'wlwmanifest_link' );
// Removes the RSD link
remove_action( 'wp_head', 'rsd_link' );
// Removes the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
// Removes links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links', 2 ); 
// Removes the index link
remove_action( 'wp_head', 'index_rel_link' );
// remove WP 4.9+ dns-prefetch nonsense
remove_action( 'wp_head', 'wp_resource_hints', 2 );

function remove_json_api () {
    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
   // Remove all embeds rewrite rules.
   add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action( 'after_setup_theme', 'remove_json_api' );

// Remove recent comments styles
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');
/* END REMOVE unnecessary styles and scripts to the head */

/**
 * FUNCTIONS default WordPress
 */
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * END FUNCTIONS default WordPress
 */

/**
 * CUSTOM FUNCTIONS
 */
/**
 * Custom Post Types.
 */
require get_template_directory() . '/cpt/cpt.php';
/**
 * END CUSTOM FUNCTIONS
 */
