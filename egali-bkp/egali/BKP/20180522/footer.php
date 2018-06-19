	<?php
	global $egali_globais;
	?>

    <!-- FOOTER -->
    <footer class="main-footer">
        <a href="#" class="scrollToTop"><i class="zmdi zmdi-chevron-up"></i></a>


        <div class="container">
			<div class="masonry">
				

				<h6>Destinos</h6>

				<?php
				foreach($egali_globais["destinos"] as $pais) {
					if($pais["link"]) {
						?>
						<ul class="box-itens">
							<li class="itens-title"><a class="itens-nav" href="<?php echo $pais["link"];?>"><?php echo $pais["nome"];?></a></li>
							<?php
							foreach($pais["cidades"] as $cidade) {
								if($cidade["link"]) {
									?>
									<li class="itens"><a class="itens-nav" href="<?php echo $cidade["link"];?>"><?php echo $cidade["nome"];?></a></li>
									<?php
								}
							}
							?>
						</ul>
						<?php
					}
				}
				?>
				

				<h6>Intercâmbios</h6>

				<?php
				foreach($egali_globais["intercambios"] as $tipo) {
					?>
					<ul class="box-itens">
						<li class="itens-title"><?php echo $tipo["nome"];?></li>
						<?php
						foreach($tipo["cursos"] as $curso) {
							?>
							<li class="itens"><a class="itens-nav" href="<?php echo $curso["link"];?>"><?php echo $curso["nome"];?></a></li>
							<?php
						}
						?>
					</ul>
					<?php
				}
				?>


				<h6>Blog</h6>
				
				<ul class="box-itens">
					<?php
					$categorias = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC'
					) );
					foreach( $categorias as $categoria ) {
						?>
						<li class="itens"><a class="itens-nav" href="<?php echo get_category_link( $categoria->term_id );?>"><?php echo $categoria->name;?></a></li>
						<?php
					} 
					?>
				</ul>


				<h6>A Egali</h6>
				
				<ul class="box-itens">
					<li class="itens"><a class="itens-nav" href="">Quem Somos</a></li>
				</ul>

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
                <h4 class="text-center">ORÇAMENTO FACIL</h4>
                <div class="line-h-8"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">

                    <?php echo do_shortcode( '[contact-form-7 id="70" title="Orçamento Fácil"]' ); ?>

                    <!--<form>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" value="NOME">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="tel" class="form-control" value="TELEFONE">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="mail" class="form-control" value="E-mail">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <select class="form-control">
                                        <option selected>SELECIONE UMA UNIDADE</option>
                                        <option>Porto Alegre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <select class="form-control">
                                        <option selected>SELECIONE UM PROGRAMA</option>
                                        <option>Egali</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <select class="form-control">
                                        <option selected>SELECIONE UM PROGRAMA</option>
                                        <option>Egali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label" for="termo">
                                        Aceito receber novidades da Egali.
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="#" class="btn-primary">BUSQUE AGORA</a>
                                </div>
                            </div>
                        </div>
                    </form>-->
                </div>
            </div>
        </div>
    </div>

	 <?php wp_footer(); ?>
	 
</body>
</html>
