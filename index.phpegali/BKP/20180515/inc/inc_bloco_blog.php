<?php

//Bloco com posts de blog - repete em várias páginas do site

$argsBlog = array( 
	'post_type' => 'post', 
	'posts_per_page' => 6 
);
$blog = new WP_Query( $argsBlog );
if($blog->have_posts()) {
	?>
	<!-- SECTION BLOG -->
	<section class="news-blog">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<small><?php echo _e('blog','egali'); ?></small>
					<h2><?php echo _e('FALANDO DE INTERCÂMBIO','egali'); ?></h2>
					<div class="line-h-8"></div>
				</div>
			</div>
			<div class="row">

				<?php
				while($blog->have_posts()):$blog->the_post();
					if ( has_post_thumbnail()) { 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						$title_image = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$categories = get_the_category();
						$titulo = get_the_title();
						$conteudo = get_the_content();
						$link = get_the_permalink();
				?>

				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="<?php echo $title_image[0]; ?>">
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

				<div class="col-12 col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
						<div class="box-category category-color-green">TODOS OS ASSUNTOS</div>
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
	</section>
<?php
}

wp_reset_query();

?>
