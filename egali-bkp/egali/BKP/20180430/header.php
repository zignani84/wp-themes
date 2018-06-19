<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=11">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- HEADER -->
	<header class="sticky-top">
			<!-- TOOL BAR -->
			<section class="tool-bar d-none d-sm-none d-lg-block d-xl-block">
					<div class="container">
							<div class="row">
									<div class="col-lg-8">
											<div class="line-v"></div>
											<a class="links-tool-bar" href="#">NOSSAS LOJAS</a> 
											<div class="line-v"></div>
											<a class="links-tool-bar" href="#">FALE COM A EGALI</a>
											<div class="line-v"></div>
											<a class="links-tool-bar" href="#">BASES NO EXTERIOR</a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-facebook"></i></a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-twitter"></i></a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-instagram"></i></a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-youtube-play"></i></a>
									</div>
									<div class="col-lg-4">
											<a class="links-tool-bar p-lr-040" href="#">PORTAL DO ALUNO</a>
											<a class="links-tool-bar p-lr-20" href="#"><i class="zmdi zmdi-account-o"></i></a>
											<div class="line-v m-r-20"></div>
											<a href="#" class="cta-tool-bar" data-toggle="modal" data-target="#exampleModalCenter">ORÇAMENTO FÁCIL</a>
									</div>
							</div>
					</div>
			</section>
			<!-- NAV BAR -->
			<section class="main-menu">
				<div class="container">
					<nav class="navbar navbar-expand-lg btco-hover-menu navbar-light">
						<?php
							if (is_singular( ['post'] ) || is_archive( ['post'] )){
						?>
						<a class="navbar-brand mx-md-auto mx-auto " href="#">
							<img class="img-fluid float-left" src="<?php echo get_theme_file_uri(); ?>/img/logo-blog.png" alt="LOGO BLOG" title="" />
						</a>
						<div class="line-v-1 d-none d-lg-block"></div>
						<a class="navbar-brand mx-md-auto mx-auto " href="#">
							<img class="img-fluid d-none d-lg-block float-left mt-2" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-blog.png" alt="Logo Egali" title="" />
							<img class="d-block d-sm-block d-lg-none mx-md-auto mx-auto" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-mobile.png" alt="Logo Egali" title="" />
						</a>
						<?php
							}else{
						?>
						<a class="navbar-brand mx-md-auto mx-auto " href="#">
							<img class="img-fluid d-none d-lg-block" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali.png" alt="Logo Egali" title="" />
							<img class="d-block d-sm-block d-lg-none mx-md-auto mx-auto" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-mobile.png" alt="Logo Egali" title="" />
						</a>
						<?php
							} 
						?>
						<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="zmdi zmdi-menu"></i>
						</button>
						<a id="menu-toggle" class="menu-right d-block d-sm-block d-lg-none" href="#"><i class="zmdi zmdi-more-vert"></i></a>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<?php
									if (is_singular( ['post'] ) || is_archive( ['post'] )){
								?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Assuntos
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<div class="container">
											<div class="row">
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
														<a class="nav-link active" href="#">Nome item</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">Nome item</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">Nome item</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">Nome item</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php
									}else{
								?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinos</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<div class="container">
											<div class="row">
												<?php
											//busca destinos
											$argsDestinos = array(
												'posts_per_page'	=> -1,
												'post_type'		=> 'destino'
											);
											$buscaDestinos = new WP_Query($argsDestinos);
											if($buscaDestinos->have_posts()) {
												$destinos = array();
												while ($buscaDestinos->have_posts()) {

													$buscaDestinos->the_post();
													$destino_id = get_the_ID();
													$titulo = get_the_title();
													$link = get_the_permalink();

													$locais = get_the_terms($destino_id,'local');
													$pais = false;
													foreach($locais as $loc) {
														$loc = (array)$loc;
														if($loc["parent"] == 0) {
															$pais = $loc["name"];
														}
													}
													if($pais) {
														$destinos[$pais][] = array( 'nome' => $titulo , 'link' => $link );
													}


												}

											}
											ksort($destinos);
											
											echo "<!--";
											var_dump($destinos);
											echo "-->";

											wp_reset_query();
											
											?>
											
											
											
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php
									} 
								?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php
										if (is_singular( ['post'] ) || is_archive( ['post'] )){
									?>
										Países
									<?php
										}else{
									?>
										INTERCÂMBIO
									<?php
										} 
									?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<div class="container">
											<div class="row">
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php
										if (is_singular( ['post'] ) || is_archive( ['post'] )){
									?>
										Últimos Posts
									<?php
										}else{
									?>
										PROMOÇÕES
									<?php
										} 
									?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<div class="container">
											<div class="row">
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php
										if (is_singular( ['post'] ) || is_archive( ['post'] )){
									?>
										Eventos
									<?php
										}else{
									?>
										Outros serviços
									<?php
										} 
									?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<div class="container">
											<div class="row">
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php
									if (is_singular( ['post'] ) || is_archive( ['post'] )){
								?>
								<li class="nav-item">
									<a class="nav-link link-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Site egali
									</a>
									
								</li>
								<li class="nav-item">
									<a href="#toggle-search" class="animate"><i class="zmdi zmdi-search"></i></a>
								</li>
								<?php
									}else{
								?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										A egali
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<div class="container">
											<div class="row">
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" href="#">África do Sul</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" href="#">Cidade do Cabo</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="nav-item">
									<a class="cta-nav" href="#">
											Blog
									</a>
								</li>
								<li class="nav-item">
									<a href="#toggle-search" class="animate"><i class="zmdi zmdi-search"></i></a>
								</li>
								<?php
									} 
								?>
							</ul>
						</div>
					</nav>
				</div>
			</section>
			<!-- SEARCH -->
			<div class="bootsnipp-search animate">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
											<div class="input-group">
													<input type="text" class="form-control" id="txtPesquisar" placeholder="Pesquisar" />
													<span class="input-group-btn">
															<button class="btn btn-danger" type="reset"><i class="zmdi zmdi-close"></i></button>
													</span>
											</div>
									</div>
							</div>
					</div>
			</div>
	</header>
