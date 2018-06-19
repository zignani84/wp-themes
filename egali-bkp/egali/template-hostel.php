<?php
/**
 * Template Name: Egali Hostels
 */

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
						<li class="breadcrumb-item"><a href="#"><?php _e('Home','egali'); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php _e('Hostels','egali'); ?></li>
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
						<h1><?php _e('HOSTELS','egali'); ?></h1>
						<div class="line-h-6 mt-4"></div>
					</div>
				</div>
				<?php
				the_content();
				?>
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
					$argsHostels = array(
						'post_type'	=> 'hostel'
					);
					$hostels = new WP_Query($argsHostels);
					if($hostels->have_posts()) {
						while($hostels->have_posts()) {
							$hostels->the_post();
							$hostel_id = get_the_ID();
							$hostel_nome = get_the_title();
							$hostel_link = get_the_permalink();
							$hostel_dados = get_post_meta($hostel_id,'hostel_dados',true);

							$imgUrl = get_relative_thumb($hostel_dados["imagemDestaque"],'medium');
							?>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-img-top" style="background-image:url('<?php echo $imgUrl ?>');height:180px;background-size:cover;"></div>                                
									<div class="card-body" style="box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);">
										<h5 class="card-title"><?php echo $hostel_nome; ?></h5>
										<a class="btn-secondary" style="display:block" href="<?php echo $hostel_link;?>"><?php _e('Saiba Mais','egali'); ?></a>
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