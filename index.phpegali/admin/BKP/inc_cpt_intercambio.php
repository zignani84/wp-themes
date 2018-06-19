<?php

// Define post type "Intercâmbio"

$intercambio_cpt_args = array(
	"label" => __("Intercâmbio","egali"),
	"labels" => array(
		"name" => __("Intercâmbio","egali"),
		"menu_name" => __("Intercâmbio","egali"),
		"all_items" => __("Todos os Intercâmbios","egali"),
		"add_new" => _x('Adicionar Novo','intercambio','egali'),
		"add_new_item" => __("Adicionar Novo Intercâmbio","egali"),
		"edit_item" => __("Editar Intercâmbio","egali"),
		"new_item" => __("Novo Intercâmbio","egali"),
		"view_item" => __("Ver Intercâmbio","egali"),
		"view_items" => __("Ver Intercâmbios","egali"),
		"search_items" => __("Buscar Intercâmbios","egali"),
		"not_found" => __("Nenhum Intercâmbio Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Intercâmbio Encontrado na Lixeira","egali")
	),
	"description" => __("Intercâmbio Egali","egali"),
	"public" => true,
	"hierarchical" => false,
	"exclude_from_search" => false,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"show_in_admin_bar" => true,
	"show_in_rest" => false,
	"menu_position" => 5,
	"menu_icon" => "dashicons-location-alt",
	"capability_type" => "post",
	"supports" => array("title"/*,"editor"*/),
	'register_meta_box_cb' => 'intercambio_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
register_post_type('intercambio',$intercambio_cpt_args);


//Adiciona metaboxes com os campos customizados do intercambio

function intercambio_cpt_metaboxCallback() {
	global $post,$intercambio_dados;
	
	wp_enqueue_media();
	
	$intercambio_dados = get_post_meta($post->ID,'intercambio_dados',true);

	//Banner Principal
	add_meta_box('intercambio_bannerPrincipal', __('Banner Principal'),'intercambio_metaboxBannerPrincipal','intercambio','normal');

	//Imagem Destaque
	add_meta_box('intercambio_imagemDestaque', __('Imagem Destaque'),'intercambio_metaboxImagemDestaque','intercambio','normal');

	//Frase + Texto Inicial
	add_meta_box('intercambio_textoInicial', __('Texto de Apresentação'),'intercambio_metaboxTextoApresentacao','intercambio','normal');

	//Info Local 
	add_meta_box('intercambio_infoLocal', __('Informações Gerais'),'intercambio_metaboxInfoLocal','intercambio','normal');

	//Fotos e vídeos
	add_meta_box('intercambio_fotosVideos', __('Galeria de Fotos e Vídeos'),'intercambio_metaboxFotosVideos','intercambio','normal');

	//Guia de Vivência
	add_meta_box('intercambio_guiaVivencia', __('Guia de Vivência'),'intercambio_metaboxGuiaVivencia','intercambio','normal');

}


//Salva metadados do post

add_action('save_post_intercambio','save_intercambio_metadata');
function save_intercambio_metadata($post_id){

	if( isset($_POST["intercambio_dados"]) && is_array($_POST["intercambio_dados"]) && isset($_POST["intercambio_fraseDestaque"]) && isset($_POST["intercambio_textoPrincipal"]) ) {

		//frase destaque
		update_post_meta($post_id,'intercambio_fraseDestaque',$_POST["intercambio_fraseDestaque"]);

		//texto principal
		update_post_meta($post_id,'intercambio_textoPrincipal',$_POST["intercambio_textoPrincipal"]);

		//demais dados
		update_post_meta($post_id,'intercambio_dados',$_POST["intercambio_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Banner Principal
function intercambio_metaboxBannerPrincipal() {
	global $intercambio_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerBannerPrincipal" class="row" data-maxitens="1">
					<?php
					if(isset($intercambio_dados["bannerPrincipal"]) && !empty($intercambio_dados["bannerPrincipal"])) {
						?>
						<div class="col-md-3 mediaItem">
							<div class="mediaThumb" style="background-image:url(<?php echo $intercambio_dados["bannerPrincipal"];?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="intercambio_dados[bannerPrincipal]" value="<?php echo $intercambio_dados["bannerPrincipal"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerBannerPrincipal" data-fieldname="intercambio_dados[bannerPrincipal]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 2. Imagem Destaque
function intercambio_metaboxImagemDestaque() {
	global $intercambio_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($intercambio_dados["imagemDestaque"]) && !empty($intercambio_dados["imagemDestaque"])) {
						?>
						<div class="col-md-3 mediaItem">
							<div class="mediaThumb" style="background-image:url(<?php echo $intercambio_dados["imagemDestaque"];?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="intercambio_dados[imagemDestaque]" value="<?php echo $intercambio_dados["imagemDestaque"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="intercambio_dados[imagemDestaque]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 3. Frase destaque e texto principal
function intercambio_metaboxTextoApresentacao() {
	global $post;

	$intercambio_fraseDestaque = get_post_meta($post->ID,'intercambio_fraseDestaque',true);
	$intercambio_textoPrincipal = get_post_meta($post->ID,'intercambio_textoPrincipal',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Frase em destaque')?></label>
					<input class="form-control" type="text" name="intercambio_fraseDestaque" <?php echo 'value="'.$intercambio_fraseDestaque.'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Texto Principal')?></label>
					<textarea rows="10" class="form-control" name="intercambio_textoPrincipal"> <?php echo $intercambio_textoPrincipal; ?></textarea>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 4. Infos do país/cidade (fuso, moeda, etc)
function intercambio_metaboxInfoLocal() {
	global $intercambio_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('População')?></label>
					<input class="form-control" type="text" name="intercambio_dados[populacao]" <?php echo 'value="'.$intercambio_dados["populacao"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Fuso Local GMT')?></label>
					<input class="form-control" type="number" step="1" min="-12" max="14" name="intercambio_dados[fuso]" <?php echo 'value="'.$intercambio_dados["fuso"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código 3 Dígitos da Moeda')?></label>
					<input class="form-control" type="text" name="intercambio_dados[moeda]" <?php echo 'value="'.$intercambio_dados["moeda"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código da Cidade')?></label>
					<input class="form-control" type="text" name="intercambio_dados[codigoCidade]" <?php echo 'value="'.$intercambio_dados["codigoCidade"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 5. Fotos e vídeos
function intercambio_metaboxFotosVideos() {
	global $intercambio_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerFotosVideos" class="row" data-maxitens="12">
					<?php
					if(isset($intercambio_dados["fotosVideos"]) && is_array($intercambio_dados["fotosVideos"])) {
						foreach($intercambio_dados["fotosVideos"] as $mediaItem) {
							if(strlen($mediaItem) == 11) {
								//vídeo youtube
								?>
								<div class="col-md-3 mediaItem">
									<div class="mediaThumb" style="background-image:url(https://img.youtube.com/vi/<?php echo $mediaItem;?>/hqdefault.jpg);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="intercambio_dados[fotosVideos][]" value="<?php echo $mediaItem;?>">
								</div>
								<?php
							} else {
								//imagem
								?>
								<div class="col-md-3 mediaItem">
									<div class="mediaThumb" style="background-image:url(<?php echo $mediaItem;?>);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="intercambio_dados[fotosVideos][]" value="<?php echo $mediaItem;?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="1" data-container="containerFotosVideos" data-fieldname="intercambio_dados[fotosVideos][]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
				</button>

				<button type="button" class="button btInsereVideo" data-container="containerFotosVideos" data-fieldname="intercambio_dados[fotosVideos][]">
					<span class="dashicons dashicons-media-video"></span> <?php _e('Inserir Vídeo','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 6. Guia de vivência
function intercambio_metaboxGuiaVivencia() {
	global $intercambio_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Fuso Horário (texto)')?></label>
					<input class="form-control" type="text" name="intercambio_dados[guiaVivencia][fusoTxt]" <?php echo 'value="'.$intercambio_dados["guiaVivencia"]["fusoTxt"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Temperaturas (texto)')?></label>
					<input class="form-control" type="text" name="intercambio_dados[guiaVivencia][temperaturasTxt]" <?php echo 'value="'.$intercambio_dados["guiaVivencia"]["temperaturas"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código DDI')?></label>
					<input class="form-control" type="number" name="intercambio_dados[guiaVivencia][codDDI]" <?php echo 'value="'.$intercambio_dados["guiaVivencia"]["codDDI"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código DDD')?></label>
					<input class="form-control" type="number" name="intercambio_dados[guiaVivencia][codDDD]" <?php echo 'value="'.$intercambio_dados["guiaVivencia"]["codDDD"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Voltagem')?></label>
					<select class="form-control" name="intercambio_dados[guiaVivencia][voltagem]">
						<option value="110V" <?php if($intercambio_dados["guiaVivencia"]["voltagem"] == "110V") echo "selected"; ?>>110V</option>
						<option value="220V" <?php if($intercambio_dados["guiaVivencia"]["voltagem"] == "220V") echo "selected"; ?>>220V</option>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Fone de Emergência')?></label>
					<input class="form-control" type="text" name="intercambio_dados[guiaVivencia][foneEmergencia]" <?php echo 'value="'.$intercambio_dados["guiaVivencia"]["foneEmergencia"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

?>
