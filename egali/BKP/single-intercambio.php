<?php
get_header();
?>

<!-- MAIN -->
<main>
	<!-- BANNER -->
	<section class="banne-internal"></section>
	<!-- MENU DESTINY -->
	<section class="main-menu-internal"> 
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<h4>CURSO: <span>IDIOMA EM INGLÊS</span></h4>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<i class="zmdi zmdi-format-align-right"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link ancora" href="#sobre">SOBRE <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#cidade">Cidades</a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#diferenciais">Diferenciais</a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#contato">Entre em contato</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Library</a></li>
						<li class="breadcrumb-item active" aria-current="page">Data</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page" id="sobre">
		<div class="container">
			<div class="row">
				<div class="col-12"><h4>SOBRE o Curso</h4></div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-8 col-lg-8">
					<div class="title-description-one h-70">
						<h1>VIVA UMA EXPERIÊNCIA INTERNACIONAL E APRENDA UM NOVO IDIOMA</h1>
						<div class="line-h-6"></div>
					</div>
					<p>Uma das línguas mais faladas em todo o mundo, o inglês é o idioma oficial de países importantes como Estados Unidos, Inglaterra, Canadá e Austrália. Saber falar inglês fluentemente passou de um diferencial para praticamente item obrigatório na bagagem de quem busca o sucesso no mercado de trabalho atualmente.</p>
				</div>
				<div class="col-12 col-sm-4 col-lg-4">
					<img src="<?php echo get_theme_file_uri(); ?>/img/img-intercambio.png" class="w-100 img-fluid" alt="Sobre a Cidade" title="Montreal" />
				</div>
			</div>
		</div>
	</section>
	
	<!-- ATTRACTIONS -->
	<section class="main-cards-slider" id="cidade">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>CIDADES</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel cards-slider owl-theme" id="intercambio_sliderFotosVideos">
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-cidades-01.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-cidades-02.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-cidades-03.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-cidades-04.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-cidades-02.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- SECTION DIFFERENTIAL -->
	<section class="differential" id="diferenciais">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">DIFERENCIAIS</h2>
					<div class="line-h-8"></div>
					<div class="owl-carousel owl-theme mt-5">
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-pin"></i></a>
							<a href="#"><h6>Base Egali</h6></a>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-home"></i></a>
							<a href="#"><h6>Egali House</h6></a>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-takeoff"></i></a>
							<a href="#"><h6>Orientação Pré-embarque </h6></a>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
							<a href="#"><h6>Orientação Pós-embarque</h6></a>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-globe-alt"></i></a>
							<a href="#"><h6>Auxílio Visto</h6></a>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
							<a href="#"><h6>Orientação Pós-embarque</h6></a>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-globe-alt"></i></a>
							<a href="#"><h6>Auxílio Visto</h6></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<a href="#" class="btn btn-secondary">VEJA TODOS OS DEPOIMENTOS</a>
				</div>
			</div>
		</div>
	</section>
		<!-- SECTION FORM -->
		<section class="main-form" id="contato">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="box-form">
						<h1 class="title-flutuante">ENTRE EM CONTATO CONOSCO</h1>
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