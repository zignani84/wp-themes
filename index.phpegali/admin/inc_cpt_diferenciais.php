<?php

// Define post type "Diferenciais"

$diferenciais_cpt_args = array(
	"label" => __("Diferenciais","egali"),
	"labels" => array(
		"name" => __("Diferenciais","egali"),
		"menu_name" => __("Diferenciais","egali"),
		"all_items" => __("Todos os Diferenciais","egali"),
		"add_new" => _x('Adicionar Novo','diferenciais','egali'),
		"add_new_item" => __("Adicionar Novo Diferencial","egali"),
		"edit_item" => __("Editar Diferencial","egali"),
		"new_item" => __("Novo Diferencial","egali"),
		"view_item" => __("Ver Diferencial","egali"),
		"view_items" => __("Ver Diferenciais","egali"),
		"search_items" => __("Buscar Diferenciais","egali"),
		"not_found" => __("Nenhuma Diferencial Encontrada","egali"),
		"not_found_in_trash" => __("Nenhuma Diferencial Encontrada na Lixeira","egali")
	),
	"description" => __("Diferenciais Egali","egali"),
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
	"menu_icon" => "dashicons-awards",
	"capability_type" => "post",
	"supports" => array("title"/*,"editor"*/),
	'register_meta_box_cb' => 'diferenciais_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
register_post_type('diferenciais',$diferenciais_cpt_args);


//Adiciona metaboxes com os campos customizados do diferenciais

function diferenciais_cpt_metaboxCallback() {
	global $post,$diferenciais_dados;
	
	wp_enqueue_media();
	
	$diferenciais_dados = get_post_meta($post->ID,'diferenciais_dados',true);

	//Info
	add_meta_box('diferenciais_infoGeral', __('Informações Gerais'),'diferenciais_metaboxInfoGeral','diferenciais','normal');

}


//Salva metadados do post

add_action('save_post_diferenciais','save_diferenciais_metadata');
function save_diferenciais_metadata($post_id){

	if( isset($_POST["diferenciais_dados"]) && is_array($_POST["diferenciais_dados"]) ) {

		//demais dados
		update_post_meta($post_id,'diferenciais_dados',$_POST["diferenciais_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Info
function diferenciais_metaboxInfoGeral() {
	global $diferenciais_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Ícone Material Design (exemplo: zmdi-home)')?></label>
					<input class="form-control" type="text" name="diferenciais_dados[icone]" <?php echo 'value="'.$diferenciais_dados["icone"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Link')?></label>
					<input class="form-control" type="text" name="diferenciais_dados[link]" <?php echo 'value="'.$diferenciais_dados["link"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

?>
