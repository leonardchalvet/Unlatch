
// @codekit-prepend 'jQuery.3.3.1.js'

/*========================================================================
================================= COMMON =================================
========================================================================*/
/*=================================
=            WRAP LINE            =
=================================*/

(function($){

/**
 * Creates a temporary clone
 *
 * @param element element The element to clone
 */
	function _createTemp(element) {
		return element.clone().css({position: 'relative', width: '100%'});
	};

/**
 * Splits contents into words, keeping their original Html tag. Note that this
 * tags *each* word with the tag it was found in, so when the wrapping begins
 * the tags stay intact. This may have an effect on your styles (say, if you have
 * margin, each word will inherit those styles).
 *
 * @param node contents The contents
 */
	function _splitHtmlWords(contents) {
		var words = [];
		var splitContent;
		for (var c=0; c<contents.length; c++) {
			if (contents[c].nodeType == 3) {
				splitContent = _splitWords(contents[c].textContent || contents[c].toString());
			} else {
				var tag = $(contents[c]).clone();
				splitContent = _splitHtmlWords(tag.contents());
				for (var t=0; t<splitContent.length; t++) {
					tag.empty();
					splitContent[t] = tag.html(splitContent[t]).wrap('<p></p>').parent().html();
				}
			}
			for (var w=0; w<splitContent.length; w++) {
				words.push(splitContent[w]);
			}
		}
		return words;
	};

/**
 * Splits words by spaces
 *
 * @param string text The text to split
 */
	function _splitWords(text) {
		return text.split(/\s+/);
	}

/**
 * Formats html with tags and wrappers.
 *
 * @param tag
 * @param html content wrapped by the tag
 */
	function _markupContent(tag, html) {
		// wrap in a temp div so .html() gives us the tags we specify
		tag = '<div>' + tag;
		// find the deepest child, add html, then find the parent
		return $(tag)
			.find('*:not(:has("*"))')
			.html(html)
			.parentsUntil()
			.slice(-1)
			.html();
	}

/**
 * The jQuery plugin function. See the top of this file for information on the
 * options
 */
	$.fn.splitLines = function(options) {
		var settings = {
			width: 'auto',
			tag: '<div>',
			wrap: '',
			keepHtml: true
		};
		if (options) {
			$.extend(settings, options);
		}
		var newHtml = _createTemp(this);
		var contents = this.contents();
		var text = this.text();
		this.append(newHtml);
		newHtml.text('42');
		var maxHeight = newHtml.height()+2;
		newHtml.empty();

		var tempLine = _createTemp(newHtml);
		if (settings.width !== 'auto') {
			tempLine.width(settings.width);
		}
		this.append(tempLine);
		var words = settings.keepHtml ? _splitHtmlWords(contents) : _splitWords(text);
		var prev;
		for (var w=0; w<words.length; w++) {
			var html = tempLine.html();
			tempLine.html(html+words[w]+' ');
			if (tempLine.html() == prev) {
				// repeating word, it will never fit so just use it instead of failing
				prev = '';
				newHtml.append(_markupContent(settings.tag, tempLine.html()));
				tempLine.html('');
				continue;
			}
			if (tempLine.height() > maxHeight) {
				prev = tempLine.html();
				tempLine.html(html);
				newHtml.append(_markupContent(settings.tag, tempLine.html()));
				tempLine.html('');
				w--;
			}
		}
		newHtml.append(_markupContent(settings.tag, tempLine.html()));

		this.html(newHtml.html());

	};
})(jQuery);

/*=====  End of WRAP LINE  ======*/



$(document).ready(function() {

	$('body').addClass('ready');

	/*=================================
	=            WRAP LINE            =
	=================================*/
	$('.wrapLine').each(function (index) {
		$(this).splitLines({tag:'<span>'});
	});
	/*=====  End of WRAP LINE  ======*/

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

	$('#cookies').removeClass('hide');
	$('#cookies .btn').click(function(){
		console.log('salut');
		$('#cookies').addClass('hide');
	})

	
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
		$('html').addClass('block');
	}
	else {
		$('#header-blog-mobile').removeClass('open');
		$('html').removeClass('block');
	}
})

function openDropdown(i) {
	$('#header-desktop .container-link li').removeClass('active');
	for(let j = 1 ; j < 10 ; j++) {
		if(j != i) {
			$('#header-desktop').removeClass('open-dropdown-' + j);
		}
	}
	if ($('#header-desktop').hasClass('open-dropdown-' + i)) {
		$('#header-desktop').removeClass('open-dropdown-' + i);
	} else {
		$('#header-desktop').addClass('open-dropdown-' + i);
		$('#header-desktop .link-' + i).closest('li').addClass('active');
	}
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
$(document).on({ 'touchstart' : function(){ 
	if (!$(event.target).closest('#header-desktop').length) {
		for(let i = 1 ; i < 10 ; i++) {
			$('#header-desktop .container-link li').removeClass('active');
			if ($('#header-desktop').hasClass('open-dropdown-' + i)) {
				$('#header-desktop').removeClass('open-dropdown-' + i);
			}
		}
	}
} });

$('a.openLightbox').click(function(){
	$('html').addClass('block');
	$('.container-lightbox').addClass('displayBlock');
	setTimeout(function(){
		$('.container-lightbox').addClass('show');
	})
})

$('.container-lightbox .lightbox .cross').click(function(){
	$('.container-lightbox').removeClass('show');
	setTimeout(function(){
		$('.container-lightbox').removeClass('displayBlock');
		$('html').removeClass('block');
	}, 500)
})

$('#header-mobile .head .wrapper .container-action').click(function(){
	$('#header-mobile').toggleClass('open');
	$('html').toggleClass('block');
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
	$('#header-blog-desktop .search img').addClass('active');
})

$(document).click(function(){
	if (!$(event.target).closest('#header-blog-desktop .search').length) {
		if($('#header-blog-desktop .search .dropdown').hasClass('show')) {
			$('#header-blog-desktop .search .dropdown').removeClass('show');
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