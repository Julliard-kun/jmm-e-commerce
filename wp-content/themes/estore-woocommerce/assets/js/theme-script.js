function estore_woocommerce_openNav() {
  jQuery(".sidenav").addClass('show');
}
function estore_woocommerce_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function estore_woocommerce_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const estore_woocommerce_nav = document.querySelector( '.sidenav' );

      if ( ! estore_woocommerce_nav || ! estore_woocommerce_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...estore_woocommerce_nav.querySelectorAll( 'input, a, button' )],
        estore_woocommerce_lastEl = elements[ elements.length - 1 ],
        estore_woocommerce_firstEl = elements[0],
        estore_woocommerce_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && estore_woocommerce_lastEl === estore_woocommerce_activeEl ) {
        e.preventDefault();
        estore_woocommerce_firstEl.focus();
      }

      if ( shiftKey && tabKey && estore_woocommerce_firstEl === estore_woocommerce_activeEl ) {
        e.preventDefault();
        estore_woocommerce_lastEl.focus();
      }
    } );
  }
  estore_woocommerce_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
    margin: 0,
    nav:true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots: false,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      },
      1200: {
        items: 1
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });

  var owl = jQuery('#best-sell .owl-carousel');
    owl.owlCarousel({
    margin: 0,
    nav:true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: true,
    dots: true,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      },
      1000: {
        items: 4
      },
      1200: {
        items: 4
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
  jQuery(".loading2").delay(2000).fadeOut("slow");
});

jQuery(document).ready(function(){
  jQuery("button.cat-btn").click(function(){
    jQuery(".home_product_cat").toggle();
  });
});
