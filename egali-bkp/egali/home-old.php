<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
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
			//Bloco com posts mais acessados de blog - repete em várias páginas do site

				$argsBlogMaisAcessados = array( 
					'posts_per_page'      => 5,                 // Máximo de 5 artigos
					'no_found_rows'       => true,              // Não conta linhas
					'post_status'         => 'publish',         // Somente posts publicados
					'ignore_sticky_posts' => true,              // Ignora posts fixos
					'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
					'meta_key'            => 'tp_post_counter', // A nossa post meta
					'order'               => 'DESC'             // Ordem decrescente
				);
				if (is_category()){
					$argsBlogMaisAcessados = array(
						'posts_per_page'      => 5,
						'no_found_rows'       => true,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
						'orderby'             => 'meta_value_num',
						'meta_key'            => 'tp_post_counter',
						'order'               => 'DESC',
						'cat'                 => $category_id
					);
				}
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
									while($blogMaisAcessados->have_posts()):$blogMaisAcessados->the_post();
										$tp_post_counter = get_post_meta( $post->ID, 'tp_post_counter', true );
										if ( has_post_thumbnail()) { 
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
											$title_image = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
											$categories = get_the_category();
											$titulo = get_the_title();
											$resumo = the_excerpt_max_charlength(140);
											$link = get_the_permalink();
									?>

									<div class="item">
										<div class="card">
											<div class="object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
											<div class="box-category category-color-purple"><?php echo esc_html( $categories[0]->name ); ?></div>
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
									endwhile;
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

				<?php
					/* Pega todos os Posts Fixados */
					$sticky = get_option( 'sticky_posts' );
					/* Sorteia os posts com os mais novos */
					rsort( $sticky );
					/* Pega o post mais recente (modifique "1" para quantos quiser mostrar) */
					$sticky = array_slice( $sticky, 0, 1 );
					/* Query os posts fixados */
					$argsBlogFixo = array(
						'post__in'            => $sticky, 
						'posts_per_page'      => 1,
						'ignore_sticky_posts' => 1
					);
					if (is_category()){
						$argsBlogFixo = array(
							'post__in'            => $sticky, 
							'posts_per_page'      => 1,
							'ignore_sticky_posts' => 1,
							'cat'                 => $category_id
						);
					}
					$blogFixo = new WP_Query( $argsBlogFixo );
					if($sticky) {
						if($blogFixo->have_posts()) {
							while($blogFixo->have_posts()):$blogFixo->the_post();
								if ( has_post_thumbnail()) { 
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
									$title_image = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
									$categories = get_the_category();
									$titulo = get_the_title();
									$resumo = the_excerpt_max_charlength(140);
									$autor = get_the_author();
									$link = get_the_permalink();
					?>

					<div class="col-12 col-lg-9 col-md-12">
						<div class="card mb-4">
							<div class="card-img-top object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
							<div class="box-category ml-6 category-color-red"><?php echo esc_html( $categories[0]->name ); ?></div>
							<div class="card-body space-x">
								<h1><?php echo $titulo; ?> | por <?php echo $autor; ?></h1>
								<p class="card-text"><?php echo $resumo; ?></p>
								<a href="<?php echo $link; ?>" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
							</div>
						</div>
					</div>

					<?php
								}
							endwhile;
						}
					}

					wp_reset_postdata(); 
				?>
				
				<div class="col-12 col-lg-3 col-md-12">
					<div class="main-events  mb-4">
						<h5 class="mb-4">EVENTOS</h5>
						<ul class="list-news">

							<?php
							//Bloco eventos de blog - repete em várias páginas do site
								$argsBlogEventos = array(
									'posts_per_page' => 5,
									'no_found_rows'  => true,
									'tag'            => 'eventos'
								);
								if (is_category()){
									$argsBlogEventos = array(
										'posts_per_page' => 5,
										'no_found_rows'  => true,
										'tag'            => 'eventos',
										'cat'            => $category_id
									);
								}
								$blogEventos = new WP_Query( $argsBlogEventos );
									if($blogEventos->have_posts()) {
										while($blogEventos->have_posts()):$blogEventos->the_post();
											if ( has_post_thumbnail()) { 
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
												$title_image = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
												$titulo = get_the_title();
												$link = get_the_permalink();
												$data_post = get_the_date('d/m/Y');
										?>

								<li>
									<div class="img-news object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
									<div class="description-news">
										<a href="<?php echo $link; ?>"><b><?php echo $titulo; ?></b></a>
										<span><?php echo $data_post; ?></span>
									</div>
								</li>

								<?php
											}
										endwhile;
									}

								wp_reset_postdata(); 
							?>

						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-9 col-md-12">
					<div class="row">

						<?php
							//Bloco com posts de blog
							$argsBlog = array(
								'posts_per_page' => 6
							);

							if (is_category()){
								$argsBlog = array(
									'posts_per_page' => 6,
									'cat'       => $category_id 
								);
							}

							$blog = new WP_Query( $argsBlog );
							if($blog->have_posts()) {
								while($blog->have_posts()):$blog->the_post();
									if ( has_post_thumbnail()) { 
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
										$title_image = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
										$categories = get_the_category();
										$titulo = get_the_title();
										$resumo = the_excerpt_max_charlength(140);
										$link = get_the_permalink();
							?>

							<div class="col-12 col-md-6 col-lg-6">
								<div class="card">
									<div class="object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
									<div class="box-category category-color-red"><?php echo esc_html( $categories[0]->name ); ?></div>
									<div class="card-body">
										<div class="line-h-6"></div>
										<h5><?php echo $titulo; ?></h5>
										<p class="card-text"><?php echo $resumo; ?></p>
										<a href="<?php echo $link; ?>" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
									</div>
								</div>
							</div>

							<?php
									}
								endwhile;
							}
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
	<?php
        //bloco de newsletter
        require "inc/inc_bloco_cadastraNews.php";
	?>
</main>

<?php
get_footer();
