<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

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
		<?php if($banners->have_posts()): ?>
        <section class="main-slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			
                <ol class="carousel-indicators">
					<?php while($banners->have_posts()): $banners->the_post(); ?>
						<li data-target="#carouselExampleIndicators" class="<?php if (0 == $n) {$n = 0; echo "active";} ?>" data-slide-to="<?php echo $n; $n++; ?>"></li>
					<?php endwhile; ?>
				</ol>
			
                <div class="carousel-inner" role="listbox">
                    <div class="container-fluid">
                        <div class="row">
							<?php while($banners->have_posts()): $banners->the_post(); ?>
							<?php if ( has_post_thumbnail()) { 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <div class="carousel-item <?php if (0 == $b) { echo "active";} ?>" style="background-image: url('<?php echo $image[0]; ?>')">
                                <div class="carousel-caption-block">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-8">
                                                <div class="box-caption">
                                                    <div class="box-category">Intercâmbio</div>
                                                    <h1><?php the_title(); ?></h1>
                                                    <p><?php the_content(); ?></p>
                                                    <a href="#" class="btn">Veja Mais</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php $b++; ?>
							<?php } ?>
							<?php endwhile; ?>
                        </div>
                        
                    </div>                    
                </div>
            </div>
        </section>
		<?php endif; wp_reset_query(); ?>
        <!-- SECTION EXCHANGE -->
        <section class="main-exchange">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-section-primary">
                            <small>NOSSOS</small>
                            <h2>INTERCÂMBIOS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card img-fluid">
                                <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image">
                                <div class="card-img-overlay">
                                    <div class="line-h-4"></div>
                                    <h3>Cursos Teens</h3>
                                    <p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
                                    <a href="#" class="btn-exchange-primary">VEJA MAIS</a>
                                    <a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card img-fluid">
                                <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image">
                                <div class="card-img-overlay">
                                    <div class="line-h-4"></div>
                                    <h3>Cursos Teens</h3>
                                    <p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
                                    <a href="#" class="btn-exchange-primary">VEJA MAIS</a>
                                    <a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card img-fluid">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image">
                            <div class="card-img-overlay">
                                <div class="line-h-4"></div>
                                <h3>Cursos Teens</h3>
                                <p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
                                <a href="#" class="btn-exchange-primary">VEJA MAIS</a>
                                <a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card img-fluid">
                                <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image">
                                <div class="card-img-overlay">
                                    <div class="line-h-4"></div>
                                    <h3>Cursos Teens</h3>
                                    <p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
                                    <a href="#" class="btn-exchange-primary">VEJA MAIS</a>
                                    <a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card img-fluid">
                                <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image">
                                <div class="card-img-overlay">
                                    <div class="line-h-4"></div>
                                    <h3>Cursos Teens</h3>
                                    <p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
                                    <a href="#" class="btn-exchange-primary">VEJA MAIS</a>
                                    <a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card img-fluid">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-pacote-01.png" alt="Card image">
                            <div class="card-img-overlay">
                                <div class="line-h-4"></div>
                                <h3>Cursos Teens</h3>
                                <p class="card-text">Programas de intercâmbio que combinam o estudo com lazer em lugares incríveis.</p>
                                <a href="#" class="btn-exchange-primary">VEJA MAIS</a>
                                <a href="#" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a class="btn btn-secondary">CONHEÇA NOSSAS PROMOÇÕES</a>
                    </div>
                </div>
            </div>
        </section>
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
        <!-- SECTION DIFFERENTIAL -->
        <section class="differential">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">DIFERENCIAIS</h2>
                        <div class="line-h-8"></div>
                        <div class="owl-carousel owl-theme mt-5">
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-pin"></i></a>
                                <a href="#"><h6>Base Egali</h6></a>
                            </div>
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-home"></i></a>
                                <a href="#"><h6>Egali House</h6></a>
                            </div>
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-takeoff"></i></a>
                                <a href="#"><h6>Orientação Pré-embarque </h6></a>
                            </div>
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
                                <a href="#"><h6>Orientação Pós-embarque</h6></a>
                            </div>
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-globe-alt"></i></a>
                                <a href="#"><h6>Auxílio Visto</h6></a>
                            </div>
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-flight-land"></i></a>
                                <a href="#"><h6>Orientação Pós-embarque</h6></a>
                            </div>
                            <div class="item">
                                <a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-globe-alt"></i></a>
                                <a href="#"><h6>Auxílio Visto</h6></a>
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
        <!-- SECTION BLOG -->
        <section class="news-blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <small>blog</small>
                        <h2>FALANDO DE INTERCÂMBIO</h2>
                        <div class="line-h-8"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
                            <div class="box-category category-color-purple">VIDA NO EXTERIOR</div>
                            <div class="card-body">
                                <div class="line-h-6"></div>
                                <h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
                            <div class="box-category category-color-red">VIDA NO EXTERIOR</div>
                            <div class="card-body">
                                <div class="line-h-6"></div>
                                <h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
                            <div class="box-category category-color-yellow">TODOS OS ASSUNTOS</div>
                            <div class="card-body">
                                <div class="line-h-6"></div>
                                <h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
                            <div class="box-category category-color-pink">VIDA NO EXTERIOR</div>
                            <div class="card-body">
                                <div class="line-h-6"></div>
                                <h5>7 coisas que você NÃO deve fazer no exterior | Parte 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link"><i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo get_theme_file_uri(); ?>/img/img-post-01.png" alt="Card image cap">
                            <div class="box-category category-color-purple">TODOS OS ASSUNTOS</div>
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
