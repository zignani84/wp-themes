<?php
$destino_id = get_the_ID();
$destino_nome = get_the_title();
$destino_slug = $post->post_name;
$destino_dados = get_post_meta($destino_id,'destino_dados',true);
$destino_locais = get_the_terms($destino_id,'local');
$destino_locais_id = array();
$destino_fraseDestaque = get_post_meta($destino_id,'destino_fraseDestaque',true);
$destino_textoPrincipal = get_post_meta($destino_id,'destino_textoPrincipal',true);

//busca cotação da moeda
$egali_bd = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
$egali_bd->set_charset("utf8");
$result = $egali_bd->query("select cotacao from egali_cotacoes where moeda = '".$destino_dados["moedaCod"]."'");
if($result->num_rows) {
	$row = $result->fetch_assoc();
	$destino_dados["cotacao"] = number_format($row["cotacao"],2,",",".");
} else {
	$destino_dados["cotacao"] = "?";
}

$erro = false;
if(count($destino_locais) == 1 && $destino_locais[0]->parent == 0) {

	$ehPais = true;
	$pais_key = $destino_locais[0]->slug;
	$destino_locais_id[] = $destino_locais[0]->term_id;

} else if(count($destino_locais) == 2 && ($destino_locais[0]->parent == 0 || $destino_locais[1]->parent == 0 && $destino_locais[0]->parent > 0 || $destino_locais[1]->parent > 0)) {

	$ehPais = false;
	if($destino_locais[0]->parent == 0) {
		$pais = 0;
		$cidade = 1;
	} else {
		$pais = 1;
		$cidade = 0;
	}
	$destino_locais_id[] = $destino_locais[$pais]->term_id;
	$destino_locais_id[] = $destino_locais[$cidade]->term_id;
	if($destino_locais[$cidade]->parent == $destino_locais[$pais]->term_id) {

		$pais_key = $destino_locais[$pais]->slug;
		$pais_nome = $egali_globais["destinos"][$pais_key]["nome"];
		$pais_link = $egali_globais["destinos"][$pais_key]["link"];

	} else {
		$erro = "Erro: os locais não estão configurados corretamente";
	}

} else {
	$erro = "Erro: os locais não estão configurados corretamente";
}

if($erro) wp_die($erro);


get_header();

?>

<!-- MAIN -->
<main>

	<!-- BANNER -->
	<?php
	$imgUrl = get_relative_thumb($destino_dados["bannerPrincipal"],'large');
	?>
	<section class="banne-internal mt-150" style="background-image:url(<?php echo $imgUrl; ?>)"></section>

	<?php
	if($ehPais) {



		//destino é um país

		?>
		<!-- MENU DESTINO -->
		<section class="main-menu-internal"> 
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="destiny">Destino</div>
						<nav class="navbar navbar-expand-lg navbar-light">
							<h4><?php echo $destino_nome;?></h4>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<i class="zmdi zmdi-format-align-right"></i>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link ancora" href="#cidade">O País <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link ancora" href="#cidades">Cidades</a>
									</li>
									<li class="nav-item">
										<a class="nav-link ancora" href="#intercambio">Intercâmbio</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</section>


		<!-- BREADCRUMB -->
		<section class="main-breadcrumb">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/destinos/">Destinos</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $destino_nome;?></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>


		<!-- CONTENT PAGE DESCRIPTION -->
		<section class="main-description-page" id="cidade">
			<div class="container">
				<div class="row mb-5">
					<div class="col-12">
						<h1>O país</h1>
						<div class="line-h-6 mt-4"></div>
					</div>
				</div>
				<div class="row">
					<?php
					$imgUrl = get_relative_thumb($destino_dados["imagemDestaque"],'medium');
					?>
					<div class="col-12 col-sm-3 col-lg-3" style="background-size:cover;background-image:url(<?php echo $imgUrl ?>)">
					</div>
					<div class="col-12 col-sm-9 col-lg-9">
						<div class="title-description h-100">
							<h1><?php echo $destino_fraseDestaque;?></h1>
						</div>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12 col-sm-7 col-lg-7">
						<?php
						$destino_textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$destino_textoPrincipal))."</p>";
						echo $destino_textoPrincipal;
						?>
						<div class="line-h-100"></div>
					</div>
					<div class="d-none d-lg-block col-lg-1">
						<div class="line-v-100 mx-auto"></div>
					</div>
					<div class="col-12 col-sm-4 col-lg-4">
						<ul class="description-courses">
							<li><i class="zmdi zmdi-chevron-right"></i><strong>IDIOMA:</strong> <?php echo $destino_dados["idioma"]; ?></li>
							<li><i class="zmdi zmdi-chevron-right"></i><strong>CAPITAL:</strong> <?php echo $destino_dados["capital"]; ?></li>
							<li><i class="zmdi zmdi-chevron-right"></i><strong>MOEDA:</strong>  <?php echo $destino_dados["moeda"]; ?></li>
							<li><i class="zmdi zmdi-chevron-right"></i><strong>COTAÇÃO:</strong> R$ <?php echo $destino_dados["cotacao"]; ?></li>
							<li><i class="zmdi zmdi-chevron-right"></i><strong>FUSO HORÁRIO:</strong>  <?php echo $destino_dados["guiaVivencia"]["fusoTxt"]; ?></li>
							<li><i class="zmdi zmdi-chevron-right"></i><strong>CÓDIGO DDI:</strong> <?php echo $destino_dados["guiaVivencia"]["codDDI"]; ?></li>
						</ul>
					</div>
				</div>

			</div>
		</section>


		<!-- CIDADES -->
		<section class="lista-cidades" id="cidades">
			<div class="container">
				<div class="row mb-3">
					<div class="col-12">
						<h4>CIDADES</h4>

						<ul class="box-itens">
							<?php
							//$egali_globais["destinos"][$pais_key]["cidades"]
							foreach($egali_globais["destinos"][$pais_key]["cidades"] as $cidade) {
								if($cidade["link"]) {
									?>
									<li class="itens"><a class="itens-nav" href="<?php echo $cidade["link"];?>"><?php echo $cidade["nome"];?></a>
									<?php
								}
							}
							?>
						</ul>

					</div>
				</div>

			</div>
		</section>

		<?php

		//bloco de intercâmbios
		require "inc/inc_bloco_intercambios.php";

		//bloco de form cadastro newsletter
		require "inc/inc_bloco_cadastraNews.php";




		
	} else {




		//destino é uma cidade
		
		//busca temperatura na cidade
		
		$egali_bd = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		$egali_bd->set_charset("utf8");
		$query = "select temperatura from egali_clima where pais = '$pais_nome' and cidade = '$destino_nome'";
		$result = $egali_bd->query($query);
		if($result->num_rows) {
			$row = $result->fetch_assoc();
			extract($row,EXTR_OVERWRITE);
		} else {
			$temperatura = "?";
		}


		//verifica se cidade tem acomodações egali (house / hostel)
		$temAcomodacoes = false;
		ob_start();

		//houses
		$houses = get_posts(
			array(
				'showposts' => -1,
				'post_type' => 'house',
				'tax_query' => array(
					array(
					'taxonomy' => 'local',
					'field' => 'name',
					'terms' => array($destino_slug)
					)
				)
			)
		);
		if($houses) {
			$temAcomodacoes = true;
			foreach($houses as $house) {
				$house_dados = get_post_meta($house->ID,'house_dados',true);
				$house_link = get_permalink($house->ID);
				$imgUrl = get_relative_thumb($house_dados["imagemDestaque"],'medium');
				?>
				<div class="col-12 col-lg-4">
					<div class="card">
						<div class="card-img-top" style="background-image:url('<?php echo $imgUrl ?>');height:180px;background-size:cover;"></div>                                
						<div class="card-body" style="box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);">
							<h5 class="card-title">House <?php echo $house->post_title; ?></h5>
							<a class="btn-secondary" style="display:block" href="<?php echo $house_link;?>">Saiba Mais</a>
						</div>
					</div>
				</div>
				<?php
			}
		}
		wp_reset_query();
		
		//hostels
		$hostels = get_posts(
			array(
				'showposts' => -1,
				'post_type' => 'hostel',
				'tax_query' => array(
					array(
					'taxonomy' => 'local',
					'field' => 'name',
					'terms' => array($destino_slug)
					)
				)
			)
		);
		if($hostels) {
			$temAcomodacoes = true;

			foreach($hostels as $hostel) {
				$hostel_dados = get_post_meta($hostel->ID,'hostel_dados',true);
				$hostel_link = get_permalink($hostel->ID);
				$imgUrl = get_relative_thumb($hostel_dados["imagemDestaque"],'medium');
				?>
				<div class="col-12 col-lg-4">
					<div class="card">
						<div class="card-img-top" style="background-image:url('<?php echo $imgUrl ?>');height:180px;background-size:cover;"></div>                                
						<div class="card-body" style="box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);">
							<h5 class="card-title">House <?php echo $hostel->post_title; ?></h5>
							<a class="btn-secondary" style="display:block" href="<?php echo $hostel_link;?>">Saiba Mais</a>
						</div>
					</div>
				</div>
				<?php
			}
		}
		wp_reset_query();

		$acomodacoes = ob_get_clean();



		?>
		<!-- MENU DESTINY -->
		<section class="main-menu-internal"> 
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="destiny">Destino</div>
						<nav class="navbar navbar-expand-lg navbar-light">
							<h4><?php echo $pais_nome.": <span class='d-block d-sm-inline'>".$destino_nome."</span>";?></h4>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<i class="zmdi zmdi-format-align-right"></i>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link ancora" href="#cidade">A cidade <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link ancora" href="#fotosVideos">Fotos e Vídeos</a>
									</li>
									<?php
									if($temAcomodacoes) {
										?>
										<li class="nav-item">
											<a class="nav-link ancora" href="#acomodacoes">Acomodações</a>
										</li>
										<?php
									}
									?>
									<li class="nav-item">
										<a class="nav-link ancora" href="#intercambio">Intercâmbio</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</section>




		<!-- BREADCRUMB -->
		<section class="main-breadcrumb">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/destinos">Destinos</a></li>
							<li class="breadcrumb-item"><a href="<?php echo $pais_link; ?>"><?php echo $pais_nome; ?></a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $destino_nome; ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>





		<!-- CONTENT PAGE DESCRIPTION -->
		<section class="main-description-page" id="cidade">
			<div class="container">
				<div class="row mb-sm-3 mb-lg-5">
					<div class="col-12">
						<h1>SOBRE A CIDADE</h1>
						<div class="line-h-6 mt-4"></div>
					</div>
				</div>
				<div class="row">
					<?php
					$imgUrl = get_relative_thumb($destino_dados["imagemDestaque"],'medium');
					?>
					<div class="col-12 col-sm-12 col-lg-3" style="background-size:cover;background-image:url(<?php echo $imgUrl ?>)">
					</div>
					<div class="col-12 col-sm-12 col-lg-9">
						<div class="title-description h-100">
							<h1><?php echo $destino_fraseDestaque;?></h1>
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
							<?php
							$destino_textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$destino_textoPrincipal))."</p>";
							echo $destino_textoPrincipal;
							?>
							<div class="line-h-100"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-6">
						<div class="main-icons">
							<div class="box-icon"><i class="zmdi zmdi-nature-people"></i></div>
							<div class="text-icons">
								<span>População</span>
								<h4><?php echo $destino_dados["populacao"] ?></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="main-icons">
							<div class="box-icon"><i class="zmdi zmdi-time"></i></div>
							<div class="text-icons">
								<span>Hora local</span>
								<h4 id="horaDestino"></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="main-icons">
							<div class="box-icon"><i class="zmdi zmdi-money-box"></i></div>
							<div class="text-icons">
								<span>1 <?php echo $destino_dados["moeda"] ?></span>
								<h4>R$ <?php echo $destino_dados["cotacao"];?></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="main-icons">
							<div class="box-icon"><i class="zmdi zmdi-sun"></i></div>
							<div class="text-icons">
								<span>Temperatura local</span>
								<h4><?php echo $temperatura;?>&deg;C</h4>
							</div>
						</div>
					</div>
					<div class="line-h-100"></div>
					<div class="line-h-166 mx-auto"></div>
				</div>
			</div>
		</section>






		<!-- GALLERY IMAGES E VIDEOS -->
		<?php
		if(isset($destino_dados["fotosVideos"]) && is_array($destino_dados["fotosVideos"])) {
			?>
			<section class="main-gallery" id="fotosVideos">
				<div class="container">
					<div class="row">
						<div class="col-12"><h4>FOTOS E VÍDEOS</h4></div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="owl-carousel gallery owl-theme" id="destino_sliderFotosVideos">
								<?php
								foreach($destino_dados["fotosVideos"] as $mediaItem) {
									?>
									<div class="item">
										<?php
										if(strlen($mediaItem) == 11) {
											//youtube
											?>
											<a href="https://www.youtube.com/embed/<?php echo $mediaItem;?>" data-thumbnail="https://img.youtube.com/vi/<?php echo $mediaItem;?>/hqdefault.jpg" data-group="set1" data-fullscreenmode="true" data-showsocial="true" data-autoslide="true" class="html5lightbox">
												<div class="object-cover" style="background-image:url(https://img.youtube.com/vi/<?php echo $mediaItem;?>/hqdefault.jpg);"  title="<?php the_title();?>"></div>
											</a>
											<?php
										} else {
											//foto
											$imgUrl = get_relative_thumb($mediaItem,'medium');
											$imgUrlG = get_relative_thumb($mediaItem,'large');
											?>
											<a href="<?php echo $imgUrlG; ?>" data-thumbnail="<?php echo $imgUrl; ?>" class="html5lightbox" data-group="set1" data-fullscreenmode="true" data-showsocial="true" data-autoslide="true">
												<div class="object-cover" style="background-image:url(<?php echo $imgUrl; ?>);"  title="<?php the_title();?>"></div>
											</a>
											<?php
										}
										?>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
		?>




		<!-- LIVING GUIDE -->
		<section class="living-guide">
			<div class="container">
				<div class="row mb-3">
					<div class="col-12">
						<h4>GUIA DO DESTINO</h4>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-12 col-lg-6">
						<small>INFORMAÇÕES ÚTEIS</small>
					</div>
					<div class="col-12 col-lg-6">
						<small>CUSTO DE VIDA</small>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="box-info">
							<span><b>Código DDI:</b> <?php echo $destino_dados["guiaVivencia"]["codDDI"] ?></span>
							<span><b>Código DDD:</b> <?php echo $destino_dados["guiaVivencia"]["codDDD"] ?></span>
						</div>
						<div class="box-info">
							<span><b>FUSO HORÁRIO:</b> <?php echo $destino_dados["guiaVivencia"]["fusoTxt"] ?></span>
							<span><b>TEMPERATURA:</b> <?php echo $destino_dados["guiaVivencia"]["temperaturasTxt"] ?></span>
						</div>
						<div class="box-info">
							<span><b>VOLTAGEM:</b> <?php echo $destino_dados["guiaVivencia"]["voltagem"] ?></span>
							<span><b>MOEDA:</b> <?php echo $destino_dados["moeda"] ?></span>
						</div>
						<div class="phone-emergency"><b>TELEFONE DE EMERGÊNCIA:</b> <?php echo $destino_dados["guiaVivencia"]["foneEmergencia"] ?></div>
					</div>
					<div class="col-12 col-lg-6 line-left pt-5 pt-lg-0">
						<div class="row">
							<div class="col-6 col-lg-4">
								<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-bus"></i></a>
								<a href="#"><h6>TICKET AVULSO DE ÔNIBUS</h6></a>
								<h5 class="text-center"><?php echo $destino_dados["moedaCod"]." ".number_format($destino_dados["guiaVivencia"]["custo"]["onibus"],2,",",".");?></h5>
							</div>
							<div class="col-6 col-lg-4">
								<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-coffee"></i></a>
								<a href="#"><h6>CAFÉ DA MANHÃ</h6></a>
								<h5 class="text-center"><?php echo $destino_dados["moedaCod"]." ".number_format($destino_dados["guiaVivencia"]["custo"]["refeicao"],2,",",".");?></h5>
							</div>
							<div class="col-6 col-lg-4">
								<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-cutlery"></i></i></a>
								<a href="#"><h6>ALMOÇO</h6></a>
								<h5 class="text-center"><?php echo $destino_dados["moedaCod"]." ".number_format($destino_dados["guiaVivencia"]["custo"]["mcmeal"],2,",",".");?></h5>
							</div>
							<div class="col-6 col-lg-4">
								<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-pizza"></i></a>
								<a href="#"><h6>JANTAR</h6></a>
								<h5 class="text-center"><?php echo $destino_dados["moedaCod"]." ".number_format($destino_dados["guiaVivencia"]["custo"]["cocacola"],2,",",".");?></h5>
							</div>
<!-- 							<div class="col-6 col-lg-4">
								<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-cloud-outline"></i></a>
								<a href="#"><h6>1 BAGUETE DE PÃO</h6></a>
								<h5 class="text-center"><?php //echo $destino_dados["moedaCod"]." ".number_format($destino_dados["guiaVivencia"]["custo"]["baguete"],2,",",".");?></h5>
							</div> -->
						</div>
					</div>
					<div class="col-12">
						<div class="line-h-white-100"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<small>OPÇÕES DE TRANSPORTE</small>
					</div>
				</div>
				<div class="row">
					<?php
					foreach($destino_dados["transporte"] as $transporte) {
						?>
						<div class="col-12 col-lg-6">
							<div class="line-v-2"></div>
							<div class="content-txt">
								<span><b><?php echo $transporte["titulo"] ?></b></span>
								<p><?php echo $transporte["descricao"] ?></p>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>

		<!-- ATTRACTIONS -->
		<?php
		if(isset($destino_dados["atracoes"]) && is_array($destino_dados["atracoes"])) {
			?>
			<section class="main-cards-slider">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h4>ATRAÇÕES</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="owl-carousel cards-slider owl-theme" id="destino_sliderAtracoes">
								<?php
								foreach($destino_dados["atracoes"] as $atracao) {
									$imgUrl = get_relative_thumb($atracao["imagem"],'medium');
									?>
									<div class="item">
										<div class="card">
											<div class="object-cover" style="background-image:url(<?php echo $imgUrl ?>)"></div>
											<div class="card-body">
												<span><?php echo $atracao["titulo"] ?></span>
												<p class="card-text"><?php echo $atracao["descricao"] ?></p>
												<div class="line-h-2"></div>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>	
						</div>
					</div>
				</div>
			</section>
			<?php
		}


		if($temAcomodacoes) {

			?>
			<section id="acomodacoes" class="main-cards">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h4>ACOMODAÇÕES</h4>
						</div>
					</div>
					<div class="row">

						<?php echo $acomodacoes;?>

					</div>
				</div>
			</section>
			<?php

		}
		

		//bloco de intercâmbios
		require "inc/inc_bloco_intercambios.php";

		//bloco de diferenciais
		require "inc/inc_bloco_diferenciais.php";

		//bloco de depoimentos
		require "inc/inc_bloco_depoimentos.php";

		//bloco de posts blog
		require "inc/inc_bloco_blog.php";

		//bloco de form cadastro newsletter
		require "inc/inc_bloco_cadastraNews.php";

		?>
		<script>

			//atualiza horário local do destino
			atualizaHoraDestino = function() {
				horaDestino = new Date(horaDestino.valueOf() + 1000);
				var horaVisual = horaDestino.toTimeString().split(" ")[0];
				document.getElementById("horaDestino").innerHTML = horaVisual;
			}
			<?
			$timeOffset = time() + 3600*($destino_dados["fuso"]+date("I"));
			?>
			var horaDestino = new Date( <?php echo gmdate("Y",$timeOffset);?> , <?php echo gmdate("n",$timeOffset);?> , <?php echo gmdate("j",$timeOffset);?> , <?php echo gmdate("H",$timeOffset);?> , <?php echo gmdate("i",$timeOffset);?> , <?php echo gmdate("s",$timeOffset);?> , 0);
			var atualizaHora = setInterval(atualizaHoraDestino,1000);
			atualizaHoraDestino();

		</script>
		<?php

		
	}
		
	?>



</main>

<?php


get_footer();
