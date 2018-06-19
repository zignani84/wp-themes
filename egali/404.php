<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package egali
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
						<li class="breadcrumb-item active" aria-current="page"><?php _e('ERRO 404','egali'); ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-result-search">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1><?php _e('OPS! PÁGINA NÃO ENCONTRADA','egali'); ?></h1>
					<div class="line-h-6 mt-4 mb-5"></div>
					<p><?php _e('Desculpe, mas não encontramos o que você estava procurando.','egali'); ?><br/>
					<b><?php _e('Nós aconselhamos você a seguir com as seguintes opções abaixo:','egali'); ?></b></p>
					<div class="line-h-100 line-grey mb-4"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-3 col-lg-2">
					<a href="#" class="btn btn-primary mb-3"><?php _e('IR PARA HOME','egali'); ?></a>
				</div>
				<div class="col-12 col-md-4 col-lg-3">
					<a href="#" class="btn btn-primary btn-primary-alternate mb-3"><?php _e('VOLTAR A SEÇÃO ANTERIOR','egali'); ?></a>
				</div>
				<div class="col-12 col-md-5 col-lg-7">
					<div class="form-group">
						<input type="email" class="form-control" id="resultSearch" aria-describedby="resultSearch" placeholder="Pesquisar">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
