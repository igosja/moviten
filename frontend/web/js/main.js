function initialize(lat, lng) {
    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 15,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var image = '/img/map-icon.png';
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: image,
        title: ''
    });
}

jQuery(document).ready(function ($) {
    var overlay_forms = $('.overlay-forms');
    var popup_youtube = $('.popup.youtube');
    var footer = $("footer");
    var slider_div = $(".slider");
    var map_div = $("#map");
    if (map_div.length) {
        initialize(map_div.data('lat'), map_div.data('lng'));
    }
    var delay = 1000;
    $('.to-top').click(function () {
        $('body, html').animate({
            scrollTop: 0
        }, delay);
    });

    $('.jqui-select > select').selectmenu();
    $('.jqui-lang > select').selectmenu();


    $('.overlayElementTrigger').on('click', function () {
        if (overlay_forms.is(':visible')) {
            $('.of-form').stop().fadeOut();
        } else {
            overlay_forms.stop().fadeIn();
        }
        $('.' + $(this).data('selector')).stop().fadeIn();
    });

    $('.form-overlay').on('click', function () {
        $('.of-form').stop().fadeOut();
        overlay_forms.stop().fadeOut();
        if (popup_youtube.length) {
            $('.youtube .video-container').find('iframe').attr('src', '');
            $('.popup.youtube').hide();
        }
    });

    $('.of-close').on('click', function () {
        $('.of-form').stop().fadeOut();
        overlay_forms.stop().fadeOut();
        if (popup_youtube.length) {
            $('.youtube .video-container').find('iframe').attr('src', '');
            $('.popup.youtube').hide();
        }
    });

    var slide = $("#slider");
    slide.owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 1,
        singleItem: true,
        responsive: true,
        responsiveRefreshRate: 1,
        pagination: true,
        navigationText: false,
        autoPlay: 5000,
        transitionStyle: "fade"
    });

    $("#transitionType").change(function () {
        var newValue = $(this).val();
        //TransitionTypes is owlCarousel inner method.
        slide.data("owlCarousel").transitionTypes(newValue);
        slide.trigger("owl.play");
    });

    var footerHeight = footer.outerHeight();

    footer.css({'margin-top': -footerHeight});
    $(".clearfix-footer").css({'height': footerHeight});

    $(".of-submit-form").click(function() {
        $('#submit-button-service').trigger('click');
    });

    $(".of-submit__contacts").click(function() {
        $('#submit-button-contact').trigger('click');
    });

    $(".phone_mask").mask("(999) 999-99-99");

    $('a[href^="#"]').click(function () {
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top
        }, 2000);
        return false;
    });

    if (slider_div.length) {
        slider_div.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            cssEase: 'linear',
            variableWidth: true,
            variableHeight: true,
            centerMode: true,
            asNavFor: '.slider-nav',
            prevArrow: $('.prev'),
            nextArrow: $('.next')
        });
    }

    if (slider_div.length) {
        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider',
            dots: false,
            focusOnSelect: true,
            loop: false,
            arrows: false
        });
    }

	if ($(".slider-main").length){
		$('.slider-main').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  dots: true,
		  infinite: true,
		  cssEase: 'linear',
		  variableWidth: true,
		  variableHeight: true,
		  centerMode:true,
			prevArrow: $('.prev'),
			nextArrow: $('.next'),
		});
	}
});

$(window).resize(function() {
	windowWidth = $(window).width();
	if ($(".slider-out").length){	
		if(windowWidth<768){
			$(".slider .slick-slide img").css({"max-width":windowWidth});
			$(".slider-main .slick-slide img").css({"max-width":windowWidth});
			$(".slider-main .slick-slide").css({"width": windowWidth});
		}
		else{
			$('.slider .slick-slide img').css({"max-width": "100%"});
			$(".slider-main .slick-slide img").css({"max-width":"580px"});
			$(".slider-main .slick-slide").css({"width":"600px"});
		}
	}
});

$(window).load(function() {
	windowWidth = $(window).width(); 
	if ($(".slider-out").length){	
		if(windowWidth<768){
			$(".slider .slick-slide img").css({"max-width":windowWidth});
			$(".slider-main .slick-slide img").css({"max-width":windowWidth});
			$(".slider-main .slick-slide").css({"width": windowWidth});			
		}
		else{
			$('.slider .slick-slide img').css({"max-width": "100%"});
			$(".slider-main .slick-slide img").css({"max-width":"580px"});
			$(".slider-main .slick-slide").css({"width":"600px"});			
		}			 
	}	
});