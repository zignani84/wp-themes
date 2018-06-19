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
							<li class="breadcrumb-item"><a href="<?php echo get_site_url();?>"><?php _e('Home','egali'); ?></a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php _e('Intercâmbios','egali'); ?></li>
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
						<h1><?php _e('Intercâmbios','egali'); ?></h1>
						<div class="line-h-6 mt-4"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="line-h-100"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- SECTION EXCHANGE -->
		<section class="main-exchange no-after" id="cursos">
			<div class="container">

				<?php
				$categoriaIntercambio = get_queried_object();
				?>
				<div class="row">
					<div class="col-12">
						<h4><?php echo $categoriaIntercambio->name;?></h4>
					</div>
				</div>

				<div class="row">
					<?php
					foreach($egali_globais["intercambios"][$categoriaIntercambio->slug]["cursos"] as $curso) {
						$imgUrl = get_relative_thumb($curso["imagem"],'medium');
						?>
						<div class="col-12 col-lg-4 col-md-6">
							<div class="card">
								<div class="object-cover" style="background-color:#ccc;background-image:url(<?php echo $imgUrl;?>);"></div>
								<div class="card-img-overlay">
									<div class="line-h-4"></div>
									<h3><?php echo $curso["nome"];?></h3>
									<p class="card-text"><?php echo $curso["fraseDestaque"];?></p>
									<a href="<?php echo $curso["link"];?>" class="btn-exchange-primary"><?php _e('VEJA MAIS','egali'); ?></a>
									<button type="button" class="btn-exchange-secundary btOrcamentoFacil" data-programa="<?php echo $curso["nome"];?>"><?php _e('ORÇAMENTO FACIL','egali'); ?></button>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="line-h-100"></div>
					</div>
				</div>

			</div>
		</section>
		
		<?php
		require "inc/inc_bloco_diferenciais.php";
		?>

	</main>

<?php
get_footer();
