<?php
//Bloco eventos de blog - repete em várias páginas do site
	$argsBlogEventos = array(
		'posts_per_page' => 5,
		'no_found_rows'  => true,
		'category_name'  => 'eventos'
	);
	if (is_category()){
		$argsBlogEventos = array(
			'posts_per_page' => 5,
			'no_found_rows'  => true,
			'category_name'  => 'eventos',
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