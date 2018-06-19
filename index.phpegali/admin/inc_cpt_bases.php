<?php

// Define post type "Bases Exterior"

$base_cpt_args = array(
	"label" => __("Bases Exterior","egali"),
	"labels" => array(
		"name" => __("Bases Exterior","egali"),
		"menu_name" => __("Bases Exterior","egali"),
		"all_items" => __("Todas as Bases","egali"),
		"add_new" => _x('Adicionar Novo','Base','egali'),
		"add_new_item" => __("Adicionar Nova Base","egali"),
		"edit_item" => __("Editar Base","egali"),
		"new_item" => __("Nova Base","egali"),
		"view_item" => __("Ver Base","egali"),
		"view_items" => __("Ver Bases","egali"),
		"search_items" => __("Buscar Bases","egali"),
		"not_found" => __("Nenhuma Base Encontrada","egali"),
		"not_found_in_trash" => __("Nenhuma Base Encontrada na Lixeira","egali")
	),
	"description" => __("Bases Exterior Egali","egali"),
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
	"menu_icon" => "dashicons-admin-home",
	"capability_type" => "post",
	"supports" => array("title"/*,"editor"*/),
	'register_meta_box_cb' => 'base_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => false
);
register_post_type('base',$base_cpt_args);


//Adiciona metaboxes com os campos customizados da base

function base_cpt_metaboxCallback() {
	global $post,$base_dados;
	
	wp_enqueue_media();
	
	$base_dados = get_post_meta($post->ID,'base_dados',true);

	//Imagem Destaque
	add_meta_box('base_imagemDestaque', __('Imagem Destaque'),'base_metaboxImagemDestaque','base','normal');

	//Texto Apresentação
	add_meta_box('base_textoInicial', __('Texto de Apresentação'),'base_metaboxTextoApresentacao','base','normal');

	//Info Geral 
	add_meta_box('base_infoGeral', __('Informações Gerais'),'base_metaboxInfoGeral','base','normal');

}


//Salva metadados do post

add_action('save_post_base','save_base_metadata');
function save_base_metadata($post_id){

	if( isset($_POST["base_dados"]) && is_array($_POST["base_dados"]) && isset($_POST["base_textoPrincipal"]) ) {

		//texto principal
		update_post_meta($post_id,'base_textoPrincipal',$_POST["base_textoPrincipal"]);

		//demais dados
		update_post_meta($post_id,'base_dados',$_POST["base_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Imagem Destaque
function base_metaboxImagemDestaque() {
	global $base_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($base_dados["imagemDestaque"]) && !empty($base_dados["imagemDestaque"])) {
						$base_dados["imagemDestaque"] = intval($base_dados["imagemDestaque"]);
						$imgUrl = get_relative_thumb($base_dados["imagemDestaque"],'thumbnail');
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="base_dados[imagemDestaque]" value="<?php echo $base_dados["imagemDestaque"]?>">
						</div>					
						<?php
					}
					?>
					
				</div>
			</div>

			<div class="col-md-12">
				<hr/>
			</div>

			<div class="col-md-12">

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="base_dados[imagemDestaque]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 2. Texto principal
function base_metaboxTextoApresentacao() {
	global $post;

	$base_textoPrincipal = get_post_meta($post->ID,'base_textoPrincipal',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Texto Principal')?></label>
					<textarea rows="10" class="form-control" name="base_textoPrincipal"> <?php echo $base_textoPrincipal; ?></textarea>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 3. Infos gerais (o que oferece, walking, orientações...)
function base_metaboxInfoGeral() {
	global $base_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('O que tem a oferecer?')?></label>
					<textarea rows="10" class="form-control" name="base_dados[oferece]"> <?php echo $base_dados["oferece"]; ?></textarea>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Endereço')?></label>
					<input class="form-control" type="text" name="base_dados[endereco]" <?php echo 'value="'.$base_dados["endereco"].'"'; ?>>
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Walking Tour')?></label>
					<textarea rows="5" class="form-control" name="base_dados[walking]"> <?php echo $base_dados["walking"]; ?></textarea>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Orientação Pós-embarque')?></label>
					<textarea rows="5" class="form-control" name="base_dados[orientacao]"> <?php echo $base_dados["orientacao"]; ?></textarea>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Informações Úteis')?></label>
					<textarea rows="5" class="form-control" name="base_dados[infoUteis]"> <?php echo $base_dados["infoUteis"]; ?></textarea>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Abertura de Conta Bancária')?></label>
					<textarea rows="5" class="form-control" name="base_dados[aberturaConta]"> <?php echo $base_dados["aberturaConta"]; ?></textarea>
				</div>
			</div>

		</div>

	</div>

	<?php
}


?>
