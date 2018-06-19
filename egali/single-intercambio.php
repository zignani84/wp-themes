<?php
get_header();

$intercambio = get_post_meta($post->ID,'intercambio_dados',true);
$fraseDestaque = get_post_meta($post->ID,'intercambio_fraseDestaque',true);
$textoPrincipal = get_post_meta($post->ID,'intercambio_textoPrincipal',true);
$imgUrl = get_relative_thumb($intercambio["imagemDestaque"],'large');
$locaisRelacionados = get_the_terms($post->ID,"local");
?>

<!-- MAIN -->
<main>
	<!-- BANNER -->
	<section class="banne-internal mt-150" style="background-image:url(<?php echo $imgUrl; ?>)"></section>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>"><?php _e('Home','egali'); ?></a></li>
						<li class="breadcrumb-item"><a href="<?php echo get_site_url();?>/intercambio"><?php _e('Intercâmbios','egali'); ?></a></li>
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
						<span class="float-left"><?php _e('Compartilhar','egali'); ?></span>
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
					<a href="<?php echo get_site_url();?>/fale-conosco" class="btn btn-secondary no-bg-after"><?php _e('FALE CONOSCO','egali'); ?></a>
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
	

		
	<?php
	require "inc/inc_bloco_destinos.php";

	require "inc/inc_bloco_diferenciais.php";

	require "inc/inc_bloco_cadastraNews.php";
	?>

</main>

<?php
get_footer();
