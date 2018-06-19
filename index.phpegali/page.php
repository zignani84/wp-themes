<?php
get_header();
the_post();
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
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- CONTENT PAGE DESCRIPTION -->
	<section class="main-description-page">
		<div class="container">
			<div class="row">
				<div class="col-9">
					<h1><?php the_title();?></h1>
					<div class="line-h-6 mt-4"></div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12 col-sm-12 col-lg-12">
					<?php
						the_content();
					?>
				</div>
			</div>
		</div>
	</section>

	<?php
	require "inc/inc_bloco_cadastraNews.php";
	?>

</main>

<?php
get_footer();

