<?php
/**
 * Template Name: Promoções
 */

get_header();
?>

<!-- MAIN -->
<main>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Promoções</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page mt-150">
		<div class="container">
			<div class="row">
				<div class="col-9">
					<h1>PROMOÇÕES DO MÊS</h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12 col-sm-7 col-lg-7">
					<?php
						the_post();
						the_content();
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- SECTION PROMOTION -->
	<section class="main-promotion">
		<div class="container">
			<div class="row">
				<?php
				//busca posts (intercambios) com meta "promoção" = 1
				global $wpdb;
				$buscaPromo = $wpdb->get_results("SELECT * FROM `".$wpdb->postmeta."` WHERE meta_key='intercambio_promocao' AND meta_value='1'");
				if(is_array($buscaPromo) && !empty($buscaPromo) && isset($buscaPromo[0])) {
					$ids = array();
					foreach($buscaPromo as $promo) {
						$ids[] = intval($promo->post_id);
					}
					$args = array(
						'post_type' => 'intercambio',
						'post__in' => $ids
					);
					$posts = get_posts($args);
					foreach ($posts as $p) {
						$postAtual = $p->ID;
						$titulo = $p->post_title;
						$fraseDestaque = get_post_meta($postAtual,"intercambio_fraseDestaque",true);
						$intercambio = get_post_meta($postAtual,"intercambio_dados",true);
						$link = get_post_permalink($postAtual);
						$imgUrl = get_relative_thumb($intercambio["imagemDestaque"],'medium');

						?>
						<div class="col-12 col-lg-4 col-md-6">
							<div class="card">
								<div class="object-cover" style="background-color:#ccc;background-image:url(<?php echo $imgUrl; ?>);"></div>
								<div class="card-img-overlay">
									<div class="line-h-4"></div>
									<h3><?php echo $titulo; ?></h3>
									<p class="card-text"><?php echo $fraseDestaque; ?></p>
									<a href="<?php echo $link; ?>" class="btn-exchange-primary">VEJA MAIS</a>
									<button type="button" class="btn-exchange-secundary btOrcamentoFacil" data-programa="<?php echo $titulo; ?>">ORÇAMENTO FACIL</button>
								</div>
							</div>
						</div>
						<?php

					}
				} else {
					?>
					<div class="col-12 col-lg-4 col-md-6">
						<p>Não há promoções no momento.</p>
					</div>
					<?php
				}
				?>
				
				
				
			</div>
		</div>
	</section>

	<!-- SECTION GO LEST -->
	<section class="main-go-lest">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8">
					<div class="txt-one">
						<small>faça acontecer</small>
						<h1>ESTUDO + TRABALHO?</h1>
					</div>
					<div class="txt-two">
						<h4>LET'S</h4>
						<span>G</span>
						<span>O</span>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<a href="intercambios" class="btn btn-secondary">VEJA MAIS COMO</a>
				</div>
			</div>
		</div>
	</section>

	<?php
	require "inc/inc_bloco_cadastraNews.php";
	?>

</main>

<?php
get_footer();
