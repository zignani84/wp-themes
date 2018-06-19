<?php

// Banner principal do blog
if(is_category()) {

	$categorias = get_the_category();
	$categoria_id = $categorias[0]->cat_ID;

	$argsBannersBlog = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'showposts'      => 1,
		'cat'            => $categoria_id 
	);

} else if(is_tax()) {

	$term_id = get_queried_object()->term_id;
	$slug = get_queried_object()->slug;

	$argsBannersBlog = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'showposts'      => 1,
		'tax_query' => array(
			array(
				'taxonomy' => 'local',
				'field'    => 'term_id',
				'terms'    => $term_id,
			)
		)
	);
} else {

	$argsBannersBlog = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'showposts'      => 1
	);
}

$bannersBlog = new WP_Query( $argsBannersBlog );
//$arrayBanners = array();

/* while($bannersBlog->have_posts()) {

	$bannersBlog->the_post();
	if ( has_post_thumbnail()) {

		$postAtual = array(
			"thumb" => get_relative_thumb(get_post_thumbnail_id( $post->ID ),'thumbnail'),
			"imagem" => get_relative_thumb(get_post_thumbnail_id( $post->ID ),'large'),
			"titulo" => get_the_title(),
			"link" => get_the_permalink(),
			"data" => get_the_date('d/m/Y')
		);
		
		$arrayBanners[] = $postAtual;
	}
} */

//$arrayBanners[0]["imagem"];

//lista posts da categoria de eventos
$argsBlogEventos = array(
	'posts_per_page' => 5,
	'no_found_rows'  => true,
	'category_name'  => 'eventos'
);
$blogEventos = new WP_Query( $argsBlogEventos );

// SECTION SLIDER
//if(count($arrayBanners)) {
if($bannersBlog->have_posts()) {
	while($bannersBlog->have_posts()):$bannersBlog->the_post();
		if ( has_post_thumbnail()) { 
			$id_bannerBlog = get_the_ID();
			$image = get_relative_thumb(get_post_thumbnail_id( $post->ID ),'large'); 
			$titulo = get_the_title();
			$link = get_the_permalink();
			$data_post = get_the_date('d/m/Y');
	?>
	<section class="main-slider mt-150"> 
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		
			<div class="carousel-inner" role="listbox">
				<div class="container-fluid">
					<div class="row">

						<div class="carousel-item active" style="background-image: url('<?php echo $image; ?>')">
							<div class="carousel-caption-block">
								<div class="container">
									<div class="row">
										<div class="col-12 col-lg-8">
											<div class="box-caption">
												<h1><?php echo $titulo; ?></h1>
												<p><?php echo $data_post; ?></p>
												<a href="<?php echo $link; ?>" class="btn">Leia</a>
											</div>
										</div>

										<div class="d-none d-md-none d-lg-block col-lg-3 offset-lg-1">
											<ul class="list-news">

												<?php
												//array_shift($arrayBanners);
												if($blogEventos->have_posts()) {
													while($blogEventos->have_posts()):$blogEventos->the_post();
														if ( has_post_thumbnail()) { 
															$image = get_relative_thumb(get_post_thumbnail_id( $post->ID ),'thumbnail');
															$titulo = get_the_title();
															$link = get_the_permalink();
															$data_post = get_the_date('d/m/Y');
													?>
													<li>
														<div class="img-news object-cover" style="background-image: url('<?php echo $image; ?>');"></div>
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
							</div>
						</div>
					</div>
				</div>                    
			</div>
		</div>
	</section>
	<?php
		}
	endwhile;
}
wp_reset_query();

?>
