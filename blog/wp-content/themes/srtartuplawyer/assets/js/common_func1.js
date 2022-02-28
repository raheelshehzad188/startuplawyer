(function ($) {



	"use strict";



// Lazy load

var lazyLoadInstance = new LazyLoad({

    elements_selector: ".lazy"

});



// Carousel categories home page

	$('.categories_carousel1').owlCarousel({

		center: false,

		items: 1,

		loop: false,

		margin: 20,

		// dots:false,

		nav: true,

		lazyLoad:true,

        navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],

		responsive: {

			0: {

				nav: true,

				dots:false,

				items: 3

			},

			480: {

				nav: true,

				dots:false,

				items: 1

			},

			768: {

				nav: true,

				dots:false,

				items: 3

			},

			1025: {

				nav: true,

				dots:false,

				items: 3

			},

			1340: {

				nav: true,

				dots:false,

				items: 3

			}

		}

	});

//slots on search service provider

	$('.days_carousel1').owlCarousel({

		center: false,

		items: 1,

		loop: false,

		margin: 20,

		// dots:false,

		nav: true,

		lazyLoad:true,

        navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],

		responsive: {

			0: {

				nav: true,

				dots:false,

				items: 3

			},

			480: {

				nav: true,

				dots:false,

				items: 1

			},

			768: {

				nav: true,

				dots:false,

				items: 3

			},

			1025: {

				nav: true,

				dots:false,

				items: 3

			},

			1340: {

				nav: true,

				dots:false,

				items: 3

			}

		}

	});



	$('.slot_carousel1').owlCarousel({

		center: false,

		items: 1,

		loop: false,

		margin: 20,

		// dots:false,

		nav: true,

		lazyLoad:true,

        navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],

		responsive: {

			0: {

				nav: true,

				dots:false,

				items: 3

			},

			480: {

				nav: true,

				dots:false,

				items: 5

			},

			768: {

				nav: true,

				dots:false,

				items: 3

			},

			1025: {

				nav: true,

				dots:false,

				items: 3

			},

			1340: {

				nav: true,

				dots:false,

				items: 3

			}

		}

	});



	// Carousel detail page

	$('.carousel_1').owlCarousel({

		items: 1,

		loop: false,

		lazyLoad:true,

		margin: 0,

		dots:false,

		nav:false

	});



	// Carousel home page

		$('.carousel_4').owlCarousel({
			items: 1,
			loop: false,
			margin: 20,
			dots:false,
            lazyLoad:true,
			navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],
			nav:true,
			responsive: {
			0: {
				items: 1,
				nav: false,
				dots:true
			},
			560: {
				items: 1,
				nav: false,
				dots:true
			},
			768: {
				items: 1,
				nav: false,
				dots:true
			},
			991: {
				items: 3,
				nav: true,
				dots:false
			},
			1230: {
				items: 3,
				nav: true,
				dots:false
			}
		}
		});
		///asdd by raheel
		$('.owl_raheel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})



	// Sticky nav

	$(window).on('scroll', function () {

		if ($(this).scrollTop() > 1) {

			$('.element_to_stick').addClass("sticky");

		} else {

			$('.element_to_stick').removeClass("sticky");

		}

	});

	$(window).scroll();



	// Header background

	$('.background-image').each(function(){

		$(this).css('background-image', $(this).attr('data-background'));

	});



	// Rotate icons

	$(".categories_carousel1 .item a").hover(

		function(){$(this).find("i").toggleClass("rotate-x");}

	);

	$('.days_carousel1 .owl-next').click( function(){

	    //slot_carousel1

	    $('.slot_carousel1 .owl-next').click();

	    $('.slot_carousel1 .owl-nav').css('visibility','hidden'); 

	});

	$('.days_carousel1 .owl-prev').click( function(){

	    $('.slot_carousel1 .owl-prev').click();

	    $('.slot_carousel1 .owl-nav').css('visibility','hidden'); 

	});

	

	// Menu

	$('a.open_close').on("click", function () {

		$('.main-menu').toggleClass('show');

		$('.layer').toggleClass('layer-is-visible');

	});

	$('a.show-submenu').on("click", function () {

		$(this).next().toggleClass("show_normal");

	});

	

	// Opacity mask

	$('.opacity-mask').each(function(){

		$(this).css('background-color', $(this).attr('data-opacity-mask'));

	});



	// Scroll to top

	var pxShow = 800; // height on which the button will show

	var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.

	$(window).scroll(function(){

	 if($(window).scrollTop() >= pxShow){

		$("#toTop").addClass('visible');

	 } else {

		$("#toTop").removeClass('visible');

	 }

	});

	$('#toTop').on('click', function(){

	 $('html, body').animate({scrollTop:0}, scrollSpeed);

	 return false;

	});	

	

	//Footer collapse

	var $headingFooter = $('footer h3');

	$(window).resize(function() {

        if($(window).width() <= 768) {

      		$headingFooter.attr("data-toggle","collapse");

        } else {

          $headingFooter.removeAttr("data-toggle","collapse");

        }

    }).resize();

	$headingFooter.on("click", function () {

		$(this).toggleClass('opened');

	});



	// Scroll to position

    $('a[href^="#"].btn_scroll').on('click', function (e) {

			e.preventDefault();

			var target = this.hash;

			var $target = $(target);

			$('html, body').stop().animate({

				'scrollTop': $target.offset().top

			}, 800, 'swing', function () {

				window.location.hash = target;

			});

		});



	// Like Icon

    $('.btn_hero.wishlist').on('click', function(e){

    	e.preventDefault();

		$(this).toggleClass('liked');

	});



	// Modal Sign In

	$('#sign-in').magnificPopup({

		type: 'inline',

		fixedContentPos: true,

		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,

		preloader: false,

		midClick: true,

		removalDelay: 300,

		closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',

		mainClass: 'my-mfp-zoom-in'

	});



	// Show hide password

	$('#password, #password_sign').hidePassword('focus', {

		toggle: {

			className: 'my-toggle'

		}

	});



})(window.jQuery); 