<?php

get_header();
?>

<!-- MAIN -->
<main>
<?php
	//bloco de banners
	require "inc/inc_bloco_banners.php";
?>
	
	<!-- SECTION BLOG -->
	<section class="main-accessed">
		<div class="container">

			<?php
				//bloco de posts mais acessados
				require "inc/inc_bloco_blog-mais-acessados.php";
			?>

			<div class="row">
				<div class="col-12">
					<div class="line-h-100 mt-5 mb-5"></div>
				</div>
			</div>
			<div class="row">

				<?php
					//bloco de post fixo
					require "inc/inc_bloco_blog-post-fixo.php";
				?>
				
				<div class="col-12 col-lg-3 col-md-12">
					<div class="main-events  mb-4">
						<h5 class="mb-4">EVENTOS</h5>
						<ul class="list-news">

						<?php
							//bloco de eventos
							require "inc/inc_bloco_blog-eventos.php";
						?>

						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-9 col-md-12">
					<div class="row">

						<?php
							//bloco de todos posts
							require "inc/inc_bloco_blog-posts.php";
						?>

					</div>
					<div class="row">
						<div class="col-12 text-center">
							<a href="#" class="btn btn-secondary">VEJA MAIS POSTS</a>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-lg-3 col-md-12">
					<div class="main-register mb-5 mt-5">
						<div class="text-register">Cadastre-se para receber nossa Newsletter</div>
						<input type="email" class="form-control" placeholder="EMAIL" />
						<a href="#" class="btn btn-primary">ENVIAR</a>
					</div>
					<div class="main-banner-right">
						<img src="<?php echo get_theme_file_uri(); ?>/img/banner-vertical.png" alt="Banner faça acontecer" title="" class="img-fluid d-block d-md-none d-lg-block" />
						<img src="<?php echo get_theme_file_uri(); ?>/img/banner-horizontal.png" alt="Banner faça acontecer" title="" class="img-fluid d-none d-md-block d-lg-none" />
						<div class="bg-btn">
							<a href="#" class="btn btn-secondary">VEJA MAIS COMO</a>
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
