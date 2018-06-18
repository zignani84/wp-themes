<?php

// Define post type "Trabalhe Conosco"

$trabalhe_conosco_cpt_args = array(
	"label" => __("Trabalhe Conosco","egali"),
	"labels" => array(
		"name" => __("Trabalhe Conosco","egali"),
		"menu_name" => __("Trabalhe Conosco","egali"),
		"all_items" => __("Todas as Vagas","egali"),
		"add_new" => _x('Adicionar Novo','trabalhe-conosco','egali'),
		"add_new_item" => __("Adicionar Nova Vaga","egali"),
		"edit_item" => __("Editar Vaga","egali"),
		"new_item" => __("Nova Vaga","egali"),
		"view_item" => __("Ver Vaga","egali"),
		"view_items" => __("Ver Vagas","egali"),
		"search_items" => __("Buscar Vagas","egali"),
		"not_found" => __("Nenhuma Vaga Encontrada","egali"),
		"not_found_in_trash" => __("Nenhuma Vaga Encontrada na Lixeira","egali")
	),
	"description" => __("Trabalhe Conosco Egali","egali"),
	"public" => true,
	"hierarchical" => false,
	'rewrite' => array(
		'with_front'=> false
	),
	"exclude_from_search" => false,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"show_in_admin_bar" => true,
	"show_in_rest" => false,
	"menu_position" => 5,
	"menu_icon" => "dashicons-id",
	"capability_type" => "post",
	"supports" => array("title","editor"),
	'register_meta_box_cb' => 'trabalhe_conosco_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => false
);
register_post_type('trabalhe-conosco',$trabalhe_conosco_cpt_args);
?>
