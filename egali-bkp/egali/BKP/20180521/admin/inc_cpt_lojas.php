<?php

// Define post type "Nossas Lojas"

$lojas_cpt_args = array(
	"label" => __("Nossas Lojas","egali"),
	"labels" => array(
		"name" => __("Nossas Lojas","egali"),
		"menu_name" => __("Nossas Lojas","egali"),
		"all_items" => __("Todas as Lojas","egali"),
		"add_new" => _x('Adicionar Novo','lojas','egali'),
		"add_new_item" => __("Adicionar Nova Loja","egali"),
		"edit_item" => __("Editar Loja","egali"),
		"new_item" => __("Nova Loja","egali"),
		"view_item" => __("Ver Loja","egali"),
		"view_items" => __("Ver Lojas","egali"),
		"search_items" => __("Buscar Lojas","egali"),
		"not_found" => __("Nenhuma Loja Encontrada","egali"),
		"not_found_in_trash" => __("Nenhuma Loja Encontrada na Lixeira","egali")
	),
	"description" => __("Nossas Lojas Egali","egali"),
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
	"menu_position" => 7,
	"menu_icon" => "dashicons-location-alt",
	"capability_type" => "post",
	"supports" => array("title"/*,"editor"*/),
	'register_meta_box_cb' => 'lojas_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
register_post_type('lojas',$lojas_cpt_args);


//Adiciona metaboxes com os campos customizados do nossas lojas

function lojas_cpt_metaboxCallback() {
	global $post,$lojas_dados;
	
	wp_enqueue_media();
	
	$lojas_dados = get_post_meta($post->ID,'lojas_dados',true);

	//Banner Principal
	add_meta_box('lojas_bannerPrincipal', __('Banner Principal'),'lojas_metaboxBannerPrincipal','lojas','normal');

	//Imagem Destaque
	add_meta_box('lojas_imagemDestaque', __('Imagem Destaque'),'lojas_metaboxImagemDestaque','lojas','normal');

	//Frase + Texto Inicial
	add_meta_box('lojas_textoInicial', __('Texto de Apresentação'),'lojas_metaboxTextoApresentacao','lojas','normal');

	//Info Local 
	add_meta_box('lojas_infoLocal', __('Informações Gerais'),'lojas_metaboxInfoLocal','lojas','normal');

	//Fotos e vídeos
	add_meta_box('lojas_fotosVideos', __('Galeria de Fotos e Vídeos'),'lojas_metaboxFotosVideos','lojas','normal');

	//Guia de Vivência
	add_meta_box('lojas_guiaVivencia', __('Guia de Vivência'),'lojas_metaboxGuiaVivencia','lojas','normal');

}


//Salva metadados do post

add_action('save_post_lojas','save_lojas_metadata');
function save_lojas_metadata($post_id){

	if( isset($_POST["lojas_dados"]) && is_array($_POST["lojas_dados"]) && isset($_POST["lojas_fraseDestaque"]) && isset($_POST["lojas_textoPrincipal"]) ) {

		//frase destaque
		update_post_meta($post_id,'lojas_fraseDestaque',$_POST["lojas_fraseDestaque"]);

		//texto principal
		update_post_meta($post_id,'lojas_textoPrincipal',$_POST["lojas_textoPrincipal"]);

		//demais dados
		update_post_meta($post_id,'lojas_dados',$_POST["lojas_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Banner Principal
function lojas_metaboxBannerPrincipal() {
	global $lojas_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerBannerPrincipal" class="row" data-maxitens="1">
					<?php
					if(isset($lojas_dados["bannerPrincipal"]) && !empty($lojas_dados["bannerPrincipal"])) {
						?>
						<div class="col-md-3 mediaItem">
							<div class="mediaThumb" style="background-image:url(<?php echo $lojas_dados["bannerPrincipal"];?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="lojas_dados[bannerPrincipal]" value="<?php echo $lojas_dados["bannerPrincipal"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerBannerPrincipal" data-fieldname="lojas_dados[bannerPrincipal]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 2. Imagem Destaque
function lojas_metaboxImagemDestaque() {
	global $lojas_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($lojas_dados["imagemDestaque"]) && !empty($lojas_dados["imagemDestaque"])) {
						?>
						<div class="col-md-3 mediaItem">
							<div class="mediaThumb" style="background-image:url(<?php echo $lojas_dados["imagemDestaque"];?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="lojas_dados[imagemDestaque]" value="<?php echo $lojas_dados["imagemDestaque"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="lojas_dados[imagemDestaque]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 3. Frase destaque e texto principal
function lojas_metaboxTextoApresentacao() {
	global $post;

	$lojas_fraseDestaque = get_post_meta($post->ID,'lojas_fraseDestaque',true);
	$lojas_textoPrincipal = get_post_meta($post->ID,'lojas_textoPrincipal',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Frase em destaque')?></label>
					<input class="form-control" type="text" name="lojas_fraseDestaque" <?php echo 'value="'.$lojas_fraseDestaque.'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Texto Principal')?></label>
					<textarea rows="10" class="form-control" name="lojas_textoPrincipal"> <?php echo $lojas_textoPrincipal; ?></textarea>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 4. Infos do país/cidade (fuso, moeda, etc)
function lojas_metaboxInfoLocal() {
	global $lojas_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('População')?></label>
					<input class="form-control" type="text" name="lojas_dados[populacao]" <?php echo 'value="'.$lojas_dados["populacao"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Fuso Local GMT')?></label>
					<input class="form-control" type="number" step="1" min="-12" max="14" name="lojas_dados[fuso]" <?php echo 'value="'.$lojas_dados["fuso"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código 3 Dígitos da Moeda')?></label>
					<input class="form-control" type="text" name="lojas_dados[moeda]" <?php echo 'value="'.$lojas_dados["moeda"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código da Cidade')?></label>
					<input class="form-control" type="text" name="lojas_dados[codigoCidade]" <?php echo 'value="'.$lojas_dados["codigoCidade"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 5. Fotos e vídeos
function lojas_metaboxFotosVideos() {
	global $lojas_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerFotosVideos" class="row" data-maxitens="12">
					<?php
					if(isset($lojas_dados["fotosVideos"]) && is_array($lojas_dados["fotosVideos"])) {
						foreach($lojas_dados["fotosVideos"] as $mediaItem) {
							if(strlen($mediaItem) == 11) {
								//vídeo youtube
								?>
								<div class="col-md-3 mediaItem">
									<div class="mediaThumb" style="background-image:url(https://img.youtube.com/vi/<?php echo $mediaItem;?>/hqdefault.jpg);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="lojas_dados[fotosVideos][]" value="<?php echo $mediaItem;?>">
								</div>
								<?php
							} else {
								//imagem
								?>
								<div class="col-md-3 mediaItem">
									<div class="mediaThumb" style="background-image:url(<?php echo $mediaItem;?>);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="lojas_dados[fotosVideos][]" value="<?php echo $mediaItem;?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="1" data-container="containerFotosVideos" data-fieldname="lojas_dados[fotosVideos][]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
				</button>

				<button type="button" class="button btInsereVideo" data-container="containerFotosVideos" data-fieldname="lojas_dados[fotosVideos][]">
					<span class="dashicons dashicons-media-video"></span> <?php _e('Inserir Vídeo','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 6. Guia de vivência
function lojas_metaboxGuiaVivencia() {
	global $lojas_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Fuso Horário (texto)')?></label>
					<input class="form-control" type="text" name="lojas_dados[guiaVivencia][fusoTxt]" <?php echo 'value="'.$lojas_dados["guiaVivencia"]["fusoTxt"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Temperaturas (texto)')?></label>
					<input class="form-control" type="text" name="lojas_dados[guiaVivencia][temperaturasTxt]" <?php echo 'value="'.$lojas_dados["guiaVivencia"]["temperaturas"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código DDI')?></label>
					<input class="form-control" type="number" name="lojas_dados[guiaVivencia][codDDI]" <?php echo 'value="'.$lojas_dados["guiaVivencia"]["codDDI"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código DDD')?></label>
					<input class="form-control" type="number" name="lojas_dados[guiaVivencia][codDDD]" <?php echo 'value="'.$lojas_dados["guiaVivencia"]["codDDD"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Voltagem')?></label>
					<select class="form-control" name="lojas_dados[guiaVivencia][voltagem]">
						<option value="110V" <?php if($lojas_dados["guiaVivencia"]["voltagem"] == "110V") echo "selected"; ?>>110V</option>
						<option value="220V" <?php if($lojas_dados["guiaVivencia"]["voltagem"] == "220V") echo "selected"; ?>>220V</option>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Fone de Emergência')?></label>
					<input class="form-control" type="text" name="lojas_dados[guiaVivencia][foneEmergencia]" <?php echo 'value="'.$lojas_dados["guiaVivencia"]["foneEmergencia"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

?>
