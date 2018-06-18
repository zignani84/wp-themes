<?php

//Bloco com itens de intercâmbio - repete em várias páginas do site

$argsIntercambio = array(
	'posts_per_page'	=> 6,
	'post_type'		=> 'intercambio'
);
$buscaIntercambio = new WP_Query($argsIntercambio);
if($buscaIntercambio->have_posts()) {
	?>
	<!-- SECTION EXCHANGE -->
	<section class="main-exchange">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title-section-primary">
						<small><?php _e('NOSSOS','egali')?></small>
						<h2><?php _e('INTERCÂMBIOS','egali')?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				while ($buscaIntercambio->have_posts()) {

					$buscaIntercambio->the_post();
					$postAtual = get_the_ID();
					$titulo = get_the_title();
					$fraseDestaque = get_post_meta($postAtual,"intercambio_fraseDestaque",true);
					$intercambio = get_post_meta($postAtual,"intercambio_dados",true);
					$link = get_the_permalink();
					
					?>
					<div class="col-12 col-lg-4 col-md-6">
						<div class="card">
							<div class="object-cover" style="background-image:url(<?php echo $intercambio["imagemDestaque"]; ?>);"></div>
							<div class="card-img-overlay">
								<div class="line-h-4"></div>
								<h3><?php echo $titulo; ?></h3>
								<p class="card-text"><?php echo $fraseDestaque; ?></p>
								<a href="<?php echo $link; ?>" class="btn-exchange-primary">VEJA MAIS</a>
								<a data-toggle="modal" href="#exampleModalCenter" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<a class="btn btn-secondary" href="<?php echo get_home_url(); ?>/promocoes">CONHEÇA NOSSAS PROMOÇÕES</a>
				</div>
			</div>
		</div>
	</section>
	<?php
}

wp_reset_query();

?>
