<?php

// Define post type "Egali Houses"

$house_cpt_args = array(
	"label" => __("Egali Houses","egali"),
	"labels" => array(
		"name" => __("Egali Houses","egali"),
		"menu_name" => __("Egali Houses","egali"),
		"all_items" => __("Todas as Houses","egali"),
		"add_new" => _x('Adicionar Novo','house','egali'),
		"add_new_item" => __("Adicionar Nova House","egali"),
		"edit_item" => __("Editar House","egali"),
		"new_item" => __("Nova House","egali"),
		"view_item" => __("Ver House","egali"),
		"view_items" => __("Ver Houses","egali"),
		"search_items" => __("Buscar Houses","egali"),
		"not_found" => __("Nenhuma House Encontrada","egali"),
		"not_found_in_trash" => __("Nenhuma House Encontrada na Lixeira","egali")
	),
	"description" => __("Egali Houses","egali"),
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
	'register_meta_box_cb' => 'house_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => false
);
register_post_type('house',$house_cpt_args);


//Adiciona metaboxes com os campos customizados da egali houses

function house_cpt_metaboxCallback() {
	global $post,$house_dados;
	
	wp_enqueue_media();
	
	$house_dados = get_post_meta($post->ID,'house_dados',true);

	//Imagem Destaque
	add_meta_box('house_imagemDestaque', __('Imagem Destaque'),'house_metaboxImagemDestaque','house','normal');

	//Info Geral 
	add_meta_box('house_infoGeral', __('Informações Gerais'),'house_metaboxInfoGeral','house','normal');

	//Fotos e vídeos
	add_meta_box('house_fotosVideos', __('Galeria de Fotos e Vídeos'),'house_metaboxFotosVideos','house','normal');

}


//Salva metadados do post

add_action('save_post_house','save_house_metadata');
function save_house_metadata($post_id){

	if( isset($_POST["house_dados"]) && is_array($_POST["house_dados"]) ) {

		//demais dados
		update_post_meta($post_id,'house_dados',$_POST["house_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Imagem Destaque
function house_metaboxImagemDestaque() {
	global $house_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($house_dados["imagemDestaque"]) && !empty($house_dados["imagemDestaque"])) {
						$house_dados["imagemDestaque"] = intval($house_dados["imagemDestaque"]);
						$imgUrl = get_relative_thumb($house_dados["imagemDestaque"],'thumbnail');
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="house_dados[imagemDestaque]" value="<?php echo $house_dados["imagemDestaque"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="house_dados[imagemDestaque]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}

// 2. Outras infos
function house_metaboxInfoGeral() {
	global $house_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Endereço')?></label>
					<input class="form-control" type="text" name="house_dados[endereco]" <?php echo 'value="'.$house_dados["endereco"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

// 3. Fotos e vídeos
function house_metaboxFotosVideos() {
	global $house_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerFotosVideos" class="row" data-maxitens="12">
					<?php
					if(isset($house_dados["fotosVideos"]) && is_array($house_dados["fotosVideos"])) {
						foreach($house_dados["fotosVideos"] as $itemMidia) {
							if(strlen($itemMidia) == 11) {
								//vídeo youtube
								?>
								<div class="col-md-3 itemMidia">
									<div class="mediaThumb" style="background-image:url(https://img.youtube.com/vi/<?php echo $itemMidia;?>/hqdefault.jpg);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="house_dados[fotosVideos][]" value="<?php echo $itemMidia;?>">
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
									<input type="hidden" name="house_dados[fotosVideos][]" value="<?php echo $itemMidia;?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="1" data-container="containerFotosVideos" data-fieldname="house_dados[fotosVideos][]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
				</button>

				<button type="button" class="button btInsereVideo" data-container="containerFotosVideos" data-fieldname="house_dados[fotosVideos][]">
					<span class="dashicons dashicons-media-video"></span> <?php _e('Inserir Vídeo','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}

?>
