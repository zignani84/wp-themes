<?php

get_header();

$pais = get_terms(array('taxonomy' => 'local','parent' => 0));
$paisNome = isset($pais[0]->name)?$pais[0]->name:"?";
$destino = get_post_meta($post->ID,'destino_dados',true);
$fraseDestaque = get_post_meta($post->ID,'destino_fraseDestaque',true);
$textoPrincipal = get_post_meta($post->ID,'destino_textoPrincipal',true);

?>

<!-- MAIN -->
<main>
	<!-- BANNER -->
	<section class="banner-internal" style="background-image:url(<?php echo $destino["bannerPrincipal"] ?>)"></section>
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
						<h4><?php echo $paisNome; ?>: <span><?php the_title();?></span></h4>
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
									<a class="nav-link ancora" href="#fotosVideos">Fotos e Vídeos</a>
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
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Destinos</li>
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
				<div class="col-12 col-sm-3 col-lg-3" style="background-size:cover;background-image:url(<?php echo $destino["imagemDestaque"] ?>)">
				</div>
				<div class="col-12 col-sm-9 col-lg-9">
					<div class="title-description h-100">
						<h1><?php echo $fraseDestaque;?></h1>
						<div class="line-h-6"></div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">

						<?php
						$textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$textoPrincipal))."</p>";
						echo $textoPrincipal;
						?>


						
						<pre>
						<?php
						//var_dump($destino);
						?>
						</pre>



						
						<div class="line-h-100"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-nature-people"></i></div>
						<div class="text-icons">
							<span>População</span>
							<h4><?php echo $destino["populacao"] ?></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-time"></i></div>
						<div class="text-icons">
							<span>Hora local</span>
							<h4 id="horaDestino"></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-money-box"></i></div>
						<div class="text-icons">
							<span>1 <?php echo $destino["moeda"] ?></span>
							<?php
							//busca cotação da moeda
							$egali_bd = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
							if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
							$egali_bd->set_charset("utf8");
							$result = $egali_bd->query("select cotacao from egali_cotacoes where moeda = '".$destino["moedaCod"]."'");
							if($result->num_rows) {
								$row = $result->fetch_assoc();
								$valor = number_format($row["cotacao"],2,",",".");
							} else {
								$valor = "?";
							}
							?>
							<h4>R$ <?php echo $valor;?></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-sun"></i></div>
						<div class="text-icons">
							<span>Temperatura local</span>
							<h4>???º</h4>
						</div>
					</div>
				</div>
				<div class="line-h-100"></div>
				<div class="line-h-166 mx-auto"></div>
			</div>
		</div>
	</section>

	<!-- GALLERY IMAGES E VIDEOS -->
	<?php
	if(isset($destino["fotosVideos"]) && is_array($destino["fotosVideos"])) {
		?>
		<section class="main-gallery" id="fotosVideos">
			<div class="container">
				<div class="row">
					<div class="col-12"><h4>FOTOS E VÍDEOS</h4></div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="owl-carousel owl-theme" id="destino_sliderFotosVideos">
							<?php
							foreach($destino["fotosVideos"] as $mediaItem) {
								?>
								<div class="item">
									<?php
									if(strlen($mediaItem) == 11) {
										?>
										<iframe width="360" height="180" src="https://www.youtube.com/embed/<?php echo $mediaItem;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
										<?php
									} else {
										?>
										<a href="<?php echo $mediaItem; ?>" data-lightbox="destinoFotosVideos" data-title="<?php the_title();?>">
											<div style="width:360px;height:180px;background-image:url(<?php echo $mediaItem; ?>);background-size:cover"  title="<?php the_title();?>"></div>
										</a>
										<?php
									}
									?>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
	?>

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
					<span><b>Código DDI:</b> <?php echo $destino["guiaVivencia"]["codDDI"] ?></span>
					<span><b>Código DDD:</b> <?php echo $destino["guiaVivencia"]["codDDD"] ?></span>
				</div>
				<div class="col-12 col-lg-7">
					<div class="line-v-2"></div>
					<span><b>FUSO HORÁRIO:</b> <?php echo $destino["guiaVivencia"]["fusoTxt"] ?></span>
					<span><b>TEMPERATURA:</b> <?php echo $destino["guiaVivencia"]["temperaturasTxt"] ?></span>
				</div>
				<div class="col-12 col-lg-3">
					<div class="line-v-2"></div>
					<span><b>VOLTAGEM:</b> 110V</span>
					<span><b>MOEDA:</b> <?php echo $destino["moeda"] ?></span>
				</div>
			</div>
		</div>
	</section>
	<!-- COST LIVING -->
	<section class="main-cost-living">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="phone-emergency"><b>TELEFONE DE EMERGÊNCIA:</b> <?php echo $destino["guiaVivencia"]["foneEmergencia"] ?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h4>CUSTO DE VIDA NA CIDADE</h4>
					<div class="line-h-8"></div>
					<div class="owl-carousel owl-theme mt-5" id="destino_sliderCustoVida">
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-cutlery"></i></a>
							<a href="#"><h6>REFEIÇÃO EM RESTURANTE ESTUDANTIL</h6></a>
							<span class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["refeicao"],2,",",".");?></span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-view-carousel"></i></i></a>
							<a href="#"><h6>MC MEAL OU COMBO EQUIVALENTE NO MC DONALD'S</h6></a>
							<span class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["mcmeal"],2,",",".");?></span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-drink"></i></a>
							<a href="#"><h6>COCA-COLA (300ML)</h6></a>
							<span class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["cocacola"],2,",",".");?></span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
							<a href="#"><h6>1 BAGUETE DE PÃO</h6></a>
							<span class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["baguete"],2,",",".");?></span>
						</div>
						<div class="item">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-bus"></i></a>
							<a href="#"><h6>TICKET DE ÔNIBUS (IDA OU VOLTA)</h6></a>
							<span class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["onibus"],2,",",".");?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- OPTIONS TRANSPORTATION -->
	<?php
	if(isset($destino["transporte"]) && is_array($destino["transporte"])) {
		?>
		<section class="main-options-transportation">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h4>OPÇÕES DE TRANSPORTE</h4>
					</div>
				</div>
				<div class="row">
					<?php
					foreach($destino["transporte"] as $transporte) {
						?>
						<div class="col-12 col-lg-6">
							<div class="line-v-2"></div>
							<div class="content-txt">
								<span><b><?php echo $transporte["titulo"] ?></b></span>
								<p><?php echo $transporte["descricao"] ?></p>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>
		<?php
	}
	?>

	<!-- ATTRACTIONS -->
	<?php
	if(isset($destino["atracoes"]) && is_array($destino["atracoes"])) {
		?>
		<section class="main-cards-slider">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h4>ATRAÇÕES</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="owl-carousel cards-slider owl-theme" id="destino_sliderAtracoes">
							<?php
							foreach($destino["atracoes"] as $atracao) {
								?>
								<div class="item">
									<div class="card">
										<div style="width:265px;height:180px;background-size:cover;background-image:url(<?php echo $atracao["imagem"] ?>)"></div>
										<div class="card-body">
											<span><?php echo $atracao["titulo"] ?></span>
											<p class="card-text"><?php echo $atracao["descricao"] ?></p>
											<div class="line-h-2"></div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
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
		<?php
	}
	?>


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
							<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image" title="">
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
							<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image" title="">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image" title="">
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
							<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image" title="">
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
							<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image" title="">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image" title="">
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
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
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
					<img src="<?php echo get_theme_file_uri(); ?>/img/img-depoiment-01.png" alt="Imagem depoimentos" class="rounded-circle">
				</div>
				<div class="col-12 col-lg-5 text-center text-lg-left">
					<h6>LÉIA RODRIGUES / <span class="location">LONDRES</span></h6>
					<span class="description">CURSOS + TRABALHO</span>
					<p>Pude realizar sonhos, conhecer novas culturas, fazer novas amizades e ganhar novos conhecimentos durante o meu intercâmbio para Londres em dezembro de 2013. A Egali fez parte disso me acomodando, orientando e sendo família no sonho que eu não queria que acabasse.</p>
					<div class="line-h-6"></div>
				</div>
				<div class="col-12 col-lg-1 text-center text-md-center text-lg-left">
						<img src="<?php echo get_theme_file_uri(); ?>/img/img-depoiment-01.png" alt="Imagem depoimentos" class="rounded-circle">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
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
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
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
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">LOREM IPSUM DOLOR SIT AMET DONEC LIRIAM MAXIMUS CRAS ET ORNARE NUNC, SED</h5></a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body">
							<a href="#"><h5 class="card-title">LOREM IPSUM DOLOR SIT AMET DONEC LIRIAM MAXIMUS CRAS ET ORNARE NUNC, SED</h5></a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
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
<script>

	//atualiza horário local do destino
	atualizaHoraDestino = function() {
		horaDestino = new Date(horaDestino.valueOf() + 1000);
		var horaVisual = horaDestino.toTimeString().split(" ")[0];
		document.getElementById("horaDestino").innerHTML = horaVisual;
	}
	<?
	$timeOffset = time() + 3600*($destino["fuso"]+date("I"));
	?>
	var horaDestino = new Date( <?php echo gmdate("Y",$timeOffset);?> , <?php echo gmdate("n",$timeOffset);?> , <?php echo gmdate("j",$timeOffset);?> , <?php echo gmdate("H",$timeOffset);?> , <?php echo gmdate("i",$timeOffset);?> , <?php echo gmdate("s",$timeOffset);?> , 0);
	
	var atualizaHora = setInterval(atualizaHoraDestino,1000);

	atualizaHoraDestino();

</script>

<?php


get_footer();
