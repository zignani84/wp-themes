<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=11">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PB96TTS');</script>
	<!-- End Google Tag Manager -->

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0';
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<script>
		var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var userLocation = <?php echo isset($_SESSION["userLocation"])? json_encode($_SESSION["userLocation"]):"null"; ?>;
	</script>

	<?php 
		wp_head();
		$fale_conosco_link = ( is_home() || is_category() || preg_match("/local/", $_SERVER['REQUEST_URI']) || is_singular('post') || preg_match("/blog/", $_SERVER['REQUEST_URI']) ) ? get_site_url().'/fale-conosco?blog' : get_site_url().'/fale-conosco';
	?>
</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PB96TTS"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="opacity-main-nav"></div>
	<!-- HEADER -->
	<header id="header">
		<!-- TOOL BAR -->
		<section class="tool-bar d-none d-sm-none d-lg-block d-xl-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="line-v"></div>
						<a class="links-tool-bar" href="<?php echo get_site_url();?>/loja"><?php _e('NOSSAS LOJAS','egali'); ?></a> 
						<div class="line-v"></div>
						<a class="links-tool-bar" href="<?php echo $fale_conosco_link; ?>"><?php _e('FALE COM A EGALI','egali'); ?></a>
						<div class="line-v"></div>
						<a class="links-tool-bar" href="<?php echo get_site_url();?>/base"><?php _e('BASES NO EXTERIOR','egali'); ?></a>
						<a class="links-tool-bar icons" href="https://www.facebook.com/Egali.Intercambio" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
						<a class="links-tool-bar icons" href="https://twitter.com/egali_no_mundo" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
						<a class="links-tool-bar icons" href="https://www.instagram.com/egali_intercambio/" target="_blank"><i class="zmdi zmdi-instagram"></i></a>
						<a class="links-tool-bar icons" href="https://www.youtube.com/user/CanalEgali?sub_confirmation=1" target="_blank"><i class="zmdi zmdi-youtube-play"></i></a>
					</div>
					<div class="col-lg-4">
						<a class="links-tool-bar p-lr-040" href="http://egali.com.br/area-aluno/login"><?php _e('PORTAL DO ALUNO','egali') ?></a>
						<a class="links-tool-bar p-lr-20" href="http://egali.com.br/area-aluno/login"><i class="zmdi zmdi-account-o"></i></a>
						<div class="line-v m-r-20"></div>
						<a href="#" class="cta-tool-bar" data-toggle="modal" data-target="#exampleModalCenter"><?php _e('ORÇAMENTO FÁCIL','egali') ?></a>
					</div>
				</div>
			</div>
		</section>

			<?php
			global $egali_globais;

			if ( is_home() || is_category() || preg_match("/local/", $_SERVER['REQUEST_URI']) || is_singular('post') || preg_match("/blog/", $_SERVER['REQUEST_URI']) ){
				// *** MENU DO BLOG ***
				$argsBlog = array( 
					'post_type' => 'post', 
					'posts_per_page' => 5,
					'showposts' => 5 
				);
				$blog = new WP_Query( $argsBlog );
				?>

				<!-- NAV BAR -->
				<section class="main-menu">
					<div class="container">
						<nav class="navbar navbar-expand-lg btco-hover-menu navbar-light">
							<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<div id="nav-icon">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
							</button>
							<a class="navbar-brand mx-md-auto" href="<?php echo get_site_url();?>/blog/">
								<img class="img-fluid float-left d-none d-lg-block" src="<?php echo get_theme_file_uri(); ?>/img/logo-falando-intercambio-egali.jpg" alt="BLOG EGALI - FALANDO DE INTERCÂMBIO" title="" />
								<img class="img-fluid float-left d-block d-lg-none" src="<?php echo get_theme_file_uri(); ?>/img/logo-mobile-falando-intercambio-egali.jpg" alt="BLOG EGALI - FALANDO DE INTERCÂMBIO" title="" />
							</a>
							<div class="line-v-1 d-none d-lg-block"></div>
							<a class="navbar-brand mx-md-auto" href="<?php echo get_site_url();?>">
								<img class="img-fluid logo-active" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-blog.png" alt="Logo Egali" title="" />
								<img class="img-fluid logo-sticky" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-sticky.png" alt="Logo Egali" title="" />
								<img class="d-block d-sm-block d-lg-none mx-md-auto mx-auto pb-2 pt-2 pb-lg-0 pt-lg-0" src="<?php echo get_theme_file_uri(); ?>/img/logo-mobile-egali-sticky.png" alt="Logo Egali" title="" />
							</a>
							

							<div class="float-right">
								<a href="#toggle-search" class="animate d-block d-sm-block d-lg-none"><i class="zmdi zmdi-search"></i></a>
								<a href="/fale-conosco/" class="animate d-block d-sm-block d-lg-none mr-3"><i class="zmdi zmdi-comments"></i></a>
							</div>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php _e('ASSUNTOS','egali'); ?> </a>

										<div class="dropdown-menu col-one" aria-labelledby="navbarDropdown">
											<ul>
												
												<?php
												foreach($egali_globais["assuntos"] as $assunto) {
													if($assunto["nome"] != "Uncategorized") {
														?>
															<li>
																<a class="nav-link" href="<?php echo get_site_url();?>/blog/assunto/<?php echo $assunto["slug"];?>"><?php echo $assunto["nome"];?></a>
															</li>
														<?php
													}
												}
												?>

											</ul>
										</div>
									</li>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php _e('PAÍSES','egali'); ?> </a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<ul>

											<?php
											foreach($egali_globais["locais"] as $pais) {
											?>
												<li><a class="nav-link active mt-lg-4 mb-2 text-uppercase" href="/local/<?php echo $pais["slug"];?>/"><?php echo $pais["nome"];?></a></li>
													<?php
													foreach($pais["cidades"] as $cidade) {
														?>
														<li><a class="nav-link" href="/local/<?php echo $cidade["slug"];?>/"><?php echo $cidade["nome"];?></a></li>
													<?php
													}
													?>
												</li>
											<?php
											}
											?>

											</ul>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php _e('ÚLTIMOS POSTS','egali'); ?> </a>
										<div class="dropdown-menu col-one" aria-labelledby="navbarDropdown">
											<ul>
												<?php 
												if($blog->have_posts()) {
												while($blog->have_posts()):$blog->the_post();
												$titulo = get_the_title();
												$link = get_the_permalink();
												?>

													<li>
														<a class="nav-link" href="<?php echo $link; ?>"><?php echo $titulo; ?></a>
													</li>

												<?php
												endwhile;
												}

												wp_reset_query();
												?>

											</ul>
										</div>
									</li>
									<!--
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eventos </a>
										<div class="dropdown-menu col-one" aria-labelledby="navbarDropdown">
											<ul>
												<?php
													$argsBlogEventos = array(
														'post_type' 	 => 'post',
														'posts_per_page' => 5,
														'no_found_rows'  => true,
														'tag'            => 'eventos'
													);

													$blogEventos = new WP_Query( $argsBlogEventos );
													if($blogEventos->have_posts()) {
														while($blogEventos->have_posts()):$blogEventos->the_post();
															$titulo = get_the_title();
															$link = get_the_permalink();
												?>

													<li>
														<a class="nav-link" href="<?php echo $link; ?>"><?php echo $titulo; ?></a>
													</li>

												<?php
														endwhile;
													}

													wp_reset_postdata(); 
												?>
											</ul>
										</div>
									</li>
									-->
									<li class="nav-item d-none d-sm-none d-lg-block">
										<a class="nav-link link-nav" href="<?php echo get_site_url();?>"><?php _e('Site egali','egali'); ?></a>
										
									</li>
									<li class="nav-item d-none d-sm-none d-lg-block">
										<a href="#toggle-search" class="animate"><i class="zmdi zmdi-search"></i></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>">
										<?php _e('SITE EGALI','egali'); ?>
										</a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/loja"><?php _e('NOSSAS LOJAS','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/fale-conosco?blog"><?php _e('FALE COM A EGALI','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/base"><?php _e('BASES NO EXTERIOR','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link p-lr-040" href="http://egali.com.br/area-aluno/login"><?php _e('PORTAL DO ALUNO','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><?php _e('ORÇAMENTO FÁCIL','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="links-tool-bar icons" href="https://www.facebook.com/Egali.Intercambio"><i class="zmdi zmdi-facebook"></i></a>
										<a class="links-tool-bar icons" href="https://twitter.com/egali_no_mundo"><i class="zmdi zmdi-twitter"></i></a>
										<a class="links-tool-bar icons" href="https://www.instagram.com/egali_intercambio/"><i class="zmdi zmdi-instagram"></i></a>
										<a class="links-tool-bar icons" href="https://www.youtube.com/user/CanalEgali?sub_confirmation=1"><i class="zmdi zmdi-youtube-play"></i></a>
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
							<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<div id="nav-icon">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
							</button>	
							<a class="navbar-brand mx-md-auto mx-auto logo mb-lg-3" href="<?php echo get_site_url();?>">
								<img class="img-fluid logo-active" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali.png" alt="Logo Egali" title="" />
								<img class="img-fluid logo-sticky" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-sticky.png" alt="Logo Egali" title="" />
								<img class="d-block d-sm-block d-lg-none mx-md-auto mx-auto" src="<?php echo get_theme_file_uri(); ?>/img/logo-egali-mobile.png" alt="Logo Egali" title="" />
							</a>
							<div class="float-right">
								<a href="#toggle-search" class="animate d-block d-sm-block d-lg-none"><i class="zmdi zmdi-search"></i></a>
								<a href="<?php echo get_site_url();?>/fale-conosco/" class="animate d-block d-sm-block d-lg-none mr-3"><i class="zmdi zmdi-comments"></i></a>
							</div>
							
							
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php _e('Destinos','egali'); ?> </a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<ul>

												<?php
												foreach($egali_globais["destinos"] as $pais) {
													if($pais["link"]) {
														?>
														<li><a class="nav-link active mt-3 mb-2 mt-sm-4 text-uppercase" href="<?php echo $pais["link"];?>"><?php echo $pais["nome"];?></a></li>
														<?php
														foreach($pais["cidades"] as $cidade) {
															if($cidade["link"]) {
																?>
																<li class="d-none d-md-block"><a class="nav-link" href="<?php echo $cidade["link"];?>"><?php echo $cidade["nome"];?></a></li>
																<?php
															}
														}
														?>
														
														<?php
													}
												}
												?>
												<li>
													<a class="nav-link active mt-4 mt-sm-3 text-uppercase highlight" href="<?php echo get_site_url();?>/destinos/"><?php _e('Todos os Destinos','egali'); ?></a>
												</li>
											</ul>
										</div>
									</li>

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php _e('INTERCÂMBIO','egali'); ?> </a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<ul>
												<?php
												foreach($egali_globais["intercambios"] as $tipo) {
													?>
													<li>
														<a class="nav-link active mt-3 mb-2 mt-sm-4 text-uppercase" href="<?php echo get_site_url();?>/intercambios/<?php echo $tipo["slug"];?>/"><?php echo $tipo["nome"];?></a>
													</li>
													<?php
													foreach($tipo["cursos"] as $curso) {
														?>
														<li class="d-none d-md-block"><a class="nav-link" href="<?php echo $curso["link"];?>"><?php echo $curso["nome"];?></a></li>
														<?php
													}
													?>
													<?php
												}
												?>
												<li>
													<a class="nav-link active mt-4 mt-sm-3 text-uppercase highlight" href="<?php echo get_site_url();?>/intercambios/"><?php _e('Todos os Intercâmbios','egali'); ?></a>
												</li>
											</ul>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/promocoes"><?php _e('PROMOÇÕES','egali'); ?> </a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php _e('Outros serviços','egali'); ?>
										</a>
										<div class="dropdown-menu col-one" aria-labelledby="navbarDropdown">
											<ul>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/house/"><?php _e('Houses','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/hostel/"><?php _e('Hostels','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/base/"><?php _e('Bases no Exterior','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/cambio/"><?php _e('Câmbio','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/auxilio-visto/"><?php _e('Auxílio Visto','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/seguro-viagem/"><?php _e('Seguro Viagem','egali'); ?></a>
												</li>
											</ul>
										</div>
									</li>

									<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php _e('A Egali','egali'); ?>
										</a>
										<div class="dropdown-menu col-one" aria-labelledby="navbarDropdown">
											<ul>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/quem-somos/"><?php _e('Quem Somos','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/loja/"><?php _e('Lojas','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/fale-conosco/"><?php _e('Fale Conosco','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/trabalhe-conosco/"><?php _e('Trabalhe Conosco','egali'); ?></a>
												</li>
												<li>
													<a class="nav-link nav-link-title" href="<?php echo get_site_url();?>/faq/"><?php _e('FAQ','egali'); ?></a>
												</li>
											</ul>
										</div>
									</li>
									<li class="nav-item">
										<a class="cta-nav" href="<?php echo get_site_url();?>/blog"><?php _e('Blog','egali'); ?></a>
									</li>

									<li class="nav-item d-none d-sm-none d-lg-block">
										<a href="#toggle-search" class="animate"><i class="zmdi zmdi-search"></i></a>
									</li>
									<li class="nav-item links-tool-bar d-none d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/blog">
										<?php _e('BLOG','egali'); ?>
										</a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/loja"><?php _e('NOSSAS LOJAS','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/fale-conosco"><?php _e('FALE COM A EGALI','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link" href="<?php echo get_site_url();?>/base"><?php _e('BASES NO EXTERIOR','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="nav-link p-lr-040" href="http://egali.com.br/area-aluno/login"><?php _e('PORTAL DO ALUNO','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><?php _e('ORÇAMENTO FÁCIL','egali'); ?></a>
									</li>
									<li class="nav-item links-tool-bar d-block d-sm-block d-lg-none">
										<a class="links-tool-bar icons" href="https://www.facebook.com/Egali.Intercambio"><i class="zmdi zmdi-facebook"></i></a>
										<a class="links-tool-bar icons" href="https://twitter.com/egali_no_mundo"><i class="zmdi zmdi-twitter"></i></a>
										<a class="links-tool-bar icons" href="https://www.instagram.com/egali_intercambio/"><i class="zmdi zmdi-instagram"></i></a>
										<a class="links-tool-bar icons" href="https://www.youtube.com/user/CanalEgali?sub_confirmation=1"><i class="zmdi zmdi-youtube-play"></i></a>
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
							<form role="search" method="get" class="search-form" action="<?php echo get_site_url();?>/">
								<div class="input-group">
									<input type="search" class="search-field form-control" placeholder="Pesquisar" value="" name="s">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="reset"><i class="zmdi zmdi-close"></i></button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</header>
