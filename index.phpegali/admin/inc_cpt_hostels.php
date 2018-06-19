<?php

// Define post type "Egali Hostels"

$hostel_cpt_args = array(
	"label" => __("Egali Hostels","egali"),
	"labels" => array(
		"name" => __("Egali Hostels","egali"),
		"menu_name" => __("Egali Hostels","egali"),
		"all_items" => __("Todos os Hostels","egali"),
		"add_new" => _x('Adicionar Novo','hostel','egali'),
		"add_new_item" => __("Adicionar Novo Hostel","egali"),
		"edit_item" => __("Editar Hostel","egali"),
		"new_item" => __("Novo Hostel","egali"),
		"view_item" => __("Ver Hostel","egali"),
		"view_items" => __("Ver Hostels","egali"),
		"search_items" => __("Buscar Hostels","egali"),
		"not_found" => __("Nenhum Hostel Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Hostel Encontrado na Lixeira","egali")
	),
	"description" => __("Egali Hostels","egali"),
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
	"supports" => array("title","editor"),
	'register_meta_box_cb' => 'hostel_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => false
);
register_post_type('hostel',$hostel_cpt_args);


//Adiciona metaboxes com os campos customizados da egali hostels

function hostel_cpt_metaboxCallback() {
	global $post,$hostel_dados;
	
	wp_enqueue_media();
	
	$hostel_dados = get_post_meta($post->ID,'hostel_dados',true);

	//Imagem Destaque
	add_meta_box('hostel_imagemDestaque', __('Imagem Destaque'),'hostel_metaboxImagemDestaque','hostel','normal');

	//Info Geral 
	add_meta_box('hostel_infoGeral', __('Informações Gerais'),'hostel_metaboxInfoGeral','hostel','normal');

	//Fotos e vídeos
	add_meta_box('hostel_fotosVideos', __('Galeria de Fotos e Vídeos'),'hostel_metaboxFotosVideos','hostel','normal');

}


//Salva metadados do post

add_action('save_post_hostel','save_hostel_metadata');
function save_hostel_metadata($post_id){

	if( isset($_POST["hostel_dados"]) && is_array($_POST["hostel_dados"]) ) {

		//demais dados
		update_post_meta($post_id,'hostel_dados',$_POST["hostel_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Imagem Destaque
function hostel_metaboxImagemDestaque() {
	global $hostel_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($hostel_dados["imagemDestaque"]) && !empty($hostel_dados["imagemDestaque"])) {
						$hostel_dados["imagemDestaque"] = intval($hostel_dados["imagemDestaque"]);
						$imgUrl = get_relative_thumb($hostel_dados["imagemDestaque"],'thumbnail');
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="hostel_dados[imagemDestaque]" value="<?php echo $hostel_dados["imagemDestaque"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="hostel_dados[imagemDestaque]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}

// 2. Outras infos
function hostel_metaboxInfoGeral() {
	global $hostel_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Endereço')?></label>
					<input class="form-control" type="text" name="hostel_dados[endereco]" <?php echo 'value="'.$hostel_dados["endereco"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

// 3. Fotos e vídeos
function hostel_metaboxFotosVideos() {
	global $hostel_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerFotosVideos" class="row" data-maxitens="12">
					<?php
					if(isset($hostel_dados["fotosVideos"]) && is_array($hostel_dados["fotosVideos"])) {
						foreach($hostel_dados["fotosVideos"] as $itemMidia) {
							if(strlen($itemMidia) == 11) {
								//vídeo youtube
								?>
								<div class="col-md-3 itemMidia">
									<div class="mediaThumb" style="background-image:url(https://img.youtube.com/vi/<?php echo $itemMidia;?>/hqdefault.jpg);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="hostel_dados[fotosVideos][]" value="<?php echo $itemMidia;?>">
								</div>
								<?php
							} else {
								//imagem
								$itemMidia = intval($itemMidia);
								$imgUrl = get_relative_thumb($itemMidia,'thumbnail');
								?>
								<div class="col-md-3 itemMidia">
									<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="hostel_dados[fotosVideos][]" value="<?php echo $itemMidia;?>">
								</div>					
								<?php
							}
						}
					}
					?>
					
				</div>
			</div>

			<div class="col-md-12">
				<hr/>
			</div>

			<div class="col-md-12">

				<button type="button" class="button btInsereImagem" data-multiple="1" data-container="containerFotosVideos" data-fieldname="hostel_dados[fotosVideos][]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
				</button>

				<button type="button" class="button btInsereVideo" data-container="containerFotosVideos" data-fieldname="hostel_dados[fotosVideos][]">
					<span class="dashicons dashicons-media-video"></span> <?php _e('Inserir Vídeo','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}

?>
