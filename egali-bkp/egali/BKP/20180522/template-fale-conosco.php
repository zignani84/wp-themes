<?php
/**
 * Template Name: Fale Conosco
 */

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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">FALE CONOSCO</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="main-contact">
		<div class="container position-relative">
			<div class="row">
				<div class="col-12 col-lg-7">
					<h1>FALE CONOSCO</h1>
					<div class="line-h-6 mb-5 mt-4"></div>
					<P>Nossos consultores especializados estão esperando seu contato.</P>
					<P>Preencha os campos e em até 24 horas você receberá retorno.</P>

					<?php echo do_shortcode( '[contact-form-7 id="103" title="Fale Conosco" html_class="mt-5"]' ); ?>

					<!--<form class="mt-5">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="NOME">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="EMAIL">
						</div>
						<div class="form-group">
							<input type="tel" class="form-control" placeholder="TELEFONE">
						</div>
						<div class="form-group">
							<select class="form-control">
							<option>SELECIONE COMO CONHECEU A EGALI *</option>	
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Qual é o assunto que você deseja conversar? *</label>
							<select class="form-control">
							<option>SELECIONE COMO CONHECEU A EGALI *</option>	
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control">
							<option>SELECIONE UM ASSUNTO *</option>	
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control">
							<option>SELECIONE UMA UNIDADE *</option>	
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control">
							<option>SELECIONE O PAIS DE INTERESSE *</option>	
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<div class="form-group">
							<label>É muito importante que você nos conte seus planos para que possamos montar o seu orçamento de intercâmbio personalizado. *</label>
							<textarea class="form-control" rows="3" placeholder="DESCRIÇÃO"></textarea>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="option1">
							<label class="form-check-label">Aceito receber novidades Egali.</label>
						</div>
						<p>Obs.: Nosso email pode cair na sua caixa de spam/lixo eletrônico, favor verificar!</p>
						<a href="#" class="btn btn-secondary float-right">ENVIAR</a>
					</form>-->

				</div>
			</div>
		</div>
	</section> 
</main>

<?php
get_footer();
