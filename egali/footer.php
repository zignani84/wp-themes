	<?php
	global $egali_globais;
	?>

    <!-- FOOTER -->
    <footer class="main-footer">
        <a href="#" class="scrollToTop"><i class="zmdi zmdi-chevron-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-12">
			        <div class="masonry">

                    <?php
                    $iDestinos = 0;
                    foreach($egali_globais["destinos"] as $pais) {
                        if($pais["link"]) {
                    ?>
                            <div class="item">
                                <?php
                                if ($iDestinos == 0){
                                ?>
                                <h6>Destinos</h6>
                                <?php
                                }
                                ?>
                                <a class="itens-title" href="<?php echo $pais["link"];?>"><?php echo $pais["nome"];?></a>
                                <?php
                                foreach($pais["cidades"] as $cidade) {
                                    if($cidade["link"]) {
                                        ?>
                                        <a class="itens" href="<?php echo $cidade["link"];?>"><?php echo $cidade["nome"];?></a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                    <?php
                        }
                        $iDestinos++;
                    }

                    $iIntercambios = 0;
                    foreach($egali_globais["intercambios"] as $tipo) {
                    ?>
                        <div class="item">
                            <?php
                            if ($iIntercambios == 0){
                            ?>
                            <h6>Intercâmbios</h6>
                            <?php
                            }
                            ?>
                            <a class="itens-title" href="#"><?php echo $tipo["nome"];?></a>
                            <?php
                            foreach($tipo["cursos"] as $curso) {
                            ?>
                                <a class="itens" href="<?php echo $curso["link"];?>"><?php echo $curso["nome"];?></a>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                        $iIntercambios++;
                    }
                    ?>
				
                        <div class="item">
                            <?php
                            $iCategorias = 0;
                            $categorias = get_categories( array(
                                'orderby' => 'name',
                                'order'   => 'ASC'
                            ) );
                            foreach( $categorias as $categoria ) {
                                if ($iCategorias == 0){
                            ?>
                                <h6>Blog</h6>
                            <?php
                                }
                            ?>
                                <a class="itens" href="<?php echo get_category_link( $categoria->term_id );?>"><?php echo $categoria->name;?></a>
                            <?php
                                $iCategorias++;
                            } 
                            ?>
                        </div>
				
                        <div class="item">
                            <h6>A Egali</h6>
                            <a class="itens" href="<?php echo get_site_url();?>/quem-somos">Quem Somos</a>
                            <a class="itens" href="<?php echo get_site_url();?>/fale-conosco">Fale Conosco</a>
                            <a class="itens" href="<?php echo get_site_url();?>/trabalhe-conosco">Trabalhe Conosco</a>
                            <a class="itens" href="<?php echo get_site_url();?>/faq">FAQ</a>
                        </div>

                    </div>
                </div>
			</div>
		</div>
        <div class="main-partners">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="link-partners">
                            <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/img/img-logo-01.png" alt="Abraseeio" title="" />
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="link-partners">
                            <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/img/img-logo-02.png" alt="Iata" title="" />
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="link-partners">
                            <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/img/img-logo-03.png" alt="Great Place to Work" title="" />
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="link-partners">
                            <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/img/img-logo-04.png" alt="Great Place to Work" title="" />
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="link-partners">
                            <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/img/img-logo-05.png" alt="Egali" title="" />
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="link-partners">
                            <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/img/img-logo-06.png" alt="Embratur" title="" />
                        </a>
                    </div>
                </div>
            </div>            
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <span class="rights">© Egali Intercâmbio <?php echo date('Y'); ?> - Todos os Direitos Reservados.</span>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <a class="rights float-right" href="http://www.conectt.com.br" target="_blank">CONECTT</a>
                </div>
            </div>
        </div>
    </footer>
	<!-- Modal -->
    <div class="modal fade modal-toolbar" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <h4 class="text-center">ORÇAMENTO FÁCIL</h4>
                <div class="line-h-8"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">

                    <?php echo do_shortcode( '[contact-form-7 id="70" title="Orçamento Fácil"]' ); ?>

                </div>
            </div>
        </div>
    </div>

    <?php
    wp_footer(); 
    if ( is_home() || is_category() || is_singular('post') || preg_match("/blog/", $_SERVER['REQUEST_URI']) ){
    ?>

    <script type="text/javascript">
        /* document.cookie = "current_url="+document.URL;
        document.cookie = "referrer_url="+document.referrer;*/
        //var blog_egali = '<option value="2000001" selected=selected></option>';

/*         var option_blog_egali_fc = document.createElement("option");
        var option_blog_egali_of = document.createElement("option");
        var label_option_blog_egali = "Blog Egali";
        var value_option_blog_egali = "2000001";
        option_blog_egali_fc.text = label_option_blog_egali;
        option_blog_egali_fc.value = value_option_blog_egali;
        option_blog_egali_of.text = label_option_blog_egali;
        option_blog_egali_of.value = value_option_blog_egali;

        var select_como_conheceu_fc = document.querySelector('.wpcf7-form .como_conheceu select');
        var select_como_conheceu_of = document.querySelector('#exampleModalCenter .como_conheceu select');

        function setSelectedIndex(s, valsearch){
            for (i = 0; i< s.options.length; i++){ 
                if (s.options[i].value == valsearch){
                s.options[i].selected = true;
                break;
                }
            }
            return;
        }

        //if (document.cookie.match(/blog/gi)){
            select_como_conheceu_fc.style.display = "none";
            select_como_conheceu_fc.appendChild(option_blog_egali_fc);
            setSelectedIndex(select_como_conheceu_fc,"2000001");

            select_como_conheceu_of.style.display = "none";
            select_como_conheceu_of.appendChild(option_blog_egali_of);
            setSelectedIndex(select_como_conheceu_of,"2000001");

            console.log(select_como_conheceu_fc.options);
            console.log(select_como_conheceu_of.options);
        //} */

        jQuery(document).ready(function () {
            var blog_egali = jQuery('<option>', {value:2000001, text:'Blog Egali'});

            jQuery('.wpcf7-form .como_conheceu select, #exampleModalCenter .como_conheceu select').hide().append(blog_egali).find('option[value="2000001"]').prop('selected', true);
            //jQuery('.wpcf7-form .como_conheceu select, #exampleModalCenter .como_conheceu select').append(blog_egali);
            //jQuery('.wpcf7-form .como_conheceu select, #exampleModalCenter .como_conheceu select').prop("selected", true);
        });
    </script>

    <?php
    }
    ?>
	 
</body>
</html>
