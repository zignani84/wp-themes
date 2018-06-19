<?php

// Define post type "Banners"

$banner_cpt_args = array(
	"label" => __("Banners","egali"),
	"labels" => array(
		"name" => __("Banners","egali"),
		"menu_name" => __("Banners","egali"),
		"all_items" => __("Todos os Banners","egali"),
		"add_new" => _x('Adicionar Novo','banner','egali'),
		"add_new_item" => __("Adicionar Novo Banner","egali"),
		"edit_item" => __("Editar Banner","egali"),
		"new_item" => __("Novo Banner","egali"),
		"view_item" => __("Ver Banner","egali"),
		"view_items" => __("Ver Banners","egali"),
		"search_items" => __("Buscar Banners","egali"),
		"not_found" => __("Nenhum Banner Encontrado","egali"),
		"not_found_in_trash" => __("Nenhum Banner Encontrado na Lixeira","egali")
	),
	"description" => __("Banners Home Egali","egali"),
	"public" => false,
	"publicly_queryable" => true,
	"hierarchical" => false,
	'rewrite' => array(
		'with_front'=> false
	),
	"exclude_from_search" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => false,
	"show_in_admin_bar" => true,
	"show_in_rest" => false,
	"menu_position" => 4,
	"menu_icon" => "dashicons-slides",
	"capability_type" => "post",
	"supports" => array("title"),
	'register_meta_box_cb' => 'banner_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => false
);
register_post_type('banner',$banner_cpt_args);


//Adiciona metaboxes com os campos customizados do destino

function banner_cpt_metaboxCallback() {
	global $post;
	
	wp_enqueue_media();
	
	//Imagem Destaque
	add_meta_box('banner_imagemDestaque', __('Imagem Destaque'),'banner_metaboxImagemDestaque','banner','normal');

	//Frase1 + Frase2 + Link
	add_meta_box('banner_dados', __('Categoria, Frases e Link'),'banner_metaboxDados','banner','normal');

}


//Salva metadados do post

add_action('save_post_banner','save_banner_metadata');
function save_banner_metadata($post_id){

	if( isset($_POST["banner_dados"]) && is_array($_POST["banner_dados"]) ) {

		//textos + link
		update_post_meta($post_id,'banner_dados',$_POST["banner_dados"]);

		//imagem
		if(isset($_POST["banner_imagemDestaque"])) {
			update_post_meta($post_id,'banner_imagemDestaque',$_POST["banner_imagemDestaque"]);
		}

	}

}


// Funções de criação das Metaboxes




// 2. Imagem Destaque
function banner_metaboxImagemDestaque() {
	global $post;

	$banner_imagemDestaque = get_post_meta($post->ID,'banner_imagemDestaque',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div id="containerImagemDestaque" class="row" data-maxitens="1">
					<?php
					if(isset($banner_imagemDestaque) && !empty($banner_imagemDestaque)) {
						$banner_imagemDestaque = intval($banner_imagemDestaque);
						$imgUrl = get_relative_thumb($banner_imagemDestaque,'thumbnail');
						?>
						<div class="col-md-3 mediaItem">
							<div class="mediaThumb" style="background-image:url(<?php echo $imgUrl;?>);">
								<span class="dashicons dashicons-no btRemover"></span>
							</div>
							<input type="hidden" name="banner_imagemDestaque" value="<?php echo $banner_imagemDestaque?>">
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

				<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemDestaque" data-fieldname="banner_imagemDestaque">
					<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir / Alterar Imagem','egali')?>
				</button>

			</div>

		</div>

	</div>

	<?php
}


// 3. Frase destaque e texto principal
function banner_metaboxDados() {
	global $post;

	$banner_dados = get_post_meta($post->ID,'banner_dados',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Categoria')?></label>
					<input class="form-control" type="text" name="banner_dados[categoria]" <?php echo 'value="'.$banner_dados["categoria"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Link')?></label>
					<input class="form-control" type="text" name="banner_dados[link]" <?php echo 'value="'.$banner_dados["link"].'"'; ?>>
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Frase em destaque')?></label>
					<input class="form-control" type="text" name="banner_dados[frase1]" <?php echo 'value="'.$banner_dados["frase1"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Frase Secundária')?></label>
					<input class="form-control" type="text" name="banner_dados[frase2]" <?php echo 'value="'.$banner_dados["frase2"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

?>
