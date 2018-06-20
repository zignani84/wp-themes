<?php
/**
 * Template Name: Promoções
 */

get_header();
the_post();
?>

<!-- MAIN -->
<main>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb mt-150">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo get_site_url();?>"><?php _e('Home','egali')?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page">
		<div class="container">
			<div class="row">
				<div class="col-9">
					<h1><?php _e('PROMOÇÕES DO MÊS','egali')?></h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12 col-sm-7 col-lg-7">
					<?php
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
					$argsPromocoes = array(
						'post_type' => 'promocao'
					);
					$promocoes = new WP_Query($argsPromocoes);
					if($promocoes->have_posts()) {
						while($promocoes->have_posts()) {
							$promocoes->the_post();
							$promocoes_id = get_the_ID();
							$titulo = get_the_title();
							$promocao = get_post_meta($promocoes_id,"promocao_dados",true);
							$imgUrl = get_relative_thumb($promocao["imagemDestaque"],'medium');

							?>
							<div class="col-12 col-lg-4 col-md-6">
								<div class="card">
									<div class="object-cover" style="background-color:#ccc;background-image:url(<?php echo $imgUrl; ?>);"></div>
									<div class="card-img-overlay">
										<div class="line-h-4"></div>
										<h3><?php echo $titulo; ?></h3>
										<p class="card-text"><?php echo $promocao["fraseDestaque"]; ?></p>
										<a href="<?php echo $promocao["link"]; ?>" class="btn-exchange-primary"><?php _e('VEJA MAIS','egali')?></a>
										<button type="button" class="btn-exchange-secundary btOrcamentoFacil" data-programa="<?php echo $titulo; ?>"><?php _e('ORÇAMENTO FACIL','egali')?></button>
									</div>
								</div>
							</div>
						<?php
						}
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
						<small><?php _e('faça acontecer','egali')?></small>
						<h1><?php _e('ESTUDO + TRABALHO?','egali')?></h1>
					</div>
					<div class="txt-two">
						<h4><?php _e("LET'S",'egali')?></h4>
						<span><?php _e('G','egali')?></span>
						<span><?php _e('O','egali')?></span>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<a href="<?php echo get_home_url(); ?>/intercambios" class="btn btn-secondary"><?php _e('VEJA MAIS COMO','egali')?></a>
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
