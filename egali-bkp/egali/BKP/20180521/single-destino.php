<?php
get_header();
$destino_id = get_the_ID();
$locais = get_the_terms($destino_id,'local');
if(count($locais) < 2) wp_die(_e("Erro: País ou cidade não especificados"));
foreach($locais as $loc) {
	$loc = (array)$loc;
	if($loc["parent"] == 0) {
		$pais = $loc["name"];
	} else {
		$cidade = $loc["name"];
	}
}
$destino = get_post_meta($destino_id,'destino_dados',true);
$fraseDestaque = get_post_meta($destino_id,'destino_fraseDestaque',true);
$textoPrincipal = get_post_meta($destino_id,'destino_textoPrincipal',true);


echo "<!--".$destino_id."-->";
?>

<!-- MAIN -->
<main>
	<!-- BANNER -->
	<section class="banne-internal" style="background-image:url(<?php echo $destino["bannerPrincipal"] ?>)"></section>
	<!-- MENU DESTINY -->
	<section class="main-menu-internal"> 
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-4">
					<div class="destiny">Destino</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<h4><?php echo $pais; ?>: <span><?php the_title();?></span></h4>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<i class="zmdi zmdi-format-align-right"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link ancora" href="#cidade">A CIDADE <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#cursos">Cursos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#fotosVideos">Fotos e Vídeos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link ancora" href="#acomodacoes">Acomodoção</a>
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
						<li class="breadcrumb-item active" aria-current="page">Destinos</li>
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
					<h1>SOBRE A CIDADE</h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-3 col-lg-3" style="background-size:cover;background-image:url(<?php echo $destino["imagemDestaque"] ?>)">
				</div>
				<div class="col-12 col-sm-9 col-lg-9">
					<div class="title-description h-100">
						<h1><?php echo $fraseDestaque;?></h1>
						<div class="line-h-6"></div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12">
						<?php
						$textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$textoPrincipal))."</p>";
						echo $textoPrincipal;
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
							<h4><?php echo $destino["populacao"] ?></h4>
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
							<span>1 <?php echo $destino["moeda"] ?></span>
							<?php
							//busca cotação da moeda
							$egali_bd = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
							if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
							$egali_bd->set_charset("utf8");
							$result = $egali_bd->query("select cotacao from egali_cotacoes where moeda = '".$destino["moedaCod"]."'");
							if($result->num_rows) {
								$row = $result->fetch_assoc();
								$valor = number_format($row["cotacao"],2,",",".");
							} else {
								$valor = "?";
							}
							?>
							<h4>R$ <?php echo $valor;?></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="main-icons">
						<div class="box-icon"><i class="zmdi zmdi-sun"></i></div>
						<div class="text-icons">
							<span>Temperatura local</span>
							<h4>??º</h4>
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
	if(isset($destino["fotosVideos"]) && is_array($destino["fotosVideos"])) {
		?>
		<section class="main-gallery" id="fotosVideos">
			<div class="container">
				<div class="row">
					<div class="col-12"><h4>FOTOS E VÍDEOS</h4></div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="owl-carousel owl-theme" id="destino_sliderFotosVideos">
							<?php
							foreach($destino["fotosVideos"] as $mediaItem) {
								?>
								<div class="item">
									<?php
									if(strlen($mediaItem) == 11) {
										//youtube
										?>
										<iframe class="object-cover" src="https://www.youtube.com/embed/<?php echo $mediaItem;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
										<?php
									} else {
										//foto
										?>
										<a href="<?php echo $mediaItem; ?>" data-lightbox="destinoFotosVideos" data-title="<?php the_title();?>">
											<div class="object-cover" style="background-image:url(<?php echo $mediaItem; ?>);"  title="<?php the_title();?>"></div>
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
					<h4>GUIA DE VIVÊNCIA</h4>
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
						<span><b>Código DDI:</b> <?php echo $destino["guiaVivencia"]["codDDI"] ?></span>
						<span><b>Código DDD:</b> <?php echo $destino["guiaVivencia"]["codDDD"] ?></span>
					</div>
					<div class="box-info">
						<span><b>FUSO HORÁRIO:</b> <?php echo $destino["guiaVivencia"]["fusoTxt"] ?></span>
						<span><b>TEMPERATURA:</b> <?php echo $destino["guiaVivencia"]["temperaturasTxt"] ?></span>
					</div>
					<div class="box-info">
						<span><b>VOLTAGEM:</b> <?php echo $destino["guiaVivencia"]["voltagem"] ?></span>
						<span><b>MOEDA:</b> <?php echo $destino["moeda"] ?></span>
					</div>
					<div class="phone-emergency"><b>TELEFONE DE EMERGÊNCIA:</b> <?php echo $destino["guiaVivencia"]["foneEmergencia"] ?></div>
				</div>
				<div class="col-12 col-lg-6 line-left">
					<div class="row">
						<div class="col-6 col-lg-4">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-cutlery"></i></a>
							<a href="#"><h6>REFEIÇÃO EM RESTURANTE ESTUDANTIL</h6></a>
							<h5 class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["refeicao"],2,",",".");?></h5>
						</div>
						<div class="col-6 col-lg-4">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-view-carousel"></i></i></a>
							<a href="#"><h6>MC MEAL OU COMBO EQUIVALENTE NO MC DONALD'S</h6></a>
							<h5 class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["mcmeal"],2,",",".");?></h5>
						</div>
						<div class="col-6 col-lg-4">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-drink"></i></a>
							<a href="#"><h6>COCA-COLA (300ML)</h6></a>
							<h5 class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["cocacola"],2,",",".");?></h5>
						</div>
						<div class="col-6 col-lg-4">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-cloud-outline"></i></a>
							<a href="#"><h6>1 BAGUETE DE PÃO</h6></a>
							<h5 class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["baguete"],2,",",".");?></h5>
						</div>
						<div class="col-6 col-lg-4">
							<a class="box-icon mx-auto" href="#"><i class="zmdi zmdi-bus"></i></a>
							<a href="#"><h6>TICKET DE ÔNIBUS (IDA OU VOLTA)</h6></a>
							<h5 class="text-center"><?php echo $destino["moedaCod"]." ".number_format($destino["guiaVivencia"]["custo"]["onibus"],2,",",".");?></h5>
						</div>
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
				foreach($destino["transporte"] as $transporte) {
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
	if(isset($destino["atracoes"]) && is_array($destino["atracoes"])) {
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
							foreach($destino["atracoes"] as $atracao) {
								?>
								<div class="item">
									<div class="card">
										<div class="object-cover" style="background-image:url(<?php echo $atracao["imagem"] ?>)"></div>
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
				<div class="row">
					<div class="col-12 text-center">
						<div class="bg-btn">
							<a href="#" class="btn btn-secondary">VEJA MAIS SOBRE</a>
						</div>
					</div>
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



</main>
<script>

	//atualiza horário local do destino
	atualizaHoraDestino = function() {
		horaDestino = new Date(horaDestino.valueOf() + 1000);
		var horaVisual = horaDestino.toTimeString().split(" ")[0];
		document.getElementById("horaDestino").innerHTML = horaVisual;
	}
	<?
	$timeOffset = time() + 3600*($destino["fuso"]+date("I"));
	?>
	var horaDestino = new Date( <?php echo gmdate("Y",$timeOffset);?> , <?php echo gmdate("n",$timeOffset);?> , <?php echo gmdate("j",$timeOffset);?> , <?php echo gmdate("H",$timeOffset);?> , <?php echo gmdate("i",$timeOffset);?> , <?php echo gmdate("s",$timeOffset);?> , 0);
	
	var atualizaHora = setInterval(atualizaHoraDestino,1000);

	atualizaHoraDestino();

</script>

<?php


get_footer();
