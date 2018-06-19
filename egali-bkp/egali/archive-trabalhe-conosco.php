<?php
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
						<li class="breadcrumb-item active" aria-current="page">TRABALHE CONOSCO</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-accordion main-work">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>TRABALHE CONOSCO</h1>
					<div class="line-h-6 mt-4 mb-5"></div>
					<div class="text-page">Veja abaixo as vagas disponíveis na <span>Egali Intercâmbio</span>.</div>
					<div class="text-page mb-4">Envie o seu currículo para <span class="mail">selecao@egali.com.br</span></div> 
					<div class="line-h-100 mt-5 mb-5"></div>
				</div>
				<div class="col-12">
					<h6>VENHA FAZER PARTE DESTE TIME VENCEDOR!</h6>
				</div>
				<div class="col-12 col-md-6 col-lg-7 mb-4">
					<p>A Egali Intercâmbio, pelo sexto ano consecutivo, conquista o prêmio do Instituto Great Place to Work como uma das melhores empresas para se trabalhar. Neste estudo, a organização também aparece como destaque por gerar emprego para jovens em início de carreira e ter como prática constante a promoção de suas equipes.</p>
				</div>
				<div class="col-6 col-md-3 col-lg-2 offset-lg-1 mb-4">
					<h5>CERTIFICAÇÃO</h5>
					<p>Melhores empresas para trabalhar de 2011 à 2018</p>
					
				</div>
				<div class="col-6 col-md-3 col-lg-2 mb-4">
					<div class="line"></div>
					<img src="<?php echo get_theme_file_uri(); ?>/img/img-certificacao.jpg" class="img-fluid float-right" alt="Certificação" title="Certificação" />
				</div>
				<div class="col-12">
					<div class="line-h-100 mt-4 mb-5"></div>
					<h4>VAGAS DISPONÍVEIS</h4>
					<h6 class="mb-5">VENHA FAZER PARTE DESTE TIME VENCEDOR!</h6>
				</div>
				<div class="col-12">
					<div id="accordion">
						<div class="card">
							<div class="card-header" id="headingOne">
							<h6 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<i class="zmdi zmdi-chevron-up"></i>
								<i class="zmdi zmdi-chevron-down"></i>
								Collapsible Group Item #1
								</button>
							</h6>
							</div>
						
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
							<h6 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<i class="zmdi zmdi-chevron-up"></i>
								<i class="zmdi zmdi-chevron-down"></i>
								Collapsible Group Item #2
								</button>
							</h6>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
							<h6 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<i class="zmdi zmdi-chevron-up"></i>
								<i class="zmdi zmdi-chevron-down"></i>
								Collapsible Group Item #3
								</button>
							</h6>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
