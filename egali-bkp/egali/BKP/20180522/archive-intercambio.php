<?php
get_header();
?>

    <!-- MAIN -->
    <main>
		<!-- BREADCRUMB -->
		<section class="main-breadcrumb">
			<div class="container">
				<div class="row">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo get_site_url();?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Intercâmbios</li>
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
						<h1>Intercâmbios</h1>
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
				foreach($egali_globais["intercambios"] as $tipoIntercambio) {
					?>
					<div class="row">
						<div class="col-12">
							<h4><?php echo $tipoIntercambio["nome"];?></h4>
						</div>
					</div>
					<?php
					foreach($tipoIntercambio["cursos"] as $curso) {
						?>
						<div class="col-12 col-lg-4 col-md-6">
							<div class="card">
								<div class="object-cover" style="background-image:url(<?php echo $curso["imagem"];?>);"></div>
								<div class="card-img-overlay">
									<div class="line-h-4"></div>
									<h3><?php echo $curso["nome"];?></h3>
									<p class="card-text"><?php echo $curso["fraseDestaque"];?></p>
									<a href="<?php echo $curso["link"];?>" class="btn-exchange-primary">VEJA MAIS</a>
									<a data-toggle="modal" href="#exampleModalCenter" class="btn-exchange-secundary">ORÇAMENTO FACIL</a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					<div class="row">
						<div class="col-12">
							<div class="line-h-100"></div>
						</div>
					</div>
					<?php
				}
				?>

			</div>
		</section>
		
		<?php
		require "inc/inc_bloco_diferenciais.php";
		?>

	</main>

<?php
get_footer();
