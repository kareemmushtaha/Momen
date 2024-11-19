(function ($) {
  "use-strict";

  
	/*------------------------------------
		menu mobile
	--------------------------------------*/
  $(".header-mobile__toolbar").on("click", function () {
    $(".menu--mobile").addClass("menu-mobile-active");
    $(".mobile-menu-overlay").addClass("mobile-menu-overlay-active");
  });

  $(".mobile-menu-overlay").on("click", function () {
    $(".menu--mobile").removeClass("menu-mobile-active");
    $(".mobile-menu-overlay").removeClass("mobile-menu-overlay-active");
  });

  $(".main-header .btn-close-header-mobile").on("click", function () {
    $(".menu--mobile").removeClass("menu-mobile-active");
    $(".mobile-menu-overlay").removeClass("mobile-menu-overlay-active");
  });
  if($(window).width() < 992){
    $('.menu--mobile .main-menu .menu_item .menu_link ').click(function(e){
      $(this).closest('.menu_item').siblings().find('.menu__submenu').slideUp()
      $(this).closest('.menu_item').siblings().find('.fa-chevron-down').removeClass('fa-chevron-up').addClass('fa-chevron-down')
      $(this).closest('.menu_item').find('.menu__submenu').slideToggle()
      $(this).closest('.menu_item').find('.fa-chevron-down').toggleClass('fa-chevron-up')
    })
  }
  

  
	/*------------------------------------
		loader page
	--------------------------------------*/
  $(window).on("load", function () {
    $(".loader-page").fadeOut(500);
    var wow = new WOW({
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 0,
      mobile: false,
      live: true
    });
    new WOW().init();
  });



  /*------------------------------------
		tooltip
	--------------------------------------*/
  $('[data-toggle="tooltip"]').tooltip();



  /*------------------------------------
		modal
	--------------------------------------*/
  


  

  $('#modalReq').on('shown.bs.modal', function () {
    $('.group_RangeSlider').fadeIn()
    $(".RangeSlider").ionRangeSlider({
      min: 0,
      max: 800,
      from: 200,
      to: 500,
      type: "double",
      prefix: "  رس  "
    });
    
  })
  /*------------------------------------
		lightcase
	--------------------------------------*/
  $('[data-rel^=lightcase]').lightcase();


  
  /*------------------------------------
		ionRangeSlider
	--------------------------------------*/

  

})(jQuery);

 
  /*------------------------------------
		swiper
	--------------------------------------*/
  var interleaveOffset = 0.5;
  var swiperOptions = {
    // loop: true,
    speed: 2500,
    parallax: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    watchSlidesProgress: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },

    on: {
      progress: function () {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          var slideProgress = swiper.slides[i].progress;
          var innerOffset = swiper.width * interleaveOffset;
          var innerTranslate = slideProgress * innerOffset;
          swiper.slides[i].querySelector('.slide-inner').style.transform =
            'translate3d(' + -innerTranslate + 'px, 0, 0)';
        }
      },

      touchStart: function () {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          swiper.slides[i].style.transition = '';
        }
      },

      setTransition: function (speed) {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          swiper.slides[i].style.transition = speed + 'ms';
          swiper.slides[i].querySelector('.main-sider-inner').style.transition =
            speed + 'ms';
        }
      },
    }
  };

  var swiper = new Swiper('.slider-hero', swiperOptions);

 


 
  