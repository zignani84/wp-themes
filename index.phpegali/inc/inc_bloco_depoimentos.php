<?php

//Bloco com itens de depoimento - repete em várias páginas do site

$argsDepoimento = array(
	'posts_per_page' => 2,
	'post_type'		 => 'depoimento',
	'orderby'        => 'rand'
);
$buscaDepoimento = new WP_Query($argsDepoimento);
if($buscaDepoimento->have_posts()) {
	?>
	<!-- SECTION DEPOSITIONS -->
	<section class="depositions">
		<div class="container">
			<div class="row">

				<?php
				while ($buscaDepoimento->have_posts()) {

					$buscaDepoimento->the_post();
					$postAtual = get_the_ID();
					$nome = get_the_title();
					$depoimento = get_post_meta($postAtual,"depoimento_textoDepoimento",true);
					$depoimentoDados = get_post_meta($postAtual,"depoimento_dados",true);
					$locais = get_the_terms($ID,'local');
					foreach($locais as $loc) {
						$loc = (array)$loc;
						if($loc["parent"] > 0) {
							$cidade = $loc["name"];
							break;
						}
					}
					$imgUrl = get_relative_thumb($depoimentoDados["fotoDepoente"],'thumbnail');

					?>
					<div class="col-12 col-lg-1 text-center text-lg-left">
						<div style="background-image:url(<?php echo $imgUrl;?>);background-position:50% 50%;background-size:cover;--div-width:65px;width:var(--div-width);height:calc(var(--div-width));" class="rounded-circle"></div>
					</div>
					<div class="col-12 col-lg-5 text-center text-lg-left">
						<h6><?php echo $nome;?> / <span class="location"><?php echo strtoupper($cidade);?></span></h6>
						<span class="description"><?php echo strtoupper($depoimentoDados["intercambioRealizado"]);?></span>
						<p><?php echo $depoimento; ?></p>
						
						<div class="line-h-6"></div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}

wp_reset_query();

?>
