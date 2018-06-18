<?php
/**
 * Template Name: Quem Somos
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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Quem somos</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12 col-lg-5">
					<h1>QUEM SOMOS</h1>
					<div class="line-h-6 mt-4 mb-5"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean hendrerit, ligula ac porttitor egestas, nisi nibh ultrices sapien, non egestas turpis massa a erat auctor vulputate sed hendrerit ipsum. Phasellus laoreet lectus nec suscipit feugiat. Pellentesque interdum, odio aliquet accumsan porta, purus dolor ullamcorper nunc, eget auctor nulla lorem at sem. Sed nec scelerisque urna. Ut quis mi urna. Pellentesque at dui lectus. </p>
					<p>Etiam metus lectus, tempor et massa ac, lobortis fermentum metus. Proin efficitur massa at metus lacinia dignissim.</p>
				</div>
				<div class="col-12 col-lg-7 animate-img mt-3">
					<img src="<?php echo get_theme_file_uri(); ?>/img/img-video-quem-somos.jpg" class="img-fluid" alt="Quem somos" title="Quem somos" />
				</div>
			</div>
		</div>
	</section>
	<!-- SECTION FEATURED -->
	<section class="main-featured">
		<div class="container">
			<div class="row">
				<div class="col-12 animate-img">
					<img src="<?php echo get_theme_file_uri(); ?>/img/img-destaque-quem-somos.jpg" class="img-fluid" alt="Destaque Quem Somos" title=" Destaque Quem somos" />
				</div>
			</div>
		</div>
	</section>
	<!-- SECTION TWO COL TEXT -->
	<div class="main-two-text">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12">
					<h5>LOREM IPSUM CONSECTUTER</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-6">
					<p>In dignissim egestas dapibus. Nulla id blandit orci. Suspendisse mollis egestas nisl, id eleifend lorem. Proin neque justo, porttitor vel auctor eget, mattis vitae eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla leo erat, congue nec placerat vitae, molestie at nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin eu nisi molestie, aliquam lectus in, elementum ligula.</p>
					<div class="line-h-6 mt-5 mb-4"></div>
				</div>
				<div class="col-12 col-sm-6 col-lg-6">
					<p>In dignissim egestas dapibus. Nulla id blandit orci. Suspendisse mollis egestas nisl, id eleifend lorem. Proin neque justo, porttitor vel auctor eget, mattis vitae eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla leo erat, congue nec placerat vitae, molestie at nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin eu nisi molestie, aliquam lectus in, elementum ligula.</p>
					<div class="line-h-6 mt-5"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- SECTION FORM -->
		<section class="main-form">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="box-form">
						<h1 class="title-flutuante">GOSTEI, QUERO SABER MAIS!</h1>
						<small>Cadastre-se para receber nossas novidades.</small>
						<form class="form-inline">
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="name" value="Nome">
							</div>
							<div class="form-group mx-sm-3 mb-2">
								<input type="email" class="form-control" id="mail" value="email@example.com">
							</div>
							<div class="bg-btn">
								<button type="submit" class="btn btn-primary mb-2">ENVIAR</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
