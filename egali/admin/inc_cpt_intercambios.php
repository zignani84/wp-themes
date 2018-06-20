<?php

// Define post type "Intercambios"
/*
$intercambio_cpt_args = array(
	"label" => __("Intercâmbios","egali"),
	"labels" => array(
		"name" => __("Intercâmbios","egali"),
		"menu_name" => __("Intercâmbios","egali"),
		"all_items" => __("Todos os Intercâmbios","egali"),
		"add_new" => _x('Adicionar Novo','Intercâmbio','egali'),
		"add_new_item" => __("Adicionar Novo Intercâmbio","egali"),
		"edit_item" => __("Editar Intercâmbio","egali"),
		"new_item" => __("Novo Intercâmbio","egali"),
		"view_item" => __("Ver Intercâmbio","egali"),
		"view_items" => __("Ver Intercâmbios","egali"),
		"search_items" => __("Buscar Intercâmbios","egali"),
		"not_found" => __("Nenhum Intercâmbio Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Intercâmbio Encontrado na Lixeira","egali")
	),
	"description" => __("Intercâmbios Egali","egali"),
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
	"menu_icon" => "dashicons-welcome-learn-more",
	"capability_type" => "post",
	"supports" => array("title"),
	'register_meta_box_cb' => 'intercambio_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
*/

$intercambio_cpt_args = array(
	"label" => __("Intercâmbios","egali"),
	"labels" => array(
		"name" => __("Intercâmbios","egali"),
		"menu_name" => __("Intercâmbios","egali"),
		"all_items" => __("Todos os Intercâmbios","egali"),
		"add_new" => _x('Adicionar Novo','Intercâmbio','egali'),
		"add_new_item" => __("Adicionar Novo Intercâmbio","egali"),
		"edit_item" => __("Editar Intercâmbio","egali"),
		"new_item" => __("Novo Intercâmbio","egali"),
		"view_item" => __("Ver Intercâmbio","egali"),
		"view_items" => __("Ver Intercâmbios","egali"),
		"search_items" => __("Buscar Intercâmbios","egali"),
		"not_found" => __("Nenhum Intercâmbio Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Intercâmbio Encontrado na Lixeira","egali")
	),
	"description" => __("Intercâmbios Egali","egali"),
	"public" => true,
	"hierarchical" => false,
	'rewrite' => array( 'slug' => 'intercambios/%tipointercambio%', 'with_front' => false ),
	"exclude_from_search" => false,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"show_in_admin_bar" => true,
	"show_in_rest" => false,
	"menu_position" => 6,
	"menu_icon" => "dashicons-welcome-learn-more",
	"capability_type" => "post",
	"supports" => array("title"/*,"editor"*/),
	'register_meta_box_cb' => 'intercambio_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => 'intercambios'
);
register_post_type('intercambio',$intercambio_cpt_args);


//Adiciona metaboxes com os campos customizados do intercambio

function intercambio_cpt_metaboxCallback() {
	global $post,$intercambio_dados;
	
	wp_enqueue_media();
	
	$intercambio_dados = get_post_meta($post->ID,'intercambio_dados',true);

	//Promoção
	//add_meta_box('intercambio_promocao', __('Promoção'),'intercambio_metaboxPromocao','intercambio','normal');

	//Imagem Destaque
	add_meta_box('intercambio_imagemDestaque', __('Imagem Destaque'),'intercambio_metaboxImagemDestaque','intercambio','normal');

	//Texto Apresentação
	add_meta_box('intercambio_textoInicial', __('Texto de Apresentação'),'intercambio_metaboxTextoApresentacao','intercambio','normal');

	//Info Geral 
	add_meta_box('intercambio_infoGeral', __('Informações Gerais'),'intercambio_metaboxInfoGeral','intercambio','normal');

}


//Salva metadados do post

add_action('save_post_intercambio','save_intercambio_metadata');
function save_intercambio_metadata($post_id){

	if( isset($_POST["intercambio_dados"]) && is_array($_POST["intercambio_dados"]) && isset($_POST["intercambio_fraseDestaque"]) && isset($_POST["intercambio_textoPrincipal"]) ) {

		//frase destaque
		update_post_meta($post_id,'intercambio_fraseDestaque',$_POST["intercambio_fraseDestaque"]);

		//texto principal
		update_post_meta($post_id,'intercambio_textoPrincipal',$_POST["intercambio_textoPrincipal"]);

		//flag promoção
		//if(!isset($_POST["intercambio_promocao"])) $_POST["intercambio_promocao"] = 0;
		//update_post_meta($post_id,'intercambio_promocao',$_POST["intercambio_promocao"]);

		//demais dados
		update_post_meta($post_id,'intercambio_dados',$_POST["intercambio_dados"]);

	}

}


// Funções de criação das Metaboxes


// 1. Promoção
/* function intercambio_metaboxPromocao() {
	global $post;

	$intercambio_promocao = get_post_meta($post->ID,'intercambio_promocao',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="checkbox">
					<label><input type="checkbox" value="1" name="intercambio_promocao" <?php if($intercambio_promocao == 1) echo "checked"; ?>>Este curso está em promoção</label>
				</div>
			</div>

		</div>

	</div>

	<?php
} */



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
						$intercambio_dados["imagemDestaque"] = intval($intercambio_dados["imagemDestaque"]);
						$imgUrl = get_relative_thumb($intercambio_dados["imagemDestaque"],'thumbnail');
						?>
						<div class="col-md-3 itemMidia">
							<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
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


// 3. Texto principal
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

<!-- 			<div class="col-md-12">
				<div class="checkbox">
					<label><input type="checkbox" value="1" name="intercambio_promocao" <?php //if($intercambio_promocao) echo "checked"; ?>>Em promoção</label>
				</div>
			</div> -->

		</div>

	</div>

	<?php
}


// 4. Infos gerais (pre-requisito, idade, duração...)
function intercambio_metaboxInfoGeral() {
	global $intercambio_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Pré-requisito')?></label>
					<input class="form-control" type="text" name="intercambio_dados[preRequisito]" <?php echo 'value="'.$intercambio_dados["preRequisito"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Idade')?></label>
					<input class="form-control" type="text" name="intercambio_dados[idade]" <?php echo 'value="'.$intercambio_dados["idade"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Duração')?></label>
					<input class="form-control" type="text" name="intercambio_dados[duracao]" <?php echo 'value="'.$intercambio_dados["duracao"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Início')?></label>
					<input class="form-control" type="text" name="intercambio_dados[inicio]" <?php echo 'value="'.$intercambio_dados["inicio"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Carga Horária')?></label>
					<input class="form-control" type="text" name="intercambio_dados[cargaHoraria]" <?php echo 'value="'.$intercambio_dados["cargaHoraria"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}


?>
