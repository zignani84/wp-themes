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
					$conteudo = get_the_content();
					$autor = get_the_author();
					$link = get_the_permalink();
	?>

	<div class="col-12 col-lg-9 col-md-12">
		<div class="card mb-4">
			<div class="card-img-top object-cover" style="background-image: url('<?php echo $image[0]; ?>');"></div>
			<div class="box-category ml-6 category-color-red"><?php echo esc_html( $categories[0]->name ); ?></div>
			<div class="card-body space-x">
				<h1><?php echo $titulo; ?> | por <?php echo $autor; ?></h1>
				<p class="card-text"><?php echo $conteudo; ?></p>
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