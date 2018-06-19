<?php
// Get style parent to the child 
function egali_enqueue_styles() {
	$parent_styles = 'understrap-styles';
	wp_enqueue_style( $parent_styles, get_template_directory_uri() . '/css/theme.min.css' );
	wp_enqueue_style( 'egali-styles', get_stylesheet_directory_uri() . '/css/style-master.css', array($parent_styles), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'egali-home-styles', get_stylesheet_directory_uri() . '/css/home.css', array($parent_styles), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'egali-owl-carousel-styles', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array($parent_styles), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'egali-owl-theme-default-styles', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', array($parent_styles), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'egali_enqueue_styles' );

// Custom Scripting to Move JavaScript from the Head to the Footer
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);
 
   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
// END Custom Scripting to Move JavaScript

// Add scripts child to footer
function enqueue_scripts() {
	//wp_enqueue_script( 'egali-tether-script', get_theme_file_uri().'/js/tether.min.js' );
	wp_enqueue_script( 'egali-owl-carousel-script', get_theme_file_uri().'/js/owl.carousel.js' );
	wp_enqueue_script( 'egali-functions-script', get_theme_file_uri().'/js/functions.js' );
}
add_action( 'wp_footer', 'enqueue_scripts' );

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

// Banners
// Remove taxonomy meta box default
add_action( 'admin_menu', 'motivos_remove_meta_box');
function motivos_remove_meta_box(){
   remove_meta_box('motivosdiv', 'banner', 'normal');
}
//Add new taxonomy meta box
add_action( 'add_meta_boxes', 'motivos_add_meta_box');
function motivos_add_meta_box() {
	add_meta_box( 'motivos', 'Motivos','motivos_metabox','banner' ,'side','core');
}
//Callback to set up the metabox
function motivos_metabox( $post ) {
    //Get taxonomy and terms
    $taxonomy = 'motivos';
 
    //Set up the taxonomy object and get terms
    $tax = get_taxonomy($taxonomy);
    $terms = get_terms($taxonomy,array('hide_empty' => 0));
 
    //Name of the form
    $name = 'tax_input[' . $taxonomy . ']';
 
    //Get current and popular terms
    $popular = get_terms( $taxonomy, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );
    $postterms = get_the_terms( $post->ID,$taxonomy );
    $current = ($postterms ? array_pop($postterms) : false);
    $current = ($current ? $current->term_id : 0);
    ?>
 
    <div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
 
        <!-- Display tabs-->
        <ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
            <li class="tabs"><a href="#<?php echo $taxonomy; ?>-all" tabindex="3"><?php echo $tax->labels->all_items; ?></a></li>
            <li class="hide-if-no-js"><a href="#<?php echo $taxonomy; ?>-pop" tabindex="3"><?php _e( 'Mais usados' ); ?></a></li>
        </ul>
 
        <!-- Display taxonomy terms -->
        <div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
            <ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
                <?php   foreach($terms as $term){
                    $id = $taxonomy.'-'.$term->term_id;
                    echo "<li id='$id'><label class='selectit'>";
                    echo "<input type='radio' id='in-$id' name='{$name}'".checked($current,$term->term_id,false)."value='$term->term_id' />$term->name<br />";
                   echo "</label></li>";
                }?>
           </ul>
        </div>
 
        <!-- Display popular taxonomy terms -->
        <div id="<?php echo $taxonomy; ?>-pop" class="tabs-panel" style="display: none;">
            <ul id="<?php echo $taxonomy; ?>checklist-pop" class="categorychecklist form-no-clear" >
                <?php   foreach($popular as $term){
                    $id = 'popular-'.$taxonomy.'-'.$term->term_id;
                    echo "<li id='$id'><label class='selectit'>";
                    echo "<input type='radio' id='in-$id'".checked($current,$term->term_id,false)."value='$term->term_id' />$term->name<br />";
                    echo "</label></li>";
                }?>
           </ul>
       </div>
 
    </div>
    <?php
}
add_action('admin_enqueue_scripts','motivos_radiotax_javascript');
function motivos_radiotax_javascript(){
    wp_register_script( 'radiotax', get_template_directory_uri() . '/js/radiotax.js', array('jquery'), null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer
    wp_enqueue_script( 'radiotax' );
}
function banner_post_type() {
	$labels = array(
		'name' 				 => _x( 'Banners', 'Post Type General Name', 'roots' ), // nome
		'singular_name' 	 => _x( 'Banner', 'Post Type Singular Name', 'roots' ), // nome único
		'menu_name' 		 => __( 'Banners', 'roots' ),
		'parent_item_colon'  => __( 'Parent Banner:', 'roots' ),
		'all_items' 		 => __( 'Todos os banners', 'roots' ),
		'view_item' 		 => __( 'Visualizar banners', 'roots' ),
		'add_new_item' 		 => __( 'Adicionar novo banner', 'roots' ),
		'add_new' 			 => __( 'Adicionar novo', 'roots' ),
		'edit_item' 		 => __( 'Editar banner', 'roots' ),
		'update_item' 		 => __( 'Atualizar banner', 'roots' ),
		'search_items' 		 => __( 'Procurar banner', 'roots' ),
		'not_found'          => __( 'Nenhum banner foi encontrado.', 'roots' ),
		'not_found_in_trash' => __( 'Nenhum banner foi encontrado na lixeira.', 'roots' ),
	);
	$args = array(
		'label' => __( 'banner', 'roots' ),
		'description' 		  => __( 'Descrição dos Produtos', 'roots' ),
		'labels' 			  => $labels,
		'supports' 			  => array( 
									'title', 
									'editor', 
									'thumbnail',
								), // define o que teremos no post type, no caso teremos: título, descricão e uma imagem
		'menu_icon' 		  => 'dashicons-format-gallery', // define o ícone no Menu
		'hierarchical' 		  => false,
		'public' 			  => true,
		'show_ui' 			  => true,
		'show_in_menu' 		  => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position' 	  => 5, // onde ele irá aparecer no menu
		'can_export' 		  => true,
		'has_archive' 		  => false, // aparecer ou não nos arquivos
		'exclude_from_search' => true, // excluir ou não das buscas no site
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'post',
	);
	register_post_type( 'banner', $args ); 
	register_taxonomy( 'motivos',
		array( 'motivos' ),
		array(
			'hierarchical'      => true,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => false,
			'labels'            => array (
				'name'          => __( 'Motivos', 'egali' ),
				'singular_name' => __( 'Motivo', 'egali' ),
				'search_items'  => __( 'Motivos', 'egali' ),
				'add_new_item'  => __( 'Adicionar novo', 'egali' ),
				'menu_name'     => __( 'Motivos', 'egali' ),
			)
		)
	);
} // inicia o post type no menu

function add_home_banner_fields ()
{
  function fun_slider_banner()
  {
    global $post;
    $link = get_post_meta($post->ID, 'link', true);
    $html .= '<table border="0" width="100%" style="border-collapse: collapse;" class="table-link">';
    $html .= '<tr>';
    $html .= '<td style="width: 200px;">';
    $html .= '<p class="description">Link do Veja mais</p>';
    $html .= '</td>';
    $html .= '<td style="">';
    $html .= '<input type="text" class="attachmentlinks" style="width: 100%;" name="link[href]" value="' . (isset($link['href']) ? $link['href'] : '') . '" />';
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</table>';
    echo $html;
  }
  add_meta_box('banner-link', __('Link', 'egali'), 'fun_slider_banner', 'banner', 'normal');
}

function save_home_banner_custom_meta_data($id = null)
{
  if (!current_user_can('edit_page', $id))
    return $id;

    if (isset($_POST['link'])) {
      update_post_meta($id, 'link', $_POST['link']);
    }
}
add_action('add_meta_boxes_banner', 'add_home_banner_fields');
add_action('save_post_banner', 'save_home_banner_custom_meta_data');