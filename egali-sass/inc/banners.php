<?php
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
    wp_register_script( 'radiotax', get_template_directory_uri() . '/js/admin/radiotax.js', array('jquery'), null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer
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
		array( 'banner' ),
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
add_action( 'init', 'banner_post_type', 0 );

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