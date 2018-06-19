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
$imagemDestaque = get_relative_thumb($base["imagemDestaque"],'medium');
wp_reset_query();
?>

<!-- MAIN -->
<main>
	<!-- BREADCRUMB -->
	<section class="main-breadcrumb mt-150">
		<div class="container">
			<div class="row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>"><?php _e('Home','egali'); ?></a></li>
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/base/"><?php _e('Bases Egali','egali'); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12">
					<h1><?php _e('BASE','egali'); ?> <?php the_title();?></h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-4 col-lg-4 animate-after">
					<div class="object-cover" style="background-image:url(<?php echo $imagemDestaque; ?>)"></div>
				</div>
				<div class="col-12 col-sm-8 col-lg-8">
					
					<?php
					$textoPrincipal = "<p>".implode("</p>\n\n<p>",preg_split('/\n(?:\s*\n)+/',$textoPrincipal))."</p>";
					echo $textoPrincipal;
					?>

					<div class="line-h-100 mb-4 mt-4"></div>

					<p><b><?php _e('O que a Base Egali','egali'); ?> <?php the_title();?> <?php _e('oferece?','egali'); ?></b></p>
					
					<p><?php echo nl2br($base["oferece"]); ?></p>

					<?php
					if($linkDestino) {
						?>
						<a href="<?php echo $linkDestino;?>" class="btn btn-secondary"><?php _e('SOBRE','egali'); ?> <?php the_title();?></a>
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
				<?php
				if(!empty(trim($base["walking"])) && !empty(trim($base["orientacao"])) && !empty(trim($base["infoUteis"]))) {
				?>
				<div class="col-12 col-lg-5">
					<div class="row">
						<iframe src="https://www.google.com/maps?q=<?php echo $base["endereco"]." ".$cidade." ".$pais; ?>&output=embed" width="100%" height="503" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-12 col-lg-7">
					<div class="base-itens">
						<h5><?php _e('CONHEÇA A BASE EGALI EM','egali'); ?> <?php the_title();?></h5>
						<div class="row-itens">
							<div class="col-itens">
								<b><?php _e('Walking Tour','egali'); ?></b> 
								<span><?php echo nl2br($base["walking"]);?></span>
							</div>
							<div class="col-itens">
								<b><?php _e('Orientação Pós-embarque','egali'); ?></b>
								<span><?php echo nl2br($base["orientacao"]);?></span>
							</div>
						</div>
						<div class="row-itens">
							<div class="col-itens">
								<b><?php _e('Informações úteis','egali'); ?> </b>
								<span><?php echo nl2br($base["infoUteis"]);?></span>
							</div>
							<?php if(!empty(trim($base["aberturaConta"]))) { ?>
							<div class="col-itens">
								<b><?php _e('Abertura de conta bancária','egali'); ?></b>
								<span><?php echo nl2br($base["aberturaConta"]);?></span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php
				} else {
				?>
				<div class="col-12 col-lg-12">
					<div class="row">
						<iframe src="https://www.google.com/maps?q=<?php echo $base["endereco"]." ".$cidade." ".$pais; ?>&output=embed" width="100%" height="503" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</section>
	
	
	<?php
	//busca houses e hostels associados a esta cidade
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
				'terms' => array($cidade)
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
						<h5 class="card-title"><?php _e('House','egali'); ?> <?php echo $house->post_title; ?></h5>
						<a class="btn-secondary" style="display:block" href="<?php echo $house_link;?>"><?php _e('Saiba Mais','egali'); ?></a>
					</div>
				</div>
			</div>
			<?php
		}
	}
	
	//hostels
	$hostels = get_posts(
		array(
			'showposts' => -1,
			'post_type' => 'hostel',
			'tax_query' => array(
				array(
				'taxonomy' => 'local',
				'field' => 'name',
				'terms' => array($cidade)
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
						<h5 class="card-title"><?php _e('House','egali'); ?> <?php echo $hostel->post_title; ?></h5>
						<a class="btn-secondary" style="display:block" href="<?php echo $hostel_link;?>"><?php _e('Saiba Mais','egali'); ?></a>
					</div>
				</div>
			</div>
			<?php
		}
	}

	$acomodacoes = ob_get_clean();
	wp_reset_query();
	
	
	if($temAcomodacoes == true) {

		?>
		<section class="main-cards main-accommodation">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h4><?php _e('ACOMODAÇÕES','egali'); ?></h4>
					</div>
				</div>
				<div class="row">

					<?php echo $acomodacoes;?>

				</div>
			</div>
		</section>
		<?php

	}

	require "inc/inc_bloco_blog.php";

	require "inc/inc_bloco_cadastraNews.php";

	?>
	

</main>

<?php
get_footer();
