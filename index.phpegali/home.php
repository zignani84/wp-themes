<?php
get_header();
?>

<!-- MAIN -->
<main>

	<?php

	//banner
	require "inc/inc_bloco_bannersBlog.php";
	
	?>
	<section class="main-accessed">
		<div class="container">
			<?php
			$slug = false;
			$arrayIds = array();
			if (isset($id_bannerBlog)) array_push($arrayIds, $id_bannerBlog);

			if(is_category()) {

				$categorias = get_the_category();
				$categoria_id = $categorias[0]->term_id;
				$categoria_nome = $categorias[0]->name;
				
				?>

				<div class="row">
					<div class="col-12">
						<div class="line-h-100 mt-5 mb-5"></div>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-lg-9 col-md-12">
						<div class="row" id="listaDinamicaPosts"></div>
						<div class="row">
							<div class="col-12 text-center">
								<a href="javascript:carregaPostsBlog();" class="btn btn-secondary">VEJA MAIS POSTS</a>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-3 col-md-12">

						<div class="main-banner-right">
							<img src="<?php echo get_theme_file_uri(); ?>/img/banner-vertical.png" alt="Banner faça acontecer" title="" class="img-fluid d-block d-md-none d-lg-block" />
							<img src="<?php echo get_theme_file_uri(); ?>/img/banner-horizontal.png" alt="Banner faça acontecer" title="" class="img-fluid d-none d-md-block d-lg-none" />
							<div class="bg-btn">
								<a href="/intercambio/" class="btn btn-secondary">VEJA MAIS COMO</a>
							</div>
						</div>

					</div>

				</div>

				<?php


			} else if(is_tax()) {

				$categoria_id = get_queried_object()->term_id;
				$slug = get_queried_object()->slug;
	
	?>

	<div class="row">
		<div class="col-12">
			<div class="line-h-100 mt-5 mb-5"></div>
		</div>
	</div>

	<div class="row">

		<div class="col-12 col-lg-9 col-md-12">
			<div class="row" id="listaDinamicaPosts"></div>
			<div class="row">
				<div class="col-12 text-center">
					<a href="javascript:carregaPostsBlog();" class="btn btn-secondary">VEJA MAIS POSTS</a>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-3 col-md-12">

			<div class="main-banner-right">
				<img src="<?php echo get_theme_file_uri(); ?>/img/banner-vertical.png" alt="Banner faça acontecer" title="" class="img-fluid d-block d-md-none d-lg-block" />
				<img src="<?php echo get_theme_file_uri(); ?>/img/banner-horizontal.png" alt="Banner faça acontecer" title="" class="img-fluid d-none d-md-block d-lg-none" />
				<div class="bg-btn">
					<a href="/intercambio/" class="btn btn-secondary">VEJA MAIS COMO</a>
				</div>
			</div>

		</div>

	</div>

	<?php

			} else {

				$categoria_id = 0;

				//Bloco com posts mais acessados
				$argsBlogMaisAcessados = array( 
					'posts_per_page'      => 5,                 // Máximo de 5 artigos
					'no_found_rows'       => true,              // Não conta linhas
					'post_status'         => 'publish',         // Somente posts publicados
					'ignore_sticky_posts' => true,              // Ignora posts fixos
					'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
					'meta_key'            => 'tp_post_counter', // A nossa post meta
					'order'               => 'DESC'             // Ordem decrescente
				);
				$blogMaisAcessados = new WP_Query( $argsBlogMaisAcessados );
				if($blogMaisAcessados->have_posts()) {
					?>
					<div class="row">
						<div class="col-12">
							<h4>MAIS ACESSADOS</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="owl-carousel accessed owl-theme" id="blog_sliderFotosVideos">

								<?php
								while($blogMaisAcessados->have_posts()) {
									$blogMaisAcessados->the_post();
									$tp_post_counter = get_post_meta( $post->ID, 'tp_post_counter', true );
									$imagem = get_relative_thumb(get_post_thumbnail_id( $post->ID ),'medium');
									$categorias = get_the_category();
									foreach($categorias as $cat) {
										if($cat->slug != 'todos-os-assuntos') {
											$categ = $cat->name;
											break;
										}
									}
									$titulo = get_the_title();
									$resumo = the_excerpt_max_charlength(140);
									$link = get_the_permalink();
									?>
									<div class="item">
										<div class="card">
											<div class="object-cover" style="background-image: url('<?php echo $imagem; ?>');"></div>
											<div class="box-category category-color-purple"><?php echo esc_html( $categ ); ?></div>
											<div class="card-body">
												<div class="line-h-6"></div>
												<h5><?php echo $titulo; ?></h5>
												<p class="card-text"><?php echo $resumo; ?></p>
												<a href="<?php echo $link;?>" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
											</div>
										</div>
									</div>
									<?php 
								}
								?>

							</div>
						</div>
					</div>

					<?php
				}

				wp_reset_postdata();

				?>

				<div class="row">
					<div class="col-12">
						<div class="line-h-100 mt-5 mb-5"></div>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-lg-9 col-md-12">
						<div class="row" id="listaDinamicaPosts"></div>
						<div class="row">
							<div class="col-12 text-center">
								<a href="javascript:carregaPostsBlog();" class="btn btn-secondary">VEJA MAIS POSTS</a>
							</div>
						</div>
					</div>


					<div class="col-12 col-lg-3 col-md-12">

						<div class="main-banner-right">
							<img src="<?php echo get_theme_file_uri(); ?>/img/banner-vertical.png" alt="Banner faça acontecer" title="" class="img-fluid d-block d-md-none d-lg-block" />
							<img src="<?php echo get_theme_file_uri(); ?>/img/banner-horizontal.png" alt="Banner faça acontecer" title="" class="img-fluid d-none d-md-block d-lg-none" />
							<div class="bg-btn">
								<a href="/intercambio/" class="btn btn-secondary">VEJA MAIS COMO</a>
							</div>
						</div>

					</div>


				</div>

				<!--
				<div class="row">
					<div class="col-12 col-lg-3 col-md-12">
						<div class="main-events  mb-4">
							<h5 class="mb-4">POSTS MAIS RECENTES</h5>
							<ul class="list-news" id="listaDinamicaPosts">
							</ul>
						</div>
					</div>
				</div>
				-->

				<?php

			}

			$ids = implode(", ", $arrayIds);

			?>

		</div>
	</section>

	<?php
        //bloco de newsletter
        require "inc/inc_bloco_cadastraNews.php";
	?>

</main>
<script type="text/javascript">
	var blogAjax = { categoria:<?php echo $categoria_id;?> , pagina:1 , carregando:false, slug:'<?php echo $slug ?>', ids:<?php echo $ids;?> };
</script>

<?php
get_footer();
