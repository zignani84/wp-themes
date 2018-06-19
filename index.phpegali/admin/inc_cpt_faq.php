<?php

// Define post type "FAQ"

$faq_cpt_args = array(
	"label" => __("FAQ","egali"),
	"labels" => array(
		"name" => __("FAQ","egali"),
		"menu_name" => __("FAQ","egali"),
		"all_items" => __("Todas as Perguntas","egali"),
		"add_new" => _x('Adicionar Nova','faq','egali'),
		"add_new_item" => __("Adicionar Nova Pergunta","egali"),
		"edit_item" => __("Editar Pergunta","egali"),
		"new_item" => __("Nova Pergunta","egali"),
		"view_item" => __("Ver Pergunta","egali"),
		"view_items" => __("Ver Perguntas","egali"),
		"search_items" => __("Buscar Perguntas","egali"),
		"not_found" => __("Nenhuma Pergunta Encontrada","egali"),
		"not_found_in_trash" => __("Nenhuma Pergunta Encontrada na Lixeira","egali")
	),
	"description" => __("FAQ Egali","egali"),
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
	"menu_position" => 8,
	"menu_icon" => "dashicons-list-view",
	"capability_type" => "post",
	"supports" => array("title","editor"),
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
register_post_type('faq',$faq_cpt_args);
?>
