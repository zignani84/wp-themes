<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=11">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link type="text/css" rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/fonts/material-design-iconic-font.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
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
					<a class="navbar-brand mx-md-auto mx-auto " href="#">
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
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Destinos
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
									INTERCÂMBIO
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
									PROMOÇÕES
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
									Outros serviços
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
