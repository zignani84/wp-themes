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
							<li class="breadcrumb-item">Destinos</li>
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
						<h1>DESTINOS</h1>
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

				<div class="row">
					<?php
						foreach($egali_globais["destinos"] as $pais) {
							if($pais["link"]) {
								$imgUrl = get_relative_thumb($pais["imagemDestaque"],'medium');
								?>
								<div class="col-12 col-lg-4">
									<div class="card">
										<div class="card-img-top" style="background-image:url('<?php echo $imgUrl ?>');height:180px;background-size:cover;"></div>                                
										<div class="card-body" style="box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);">
											<h5 class="card-title"><?php echo $pais["nome"]; ?></h5>
											<a class="btn-secondary" style="display:block" href="<?php echo $pais["link"];?>">Saiba Mais</a>
										</div>
									</div>
								</div>
								<?php
							}
						}
					?>

				</div>




			</div>
		</section>
		
		<?php
		require "inc/inc_bloco_diferenciais.php";
		?>

	</main>

<?php
get_footer();
