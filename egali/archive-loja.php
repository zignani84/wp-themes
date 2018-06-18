<?php
get_header();
?>

    <!-- MAIN -->
    <main>
		<!-- BREADCRUMB -->
		<section class="main-breadcrumb mt-150">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo get_site_url();?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">NOSSAS LOJAS</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- CONTENT PAGE DESCRIPTION -->
		<section class="main-description-page">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h1>NOSSAS LOJAS</h1>
						<div class="line-h-6 mt-4 mb-5"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- SECTION STORES -->
		<section class="main-stores">
			<div class="container">

				<div class="row">
					<div class="col-12 col-sm-6 col-lg-4">
						<div class="form-group">
							<select id="selectLocal1" class="form-control field-floating field-col-left">
							</select>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-4">
						<div class="form-group">
							<select id="selectLocal2" class="form-control field-floating field-col-center">
							</select>
						</div>
					</div>
				</div>


				<div class="row" id="listaLojas">
				</div>


			</div>	
		</section>

		<!-- Modal Mapa -->
		<div class="modal fade modal-toolbar" id="modalMapaLoja" tabindex="-1" role="dialog" aria-labelledby="modalMapaLoja" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<h4 class="text-center">COMO CHEGAR</h4>
					<div class="line-h-8"></div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body">

						<iframe id="iframeMapa" src="" width="100%" height="400" frameborder="0" style="border:0;background-color:#ccc" allowfullscreen></iframe>

					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">

			<?php
			
			//busca locais das lojas
			$termsRegioes = get_terms( array('taxonomy' => 'localloja') , array( 'parent' => 0 ) );
			$regioes = array();
			foreach ( $termsRegioes as $regiao ){
				$regioes[$regiao->slug] = array( "nome" => $regiao->name , "slug" => $regiao->slug , "locais" => array());
				$termsLocais = get_terms( array('taxonomy' => 'localloja') , array( 'parent' => $regiao->term_id ) );
				foreach ( $termsLocais as $local ){
					$regioes[$regiao->slug]["locais"][$local->slug] = array( "nome" => $local->name , "slug" => $local->slug );
				}
				ksort($regioes[$regiao->slug]["locais"]);
			}
			ksort($regioes);
			?>

			var regioes = <?php echo json_encode($regioes);?>;
			//var localizacaoUsuario = <?php echo json_encode($localizacaoUsuario);?>;
			var carregandoLojas = false;
			var regiao1 = false;
			
			function carregaLojas() {
				var local = jQuery('#selectLocal2').val();

				if(!carregandoLojas) {

					carregandoLojas = true;
					jQuery('#listaLojas').empty().append(jQuery('<img/>').attr('src','<?php echo admin_url('images/spinner.gif') ?>'));
					
					jQuery.post(
						"<?php echo admin_url( 'admin-ajax.php' );?>", 
						{ action:"carregaLojas" , local:local },
						function(data) {

							carregandoLojas = false;
							jQuery('#listaLojas').empty();

							if(data.sucesso) {

								var alturaMaxima = 0;
								var $boxLoja = null;
								for(var loja in data.lojas) {
									jQuery('#listaLojas').append(
										jQuery('<div/>').addClass('col-12 col-sm-6 col-lg-4').append(
											jQuery('<div/>').addClass('card mb-4').append(
												$boxLoja = jQuery('<div/>').addClass('card-body text-center').append(
													jQuery('<h5/>').addClass('card-title text-left').html(data.lojas[loja].nome),
													jQuery('<p/>').addClass('card-text text-left').html(data.lojas[loja].endereco),
													jQuery('<p/>').addClass('card-text text-left').html(data.lojas[loja].telefone),
													jQuery('<div/>').addClass('line-h-4'),
													jQuery('<button/>').data('endereco',data.lojas[loja].endereco).addClass('btn btn-primary btn-primary-alternate mt-2').text('COMO CHEGAR').click(function() {
														mostraMapa(jQuery(this).data('endereco'));
													}),
													jQuery('<a/>').addClass('btn btn-primary mt-2').attr('href','/fale-conosco/').text('FALE CONOSCO')
												)
											)
										)
									);
									if(alturaMaxima < $boxLoja.innerHeight()) alturaMaxima = $boxLoja.innerHeight();
								}
								jQuery('.card-body').css('height',alturaMaxima + 'px');
								
							} else {

								alert(data.resposta);

							}

						}
						,"json"
					);
				}
			}

			function mostraMapa(endereco) {
				jQuery('#iframeMapa').attr('src','https://www.google.com/maps?q=' + endereco + '&output=embed');
				jQuery('#modalMapaLoja').modal('show');
			}

			jQuery().ready(function() {


				if (typeof userLocation == 'undefined') {
					var local1 = "brasil";
					var local2 = "rio-grande-do-sul";
				} else {
					if (typeof userLocation.local1 == 'undefined') {
						var local1 = "brasil";
					} else {
						var local1 = userLocation.local1;
					}
					if (typeof userLocation.local2 == 'undefined') {
						var local2 = "rio-grande-do-sul";
					} else {
						var local2 = userLocation.local2;
					}
				}
				

				//popula selects de regiões e locais
				var $itemLocal = null;
				var setouLocal = false;
				for(var r in regioes) {
					jQuery('#selectLocal1').append(
						$itemLocal = jQuery('<option/>').val(regioes[r].slug).text(regioes[r].nome)
					);
					if(regioes[r].slug == local1) {
						$itemLocal.prop('selected',true);
						if(!regiao1) regiao1 = r;
					}
				}
				$itemLocal = null;
				for(var l in regioes[regiao1].locais) {
					jQuery('#selectLocal2').append(
						$itemLocal = jQuery('<option/>').val(regioes[regiao1].locais[l].slug).text(regioes[regiao1].locais[l].nome)
					);
					if(regioes[regiao1].locais[l].slug == local2) {
						$itemLocal.prop('selected',true);
					}

				}

				//atualiza select de locais de acordo com select de regiões
				jQuery('#selectLocal1').change(function() {
					var regiao = jQuery(this).val();
					jQuery('#selectLocal2').empty();
					for(var l in regioes[regiao].locais) {
						jQuery('#selectLocal2').append(
							$itemLocal = jQuery('<option/>').val(regioes[regiao].locais[l].slug).text(regioes[regiao].locais[l].nome)
						);
						if(regioes[regiao].locais[l].slug == "administracao-central") $itemLocal.prop('selected',true);
					}
					
					carregaLojas();

				});

				jQuery('#selectLocal2').change(function() {
					carregaLojas();
				});
				
				carregaLojas();
				
			});

		</script>



		<?php
		require "inc/inc_bloco_cadastraNews.php";
		?>

	</main>

<?php
get_footer();
