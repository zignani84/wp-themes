<?php
get_header();

global $posts;
?>
    <!-- MAIN -->
    <main>
		<?php
		//bloco de banners
        require "inc/inc_bloco_banners.php";

		//bloco de intercâmbios
		require "inc/inc_bloco_intercambios.php";

		//bloco de depoimentos
		require "inc/inc_bloco_depoimentos.php";

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
