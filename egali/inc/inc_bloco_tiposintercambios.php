<section class="main-exchange" id="intercambio">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-section-primary">
					<small><?php _e('NOSSOS','egali')?></small>
					<h2><?php _e('INTERCÂMBIOS','egali')?></h2>
				</div>
			</div>
		</div>
		<div class="row">

		<?php
		//Bloco com tipos de intercâmbio
		$termsTiposIntercambios = get_terms( array('taxonomy' => 'tipointercambio') , array( 'parent' => 0 ) );
		$tiposIntercambios = array();
		foreach ( $termsTiposIntercambios as $tipoIntercambio ){
			// o campo "description" do termo contem um json onde o primeiro campo é a url da umagem destaque 
			$jsonDados = json_decode($tipoIntercambio->description);
			if($jsonDados != null) {
				$imgUrl = $jsonDados[1];
			} else {
				$imgUrl = "";
			}

			//$tiposIntercambios[] = array( "nome" => $tipoIntercambio->name , "slug" => $tipoIntercambio->slug , "imagem" => $imagem );
			
			?>
			<div class="col-12 col-lg-4 col-md-6">
				<div class="card">
					<div class="object-cover" onclick="location.href='<?php echo get_site_url(); ?>/intercambios/<?php echo $tipoIntercambio->slug; ?>';" style="background-color:#ccc;background-image:url(<?php echo $imgUrl; ?>);"></div>
					<div class="card-img-overlay">
						<div class="line-h-4"></div>
						<h3><?php echo $tipoIntercambio->name; ?></h3>
						<a href="<?php echo get_site_url(); ?>/intercambios/<?php echo $tipoIntercambio->slug; ?>" class="btn-exchange-primary"><?php _e('VEJA MAIS','egali')?></a>
						<button type="button" class="btn-exchange-secundary btOrcamentoFacil" data-programa="<?php echo $tipoIntercambio->name; ?>"><?php _e('ORÇAMENTO FÁCIL', 'egali')?></button>
					</div>
				</div>
			</div>
			<?php			
			
		}
		?>

		</div>
		<div class="row">
			<div class="col-12 text-center">
				<a class="btn btn-secondary" href="<?php echo get_home_url(); ?>/promocoes"><?php _e('CONHEÇA NOSSAS PROMOÇÕES','egali')?></a>
			</div>
		</div>
	</div>
</section>
