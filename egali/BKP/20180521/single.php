<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package egali
 */

get_header();
?>

<!-- MAIN -->
<main>

	<?php
	if ( has_post_thumbnail()) { 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
		$title_image = wp_get_attachment_caption( get_post_thumbnail_id(), 'single-post-thumbnail' );
		$categories = get_the_category();
		$titulo = get_the_title();
		$data_modificado = get_the_modified_time('d \d\e F \d\e Y');
		$conteudo = get_the_content();
		$autor = get_the_author();
		$argsAvatar = array(
			'size' => 62
		);
		$avatar = get_avatar_url( get_the_author_meta(), $argsAvatar);
		$autor_descricao = get_the_author_meta( 'description' );
		$autor_modificado = get_the_modified_author();
		$comentarios_total = get_comments_number();
		$link = get_the_permalink();

		$prevPost = get_previous_post(true);
		$nextPost = get_next_post(true);
	?>

	<!-- SECTION BLOG -->
	<section class="main-accessed main-accessed-internal">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9 col-md-12">
					<div class="card mb-4">
						<div class="card-img-top object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
						<div class="box-category ml-6 category-color-red"><?php echo esc_html( $categories[0]->name ); ?></div>
						<div class="card-body space-x">
							<h1><?php echo $titulo; ?> | por <?php echo $autor; ?></h1>
							<span class="info-post">Atualizado em <?php echo $data_modificado; ?> / por <?php echo $autor_modificado; ?> / <?php echo $comentarios_total ?> comentários</span>
							<?php
 							echo $conteudo; 
							?>
							<div class="line-h-100 mt-5 mb-4"></div>
							<ul class="list-author mb-5">
								<li>
									<?php
									if ($avatar)
									?>
									<div class="img-author"><img src="<?php echo esc_url($avatar); ?>" alt="<?php echo $autor; ?>" title="<?php echo $autor; ?>" class="img-fluid" /></div>
									<div class="text">
										<small>Por <?php echo $autor; ?></small>
										<?php
										if ($autor_descricao)
										?>
										<span><?php echo $autor_descricao; ?></span>
									</div>
								</li> 
							</ul>
							<div class="line-h-5"></div>
						</div>
						<div class="footer-card">
							<h5>COMPARTILHAR</h5>
							<a class="icons" href="#"><i class="zmdi zmdi-facebook"></i></a>
							<a class="icons" href="#"><i class="zmdi zmdi-twitter"></i></a>
							<a class="icons" href="#"><i class="zmdi zmdi-instagram"></i></a>
							<nav aria-label="Page navigation">
								<ul class="pagination">
								<?php
								if($prevPost) {
									$args = array(
										'posts_per_page' => 1,
										'include' => $prevPost->ID
									);
									$prevPost = get_posts($args);
									foreach ($prevPost as $post) {
										setup_postdata($post);
								?>
									<li class="page-item">
									<a class="page-link" href="<?php the_permalink(); ?>" aria-label="Previous">
										<i class="zmdi zmdi-long-arrow-left"></i>
										ANTERIOR
									</a>
									</li>
								<?php
										wp_reset_postdata();
									}
								}

								if($nextPost) {
									$args = array(
										'posts_per_page' => 1,
										'include' => $nextPost->ID
									);
									$nextPost = get_posts($args);
									foreach ($nextPost as $post) {
										setup_postdata($post);
								?>
									<li class="page-item">
									<a class="page-link" href="<?php the_permalink(); ?>" aria-label="Next">
										PRÓXIMO
										<i class="zmdi zmdi-long-arrow-right"></i>
									</a>
									</li>
								<?php
										wp_reset_postdata();
									}
								}
								?>

								</ul>
								</nav>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-lg-3 col-md-12">

					<?php
					$argsBlog = array( 
						'post_type' => 'post', 
						'posts_per_page' => 5,
						'showposts' => 5 
					);
					$blog = new WP_Query( $argsBlog );
					if($blog->have_posts()) {
					?>

					<div class="main-events  mb-4">
						<h5 class="mb-4">ÚLTIMOS POSTS</h5>
						<ul class="list-news">

							<?php
							if($blog->have_posts()) {
								while($blog->have_posts()):$blog->the_post();
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
							?>

							<li class="border-none">
								<a class="link-news" href="#"><i class="zmdi zmdi-long-arrow-right"></i>VEJA MAIS POSTS</a>
							</li>
						</ul>
					</div>
					<?php
					}
					?>
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

			<div class="row mt-4 section-comments">
				<div class="col-12 col-lg-9 col-md-12">

					<?php
					comments_template();
					?>

				</div>
			</div>

			<div class="row mt-5">
				<div class="col-12 col-lg-9 col-md-12">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6">
							<div class="card">
									<div class="object-cover"></div>
								<div class="box-category category-color-red">VIDA NO EXTERIOR</div>
								<div class="card-body">
									<div class="line-h-6"></div>
									<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
							<div class="card">
								<div class="object-cover"></div>
								<div class="box-category category-color-red">VIDA NO EXTERIOR</div>
								<div class="card-body">
									<div class="line-h-6"></div>
									<h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<a href="#" class="btn btn-secondary">VEJA TODOS OS DEPOIMENTOS</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	}
	?>

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
