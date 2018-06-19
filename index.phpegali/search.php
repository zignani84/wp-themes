<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package egali
 */

get_header();
?>

<!-- MAIN -->
<main>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">RESULTADO DA PESQUISA</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-result-search mt-150">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>RESULTADO DA PESQUISA</h1>
					<div class="line-h-6 mt-4"></div>
					<div class="line-h-100 line-grey mb-4"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-3 col-lg-2">
					<a href="#" class="btn btn-primary mb-3">IR PARA HOME</a>
				</div>
				<div class="col-12 col-md-5 col-lg-7">
					<form role="search" method="get" class="search-form" action="<?php echo get_site_url();?>/">
						<input type="search" class="search-field form-control" placeholder="Nova pesquisa" value="" name="s">
						<i class="zmdi zmdi-search"></i>
					</form>
				</div>
			</div>
		</div>
		<div class="line-h-100 line-grey mt-3 mb-5"></div>
		<div class="container">
			<div class="row">
				<?php
				if(have_posts()) {
					while(have_posts()) {
						the_post();
						?>
						<div class="col-12">
							<h6 class="mb-3"><?php the_title(); ?></h6>
							<span><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span>
							<p><?php the_excerpt(); ?></p>
							<div class="line-h-100 line-grey mt-4 mb-4"></div>
						</div>
						<?php
					}
				} else {
					?>
					<div class="col-12">
						<h6>Não foram encontrados resultados para a busca de "<?php echo $_GET["s"];?>"</h6>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
