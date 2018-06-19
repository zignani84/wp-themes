(function (egalijs,$,document,window,undefined) {
	
	egalijs.localizaUsuario = function() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(egalijs.enviaPosicao,egalijs.erroPosicao);
		} else {
			egalijs.enviaPosicao({sucesso:false,resposta:"naoDisponivel1"});
		}
	}
	
	egalijs.enviaPosicao = function(posicao) {
		$.post( 
			ajaxUrl,
			{action:'enviaPosicao',posicao:posicao},
			function(data) {
				if(data.sucesso) {
					if($('select[name="unidade"]').length) {
						$('select[name="unidade"]').each(function() {
							$(this).val(data.userLocation.lojaMaisProxima);
						});
					}
				}
			},
			"json"
		);
	}
	
	egalijs.erroPosicao = function(erro) {
		switch(erro.code) {
			case erro.PERMISSION_DENIED:
				egalijs.enviaPosicao({sucesso:false,resposta:"usuarioNegou"});
				break;
			case erro.POSITION_UNAVAILABLE:
				egalijs.enviaPosicao({sucesso:false,resposta:"naoDisponivel2"});
				break;
			case erro.TIMEOUT:
				egalijs.enviaPosicao({sucesso:false,resposta:"timeOut"});
				break;
			case erro.UNKNOWN_ERROR:
				egalijs.enviaPosicao({sucesso:false,resposta:"erroDesconhecido"});
				break;
		}
	}
	
	if(userLocation == null) {
		egalijs.localizaUsuario();
		console.log("loc1");
	} else {
		if($('select[name="unidade"]').length) {
			$('select[name="unidade"]').each(function() {
				$(this).val(userLocation.lojaMaisProxima);
			});
		}
		console.log("loc2");
	}
	
}(window.egalijs = window.egalijs || {},jQuery,document,window));
