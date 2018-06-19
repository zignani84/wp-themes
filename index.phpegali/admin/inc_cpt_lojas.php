<?php

// Define post type "Nossas Lojas"

$loja_cpt_args = array(
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
	"menu_icon" => "dashicons-admin-home",
	"capability_type" => "post",
	"supports" => array("title"),
	'register_meta_box_cb' => 'loja_cpt_metaboxCallback',
	"taxonomies" => array("post_tag"),
	"has_archive" => true
);
register_post_type('loja',$loja_cpt_args);


//Adiciona metaboxes com os campos customizados da loja

function loja_cpt_metaboxCallback() {
	global $post,$loja_dados,$loja_pais,$loja_estado,$loja_cidade;

	$loja_dados = get_post_meta($post->ID,'loja_dados',true);
	
	//Info Loja 
	add_meta_box('loja_infoGeral', __('Informações da Loja'),'loja_metaboxInfoLoja','loja','normal');

	//ID EPS
	add_meta_box('loja_idEps', __('ID EPS'),'loja_metaboxIdEps','loja','normal');

}


//Salva metadados do post

add_action('save_post_loja','save_loja_metadata');
function save_loja_metadata($post_id){

	if(isset($_POST["loja_dados"]) && is_array($_POST["loja_dados"])) {
		update_post_meta($post_id,'loja_dados',$_POST["loja_dados"]);
	}

	//ID EPS
	update_post_meta($post_id,'loja_idEps',$_POST["loja_idEps"]);

}


// Funções de criação das Metaboxes


// 1. Frase destaque e texto principal
function loja_metaboxInfoLoja() {
	global $post,$loja_dados;

	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Localização')?></label>
					<input class="form-control" type="text" name="loja_dados[localizacao]" <?php echo 'value="'.$loja_dados["localizacao"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Endereço')?></label>
					<input class="form-control" type="text" name="loja_dados[endereco]" <?php echo 'value="'.$loja_dados["endereco"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Código Postal')?></label>
					<input class="form-control" type="text" name="loja_dados[cep]" <?php echo 'value="'.$loja_dados["cep"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Cidade')?></label>
					<input class="form-control" type="text" name="loja_dados[cidade]" <?php echo 'value="'.$loja_dados["cidade"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('Estado')?></label>
					<input class="form-control" type="text" name="loja_dados[estado]" <?php echo 'value="'.$loja_dados["estado"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php _e('País')?></label>
					<input class="form-control" type="text" name="loja_dados[pais]" <?php echo 'value="'.$loja_dados["pais"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Latitude')?></label>
					<input class="form-control" type="text" name="loja_dados[latitude]" <?php echo 'value="'.$loja_dados["latitude"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label><?php _e('Longitude')?></label>
					<input class="form-control" type="text" name="loja_dados[longitude]" <?php echo 'value="'.$loja_dados["longitude"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label><?php _e('Telefone')?></label>
					<input class="form-control" type="text" name="loja_dados[telefone]" <?php echo 'value="'.$loja_dados["telefone"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-8">
				<div class="form-group">
					<label><?php _e('E-mail')?></label>
					<input class="form-control" type="text" name="loja_dados[email]" <?php echo 'value="'.$loja_dados["email"].'"'; ?>>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Horário de atendimento')?></label>
					<input class="form-control" type="text" name="loja_dados[horarioAtendimento]" <?php echo 'value="'.$loja_dados["horarioAtendimento"].'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

// 2. ID EPS
function loja_metaboxIdEps() {
	global $post;

	$loja_idEps = get_post_meta($post->ID,'loja_idEps',true);
	?>

	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="form-group">
					<label><?php _e('Preencher com o ID correspondente a unidade (loja) no EPS.')?></label>
					<input class="form-control" type="text" name="loja_idEps" <?php echo 'value="'.$loja_idEps.'"'; ?>>
				</div>
			</div>

		</div>

	</div>

	<?php
}

?>
