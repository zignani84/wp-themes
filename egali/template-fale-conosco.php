<?php
/**
 * Template Name: Fale Conosco
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
						<li class="breadcrumb-item active" aria-current="page"><?php _e('FALE CONOSCO','egali'); ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-contact">
		<div class="container position-relative">
			<div class="row">
				<div class="col-12 col-lg-7">
					<h1><?php _e('FALE CONOSCO','egali'); ?></h1>
					<div class="line-h-6 mb-5 mt-4"></div>
					<P><?php _e('Nossos consultores especializados estão esperando seu contato','egali'); ?>.</P>
					<P><?php _e('Preencha os campos e em até 24 horas você receberá retorno','egali'); ?>.</P>

					<?php echo do_shortcode( '[contact-form-7 id="69" title="Fale Conosco" html_class="mt-5"]' ); ?>

				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
