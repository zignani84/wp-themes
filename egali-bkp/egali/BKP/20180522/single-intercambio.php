<?php
get_header();

$intercambio = get_post_meta($post->ID,'intercambio_dados',true);
$fraseDestaque = get_post_meta($post->ID,'intercambio_fraseDestaque',true);
$textoPrincipal = get_post_meta($post->ID,'intercambio_textoPrincipal',true);

?>

<!-- MAIN -->
<main>
	<!-- BANNER -->
	<section class="banne-internal" style="background-image:url(<?php echo $intercambio["imagemDestaque"]; ?>)"></section>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo get_site_url();?>/intercambio">Intercâmbios</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page">
		<div class="container">
			<div class="row">
				<div class="col-9">
					<h1><?php the_title();?></h1>
					<div class="line-h-6 mt-4"></div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="to-share mt-3 addthis_toolbox addthis_default_style">
						<span class="float-left">Compartilhar</span>
						<a class="addthis_button_facebook"><i class="zmdi zmdi-facebook"></i></a>
						<a class="addthis_button_twitter"><i class="zmdi zmdi-twitter"></i></a>
						<!--<a class="addthis_button_instagram"><i class="zmdi zmdi-instagram"></i></a>-->
					</div>
				</div>
				
			</div>
			<div class="row mt-5">
				<div class="col-12 col-sm-7 col-lg-7">
					<?php
					$textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$textoPrincipal))."</p>";
					echo $textoPrincipal;
					?>
					<div class="line-h-100"></div>
					<a href="<?php echo get_site_url();?>/fale-conosco" class="btn btn-secondary no-bg-after">FALE CONOSCO</a>
				</div>
				<div class="d-none d-lg-block col-lg-1">
					<div class="line-v-100 mx-auto"></div>
				</div>
				<div class="col-12 col-sm-4 col-lg-4">
					<ul class="description-courses">
						<li><i class="zmdi zmdi-graduation-cap"></i> <?php echo $intercambio["preRequisito"]; ?></li>
						<li><i class="zmdi zmdi-cake"></i> <?php echo $intercambio["idade"]; ?></li>
						<li><i class="zmdi zmdi-time"></i> <?php echo $intercambio["duracao"]; ?></li>
						<li><i class="zmdi zmdi-timer"></i> <?php echo $intercambio["inicio"]; ?></li>
						<li><i class="zmdi zmdi-calendar-note"></i> <?php echo $intercambio["cargaHoraria"]; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<!-- DESTINATIONS -->
	<section class="main-destinations">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h5 class="mb-4">Destinos</h5>
				</div>
				<div class="col-6 col-md-6 col-lg-2">
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">África do Sul</a></li>
						<li class="itens"><a class="itens-nav" href="#">Cidade do Cabo</a></li>
					</ul> 
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">Alemanha</a></li>
						<li class="itens"><a class="itens-nav" href="#">Berlin</a></li>
					</ul>
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">Argentina</a></li>
						<li class="itens"><a class="itens-nav" href="#">Buenos Aires</a></li>
					</ul>  
				</div>
				<div class="col-6 col-md-6 col-lg-2">
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">Austrália</a></li>
						<li class="itens"><a class="itens-nav" href="#">Brisbane</a></li>
						<li class="itens"><a class="itens-nav" href="#">Cairns</a></li>
						<li class="itens"><a class="itens-nav" href="#">Gold Coast</a></li>
						<li class="itens"><a class="itens-nav" href="#">Melbourne </a></li>
						<li class="itens"><a class="itens-nav" href="#">Perth</a></li>
						<li class="itens"><a class="itens-nav" href="#">Sydney</a></li>
					</ul> 
				</div>
				<div class="col-6 col-md-6 col-lg-2">
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">Canadá</a></li>
						<li class="itens"><a class="itens-nav" href="#">Calgary</a></li>
						<li class="itens"><a class="itens-nav" href="#">Montreal</a></li>
						<li class="itens"><a class="itens-nav" href="#">Toronto</a></li>
						<li class="itens"><a class="itens-nav" href="#">Vancouver</a></li>
						<li class="itens"><a class="itens-nav" href="#">Victoria </a></li>
					</ul>
				</div>
				<div class="col-6 col-md-6 col-lg-2">
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">Chile</a></li>
						<li class="itens"><a class="itens-nav" href="#">Santiago</a></li>
					</ul>  
					<ul class="box-itens mt-5">
						<li class="itens-title"><a class="itens-nav" href="#">Espanha</a></li>
						<li class="itens"><a class="itens-nav" href="#">Barcelona</a></li>
						<li class="itens"><a class="itens-nav" href="#">Madri</a></li>
						<li class="itens"><a class="itens-nav" href="#">Salamanca</a></li>
					</ul> 
				</div>
				<div class="col-6 col-md-6 col-lg-2">
					<ul class="box-itens">
						<li class="itens-title"><a class="itens-nav" href="#">Estados Unidos</a></li>
						<li class="itens"><a class="itens-nav" href="#">Boston</a></li>
						<li class="itens"><a class="itens-nav" href="#">Chicago</a></li>
						<li class="itens"><a class="itens-nav" href="#">Fort Lauderdale</a></li>
						<li class="itens"><a class="itens-nav" href="#">Honolulu</a></li>
						<li class="itens"><a class="itens-nav" href="#">Los Angeles</a></li>
						<li class="itens"><a class="itens-nav" href="#">Miami</a></li>
					</ul> 
				</div>
				<div class="col-6 col-md-6 col-lg-2">
					<ul class="box-itens">
						<li class="itens"><a class="itens-nav" href="#">Nova York</a></li>
						<li class="itens"><a class="itens-nav" href="#">Philadelphia</a></li>
						<li class="itens"><a class="itens-nav" href="#">San Diego</a></li>
						<li class="itens"><a class="itens-nav" href="#">San Francisco</a></li>
						<li class="itens"><a class="itens-nav" href="#">Santa Mônica</a></li>
						<li class="itens"><a class="itens-nav" href="#">Washington D.C</a></li>
					</ul> 
				</div>
			</div>
		</div>
	</section>
		
	<?php
	require "inc/inc_bloco_diferenciais.php";

	require "inc/inc_bloco_cadastraNews.php";
	?>

</main>

<?php
get_footer();
