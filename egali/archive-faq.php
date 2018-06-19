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
						<li class="breadcrumb-item"><a href="/"><?php _e('Home','egali'); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php _e('FAQ','egali'); ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-accordion mt-150">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1><?php _e('FAQ','egali'); ?></h1>
					<div class="line-h-6 mt-4 mb-5"></div>
					
					<div id="accordion">

						<?php
						if(have_posts()) {
							while (have_posts()) {
								the_post();
								$faqId = get_the_ID();
								?>

								<div class="card">
									<div class="card-header" id="heading<?php echo $faqId; ?>">
									<h6 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $faqId; ?>" aria-expanded="true" aria-controls="collapse<?php echo $faqId; ?>">
										<i class="zmdi zmdi-chevron-up"></i>
										<i class="zmdi zmdi-chevron-down"></i>
										<?php the_title(); ?>
										</button>
									</h6>
									</div>
								
									<div id="collapse<?php echo $faqId; ?>" class="collapse" aria-labelledby="heading<?php echo $faqId; ?>" data-parent="#accordion">
									<div class="card-body">
										<?php the_content(); ?>
									</div>
									</div>
								</div>


								<?php
							}
						} else {
						}
						?>

					</div>	
				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
