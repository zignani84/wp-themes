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
											<a class="links-tool-bar" href="<?php echo get_site_url();?>/lojas/">NOSSAS LOJAS</a> 
											<div class="line-v"></div>
											<a class="links-tool-bar" href="<?php echo get_site_url();?>/fale-conosco/">FALE COM A EGALI</a>
											<div class="line-v"></div>
											<a class="links-tool-bar" href="<?php echo get_site_url();?>/base/">BASES NO EXTERIOR</a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-facebook"></i></a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-twitter"></i></a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-instagram"></i></a>
											<a class="links-tool-bar icons" href="#"><i class="zmdi zmdi-youtube-play"></i></a>
									</div>
									<div class="col-lg-4">
											<a class="links-tool-bar p-lr-040" href="http://egali.com.br/area-aluno/login">PORTAL DO ALUNO</a>
											<a class="links-tool-bar p-lr-20" href="#"><i class="zmdi zmdi-account-o"></i></a>
											<div class="line-v m-r-20"></div>
											<a href="#" class="cta-tool-bar" data-toggle="modal" data-target="#exampleModalCenter">ORÇAMENTO FÁCIL</a>
									</div>
							</div>
					</div>
			</section>


			<?php
			global $egali_globais;

			if ( is_home() || is_category() || is_singular('post') ){

				// *** MENU DO BLOG ***

				?>

				<!-- NAV BAR -->
				<section class="main-menu">
					<div class="container">
						<nav class="navbar navbar-expand-lg btco-hover-menu navbar-light">
							<a class="navbar-brand mx-md-auto mx-auto " href="<?php echo get_site_url();?>/blog/">
								<img class="img-fluid float-left" src="<?php echo get_theme_file_uri(); ?>/img/logo-blog.png" alt="EGALI BLOG" title="" />
							</a>
							<div class="line-v-1 d-none d-lg-block"></div>
							<a class="navbar-brand mx-md-auto mx-auto " href="<?php echo get_site_url();?>">
								<img class="img-fluid d-none d-lg-block float-left mt-2" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-blog.png" alt="Logo Egali" title="" />
								<img class="d-block d-sm-block d-lg-none mx-md-auto mx-auto" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-mobile.png" alt="Logo Egali" title="" />
							</a>
							<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="zmdi zmdi-menu"></i>
							</button>
							<a id="menu-toggle" class="menu-right d-block d-sm-block d-lg-none" href="#"><i class="zmdi zmdi-more-vert"></i></a>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ASSUNTOS </a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<div class="container">
												<div class="row">
												
													<?php
													foreach($egali_globais["assuntos"] as $assunto) {
														?>
														<div class="col-md-3">
															<ul class="nav flex-column">
																<li class="nav-item">
																<a class="nav-link active" href="<?php echo get_site_url();?>/blog/assunto/<?php echo $assunto["slug"];?>"><?php echo $assunto["nome"];?></a>
																</li>
															</ul>
														</div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
									</li>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PAÍSES </a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<div class="container">
												<div class="row">

													<?php
													foreach($egali_globais["locais"] as $pais) {
														?>
														<div class="col-md-3">
															<ul class="nav flex-column">
																<li class="nav-item"><a class="nav-link active" href="/local/<?php echo $pais["slug"];?>/?post_type=post"><?php echo $pais["nome"];?></a></li>
																<?php
																foreach($pais["cidades"] as $cidade) {
																	?>
																	<li class="nav-item"><a class="nav-link" href="/local/<?php echo $cidade["slug"];?>/?post_type=post"><?php echo $cidade["nome"];?></a></li>
																	<?php
																}
																?>
															</ul>
														</div>
														<?php
													}
													?>

												</div>
											</div>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ÚLTIMOS POSTS </a>
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
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eventos </a>
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
										<a class="nav-link link-nav" href="/">Site egali</a>
										
									</li>
									<li class="nav-item">
										<a href="#toggle-search" class="animate"><i class="zmdi zmdi-search"></i></a>
									</li>

								</ul>
							</div>
						</nav>
					</div>
				</section>





				<?php
			} else {

				// *** MENU DO SITE ***

				?>


				<!-- NAV BAR -->
				<section class="main-menu">
					<div class="container">
						<nav class="navbar navbar-expand-lg btco-hover-menu navbar-light">
							<a class="navbar-brand mx-md-auto mx-auto " href="<?php echo get_site_url();?>">
								<img class="img-fluid d-none d-lg-block" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali.png" alt="Logo Egali" title="" />
								<img class="d-block d-sm-block d-lg-none mx-md-auto mx-auto" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-mobile.png" alt="Logo Egali" title="" />
							</a>
							<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="zmdi zmdi-menu"></i>
							</button>
							<a id="menu-toggle" class="menu-right d-block d-sm-block d-lg-none" href="#"><i class="zmdi zmdi-more-vert"></i></a>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinos </a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<div class="container">
												<div class="row">

													<?php
													foreach($egali_globais["destinos"] as $pais) {
														?>
														<div class="col-md-3">
															<ul class="nav flex-column">
																<li class="nav-item"><a class="nav-link active" href="#"><?php echo $pais["nome"];?></a></li>
																<?php
																foreach($pais["cidades"] as $destino) {
																	?>
																	<li class="nav-item">
																		<a class="nav-link" href="<?php echo $destino["link"];?>"><?php echo $destino["nome"];?></a>
																	</li>
																	<?php
																}
																?>
															</ul>
														</div>
														<?php
													}
													?>

												</div>
											</div>
										</div>
									</li>

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INTERCÂMBIO </a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<div class="container">
												<div class="row">

													<?php
													foreach($egali_globais["intercambios"] as $tipo) {
														?>
														<div class="col-md-3">
															<ul class="nav flex-column">
																<li class="nav-item"><a class="nav-link active" href="#"><?php echo $tipo["nome"];?></a></li>
																<?php
																foreach($tipo["cursos"] as $curso) {
																	?>
																	<li class="nav-item">
																		<a class="nav-link" href="<?php echo $curso["link"];?>"><?php echo $curso["nome"];?></a>
																	</li>
																	<?php
																}
																?>
															</ul>
														</div>
														<?php
													}
													?>

												</div>
											</div>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROMOÇÕES </a>
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
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Outros serviços </a>
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
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">A egali </a>
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
										<a class="cta-nav" href="<?php echo get_site_url();?>/blog">Blog</a>
									</li>
									<li class="nav-item">
										<a href="#toggle-search" class="animate"><i class="zmdi zmdi-search"></i></a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</section>

				<?php
			}
			?>







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
