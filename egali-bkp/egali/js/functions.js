jQuery(document).ready(function () {
    // MENU MOBILE
    jQuery('.navbar-toggler').click(function(){
		jQuery(this).find('#nav-icon').toggleClass('open');
    });
    
     jQuery('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var $el =  jQuery(this);
        var $parent =  jQuery(this).offsetParent(".dropdown-menu");
        if (! jQuery(this).next().hasClass('show')) {
             jQuery(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu =  jQuery(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

         jQuery(this).parent("li").toggleClass('show');

         jQuery(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
             jQuery('.dropdown-menu .show').removeClass("show");
        });

        if (!$parent.parent().hasClass('navbar-nav')) {
            $el.next().css({ "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 });
        }

        return false;
    });
    
    // CAMPO BUSCA
     jQuery('a[href="#toggle-search"], .bootsnipp-search .input-group-btn > .btn[type="reset"]').on('click', function (event) {
        event.preventDefault();
         jQuery('.bootsnipp-search .input-group > input').val('');
         jQuery('.bootsnipp-search').toggleClass('open');
         jQuery('a[href="#toggle-search"]').closest('li').toggleClass('active');

        if ( jQuery('.bootsnipp-search').hasClass('open')) {
            /* I think .focus dosen't like css animations, set timeout to make sure input gets focus */
            setTimeout(function () {
                 jQuery('.bootsnipp-search .form-control').focus();
            }, 100);
        }
    });
     jQuery(document).on('keyup', function (event) {
        if (event.which == 27 &&  jQuery('.bootsnipp-search').hasClass('open')) {
             jQuery('a[href="#toggle-search"]').trigger('click');
        }
    });

     jQuery('#txtPesquisar').keypress(function (e) {
        if (e.which == 13) {
            document.location = '/resultadosbusca.aspx?k=' +  jQuery('#txtPesquisar').val();
            return false;
        }
    });

	//*** Inicializa sliders ***

	//1.Diferenciais (várias páginas)
	if(jQuery('#sliderDiferenciais').length) {
		jQuery('#sliderDiferenciais').owlCarousel({
			autoplay: true,
			autoPlaySpeed: 5000,
			autoPlayTimeout: 5000,
			autoplayHoverPause: true,
			loop:false, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:15, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.	

			responsive:{ 
			0:{
				items:2 
			},
			768:{
				items:3
			},
			1024:{
				items:5 
			},
			}
		});
	}

	//2.Destinos: fotos e vídeos
	if(jQuery('#destino_sliderFotosVideos, #blog_sliderFotosVideos').length) {
		jQuery('#destino_sliderFotosVideos, #blog_sliderFotosVideos').owlCarousel({
			autoplay: true,
			autoPlaySpeed: 5000,
			autoPlayTimeout: 5000,
			autoplayHoverPause: true,
			loop:false, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:15, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.	

			responsive:{
				0:{
					items:1 
				},
				768:{
					items:2
				},
				1024:{
					items:3
				}
			}
		});
	}
	 
	//Destinos: atrações
	if(jQuery('#destino_sliderAtracoes').length) {
		jQuery('#destino_sliderAtracoes').owlCarousel({
			autoplay: true,
			autoPlaySpeed: 5000,
			autoPlayTimeout: 5000,
			autoplayHoverPause: true,
			loop:false, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:15, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.	

			responsive:{ 
			0:{
				items:1 
			},
			768:{
				items:2
			},
			1024:{
				items:4
			},
			}
		});
	}
	
	//Destinos: custo de vida
	if(jQuery('#destino_sliderCustoVida').length) {
		jQuery('#destino_sliderCustoVida').owlCarousel({
			autoplay: true,
			autoPlaySpeed: 5000,
			autoPlayTimeout: 5000,
			autoplayHoverPause: true,
			loop:false, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:15, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.	

			responsive:{ 
			0:{
				items:2 
			},
			768:{
				items:3
			},
			1024:{
				items:5
			},
			}
		});
	}
    
    // MENU RIGHT MOBILE
     jQuery("#menu-close").click(function(e) {
        e.preventDefault();
         jQuery("#sidebar-wrapper").toggleClass("active");
      });
       jQuery("#menu-toggle").click(function(e) {
        e.preventDefault();
         jQuery("#sidebar-wrapper").toggleClass("active");
      });
      // RESIZE BANNER HOME
      var $item =  jQuery('.carousel-item');
      if ( jQuery(window).width() > 769) {

          var $wHeight = ( jQuery(window).height()) - 200;

           jQuery(window).on('resize', function () {
              $wHeight = ( jQuery(window).height()) - 200;
              $item.height($wHeight);
          });
      } else if ( jQuery(window).width() < 415) {
          var $wHeight = ( jQuery(window).height()) - 100;

           jQuery(window).on('resize', function () {
              $wHeight = ( jQuery(window).height()) - 100;
              $item.height($wHeight);
          });
      } else {
          var $wHeight = ( jQuery(window).height()) - 600;

           jQuery(window).on('resize', function () {
              $wHeight = ( jQuery(window).height()) - 600;
              $item.height($wHeight);
          });

      }

      $item.eq(0).addClass('active');
      $item.height($wHeight);
      $item.addClass('full-screen');

      if ( jQuery(".carousel-item").length == 1) {
           jQuery(".carousel-control-prev-icon").css("display", "none");
           jQuery(".carousel-control-next-icon").css("display", "none");
      }

    // Altura Igual Box
    function equalHeight(group) {
        tallest = 0;
        group.each(function() {
            thisHeight = jQuery(this).height();
                if(thisHeight > tallest) {
                tallest = thisHeight; }
        });
        group.height(tallest);
    }
	 
    /*MENU ANCORA*/
    jQuery('a.ancora').click(function () {
        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery(this).attr('href')).offset().top
        }, 500);
        return false;
    });
    /*Scroll Top*/
    jQuery(window).scroll(function () {
        var vrheight = jQuery('#header').height() - 20;
        if (jQuery(this).scrollTop() > vrheight) {
            jQuery('.scrollToTop').fadeIn();
        } else {
            jQuery('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    jQuery('.scrollToTop').click(function () {
        jQuery('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    equalHeight(jQuery('.main-stores .card'));
    
    jQuery('#enviarComentario').click(function(){
        jQuery('#respond #submit').trigger('click');
    });

	//nos intercâmbios, seta select do orçamento fácil para o programa clicado
	jQuery('.btOrcamentoFacil').click(function() {
		var programa = jQuery(this).data('programa');
		jQuery('#exampleModalCenter .programa select').val(programa);
		jQuery('#exampleModalCenter').modal('show');
	});





	//carrega posts do blog por ajax
	if (typeof blogAjax !== 'undefined') {
		carregaPostsBlog();
	}




   
    jQuery(".data").mask("99/99/9999");
    jQuery(".tel")
    .mask("(99) 9999-9999?9")
    .focusout(function (event) {  
        var target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, '');
        element = jQuery(target);  
        element.unmask();  
        if(phone.length > 10) {  
            element.mask("(99) 99999-999?9");  
        } else {  
            element.mask("(99) 9999-9999?9");  
        }  
    });
});

//Animated Header
jQuery(function(){
    var shrinkHeader = 300;
    jQuery(window).scroll(function() {
    var scroll = getCurrentScroll();
        if ( scroll >= shrinkHeader ) {
            jQuery('#header').addClass('sticky');
        }
        else {
            jQuery('#header').removeClass('sticky');
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
});



function carregaPostsBlog() {
	//var blogAjax = { categoria:<?php echo $categoria_id;?> , pagina:1 , carregando:false };
	if(!blogAjax.carregando) {
		
		console.log("carregando posts");

		blogAjax.carregando = true;
		jQuery.post( 
			ajaxUrl,
			{action:'carregaPostsBlog',info:blogAjax},
			function(data) {
				blogAjax.carregando = false;
				if(data.sucesso) {
					
					for(var p in data.posts) {

						if (jQuery('#listaDinamicaPosts').is(':empty')) {

							jQuery('#listaDinamicaPosts').append(
								jQuery('<div/>').addClass('col-12 col-lg-12 col-md-12').append(
									jQuery('<div/>').addClass('card mb-4').append(
										jQuery('<div/>').addClass('card-img-top object-cover').css('background-image','url(' + data.posts[p].imagem + ')'),
										jQuery('<div/>').addClass('box-category ml-6 category-color-red').text(data.posts[p].categoria),
										jQuery('<div/>').addClass('card-body space-x').append(
											jQuery('<h1/>').text(data.posts[p].titulo),
											jQuery('<p/>').addClass('card-text').text(data.posts[p].resumo),
											jQuery('<a/>').addClass('card-link').attr('href',data.posts[p].link).html('<i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>')
										)
									)
								)
							
							);

						} else {
						
							jQuery('#listaDinamicaPosts').append(
								jQuery('<div/>').addClass('col-12 col-md-6 col-lg-6').append(
									jQuery('<div/>').addClass('card').append(
										jQuery('<div/>').addClass('object-cover').css('background-image','url(' + data.posts[p].imagem + ')'),
										jQuery('<div/>').addClass('box-category category-color-red').text(data.posts[p].categoria),
										jQuery('<div/>').addClass('card-body').append(
											jQuery('<div/>').addClass('line-h-6'),
											jQuery('<h5/>').text(data.posts[p].titulo),
											jQuery('<p/>').addClass('card-text').text(data.posts[p].resumo),
											jQuery('<a/>').addClass('card-link').attr('href',data.posts[p].link).html('<i class="zmdi zmdi-long-arrow-right"></i> LEIA MAIS</a>')
										)
									)
								)
							
							);

						}
					}

					blogAjax.pagina++;

				} else {
					alert("Erro lendo posts do blog");
				}
			},
			"json"
		);

	}		
}
