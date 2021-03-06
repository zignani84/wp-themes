<?php


// Cria custom post types

add_action('init', 'registraCPTypes',0);
function registraCPTypes() {

	//banners home
	require "inc_cpt_banners.php";

	//destinos
	require "inc_cpt_destinos.php";

	//intercambio
	require "inc_cpt_intercambio.php";

	//nossas lojas
	require "inc_cpt_lojas.php";

	flush_rewrite_rules();

}

add_action('init','registraTaxonomias',0);
function registraTaxonomias() {

	//Locais (Países / Cidades)
	$taxonomy_labels = array(
		'name'              => _x( 'Locais','Nome geral da taxonomia'),
		'singular_name'     => _x( 'Local', 'Nome singular da taxonomia'),
		'search_items'      => __( 'Buscar Locais'),
		'all_items'         => __( 'Todos os Locais'),
		'edit_item'         => __( 'Editar Local'),
		'update_item'       => __( 'Atualizar Local'),
		'add_new_item'      => __( 'Adicionar Novo Local'),
		'menu_name'         => __( 'Locais')
	);
	$taxonomy_args = array(
		'hierarchical'      => true,
		'labels'            => $taxonomy_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'local')
	);
	register_taxonomy('local',array('post','page','destino'),$taxonomy_args);

}



//css e js do admin
add_action( 'admin_enqueue_scripts', 'egali_admin_enqueue_scripts' );
function egali_admin_enqueue_scripts() {
	wp_enqueue_style( 'egali-admin-styles', get_stylesheet_directory_uri() . '/css/egali_admin.css');
	wp_enqueue_script('egali-admin-scripts', get_stylesheet_directory_uri() . '/js/egali_admin.js', array('jquery'));
}  


?>
