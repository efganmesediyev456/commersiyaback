$.noConflict();

jQuery(document).ready(function($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	});

	jQuery('.selectpicker').selectpicker;




	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	$('.equal-height').matchHeight({
		property: 'max-height'
	});

	// var chartsheight = $('.flotRealtime2').height();
	// $('.traffic-chart').css('height', chartsheight-122);


	// Counter Number
	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 3000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});




	// Menu Trigger
	$('#menuToggle').on('click', function(event) {
		var windowWidth = $(window).width();
		if (windowWidth<1010) {
			$('body').removeClass('open');
			if (windowWidth<760){
				$('#left-panel').slideToggle();
			} else {
				$('#left-panel').toggleClass('open-menu');
			}
		} else {
			$('body').toggleClass('open');
			$('#left-panel').removeClass('open-menu');
		}

	});


	$(".menu-item-has-children.dropdown").each(function() {
		$(this).on('click', function() {
			var $temp_text = $(this).children('.dropdown-toggle').html();
			$(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
		});
	});


	// Load Resize
	$(window).on("load resize", function(event) {
		var windowWidth = $(window).width();
		if (windowWidth<1010) {
			$('body').addClass('small-device');
		} else {
			$('body').removeClass('small-device');
		}

	});

    $(document).on('click','.simple_item_button',function (e) {
        console.log(1000)
        e.preventDefault() ;

        if (window.innerWidth > 1960)
        {
            var width = 1700 ;
            var height = 800 ;
        }

        else if (window.innerWidth > 1440){
            var width = 1360 ;
            var height = 720 ;
        }

        else if (window.innerWidth > 1260){
            var width = 1000 ;
            var height = 600 ;
        }

        window.open($(this).attr('href')    ,'_blank','menubar=false,location=no,resizable=no,scrollbars=yes,status=no,width='+ width +',height='+ height+',top=400,left=600')

})


});


