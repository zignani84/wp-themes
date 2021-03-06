<?php
get_header();

global $posts;
$args = array( 
	'post_type' => 'banner', 
	'posts_per_page' => 8 
);
$banners = new WP_Query( $args );
?>
    <!-- MAIN -->
    <main>
        <!-- SECTION SLIDER -->
		<?php if($banners->have_posts()) {
			?>
			<section class="main-slider"> 
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

									?>
									<div class="carousel-item <?php if ($bannerIndex == 0) echo "active"; ?>" style="background-image: url('<?php echo $banner_imagemDestaque; ?>')">
										<div class="carousel-caption-block">
											<div class="container">
												<div class="row">
													<div class="col-12 col-lg-8">
														<div class="box-caption">
															<div class="box-category"><?php echo $banner_dados["categoria"]; ?></div>
															<h1><?php echo $banner_dados["frase1"]; ?></h1>
															<p><?php echo $banner_dados["frase2"]; ?></p>
															<a href="<?php echo $banner_dados["link"]; ?>" class="btn">Veja Mais</a>
														</div>
													</div>
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
		

		//bloco de intercâmbios
		require "inc/inc_bloco_intercambios.php";
		?>


        <!-- SECTION DEPOSITIONS -->
        <section class="depositions">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-1 text-center text-lg-left">
                        <img src="<?php echo get_theme_file_uri(); ?>/img/img-depoiment-01.png" alt="Imagem depoimentos" class="rounded-circle">
                    </div>
                    <div class="col-12 col-lg-5 text-center text-lg-left">
                        <h6>LÉIA RODRIGUES / <span class="location">LONDRES</span></h6>
                        <span class="description">CURSOS + TRABALHO</span>
                        <p>Pude realizar sonhos, conhecer novas culturas, fazer novas amizades e ganhar novos conhecimentos durante o meu intercâmbio para Londres em dezembro de 2013. A Egali fez parte disso me acomodando, orientando e sendo família no sonho que eu não queria que acabasse.</p>
                        <div class="line-h-6"></div>
                    </div>
                    <div class="col-12 col-lg-1 text-center text-md-center text-lg-left">
                            <img src="<?php echo get_theme_file_uri(); ?>/img/img-depoiment-01.png" alt="Imagem depoimentos" class="rounded-circle">
                        </div>
                        <div class="col-12 col-lg-5 text-center text-lg-left">
                            <h6>LÉIA RODRIGUES / <span class="location">LONDRES</span></h6>
                            <span class="description">CURSOS + TRABALHO</span>
                            <p>Pude realizar sonhos, conhecer novas culturas, fazer novas amizades e ganhar novos conhecimentos durante o meu intercâmbio para Londres em dezembro de 2013. A Egali fez parte disso me acomodando, orientando e sendo família no sonho que eu não queria que acabasse.</p>
                            <div class="line-h-6"></div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="bg-btn">
                            <a href="#" class="btn btn-secondary">VEJA TODOS OS DEPOIMENTOS</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<?php
        //bloco de intercâmbios
        require "inc/inc_bloco_diferenciais.php";
        
        //bloco de posts blog
        require "inc/inc_bloco_blog.php";
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

<?php get_footer(); ?>
