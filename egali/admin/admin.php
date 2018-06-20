<?php


// Cria custom post types

add_action('init', 'registraCPTypes',0);
function registraCPTypes() {
 
	//banners home
	require "inc_cpt_banners.php";

	//destinos
	require "inc_cpt_destinos.php";

	//intercambio
	require "inc_cpt_intercambios.php";

	//nossas lojas
	require "inc_cpt_lojas.php";

	//faq
	require "inc_cpt_faq.php";

	//trabalhe conosco
	require "inc_cpt_trabalhe-conosco.php";

	//bases exterior
	require "inc_cpt_bases.php";

	//depoimentos
	require "inc_cpt_depoimentos.php";

	//diferenciais
	require "inc_cpt_diferenciais.php";

	//egali houses
	require "inc_cpt_houses.php";

	//egali hostels
	require "inc_cpt_hostels.php";

	//promocoes
	require "inc_cpt_promocoes.php";

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
		'rewrite'           => array('slug' => 'local', 'with_front' => false)
	);
	register_taxonomy('local',array('post','base','depoimento','destino','hostel','house','intercambio'),$taxonomy_args);


	//Locais de Lojas
	$taxonomy_labels = array(
		'name'              => _x( 'Locais Lojas','Nome geral da taxonomia'),
		'singular_name'     => _x( 'Local Loja', 'Nome singular da taxonomia'),
		'search_items'      => __( 'Buscar Locais de Lojas'),
		'all_items'         => __( 'Todos os Locais de Lojas'),
		'edit_item'         => __( 'Editar Local de Loja'),
		'update_item'       => __( 'Atualizar Local de Loja'),
		'add_new_item'      => __( 'Adicionar Novo Local de Loja'),
		'menu_name'         => __( 'Locais de Lojas')
	);
	$taxonomy_args = array(
		'hierarchical'      => true,
		'labels'            => $taxonomy_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'localloja', 'with_front' => false)
	);
	register_taxonomy('localloja',array('loja','trabalhe-conosco'),$taxonomy_args);


	//Tipos de intercâmbios
	$taxonomy_labels = array(
		'name'              => _x( 'Tipos de Intercâmbio','Nome geral da taxonomia'),
		'singular_name'     => _x( 'Tipo de Inercâmbio', 'Nome singular da taxonomia'),
		'search_items'      => __( 'Buscar Tipos de Intercâmbio'),
		'all_items'         => __( 'Todos os Tipos de Intercâmbio'),
		'edit_item'         => __( 'Editar Tipo de Intercâmbio'),
		'update_item'       => __( 'Atualizar Tipo de Intercâmbio'),
		'add_new_item'      => __( 'Adicionar Novo Tipo de Intercâmbio'),
		'menu_name'         => __( 'Tipos de Intercâmbio')
	);
	$taxonomy_args = array(
		'hierarchical'      => true,
		'labels'            => $taxonomy_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array('slug' => 'tipointercambio', 'with_front' => false)
		'rewrite'           => array('slug' => 'intercambios', 'with_front' => false)
	);
	register_taxonomy('tipointercambio','intercambio',$taxonomy_args);

}



//css e js do admin
add_action( 'admin_enqueue_scripts', 'egali_admin_enqueue_scripts' );
function egali_admin_enqueue_scripts() {
	wp_enqueue_style( 'egali-admin-styles', get_stylesheet_directory_uri() . '/css/egali_admin.css');
	wp_enqueue_script('egali-admin-scripts', get_stylesheet_directory_uri() . '/js/egali_admin.js', array('jquery'));
}  


?>
