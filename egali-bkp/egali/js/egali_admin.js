(function ($, document, window) {


	//Extrai código do vídeo de url do youtube
	$["youTubeGetId"] = function(url) {

		var id = '';
		url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
		if(url[2] !== undefined) {
			id = url[2].split(/[^0-9a-z_\-]/i);
			id = id[0];
		} else {
			id = false;
		}
		return id;
		
	}
	
	
	//Insere imagem
	$["insereImagem"] = function(botao) {

		var imageSelect;
		var multiple = botao.data('multiple') == '1'?true:false;
		var container = botao.data('container');
		var fieldname = botao.data('fieldname');
		var params = {
			frame: 'post',
			state: 'insert',
			multiple: multiple,
			library: {
				type:'image'
			}
		};

		var imageSelect = wp.media(params);

		imageSelect.on('insert', function () {
			var excedeuLimite = false;
			var imagens = imageSelect.state().get('selection');
			if(imagens.length) {
				var maxItens = parseInt($('#' + container).data('maxitens'));
				if(maxItens == 1) {
					$('#' + container).empty();
				}
				var numItens = parseInt($('#' + container + ' div.mediaThumb').length);
				imagens.each(function(imagem) {
					if(numItens < maxItens) {
						$('#' + container).append(
							$('<div/>').addClass('col-md-3 itemMidia').append(
								$('<div/>').addClass('mediaThumb').css('background-image','url(' + imagem.attributes.url + ')').append(
									$('<span/>').addClass('dashicons dashicons-no btRemover').click(function() {
										$(this).parents('.itemMidia').remove();
									})
								),
								$('<input/>').attr({type:'hidden' , name:fieldname}).val(imagem.attributes.url)
							)
						);
						numItens++;
					} else excedeuLimite = true;
				});
			}
		});

		imageSelect.open();
		
	}
	
	
	
	
	//Executa ao entrar no admin	
	$(document).ready(function() {
		
		// *** BOTÕES INSERÇÃO DE IMAGENS ***
		//os botões precisam ter 3 parâmetros data:
		//1. data-multiple: 0/1 permite seleção de múltiplas imagens (galeria)
		//2. data-container: id da div onde serão inseridas a(s) imagen(s)
		//3. data-fieldname: name do campo que irá conter a url da imagem inserida
		$('.btInsereImagem').click(function(e) {

			e.preventDefault();
			var botao = $(this);
			$.insereImagem(botao);

		});


		// *** BOTÕES INSERÇÃO DE VÍDEOS ***
		//os botões precisam ter 2 parâmetros data:
		//1. data-container: id da div onde serão inseridos o(s) videos(s)
		//2. data-fieldname: name do campo que irá conter a url do vídeo inserida
		$('.btInsereVideo').click(function(e) {

			e.preventDefault();

			var container = $(this).data('container');
			var fieldname = $(this).data('fieldname');
			var videoUrl = prompt("YouTube URL:");
			var codigo = $.youTubeGetId(videoUrl);
			if(codigo !== false) {
				var maxItens = parseInt($('#' + container).data('maxitens'));
				if(maxItens == 1) {
					$('#' + container).empty();
				}
				var numItens = parseInt($('#' + container + ' div.mediaThumb').length);
				if(numItens < maxItens) {
					$('#' + container).append(
						$('<div/>').addClass('col-md-3 itemMidia').append(
							$('<div/>').addClass('mediaThumb').css('background-image','url(https://img.youtube.com/vi/' + codigo + '/hqdefault.jpg)').append(
								$('<span/>').addClass('dashicons dashicons-no btRemover').click(function() {
									$(this).parents('.itemMidia').remove();
								})
							),
							$('<input/>').attr({type:'hidden' , name:fieldname}).val(codigo)
						)
					);
				} else excedeuLimite = true;
			} else {
				alert("Digite uma url válida do YouTube");
			}

		});
		
		
		// *** BOTÕES REMOVE ITEM DE MÍDIA ***
		$('.itemMidia .btRemover').click(function() {
			$(this).parents('.itemMidia').remove();
		})





		//*** DESTINOS - FUNÇÕES ESPECÍFICAS ***


		//insere transporte no destino

		var indiceTransportes = $('#containerListaTransporte div.itemTransporte').length;

		$('#btInsereTransporte').click(function(){
			var quantItens = $('#containerListaTransporte div.itemTransporte').length;
			if(indiceTransportes <  quantItens) indiceTransportes = quantItens;
			$('#containerListaTransporte').append(
				$('<div/>').addClass('row itemTransporte').append(
					$('<div/>').addClass('col-md-12').append(
						$('<span/>').addClass('pull-right dashicons dashicons-no btRemover').click(function(){
							$(this).parents('.itemTransporte').remove();
						})
					),
					$('<div/>').addClass('col-md-12').append(
						$('<div/>').addClass('form-group').append(
							$('<label/>').text('Transporte'),
							$('<input/>').addClass('form-control').attr({type:'text' , name:'destino_dados[transporte][' + indiceTransportes + '][titulo]'})
						)
					),
					$('<div/>').addClass('col-md-12').append(
						$('<div/>').addClass('form-group').append(
							$('<label/>').text('Descrição'),
							$('<textarea/>').addClass('form-control').attr({name:'destino_dados[transporte][' + indiceTransportes + '][descricao]' , rows:'5'})
						)
					),
					$('<div/>').addClass('col-md-12').append(
						$('<hr/>')
					)
				)
			);
			indiceTransportes++;
		});
	

		// remove item transporte

		$('.itemTransporte .btRemover').click(function() {
			$(this).parents('.itemTransporte').remove();
		})
		


		//insere atracao no destino

		var indiceAtracoes = $('#containerListaAtracoes div.itemAtracao').length;

		$('#btInsereAtracao').click(function(){
			var quantItens = $('#containerListaAtracoes div.itemAtracao').length;
			if(indiceAtracoes <  quantItens) indiceAtracoes = quantItens;
			$('#containerListaAtracoes').append(
				$('<div/>').addClass('row itemAtracao').append(
					$('<div/>').addClass('col-md-12').append(
						$('<span/>').addClass('pull-right dashicons dashicons-no btRemover').click(function(){
							$(this).parents('.itemAtracao').remove();
						})
					),
					$('<div/>').addClass('col-md-12').append(
						$('<div/>').addClass('form-group').append(
							$('<label/>').text('Atração'),
							$('<input/>').addClass('form-control').attr({type:'text' , name:'destino_dados[atracoes][' + indiceAtracoes + '][titulo]'})
						)
					),
					$('<div/>').addClass('col-md-12').append(
						$('<div/>').addClass('form-group').append(
							$('<label/>').text('Descrição'),
							$('<textarea/>').addClass('form-control').attr({name:'destino_dados[atracoes][' + indiceAtracoes + '][descricao]' , rows:'5'})
						)
					),
					$('<div/>').addClass('col-md-12').append(
						$('<div/>').attr({id:'containerImagemAtracao_' + indiceAtracoes}).data('maxitens','1').addClass('row')
					),
					$('<div/>').addClass('col-md-12').append(
						$('<button/>').attr('type','button').data({multiple:'0' , container:'containerImagemAtracao_' + indiceAtracoes , fieldname:'destino_dados[atracoes][' + indiceAtracoes + '][imagem]'}).addClass('button btInsereImagem').append(
							$('<span />').addClass('dashicons dashicons-format-image'),
							' Inserir Imagem'
						).click(function(e) {
							e.preventDefault();
							var botao = $(this);
							$.insereImagem(botao);
						})
					),
					$('<div/>').addClass('col-md-12').append(
						$('<hr/>')
					)
				)
			);
			indiceAtracoes++;
		});
	

		// remove item atração

		$('.itemAtracao .btRemover').click(function() {
			$(this).parents('.itemAtracao').remove();
		})
		

	});


}(jQuery, document, window));



/*



							<div class="col-md-12">
								<div id="containerImagemAtracao_<?php echo $i; ?>" class="row" data-maxitens="1">
									<?php
									if(isset($atracao["imagem"]) && !empty($atracao["imagem"])) {
										?>
										<div class="col-md-3 itemMidia">
											<div class="mediaThumb" style="background-image:url(<?php echo $atracao["imagem"];?>);">
												<span class="dashicons dashicons-no btRemover"></span>
											</div>
											<input type="hidden" name="destino_dados[atracoes][<?php echo $i; ?>][imagem]" value="<?php echo $atracao["imagem"];?>">
										</div>					
										<?php
									}
									?>
									
								</div>
							</div>

							<div class="col-md-12">

								<button type="button" class="button btInsereImagem" data-multiple="0" data-container="containerImagemAtracao_<?php echo $i; ?>" data-fieldname="destino_dados[atracoes][<?php echo $i; ?>][imagem]">
									<span class="dashicons dashicons-format-image"></span> <?php _e('Inserir Imagem','egali')?>
								</button>

							</div>



*/
