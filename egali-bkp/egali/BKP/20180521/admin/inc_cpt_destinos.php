<?php

// Define post type "Destinos"

$destino_cpt_args = array(
	"label" => __("Destinos","egali"),
	"labels" => array(
		"name" => __("Destinos","egali"),
		"menu_name" => __("Destinos","egali"),
		"all_items" => __("Todos os Destinos","egali"),
		"add_new" => _x('Adicionar Novo','destino','egali'),
		"add_new_item" => __("Adicionar Novo Destino","egali"),
		"edit_item" => __("Editar Destino","egali"),
		"new_item" => __("Novo Destino","egali"),
		"view_item" => __("Ver Destino","egali"),
		"view_items" => __("Ver Destinos","egali"),
		"search_items" => __("Buscar Destinos","egali"),
		"not_found" => __("Nenhum Destino Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Destino Encontrado na Lixeira","egali")
	),
	"description" => __("Destinos Egali","egali"),
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
	"menu_icon" => "dashicons-location-alt",
	"capability_type" => "post",
	"supports" => array("title"/*,"editor"*/),
	'register_meta_box_cb' => 'destino_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
register_post_type('destino',$destino_cpt_args);


//Adiciona metaboxes com os campos customizados do destino

function destino_cpt_metaboxCallback() {
	global $post,$destino_dados;
	
	wp_enqueue_media();
	
	$destino_dados = get_post_meta($post->ID,'destino_dados',true);

	//Banner Principal
	add_meta_box('destino_bannerPrincipal', __('Banner Principal'),'destino_metaboxBannerPrincipal','destino','normal');

	//Imagem Destaque
	add_meta_box('destino_imagemDestaque', __('Imagem Destaque'),'destino_metaboxImagemDestaque','destino','normal');

	//Frase + Texto Inicial
	add_meta_box('destino_textoInicial', __('Texto de Apresentação'),'destino_metaboxTextoApresentacao','destino','normal');

	//Info Local 
	add_meta_box('destino_infoLocal', __('Informações Gerais'),'destino_metaboxInfoLocal','destino','normal');

	//Fotos e vídeos
	add_meta_box('destino_fotosVideos', __('Galeria de Fotos e Vídeos'),'destino_metaboxFotosVideos','destino','normal');

	//Guia de Vivência
	add_meta_box('destino_guiaVivencia', __('Guia de Vivência'),'destino_metaboxGuiaVivencia','destino','normal');

	//Transportes
	add_meta_box('destino_transportes', __('Transportes'),'destino_metaboxTransportes','destino','normal');

	//Atrações
	add_meta_box('destino_atracoes', __('Atrações'),'destino_metaboxAtracoes','destino','normal');

}


//Salva metadados do post

add_action('save_post_destino','save_destino_metadata');
function save_destino_metadata($post_id){

	if( isset($_POST["destino_dados"]) && is_array($_POST["destino_dados"]) && isset($_POST["destino_fraseDestaque"]) && isset($_POST["destino_textoPrincipal"]) ) {

		//frase destaque
		update_post_meta($post_id,'destino_fraseDestaque',$_POST["destino_fraseDestaque"]);

		//texto principal
		update_post_meta($post_id,'destino_textoPrincipal',$_POST["destino_textoPrincipal"]);

		//demais dados
		if(isset($destino_dados["guiaVivencia"]["transporte"])) $destino_dados["guiaVivencia"]["transporte"] = array_values($destino_dados["guiaVivencia"]["transporte"]);
		if(isset($destino_dados["atracoes"])) $destino_dados["atracoes"] = array_values($destino_dados["atracoes"]);

		update_post_meta($post_id,'destino_dados',$_POST["destino_dados"]);

	}

}


// Funções de criação das Metaboxes

// 1. Banner Principal
function destino_metaboxBannerPrincipal() {
	global $destino_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerBannerPrincipal" class="row" data-maxitens="1">
					<?php
					if(isset($destino_dados["bannerPrincipal"]) && !empty($destino_dados["bannerPrincipal"])) {
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $destino_dados["bannerPrincipal"];?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="destino_dados[bannerPrincipal]" value="<?php echo $destino_dados["bannerPrincipal"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerBannerPrincipal" data-fieldname="destino_dados[bannerPrincipal]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 2. Imagem Destaque
function destino_metaboxImagemDestaque() {
	global $destino_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($destino_dados["imagemDestaque"]) && !empty($destino_dados["imagemDestaque"])) {
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $destino_dados["imagemDestaque"];?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="destino_dados[imagemDestaque]" value="<?php echo $destino_dados["imagemDestaque"]?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="destino_dados[imagemDestaque]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 3. Frase destaque e texto principal
function destino_metaboxTextoApresentacao() {
	global $post;

	$destino_fraseDestaque = get_post_meta($post->ID,'destino_fraseDestaque',true);
	$destino_textoPrincipal = get_post_meta($post->ID,'destino_textoPrincipal',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Frase em destaque')?></label>
					<input class="form-control" type="text" name="destino_fraseDestaque" <?php echo 'value="'.$destino_fraseDestaque.'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Texto Principal')?></label>
					<textarea rows="10" class="form-control" name="destino_textoPrincipal"> <?php echo $destino_textoPrincipal; ?></textarea>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 4. Infos do país/cidade (fuso, moeda, etc)
function destino_metaboxInfoLocal() {
	global $destino_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('População')?></label>
					<input class="form-control" type="text" name="destino_dados[populacao]" <?php echo 'value="'.$destino_dados["populacao"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Fuso Local GMT')?></label>
					<input class="form-control" type="number" step="1" min="-12" max="14" name="destino_dados[fuso]" <?php echo 'value="'.$destino_dados["fuso"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Moeda')?></label>
					<input class="form-control" type="text" name="destino_dados[moeda]" <?php echo 'value="'.$destino_dados["moeda"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código 3 Dígitos da Moeda')?></label>
					<input class="form-control" type="text" name="destino_dados[moedaCod]" <?php echo 'value="'.$destino_dados["moedaCod"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código da Cidade')?></label>
					<input class="form-control" type="text" name="destino_dados[cidadeCod]" <?php echo 'value="'.$destino_dados["cidadeCod"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 5. Fotos e vídeos
function destino_metaboxFotosVideos() {
	global $destino_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerFotosVideos" class="row" data-maxitens="12">
					<?php
					if(isset($destino_dados["fotosVideos"]) && is_array($destino_dados["fotosVideos"])) {
						foreach($destino_dados["fotosVideos"] as $itemMidia) {
							if(strlen($itemMidia) == 11) {
								//vídeo youtube
								?>
								<div class="col-md-3 itemMidia">
									<div class="mediaThumb" style="background-image:url(https://img.youtube.com/vi/<?php echo $itemMidia;?>/hqdefault.jpg);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="destino_dados[fotosVideos][]" value="<?php echo $itemMidia;?>">
								</div>
								<?php
							} else {
								//imagem
								?>
								<div class="col-md-3 itemMidia">
									<div class="mediaThumb" style="background-image:url(<?php echo $itemMidia;?>);">
										<span class="dashicons dashicons-no btRemover"></span>
									</div>
									<input type="hidden" name="destino_dados[fotosVideos][]" value="<?php echo $itemMidia;?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="1" data-container="containerFotosVideos" data-fieldname="destino_dados[fotosVideos][]">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
				</button>

				<button type="button" class="button btInsereVideo" data-container="containerFotosVideos" data-fieldname="destino_dados[fotosVideos][]">
					<span class="dashicons dashicons-media-video"></span> <?php _e('Inserir Vídeo','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 6. Guia de vivência
function destino_metaboxGuiaVivencia() {
	global $destino_dados;
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Fuso Horário (texto)')?></label>
					<input class="form-control" type="text" name="destino_dados[guiaVivencia][fusoTxt]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["fusoTxt"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Temperaturas (texto)')?></label>
					<input class="form-control" type="text" name="destino_dados[guiaVivencia][temperaturasTxt]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["temperaturasTxt"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código DDI')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][codDDI]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["codDDI"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código DDD')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][codDDD]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["codDDD"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Voltagem')?></label>
					<select class="form-control" name="destino_dados[guiaVivencia][voltagem]">
						<option value="110V" <?php if($destino_dados["guiaVivencia"]["voltagem"] == "110V") echo "selected"; ?>>110V</option>
						<option value="220V" <?php if($destino_dados["guiaVivencia"]["voltagem"] == "220V") echo "selected"; ?>>220V</option>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Fone de Emergência')?></label>
					<input class="form-control" type="text" name="destino_dados[guiaVivencia][foneEmergencia]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["foneEmergencia"].'"'; ?>>
				</div>
			</div>

		</div>


		<hr />
		
		<p><strong>Custo de vida na cidade</strong></p>


		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Refeição estudantil')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][custo][refeicao]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["custo"]["refeicao"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('McMeal ou similar')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][custo][mcmeal]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["custo"]["mcmeal"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Coca Cola 300ml')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][custo][cocacola]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["custo"]["cocacola"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Baguete de pão')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][custo][baguete]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["custo"]["baguete"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Tíquete de ônibus')?></label>
					<input class="form-control" type="number" name="destino_dados[guiaVivencia][custo][onibus]" <?php echo 'value="'.$destino_dados["guiaVivencia"]["custo"]["onibus"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}


// 7. Transporte
function destino_metaboxTransportes() {
	global $destino_dados;
	?>

	<div class="container">

		<div class="row">

			<div id="containerListaTransporte" class="col-md-12">
				<?php
				if(isset($destino_dados["transporte"]) && is_array($destino_dados["transporte"])) {
					$i = 0;
					foreach($destino_dados["transporte"] as $transporte) {
						?>
						<div class="row itemTransporte">

							<div class="col-md-12">
								<span class="pull-right dashicons dashicons-no btRemover"></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label><?php _e('Transporte')?></label>
									<input class="form-control" type="text" name="destino_dados[transporte][<?php echo $i; ?>][titulo]" value="<?php echo $transporte["titulo"]; ?>">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label><?php _e('Descrição')?></label>
									<textarea rows="5" class="form-control" name="destino_dados[transporte][<?php echo $i; ?>][descricao]"> <?php echo $transporte["descricao"]; ?></textarea>
								</div>
							</div>

							<div class="col-md-12">
								<hr/>
							</div>

						</div>
						<?php
						$i++;
					}
				}
				?>
			</div>

		</div>
					
		<div class="row">

			<div class="col-md-12">

				<button id="btInsereTransporte" type="button" class="button">
					<span class="dashicons dashicons-tickets-alt"></span> <?php _e('Inserir Transporte','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 8. Atrações
function destino_metaboxAtracoes() {
	global $destino_dados;
	?>

	<div class="container">

		<div class="row">

			<div id="containerListaAtracoes" class="col-md-12">
				<?php
				if(isset($destino_dados["atracoes"]) && is_array($destino_dados["atracoes"])) {
					$i = 0;
					foreach($destino_dados["atracoes"] as $atracao) {
						?>
						<div class="row itemAtracao">

							<div class="col-md-12">
								<span class="pull-right dashicons dashicons-no btRemover"></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label><?php _e('Título')?></label>
									<input class="form-control" type="text" name="destino_dados[atracoes][<?php echo $i; ?>][titulo]" value="<?php echo $atracao["titulo"]; ?>">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label><?php _e('Descrição')?></label>
									<textarea rows="5" class="form-control" name="destino_dados[atracoes][<?php echo $i; ?>][descricao]"> <?php echo $atracao["descricao"]; ?></textarea>
								</div>
							</div>

							<div class="col-md-12">
								<div id="containerImagemAtracao_<?php echo $i; ?>" class="row" data-maxitens="1">
									<?php
									if(isset($atracao["imagem"]) && !empty($atracao["imagem"])) {
										?>
										<div class="col-md-3 itemMidia">
											<div class="mediaThumb" style="background-image:url(<?php echo $atracao["imagem"];?>);">
												<span class="dashicons dashicons-no btRemover"></span>
											</div>
											<input type="hidden" name="destino_dados[atracoes][<?php echo $i; ?>][imagem]" value="<?php echo $atracao["imagem"];?>">
										</div>					
										<?php
									}
									?>
									
								</div>
							</div>

							<div class="col-md-12">

								<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemAtracao_<?php echo $i; ?>" data-fieldname="destino_dados[atracoes][<?php echo $i; ?>][imagem]">
									<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
								</button>

							</div>

							<div class="col-md-12">
								<hr />
							</div>

						</div>
						<?php
						$i++;
					}
				}
				?>
			</div>

		</div>
					
		<div class="row">

			<div class="col-md-12">
				<hr />
			</div>

			<div class="col-md-12">

				<button id="btInsereAtracao" type="button" class="button">
					<span class="dashicons dashicons-tickets-alt"></span> <?php _e('Inserir Atração','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}
?>
