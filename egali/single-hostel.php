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
$hostel = get_post_meta($post->ID,'hostel_dados',true);
$textoPrincipal = get_post_meta($post->ID,'hostel_textoPrincipal',true);


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
$imagemDestaque = get_relative_thumb($hostel["imagemDestaque"],'large');
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
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/hostel/">hostels egali</a></li>
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
					<h1>Hostel <?php the_title();?></h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-4 col-lg-4 animate-after">
					<div class="object-cover" style="background-image:url(<?php echo $imagemDestaque; ?>)"></div>
				</div>
				<div class="col-12 col-sm-8 col-lg-8">
					
					<?php
					the_content();
					?>

					<div class="line-h-100 mb-4 mt-4"></div>

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

	<!-- GALLERY IMAGES E VIDEOS -->
	<?php
	if(isset($hostel["fotosVideos"]) && is_array($hostel["fotosVideos"])) {
		?>
		<section class="main-gallery" style="background-image: none;" id="fotosVideos">
			<div class="container">
				<div class="row">
					<div class="col-12"><h4>FOTOS E VÍDEOS</h4></div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="owl-carousel gallery owl-theme" id="destino_sliderFotosVideos">
							<?php
							foreach($hostel["fotosVideos"] as $mediaItem) {
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

	<!-- CARDS -->
	<section class="living-guide" style="background-color: transparent;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="row">
						<iframe src="https://www.google.com/maps?q=<?php echo $hostel["endereco"]." ".$cidade." ".$pais; ?>&output=embed" width="100%" height="503" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>


	
	<?php

	require "inc/inc_bloco_blog.php";

	require "inc/inc_bloco_cadastraNews.php";

	?>
	

</main>

<?php
get_footer();
