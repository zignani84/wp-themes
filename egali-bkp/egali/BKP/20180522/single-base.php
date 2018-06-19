<?php
get_header();

$pais = "";
$cidade = "";
$locais = get_the_terms($ID,'local');
if(count($locais) < 2) wp_die(_e("Erro: País ou cidade não especificados"));
foreach($locais as $loc) {
	$loc = (array)$loc;
	if($loc["parent"] == 0) {
		$pais = $loc["name"];
	} else {
		$cidade = $loc["name"];
	}
}
$base = get_post_meta($post->ID,'base_dados',true);
$textoPrincipal = get_post_meta($post->ID,'base_textoPrincipal',true);


//busca destino associado a esta cidade
$destino = get_posts(
	array(
		'showposts' => 1,
		'post_type' => 'destino',
		'tax_query' => array(
			array(
			'taxonomy' => 'local',
			'field' => 'name',
			'terms' => array($cidade)
			)
		)
    )
);
$linkDestino = false;
if(count($destino)) {
	$linkDestino =  get_the_permalink($destino[0]->ID);
}

wp_reset_query();
?>

<!-- MAIN -->
<main>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="base">bases egali</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
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
					<h1><?php the_title();?></h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-4 col-lg-4 animate-after">
					<div style="width:100%;height:310px;background-size:cover;background-position:center center;background-image:url(<?php echo $base["imagemDestaque"] ?>)"></div>
				</div>
				<div class="col-12 col-sm-8 col-lg-8">
					
					<?php
					$textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$textoPrincipal))."</p>";
					echo $textoPrincipal;
					?>

					<div class="line-h-100 mb-4 mt-4"></div>

					<p><b>O que a Base Egali <?php the_title();?> oferece?</b></p>
					
					<p><?php echo nl2br($base["oferece"]); ?></p>

					<?php
					if($linkDestino) {
						?>
						<a href="<?php echo $linkDestino;?>" class="btn btn-secondary">SOBRE <?php the_title();?></a>
						<?php
					}
					?>

				</div>
			</div>
		</div>
	</section>
	<!-- CARDS -->
	<section class="main-base">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-5">
					<div class="row">
						<iframe src="https://www.google.com/maps?q=<?php echo $base["endereco"]." ".$cidade." ".$pais; ?>&output=embed" width="100%" height="503" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-12 col-lg-7">
					<div class="base-itens">
						<h5>CONHEÇA A BASE EGALI EM <?php the_title();?></h5>
						<div class="row-itens">
							<div class="col-itens">
								<b>Walking</b> 
								<span><?php echo nl2br($base["walking"]);?></span>
							</div>
							<div class="col-itens">
								<b>Orientação Pós-embarque</b>
								<span><?php echo nl2br($base["orientacao"]);?></span>
							</div>
						</div>
						<div class="row-itens">
							<div class="col-itens">
								<b>Informações úteis </b>
								<span><?php echo nl2br($base["infoUteis"]);?></span>
							</div>
							<div class="col-itens">
								<b>Abertura de conta bancária</b>
								<span><?php echo nl2br($base["aberturaConta"]);?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- CARDS -->
	<section class="main-cards main-accommodation">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>ACOMODAÇÕES</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body text-center">
							<a class="text-left" href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text text-left"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
							<a href="#" class="btn btn-secondary">RESERVE AGORA</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body text-center">
							<a class="text-left" href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text text-left"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
							<a href="#" class="btn btn-secondary">RESERVE AGORA</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo get_theme_file_uri(); ?>/img/img-so-egali.png" alt="Card image cap" title="">
						<div class="card-body text-center">
							<a class="text-left" href="#"><h5 class="card-title">Card title</h5></a>
							<p class="card-text text-left"><a href="#">Some quick example text to build on the card title and make up the bulk of the card's content.</a></p>
							<a href="#" class="btn btn-secondary">RESERVE AGORA</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- SECTION BLOG -->
	<section class="news-blog">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4>FALANDO DE GOLD COAST</h4>
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
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<a href="#" class="btn btn-secondary">VEJA TODOS OS POSTS</a>
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

<?php
get_footer();
