jQuery.noConflict();
 jQuery(document).ready(function () {
    // MENU MOBILE
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
    // SLIDER DIFFERENTIAL
     jQuery('.owl-carousel').owlCarousel({
        autoplay: true,
        autoPlaySpeed: 5000,
        autoPlayTimeout: 5000,
        autoplayHoverPause: true,
        loop:true, // loop is true up to 1199px screen.
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

          var $wHeight = ( jQuery(window).height()) - 150;

           jQuery(window).on('resize', function () {
              $wHeight = ( jQuery(window).height()) - 150;
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
});