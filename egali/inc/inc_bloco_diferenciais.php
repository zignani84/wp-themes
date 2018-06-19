<?php

//Bloco com itens de diferenciais - repete em várias páginas do site

$argsDiferenciais = array(
	'post_type'		=> 'diferenciais'
);
$buscaDiferenciais = new WP_Query($argsDiferenciais);
if($buscaDiferenciais->have_posts()) {
?>

<!-- SECTION DIFFERENTIAL -->
<section class="differential bg-internal-diferetial" id="diferenciais">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 class="text-center"><?php _e('DIFERENCIAIS','egali')?></h4>
				<div class="owl-carousel owl-theme mt-5" id="sliderDiferenciais">
				<?php
				while ($buscaDiferenciais->have_posts()) {

					$buscaDiferenciais->the_post();
					$postAtual = get_the_ID();
					$titulo = get_the_title();
					$diferencial = get_post_meta($postAtual,"diferenciais_dados",true);
					$icone = $diferencial["icone"];
					$link = $diferencial["link"];
					
					?>
					<div class="item">
						<div class="box-icon mx-auto"><i class="zmdi <?php echo $icone; ?>"></i></div>
						<h6><?php echo $titulo; ?></h6>
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

wp_reset_query();

?>