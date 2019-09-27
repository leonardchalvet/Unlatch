
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


for(let i = 1 ; i < 10 ; i++) {
	$('#header-desktop .link-' + i).click(function(){
		for(let j = 1 ; j < 10 ; j++) {
			$('#header-desktop').removeClass('open-dropdown-' + j);
		}
		if ($('#header-desktop').hasClass('open-dropdown-' + i)) {
			$('#header-desktop').removeClass('open-dropdown-' + i);
		} else {
			$('#header-desktop').addClass('open-dropdown-' + i);
		}
	})
}

$(document).click(function(){
	if (!$(event.target).closest('#header-desktop').length) {
		for(let i = 1 ; i < 10 ; i++) {
			if ($('#header-desktop').hasClass('open-dropdown-' + i)) {
				$('#header-desktop').removeClass('open-dropdown-' + i);
			}
		}
	}
})

$('main').click(function(){
	$('#header-desktop').removeClass('open-dropdown-product open-dropdown-features open-dropdown-entreprise');
})

$('em').each(function(){
	$(this).replaceWith('<span>' + $(this).html() +'</span>');
})

$('a.openLightbox').click(function(){
	$('body').addClass('block');
	$('.container-lightbox').addClass('displayBlock');
	setTimeout(function(){
		$('.container-lightbox').addClass('show');
	})
})

$('.container-lightbox .lightbox .cross').click(function(){
	$('.container-lightbox').removeClass('show');
	setTimeout(function(){
		$('.container-lightbox').removeClass('displayBlock');
		$('body').removeClass('block');
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