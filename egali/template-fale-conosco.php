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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">FALE CONOSCO</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-contact">
		<div class="container position-relative">
			<div class="row">
				<div class="col-12 col-lg-7">
					<h1>FALE CONOSCO</h1>
					<div class="line-h-6 mb-5 mt-4"></div>
					<P>Nossos consultores especializados estão esperando seu contato.</P>
					<P>Preencha os campos e em até 24 horas você receberá retorno.</P>

					<?php echo do_shortcode( '[contact-form-7 id="69" title="Fale Conosco" html_class="mt-5"]' ); ?>

				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
