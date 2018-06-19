<?php

//Bloco com itens de diferenciais - repete em várias páginas do site

$args = array( 
	'post_type' => 'banner', 
	'posts_per_page' => 8 
);
$banners = new WP_Query( $args );


// SECTION SLIDER
if($banners->have_posts()) {
	?>
	<section class="main-slider mt-150"> 
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		
			<ol class="carousel-indicators">
				<?php
				$bannerIndex = 0;
				while($banners->have_posts()): $banners->the_post();
					?>
					<li data-target="#carouselExampleIndicators" class="<?php if(!$bannerIndex) echo "active"; ?>" data-slide-to="<?php echo $bannerIndex;?>"></li>
					<?php
					$bannerIndex++;
				endwhile;
				?>
			</ol>
		
			<div class="carousel-inner" role="listbox">
				<div class="container-fluid">
					<div class="row">
						<?php
						$bannerIndex = 0;
						while($banners->have_posts()) {
							
							$banners->the_post();
							$banner_dados = get_post_meta($post->ID,'banner_dados',true);
							$banner_imagemDestaque = get_post_meta($post->ID,'banner_imagemDestaque',true);
							$imgUrl = get_relative_thumb($banner_imagemDestaque,'large');
							?>
							<div class="carousel-item <?php if ($bannerIndex == 0) echo "active"; ?>" style="background-image: url('<?php echo $imgUrl; ?>')">
								<div class="overlay-banner"></div>								
								<div class="carousel-caption-block">
									<div class="container">
										<div class="row">
											<div class="col-12 col-lg-8">
												<div class="box-caption">
													<div class="box-category"><?php echo $banner_dados["categoria"]; ?></div>
													<h1><?php echo $banner_dados["frase1"]; ?></h1>
													<p><?php echo $banner_dados["frase2"]; ?></p>
													<a href="<?php echo $banner_dados["link"]; ?>" class="btn"><?php _e('Veja Mais','egali'); ?></a>
												</div>
											</div>

											<?php
											if ( is_home() || is_category() || is_singular('post') ){
												$argsBlogBanners = array( 
													'posts_per_page' => 4,
													'showposts'      => 4
												);
												if (is_category()){
													$argsBlogBanners = array(
														'posts_per_page' => 4,
														'showposts'      => 4,
														'cat'       => $category_id 
													);
												}
												$blog = new WP_Query( $argsBlogBanners );
												if($blog->have_posts()) {
											?>

											<div class="d-none d-md-none d-lg-block col-lg-3 offset-lg-1">
												<ul class="list-news">

													<?php
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
													?>

													<li>
														<a class="link-news" href="<?php echo get_site_url();?>/blog/assunto/"><?php _e('VEJA MAIS POSTS','egali'); ?></a>
														<div class="lin-h-2"></div>
													</li>

												</ul>
											</div>

											<?php
												}
											}
											?>

										</div>
									</div>
								</div>
							</div>
							<?php
							$bannerIndex++;
						}
						?>
					</div>
					
				</div>                    
			</div>
		</div>
	</section>
	<?php
}
wp_reset_query();

?>
