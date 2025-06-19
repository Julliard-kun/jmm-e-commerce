/* ===============================================
  TABS
=============================================== */
    jQuery(document).ready(function () {
      jQuery( ".tablinks" ).first().addClass( "active" );
      jQuery( ".tabcontent" ).first().addClass( "active" );
    });

    function ecommerce_clothing_services_tab(evt, cityName) {
      var ecommerce_clothing_i, ecommerce_clothing_tabcontent, ecommerce_clothing_tablinks;
      ecommerce_clothing_tabcontent = document.getElementsByClassName("tabcontent");
      for (ecommerce_clothing_i = 0; ecommerce_clothing_i < ecommerce_clothing_tabcontent.length; ecommerce_clothing_i++) {
        ecommerce_clothing_tabcontent[ecommerce_clothing_i].style.display = "none";
      }
      ecommerce_clothing_tablinks = document.getElementsByClassName("tablinks");
      for (ecommerce_clothing_i = 0; ecommerce_clothing_i < ecommerce_clothing_tablinks.length; ecommerce_clothing_i++) {
        ecommerce_clothing_tablinks[ecommerce_clothing_i].className = ecommerce_clothing_tablinks[ecommerce_clothing_i].className.replace(" active", "");
      }
      jQuery('#'+ cityName).show()
      evt.currentTarget.className += " active";

      initializeOwlCarousel();
    }

    function initializeOwlCarousel() {
      jQuery('.services_main_box .owl-carousel').each(function () {
        var owl = jQuery(this);
        // Destroy the carousel if already initialized to prevent multiple instances
        if (owl.hasClass('owl-loaded')) {
          owl.trigger('destroy.owl.carousel'); // Destroys previous initialization
        }

        // Initialize the carousel
        owl.owlCarousel({
          margin: 50,
          stagePadding: 100,
          nav: true,
          autoplay: true,
          lazyLoad: true,
          rtl:true,
          autoplayTimeout: 5000,
          loop: true,
          dots: false,
          navText: ['<i class="fa fa-lg fa-caret-left"></i>', '<i class="fa fa-lg fa-caret-right"></i>'],
          responsive: {
            0: {
            items: 1,
            margin: 10,
            stagePadding: 10,
              },
              576: {
                items: 1
              },
              768: {
                margin: 30,
                items: 3
              },
              1000: {
                items: 4
              },
              1200: {
                items: 4
              }
          },
          autoplayHoverPause: false,
          mouseDrag: true
        });
      });
    }

jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");



    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', testing)

    function testing(event) {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.shiftKey && e.which === 9) {
                    if ($(this).hasClass('focus')) {
                    }

                } else if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }                
            })
        } else {
            $('.main-navigation').find("li").unbind('keydown')
        }
    }

    testing()

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                const $the_last_li = $('.main-navigation').find("li").last()
                $the_last_li.find('a').focus()
                if (!$the_last_li.hasClass('focus')) {

                    const $is_parent_on_top = true
                    let $the_parent_ul = $the_last_li.closest('ul.sub-menu')

                    let count = 0

                    while (!!$the_parent_ul.length) {
                        ++count

                        const $the_parent_li = $the_parent_ul.closest('li')

                        if (!!$the_parent_li.length) {
                            $the_parent_li.addClass('focus')
                            $the_parent_ul = $the_parent_li.closest('ul.sub-menu')

                            // Blur the cross
                            $(this).blur()
                            $the_last_li.addClass('focus')
                        }

                        if (!$the_parent_ul.length) {
                            break;
                        }
                    }

                }

            };
        }
    })

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */

    // Determine if the document is RTL
    var isRtl = $('html').attr('dir') === 'rtl';

    $('.banner-slider').slick({
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        rtl: isRtl, // Set the rtl option
        responsive: [{
            
            breakpoint: 1025,
            settings: {
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 480,
            settings: {
                dots: true,
                arrows: false,
            }
        }]
    });

    // Initialize on page load
    jQuery(document).ready(function() {
      initializeOwlCarousel();
    });
    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.ecommerce-clothing-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
    
});

document.addEventListener('DOMContentLoaded', function() {
  const header = document.querySelector('.sticky-header');
  if (header) { // Check if header exists
    window.addEventListener('scroll', function() {
      if (window.scrollY > 0) {
        header.classList.add('is-sticky');
      } else {
        header.classList.remove('is-sticky');
      }
    });
  }
});

