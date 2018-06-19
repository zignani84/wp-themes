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
				$conteudo = get_the_content();
				$link = get_the_permalink();
	?>

	<div class="col-12 col-md-6 col-lg-6">
		<div class="card">
			<div class="object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
			<div class="box-category category-color-red"><?php echo esc_html( $categories[0]->name ); ?></div>
			<div class="card-body">
				<div class="line-h-6"></div>
				<h5><?php echo $titulo; ?></h5>
				<p class="card-text"><?php echo $conteudo; ?></p>
				<a href="<?php echo $link; ?>" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
			</div>
		</div>
	</div>

	<?php
			}
		endwhile;
	}
?>