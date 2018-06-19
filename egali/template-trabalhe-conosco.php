<?php
/**
 * Template Name: Trabalhe Conosco
 */


get_header();
?>

<!-- MAIN -->
<main>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb mt-150">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><?php _e('Home','egali'); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php _e('TRABALHE CONOSCO','egali'); ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-accordion main-work">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1><?php _e('TRABALHE CONOSCO','egali'); ?></h1>
				</div>
			</div>

			<?php
				the_content();
			?>

			<div class="row">
				<div class="col-12">
					<div class="line-h-100 mt-4 mb-5"></div>
					<h4><?php _e('VAGAS DISPONÍVEIS','egali'); ?></h4>
				</div>
				<div class="col-12">
					<div id="accordion">
						
						<?php
						$argsVagas = array(
							'posts_per_page' => -1,
							'post_type'	=> 'trabalhe-conosco'
						);
						$buscaVagas = new WP_Query($argsVagas);
						if($buscaVagas->have_posts()) {
							while ($buscaVagas->have_posts()) {
								$buscaVagas->the_post();
								$vaga_id = get_the_ID();
								?>
								<div class="card">
									<div class="card-header" id="heading<?php echo $vaga_id;?>">
										<h6 class="mb-0">
											<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $vaga_id;?>" aria-expanded="false" aria-controls="collapse<?php echo $vaga_id;?>">
											<i class="zmdi zmdi-chevron-up"></i>
											<i class="zmdi zmdi-chevron-down"></i>
											<?php the_title(); ?>
											</button>
										</h6>
									</div>
									
									<div id="collapse<?php echo $vaga_id;?>" class="collapse" aria-labelledby="heading<?php echo $vaga_id;?>" data-parent="#accordion">
										<div class="card-body">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
								<?php
							}
						}
						?>


					</div>	
				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
