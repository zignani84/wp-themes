<?php
/**
 * Template Name: Destinos Interna
 *
 * @package egali
 */

get_header();
?>

<!-- MAIN -->
<main>
	<!-- BANNER -->
	<section class="banne-internal" style=""></section>
	<!-- MENU DESTINY -->
	<section class="main-menu-internal"> 
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-4">
					<div class="destiny">Destino</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<h4>CANADÁ: <span>MONTREAL</span></h4>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<i class="zmdi zmdi-format-align-right"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link ancora" href="#cidade">A CIDADE <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#cursos">Cursos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#gallery">Fotos e Vídeos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#acomodacoes">Acomodoção</a>
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
	<section class="main-description-page" id="cidade">
		<div class="container">
			<div class="row">
				<div class="col-12"><h4>SOBRE A CIDADE</h4></div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-3 col-lg-3">
					<img src="img/img-sobre-cidade.png" class="w-100 img-fluid" alt="Sobre a Cidade" title="Montreal" />
				</div>
				<div class="col-12 col-sm-9 col-lg-9">
					<div class="title-description h-100">
						<h1>Universidades reconhecidas no canada. Cosmopolita, acolhedora, refinada.</h1>
						<div class="line-h-6"></div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
						<p>Se você vai viajar para o Canadá, não pode deixar de conhecer um dos lugares mais ecléticos do país. Além de capital econômica e cultural da província de Quebec, Montreal é conhecida por outras variadas características. Comidas maravilhosas, referência em design e festivais consagrados são apenas algumas qualidades da segunda maior cidade do país.</p> 
						<p>Com cerca de 1,900,000 habitantes, a cidade de Montreal está apenas atrás de Toronto no quesito população. Quase 70% de seus habitantes falam francês e, por isso, também se tornou a segunda maior cidade do mundo de língua francesa como língua materna - o que lhe rendeu o apelido de Paris do Canadá.</p>
						<div class="line-h-100"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-nature-people"></i></div>
						<div class="text-icons">
							<span>População</span>
							<h4>1.65 milhões</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-time"></i></div>
						<div class="text-icons">
							<span>Hora local</span>
							<h4>15:07</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-money-box"></i></div>
						<div class="text-icons">
							<span>1 Dólar canadense </span>
							<h4>R$ 2,51</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-sun"></i></div>
						<div class="text-icons">
							<span>Temperatura local</span>
							<h4>-4.33º</h4>
						</div>
					</div>
				</div>
				<div class="line-h-100"></div>
				<div class="line-h-166 mx-auto"></div>
			</div>
		</div>
	</section>
	<!-- GALLERY IMAGES E VIDEOS -->
	<section class="main-gallery" id="gallery">
		<div class="container">
			<div class="row">
				<div class="col-12"><h4>FOTOS E VÍDEOS</h4></div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel gallery owl-theme" id="gallery">
						<div class="item">
							<a href="img/montreal-01.png" data-lightbox="roadtrip" data-title="My caption"><img src="img/montreal-01.png" alt="imagem motreal" title="Montreal" /> </a>
						</div>
						<div class="item">
							<a href="img/montreal-02.png" data-lightbox="roadtrip" data-title="My caption"><img src="img/montreal-02.png" alt="imagem motreal" title="Montreal" /> </a>
						</div>
						<div class="item">
							<a href="img/montreal-03.png" data-lightbox="roadtrip" data-title="My caption"><img src="img/montreal-03.png" alt="imagem motreal" title="Montreal" /> </a>
						</div>
						<div class="item">
							<a href="img/montreal-01.png" data-lightbox="roadtrip" data-title="My caption"><img src="img/montreal-01.png" alt="imagem motreal" title="Montreal" /> </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		// GALLERY IMAGES E VIDEOS
		$('.owl-carousel.gallery').owlCarousel({
			autoplay: true,
			autoPlaySpeed: 5000,
			autoPlayTimeout: 5000,
			autoplayHoverPause: true,
			loop:true, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:15, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.	

			responsive:{ 
			0:{
				items:1 
			},
			768:{
				items:2
			},
			1024:{
				items:3
			},
			}
		});
	</script>
	<!-- LIVING GUIDE -->
	<section class="living-guide" id="acomodacoes">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">GUIA DE VIVÊNCIA</h2>
					<div class="line-h-6 mx-auto mt-4"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- USEFUL INFORMATION -->
	<section class="information-useful">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>INFORMAÇÕES ÚTEIS</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-2">
					<div class="line-v-2"></div>
					<span><b>Código DDI:</b> 1</span>
					<span><b>Código DDD:</b> 514</span>
				</div>
				<div class="col-12 col-lg-7">
					<div class="line-v-2"></div>
					<span><b>FUSO HORÁRIO:</b> -1 a -3 horas em relação à Brasília, dependendo do horário de verão</span>
					<span><b>TEMPERATURA:</b> No verão, entre 21°C e 35°C. No inverno, entre -40°C e -25°C </span>
				</div>
				<div class="col-12 col-lg-3">
					<div class="line-v-2"></div>
					<span><b>VOLTAGEM:</b> 110V</span>
					<span><b>MOEDA:</b> Dólar canadense</span>
				</div>
			</div>
		</div>
	</section>
	<!-- COST LIVING -->
	<section class="main-cost-living">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="phone-emergency"><b>TELEFONE DE EMERGÊNCIA:</b> 911</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h4>CUSTO DE VIDA NA CIDADE</h4>
					<div class="line-h-8"></div>
					<div class="owl-carousel owl-theme mt-5">
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-cutlery"></i></a>
							<a href="#"><h6>REFEIÇÃO EM RESTURANTE ESTUDANTIL</h6></a>
							<span class="text-center">CAD 15</span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-view-carousel"></i></i></a>
							<a href="#"><h6>MC MEAL OU COMBO EQUIVALENTE NO MC DONALD'S</h6></a>
							<span class="text-center">CAD 9</span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-drink"></i></a>
							<a href="#"><h6>COCA-COLA (300ML)</h6></a>
							<span class="text-center">CAD 1.80</span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
							<a href="#"><h6>1 BAGUETE DE PÃO</h6></a>
							<span class="text-center">CAD 3.25</span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-bus"></i></a>
							<a href="#"><h6>TICKET DE ÔNIBUS (IDA OU VOLTA)</h6></a>
							<span class="text-center">CAD 3.25</span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-drink"></i></a>
							<a href="#"><h6>COCA-COLA (300ML)</h6></a>
							<span class="text-center">CAD 1.80</span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
							<a href="#"><h6>1 BAGUETE DE PÃO</h6></a>
							<span class="text-center">CAD 3.25</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- OPTIONS TRANSPORTATION -->
	<section class="main-options-transportation">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>OPÇÕES DE TRANSPORTE</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-6">
					<div class="line-v-2"></div>
					<div class="content-txt">
						<span><b>METRÔ</b></span>
						<p>O metrô de Montreal é composto por quatro linhas e está interligado ao sistema de ônibus, facilitando o acesso a todas as áreas da cidade. Duas das linhas (a laranja e a verde) são especialmente importantes, pois levam aos principais pontos turísticos da cidade. O metrô funciona diariamente das 5h30 às 00h35, exceto aos sábados, quando continua funcionando até à 1h. Os passes, que são válidos tanto para o metrô quanto para o ônibus, estão à venda nas estações e podem ser unitários ($3,25 com validade de 120 minutos), diários ($10), semanais ($25,50) e mensais ($82), entre outros.</p>
					</div>
				</div>
				<div class="col-12 col-lg-6">
					<div class="line-v-2"></div>
					<div class="content-txt">
						<span><b>ÔNIBUS</b></span>
						<p>Montreal tem uma frota grande de ônibus: Local Buses (passam a cada 10 minutos), All Night Service (funcionam no período noturno) e o Express Service (ônibus que fazem menos paradas) são alguns deles. A passagem unitária custa $3.25 e pode ser comprada dentro do ônibus (a máquina aceita apenas moedas e não fornece troco) ou nas estações de metrô. Também é possível comprar, nas estações, o passe diário ($10), o semanal ($25,50) e o mensal ($82) que são válidos tanto para ônibus quanto para metrô.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ATTRACTIONS -->
	<section class="main-cards-slider">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>ATRAÇÕES</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel cards-slider owl-theme">
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="img/img-attractions-01.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="img/img-attractions-02.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="img/img-attractions-03.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="img/img-attractions-04.png" alt="Card image cap" title="">
								<div class="card-body">
									<span>LOREM IPSUM DOLOR SIT AMET LIRIAM SED DONEC LIRIAM</span>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<div class="line-h-2"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card">
								<img class="card-img-top img-fluid w-100" src="img/img-attractions-02.png" alt="Card image cap" title="">
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
			<div class="row">
				<div class="col-12 text-center">
					<div class="bg-btn">
						<a href="#" class="btn btn-secondary">VEJA MAIS SOBRE</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		// GALLERY IMAGES E VIDEOS
		$('.owl-carousel.cards-slider').owlCarousel({
			autoplay: true,
			autoPlaySpeed: 5000,
			autoPlayTimeout: 5000,
			autoplayHoverPause: true,
			loop:true, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:15, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.	

			responsive:{ 
			0:{
				items:1 
			},
			768:{
				items:2
			},
			1024:{
				items:4
			},
			}
		});
	</script>
<!-- SECTION EXCHANGE -->
<section class="main-exchange" id="cursos">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title-section-primary">
						<small>NOSSOS</small>
						<h2>INTERCÂMBIOS</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-4 col-md-6">
					<div class="card">
						<div class="card img-fluid">
							<img class="card-img-top" src="img/img-pacote-01.png" alt="Card image" title="">
							<div class="card-img-overlay">
								<div class="line-h-4"></div>
								<h3>Cursos Teens</h3>
								<p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
								<a href="#" class="btn-exchange-primary">VEJA MAIS</a>
								<a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-md-6">
					<div class="card">
						<div class="card img-fluid">
							<img class="card-img-top" src="img/img-pacote-01.png" alt="Card image" title="">
							<div class="card-img-overlay">
								<div class="line-h-4"></div>
								<h3>Cursos Teens</h3>
								<p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
								<a href="#" class="btn-exchange-primary">VEJA MAIS</a>
								<a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-md-6">
					<div class="card img-fluid">
						<img class="card-img-top" src="img/img-pacote-01.png" alt="Card image" title="">
						<div class="card-img-overlay">
							<div class="line-h-4"></div>
							<h3>Cursos Teens</h3>
							<p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
							<a href="#" class="btn-exchange-primary">VEJA MAIS</a>
							<a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-md-6">
					<div class="card">
						<div class="card img-fluid">
							<img class="card-img-top" src="img/img-pacote-01.png" alt="Card image" title="">
							<div class="card-img-overlay">
								<div class="line-h-4"></div>
								<h3>Cursos Teens</h3>
								<p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
								<a href="#" class="btn-exchange-primary">VEJA MAIS</a>
								<a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-md-6">
					<div class="card">
						<div class="card img-fluid">
							<img class="card-img-top" src="img/img-pacote-01.png" alt="Card image" title="">
							<div class="card-img-overlay">
								<div class="line-h-4"></div>
								<h3>Cursos Teens</h3>
								<p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
								<a href="#" class="btn-exchange-primary">VEJA MAIS</a>
								<a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-md-6">
					<div class="card img-fluid">
						<img class="card-img-top" src="img/img-pacote-01.png" alt="Card image" title="">
						<div class="card-img-overlay">
							<div class="line-h-4"></div>
							<h3>Cursos Teens</h3>
							<p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
							<a href="#" class="btn-exchange-primary">VEJA MAIS</a>
							<a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<a class="btn btn-secondary">CONHEÇA NOSSAS PROMOÇÕES</a>
				</div>
			</div>
		</div>
	</section>
	<!-- CARDS -->
	<section class="main-cards">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>SÓ NA EGALI TEM</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SECTION DEPOSITIONS -->
	<section class="depositions">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-1 text-center text-lg-left">
					<img src="img/img-depoiment-01.png" alt="Imagem depoimentos" class="rounded-circle">
				</div>
				<div class="col-12 col-lg-5 text-center text-lg-left">
					<h6>LÉIA RODRIGUES / <span class="location">LONDRES</span></h6>
					<span class="description">CURSOS + TRABALHO</span>
					<p>Pude realizar sonhos, conhecer novas culturas, fazer novas amizades e ganhar novos conhecimentos durante o meu intercâmbio para Londres em dezembro de 2013. A Egali fez parte disso me acomodando, orientando e sendo família no sonho que eu não queria que acabasse.</p>
					<div class="line-h-6"></div>
				</div>
				<div class="col-12 col-lg-1 text-center text-md-center text-lg-left">
						<img src="img/img-depoiment-01.png" alt="Imagem depoimentos" class="rounded-circle">
					</div>
					<div class="col-12 col-lg-5 text-center text-lg-left">
						<h6>LÉIA RODRIGUES / <span class="location">LONDRES</span></h6>
						<span class="description">CURSOS + TRABALHO</span>
						<p>Pude realizar sonhos, conhecer novas culturas, fazer novas amizades e ganhar novos conhecimentos durante o meu intercâmbio para Londres em dezembro de 2013. A Egali fez parte disso me acomodando, orientando e sendo família no sonho que eu não queria que acabasse.</p>
						<div class="line-h-6"></div>
					</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<div class="bg-btn">
						<a href="#" class="btn btn-secondary">VEJA TODOS OS DEPOIMENTOS</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SECTION BLOG -->
	<section class="news-blog">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<small>blog</small>
					<h2>FALANDO DE INTERCÂMBIO</h2>
					<div class="line-h-8"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-purple">VIDA NO EXTERIOR</div>
						<div class="card-body">
							<div class="line-h-6"></div>
							<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-green">TODOS OS ASSUNTOS</div>
						<div class="card-body">
							<div class="line-h-6"></div>
							<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-red">VIDA NO EXTERIOR</div>
						<div class="card-body">
							<div class="line-h-6"></div>
							<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-yellow">TODOS OS ASSUNTOS</div>
						<div class="card-body">
							<div class="line-h-6"></div>
							<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-pink">VIDA NO EXTERIOR</div>
						<div class="card-body">
							<div class="line-h-6"></div>
							<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-purple">TODOS OS ASSUNTOS</div>
						<div class="card-body">
							<div class="line-h-6"></div>
							<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
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
	<!-- CARDS -->
	<section class="main-cards bg-cards">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>VOCÊ PODE GOSTAR</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">LOREM IPSUM DOLOR SIT AMET DONEC LIRIAM MAXIMUS CRAS ET ORNARE NUNC, SED</h5></a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">LOREM IPSUM DOLOR SIT AMET DONEC LIRIAM MAXIMUS CRAS ET ORNARE NUNC, SED</h5></a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">LOREM IPSUM DOLOR SIT AMET DONEC LIRIAM MAXIMUS CRAS ET ORNARE NUNC, SED</h5></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
