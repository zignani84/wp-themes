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
								$conteudo = get_the_content();
								$link = get_the_permalink();
						?>

						<div class="item">
							<div class="card">
								<div class="object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
								<div class="box-category category-color-purple"><?php echo esc_html( $categories[0]->name ); ?></div>
								<div class="card-body">
									<div class="line-h-6"></div>
									<h5><?php echo $titulo; ?></h5>
									<p class="card-text"><?php echo $conteudo; ?></p>
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
