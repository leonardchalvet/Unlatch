
// @codekit-prepend 'jQuery.3.3.1.js'

/*========================================================================
================================= COMMON =================================
========================================================================*/



$(window).on('load', function() {
	$window = $(window);
	function animScroll() {
		var windowHeight = $window.height() / 1.2;
	    $('.sectionAnim_container').each(function() {
	        if ($window.scrollTop() >= $(this).offset().top - windowHeight + (windowHeight/4)) {
	        	if (!$(this).hasClass('reach')) {
	                $(this).addClass('reach');
	            }
	        }
	    });
	};
	$window.scroll(function() {
	    animScroll();
	});
	animScroll();
})


$('#header-desktop .link-solutions').click(function(){
	$('#header-desktop').removeClass('open-dropdown-features');
	if ($('#header-desktop').hasClass('open-dropdown-solutions')) {
		$('#header-desktop').removeClass('open-dropdown-solutions');
	} else {
		$('#header-desktop').addClass('open-dropdown-solutions');
	}
})

$('#header-desktop .link-features').click(function(){
	$('#header-desktop').removeClass('open-dropdown-solutions');
	if ($('#header-desktop').hasClass('open-dropdown-features')) {
		$('#header-desktop').removeClass('open-dropdown-features');
	} else {
		$('#header-desktop').addClass('open-dropdown-features');
	}
})

$('main').click(function(){
	$('#header-desktop').removeClass('open-dropdown-product open-dropdown-features');
})

$('em').each(function(){
	$(this).replaceWith('<span>' + $(this).html() +'</span>');
})

$('a.openLightbox').click(function(){
	$('.container-lightbox').addClass('displayBlock');
	setTimeout(function(){
		$('.container-lightbox').addClass('show');
	})
})

$('.container-lightbox .lightbox .cross').click(function(){
	$('.container-lightbox').removeClass('show');
	setTimeout(function(){
		$('.container-lightbox').removeClass('displayBlock');
	}, 500)
})

$(document).click(function(){
	if (!$(event.target).closest('.container-lightbox .lightbox').length) {
		if($('.container-lightbox').hasClass('show')) {
			$('.container-lightbox .lightbox .cross').click();
		}
	}
})


/*============================================================================
================================= END COMMON =================================
============================================================================*/