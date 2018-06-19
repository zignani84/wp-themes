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


	if (is_home() || is_category() || is_singular('post')){
		wp_enqueue_style( 'egali-style-master-blog-styles', get_stylesheet_directory_uri() . '/css/style-master-blog.css' );
		wp_enqueue_style( 'egali-style-blog-styles', get_template_directory_uri().'/css/style-blog.css');
	} else {
		wp_enqueue_style( 'egali-style-master-styles', get_stylesheet_directory_uri() . '/css/style-master.css' );
		wp_enqueue_style( 'egali-home-styles', get_stylesheet_directory_uri() . '/css/home.css' );
		wp_enqueue_style( 'egali-style-styles', get_template_directory_uri().'/css/style.css');
	}

	wp_enqueue_style( 'egali-owl-carousel-min-styles', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'egali-owl-theme-default-min-styles', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'egali-lightbox-min-styles', get_template_directory_uri().'/css/lightbox.min.css');

}
add_action( 'wp_enqueue_scripts', 'egali_enqueue_styles' );
/* END Mount enqueue styles */


/**
 * Add scripts child to footer
 */
function enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'egali-popper-min-script', get_theme_file_uri().'/js/popper.min.js', 'jquery'  );
	wp_enqueue_script( 'egali-bootstrap-min-script', get_theme_file_uri().'/js/bootstrap.min.js', 'jquery'  );
	wp_enqueue_script( 'egali-carousel-script', get_theme_file_uri().'/js/owl.carousel.js', 'jquery');
	wp_enqueue_script( 'egali-lightbox-min-script', get_theme_file_uri().'/js/lightbox.min.js', 'jquery' );
	wp_enqueue_script( 'egali-easing-script', get_theme_file_uri().'/js/jquery.easing.1.3.js', 'jquery' );
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
   //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
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

//Custom Post Types e outras funções do admin.
require get_template_directory() . '/admin/admin.php';

//Cria arrays com destinos, intercâmbios etc para auxiliar na montagem dos menus
function egali_criaEstruturasDados() {
	global $egali_globais;


	//array taxonomia "locais" (paises/cidades)

	$termsPaises = get_terms( array('taxonomy' => 'local') , array( 'parent' => 0 ) );
	$paises = array();
	foreach ( $termsPaises as $pais ){
		$paises[$pais->slug] = array( "nome" => $pais->name , "slug" => $pais->slug , "cidades" => array());
		$termsCidades = get_terms( array('taxonomy' => 'local') , array( 'parent' => $pais->term_id ) );
		foreach ( $termsCidades as $cidade ){
			$paises[$pais->slug]["cidades"][$cidade->slug] = array( "nome" => $cidade->name , "slug" => $cidade->slug );
		}
		ksort($paises[$pais->slug]["cidades"]);
		$paises[$pais->slug]["cidades"] = array_values($paises[$pais->slug]["cidades"]);
	}
	ksort($paises);
	$paises = array_values($paises);
	$egali_globais["locais"] = $paises;
	

	//array categorias

	$categorias = get_categories();
	foreach($categorias as $cat) {
		$egali_globais["assuntos"][] = array( "nome" => $cat->name , "slug" => $cat->slug );
	}
	

	//array destinos

	$argsDestinos = array(
		'posts_per_page' => -1,
		'post_type'	=> 'destino'
	);
	$buscaDestinos = new WP_Query($argsDestinos);
	if($buscaDestinos->have_posts()) {
		$egali_globais["destinos"] = array();
		while ($buscaDestinos->have_posts()) {

			$buscaDestinos->the_post();
			$destino_id = get_the_ID();
			$cidade = get_the_title();
			$cidadeKey = $post->post_name;
			$link = get_the_permalink();

			$locais = get_the_terms($destino_id,'local');
			$pais = false;
			foreach($locais as $loc) {
				$loc = (array)$loc;
				if($loc["parent"] == 0) {
					$pais = $loc["name"];
					$paisKey = $loc["slug"];
				}
			}
			if($pais) {
				if(!isset($egali_globais["destinos"][$paisKey])) {
					$egali_globais["destinos"][$paisKey] = array( 'nome' => $pais , 'cidades' => array());
				}
				$egali_globais["destinos"][$paisKey]['cidades'][$cidadeKey] = array( 'nome' => $cidade , 'link' => $link );
			}
		}
	}
	//coloca destinos por ordem alfabética (paises e cidades)
	ksort($egali_globais["destinos"]);
	$egali_globais["destinos"] = array_values($egali_globais["destinos"]);
	foreach($egali_globais["destinos"] as $k => $v) {
		ksort($egali_globais["destinos"][$k]["cidades"]);
		$egali_globais["destinos"][$k]["cidades"] = array_values($egali_globais["destinos"][$k]["cidades"]);
	}
	

	//array intercambios

	$argsIntercambios = array(
		'posts_per_page' => -1,
		'post_type'	=> 'intercambio'
	);
	$buscaIntercambios = new WP_Query($argsIntercambios);
	if($buscaIntercambios->have_posts()) {
		$egali_globais["intercambios"] = array();
		while ($buscaIntercambios->have_posts()) {

			$buscaIntercambios->the_post();
			$intercambio_id = get_the_ID();
			$nome = get_the_title();
			$nomeKey = $post->post_name;
			$link = get_the_permalink();

			$tipos = get_the_terms($intercambio_id,'tipointercambio');
			foreach($tipos as $tipo) {
				$tipo = (array)$tipo;
				$tipoNome = $tipo["name"];
				$tipoKey = $tipo["slug"];
			}
			if($pais) {
				if(!isset($egali_globais["intercambios"][$tipoKey])) {
					$egali_globais["intercambios"][$tipoKey] = array( 'nome' => $tipoNome , 'cursos' => array());
				}
				$egali_globais["intercambios"][$tipoKey]['cursos'][$nomeKey] = array( 'nome' => $nome , 'link' => $link );
			}
		}
	}
	//coloca intercambios por ordem alfabética (tipos e cursos)
	ksort($egali_globais["intercambios"]);
	$egali_globais["intercambios"] = array_values($egali_globais["intercambios"]);
	foreach($egali_globais["intercambios"] as $k => $v) {
		ksort($egali_globais["intercambios"][$k]["cursos"]);
		$egali_globais["intercambios"][$k]["cursos"] = array_values($egali_globais["intercambios"][$k]["cursos"]);
	}



	wp_reset_query();






}
add_action('init', 'egali_criaEstruturasDados');



/**
 * Plugin name: WP Trac #42573: Fix for theme template file caching.
 * Description: Flush the theme file cache each time the admin screens are loaded which uses the file list.
 * Plugin URI: https://core.trac.wordpress.org/ticket/42573
 * Author: Weston Ruter, XWP.
 * Author URI: https://weston.ruter.net
 */
 /*
function wp_42573_fix_template_caching( WP_Screen $current_screen ) {
	// Only flush the file cache with each request to post list table, edit post screen, or theme editor.
	if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
		return;
	}
	$theme = wp_get_theme();
	if ( ! $theme ) {
		return;
	}
	$cache_hash = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
	$label = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
	$transient_key = substr( $label, 0, 29 ) . md5( $label );
	delete_transient( $transient_key );
}
add_action( 'current_screen', 'wp_42573_fix_template_caching' );
*/


/**
 * END CUSTOM FUNCTIONS
 */
