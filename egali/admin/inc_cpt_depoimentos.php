<?php

// Define post type "Depoimentos"

$depoimento_cpt_args = array(
	"label" => __("Depoimentos","egali"),
	"labels" => array(
		"name" => __("Depoimentos","egali"),
		"menu_name" => __("Depoimentos","egali"),
		"all_items" => __("Todos os Depoimentos","egali"),
		"add_new" => _x('Adicionar Novo','Depoimento','egali'),
		"add_new_item" => __("Adicionar Novo Depoimento","egali"),
		"edit_item" => __("Editar Depoimento","egali"),
		"new_item" => __("Novo Depoimento","egali"),
		"view_item" => __("Ver Depoimento","egali"),
		"view_items" => __("Ver Depoimentos","egali"),
		"search_items" => __("Buscar Depoimentos","egali"),
		"not_found" => __("Nenhum Depoimento Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Depoimento Encontrado na Lixeira","egali")
	),
	"description" => __("Depoimentos Egali","egali"),
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
	"menu_position" => 6,
	"menu_icon" => "dashicons-format-chat",
	"capability_type" => "post",
	"supports" => array("title"),
	'register_meta_box_cb' => 'depoimento_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => false
);
register_post_type('depoimento',$depoimento_cpt_args);


//Adiciona metaboxes com os campos customizados do depoimento

function depoimento_cpt_metaboxCallback() {
	global $post,$depoimento_dados;
	
	wp_enqueue_media();
	
	$depoimento_dados = get_post_meta($post->ID,'depoimento_dados',true);

	//Foto Depoente
	add_meta_box('depoimento_fotoDepoente', __('Foto Depoente'),'depoimento_metaboxFotoDepoente','depoimento','normal');

	//Texto Depoimento
	add_meta_box('depoimento_textoDepoimento', __('Texto Depoimento'),'depoimento_metaboxTextoDepoimento','depoimento','normal');

	//Info Geral 
	add_meta_box('depoimento_infoGeral', __('Informações Gerais'),'depoimento_metaboxInfoGeral','depoimento','normal');

}


//Salva metadados do post

add_action('save_post_depoimento','save_depoimento_metadata');
function save_depoimento_metadata($post_id){

	if( isset($_POST["depoimento_dados"]) && is_array($_POST["depoimento_dados"]) && isset($_POST["depoimento_textoDepoimento"]) ) {

		//texto depoimento
		update_post_meta($post_id,'depoimento_textoDepoimento',$_POST["depoimento_textoDepoimento"]);

		//demais dados
		update_post_meta($post_id,'depoimento_dados',$_POST["depoimento_dados"]);

	}

}


// Funções de criação das Metaboxes


// 1. Foto Depoente
function depoimento_metaboxFotoDepoente() {
	global $depoimento_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerFotoDepoente" class="row" data-maxitens="1">
					<?php
					if(isset($depoimento_dados["fotoDepoente"]) && !empty($depoimento_dados["fotoDepoente"])) {
						$depoimento_dados["fotoDepoente"] = intval($depoimento_dados["fotoDepoente"]);
						$imgUrl = get_relative_thumb($depoimento_dados["fotoDepoente"],'thumbnail');
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="depoimento_dados[fotoDepoente]" value="<?php echo $depoimento_dados["fotoDepoente"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerFotoDepoente" data-fieldname="depoimento_dados[fotoDepoente]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 2. Texto principal
function depoimento_metaboxTextoDepoimento() {
	global $post;

	$depoimento_textoDepoimento = get_post_meta($post->ID,'depoimento_textoDepoimento',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Texto Principal')?></label>
					<textarea rows="10" class="form-control" name="depoimento_textoDepoimento"> <?php echo $depoimento_textoDepoimento; ?></textarea>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 3. Infos gerais
function depoimento_metaboxInfoGeral() {
	global $egali_globais,$depoimento_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Intercâmbio realizado')?></label>
					<select class="form-control" name="depoimento_dados[intercambioRealizado]" >
						<?php
						foreach($egali_globais["intercambios"] as $tipo) {
							foreach($tipo["cursos"] as $curso) {
								?>
								<option value="<?php echo $tipo["nome"]." / ".$curso["nome"];?>" <?php if($depoimento_dados["intercambioRealizado"] ==  $tipo["nome"]." / ".$curso["nome"]) echo "selected";?>><?php echo $tipo["nome"]." / ".$curso["nome"];?></option>
								<?php
							}
						}
						
						?>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Pais de Origem')?></label>
					<input class="form-control" type="text" name="depoimento_dados[paisOrigem]" <?php echo 'value="'.$depoimento_dados["paisOrigem"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Cidade de Origem')?></label>
					<input class="form-control" type="text" name="depoimento_dados[cidadeOrigem]" <?php echo 'value="'.$depoimento_dados["cidadeOrigem"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}


?>
