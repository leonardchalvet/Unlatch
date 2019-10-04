
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

$window = $(window);
$window.scroll(function() {
    if ( $window.scrollTop() >= 1 ) {
        $('#header-desktop').addClass('scroll');
        $('#header-blog-mobile').addClass('scroll');
    } else {
    	$('#header-desktop').removeClass('scroll');
    	$('#header-blog-mobile').removeClass('scroll');
    };
});

$('#header-blog-mobile .head .container-action').click(function(){
	if(!$('#header-blog-mobile').hasClass('open')) {
		$('#header-blog-mobile').addClass('open');
		$('body').addClass('block');
	}
	else {
		$('#header-blog-mobile').removeClass('open');
		$('body').removeClass('block');
	}
})

for(let i = 1 ; i < 10 ; i++) {
	$('#header-desktop .link-' + i).click(function(){
		$('#header-desktop .container-link li').removeClass('active');
		$(this).closest('li').addClass('active');
		for(let j = 1 ; j < 10 ; j++) {
			if(j != i) {
				$('#header-desktop').removeClass('open-dropdown-' + j);
			}
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
			$('#header-desktop .container-link li').removeClass('active');
			if ($('#header-desktop').hasClass('open-dropdown-' + i)) {
				$('#header-desktop').removeClass('open-dropdown-' + i);
			}
		}
	}
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

$('#header-mobile .head .wrapper .container-action').click(function(){
	$('#header-mobile').toggleClass('open');
	$('body').toggleClass('block');
})

$('#header-mobile .container-link .wrapper .list-link .link').click(function(){
	if ($(this).hasClass('active')) {
		$('#header-mobile .container-link .wrapper .list-link .link').removeClass('active');
	} else {
		$('#header-mobile .container-link .wrapper .list-link .link').removeClass('active');
		$(this).addClass('active');
	}
	
})

$(document).click(function(){
	if (!$(event.target).closest('.container-lightbox .lightbox').length) {
		if($('.container-lightbox').hasClass('show')) {
			$('.container-lightbox .lightbox .cross').click();
		}
	}
})

$('footer .foot .container-lg >.lg').click(function(){
	$(this).closest('.container-lg').toggleClass('active');
})

$('#header-blog-desktop .search input').focusin(function(){
	$('#header-blog-desktop .search .dropdown').addClass('show');
})

$('#header-blog-desktop .search .dropdown a').click(function(){
	$('#header-blog-desktop .search .dropdown').removeClass('show');
})

$(document).click(function(){
	if (!$(event.target).closest('#header-blog-desktop .search').length) {
		if($('#header-blog-desktop .search .dropdown').hasClass('show')) {
			$('#header-blog-desktop .search .dropdown a').click();
		}
	}
	if (!$(event.target).closest('footer .foot .container-lg').length) {
		if($('footer .foot .container-lg').hasClass('active')) {
			$('footer .foot .container-lg >.lg').click();
		}
	}
})

/*============================================================================
================================= END COMMON =================================
============================================================================*/