
// @codekit-prepend 'common.js'


/*=============================================================================
================================= BEFORE LOAD =================================
=============================================================================*/
function sectionLogosCaroussel(Section, El, Delay){
	
	var El = Section + ' ' + El;
	var Img = El + ":nth-child(1) img";

	var numberEl = document.querySelectorAll(El).length;
	var countEl = 1;

	var numberImg = document.querySelectorAll(Img).length;
	var countImg = 1;

	function prg(){

		document.querySelector(El).classList.remove('active');
		

		function selectEl(){
			var sEl = El + ':nth-child(' + countEl + ')';
			document.querySelector(sEl).classList.add('active');
		}
		function selectImg(){
			var sImg = El + ':nth-child(' + countEl + ')' + ' ' + 'img';
			var sImgNew = El + ':nth-child(' + countEl + ')' + ' ' + 'img:nth-child(' + countImg + ')';

			[].forEach.call(document.querySelectorAll(sImg), function(el) {
			  el.classList.remove('active');
			});
			document.querySelector(sImgNew).classList.add('active');
		}
		
		var randomEl = countEl;
		countEl = Math.floor((Math.random() * numberEl) + 1);
		if (countEl === randomEl) {
			countEl = Math.floor((Math.random() * numberEl) + 1);
		}
		/*if (countEl >= numberEl) {
			countEl = 1;
		} else {

			countEl++;
		}*/

		if (countImg >= numberImg) {
			countImg = 1;
		} else {
			countImg ++;
		}

		selectImg();
		selectEl();

		clearInterval(interval);
		interval = setInterval(function() {
	      prg();
	    }, Delay);

	}

	function init(){
		$(El + ':nth-child(1) img:nth-child(1)').addClass('active');
		$(El + ':nth-child(2) img:nth-child(2)').addClass('active');
		$(El + ':nth-child(3) img:nth-child(3)').addClass('active');
		$(El + ':nth-child(4) img:nth-child(4)').addClass('active');
		$(El + ':nth-child(5) img:nth-child(5)').addClass('active');
		$(El + ':nth-child(6) img:nth-child(6)').addClass('active');
	};

	init();

	var interval = setInterval(function() {
    	prg();
    }, Delay);

};

function sectionFtrCaroussel(Delay, Section, El, Img){
		
	El = Section + ' ' + El;
	Img = Section + ' ' + Img;

	var valDelay = 0;
	var numberEl = $(El).length;
	var countEl;
	
	var drtc;

	function prg(drtc){

		var elImg = Img;

		if (drtc === 'next') {
			countEl++;
		} else if (drtc === 'prev') {
			countEl--;
		};
		
		if (countEl <= numberEl && countEl >= 1) {

			$(El).css({
			  '-webkit-transform' : 'translateY(0px)',
			  '-moz-transform'    : 'translateY(0px)',
			  '-ms-transform'     : 'translateY(0px)',
			  '-o-transform'      : 'translateY(0px)',
			  'transform'         : 'translateY(0px)'
			});

			$(El + '.active').removeClass('active');
			$(elImg).removeClass('active');
			
			
			$(El + ':nth-child('+countEl+')').addClass('active');

			var elIndex  = $(El + '.active').index() + 1;
			
			$(elImg + ':nth-child(' + elIndex + ')').addClass('active');

			var transformDistance = $(El + '.active .text').height() + 50;

			$(El + '.active').nextAll().css({
			  '-webkit-transform' : 'translateY(' + transformDistance + 'px' + ')',
			  '-moz-transform'    : 'translateY(' + transformDistance + 'px' + ')',
			  '-ms-transform'     : 'translateY(' + transformDistance + 'px' + ')',
			  '-o-transform'      : 'translateY(' + transformDistance + 'px' + ')',
			  'transform'         : 'translateY(' + transformDistance + 'px' + ')'
			});
			/*
			$(El + '.active').css({
			  '-webkit-transform' : 'translateY(-' + transformDistance + 'px' + ')',
			  '-moz-transform'    : 'translateY(-' + transformDistance + 'px' + ')',
			  '-ms-transform'     : 'translateY(-' + transformDistance + 'px' + ')',
			  '-o-transform'      : 'translateY(-' + transformDistance + 'px' + ')',
			  'transform'         : 'translateY(-' + transformDistance + 'px' + ')'
			});
			$(El + '.active').prevAll().css({
			  '-webkit-transform' : 'translateY(-' + transformDistance + 'px' + ')',
			  '-moz-transform'    : 'translateY(-' + transformDistance + 'px' + ')',
			  '-ms-transform'     : 'translateY(-' + transformDistance + 'px' + ')',
			  '-o-transform'      : 'translateY(-' + transformDistance + 'px' + ')',
			  'transform'         : 'translateY(-' + transformDistance + 'px' + ')'
			});*/

			clearInterval(interval);
			interval = setInterval(function() {
		      	prg('next');
		    }, valDelay);

		} else if (countEl < 1) {
			countEl = numberEl;
			prg();
		} else {
			countEl = 1;
			prg();
		};
		
	};

	function init(){	    
		$(El + ':nth-child(1)').addClass('active');
		$(Img + ':nth-child(1)').addClass('active');
	};

	init();

	$(El).click(function(){
		var index = $(this).index() + 1;
		countEl = index;
		prg();
	})
	
	var interval = setInterval(function() {
    	prg('next');
    }, valDelay);

    valDelay = Delay;

};

function sectionFtrCaroussel_mobile(Delay, Section, El, Img){
		
	El = Section + ' ' + El;
	Img = Section + ' ' + Img;

	var valDelay = 0;
	var numberEl = $(El).length;
	var countEl;
	
	var drtc;

	function prg(drtc){

		var elImg = Img;

		if (drtc === 'next') {
			countEl++;
		} else if (drtc === 'prev') {
			countEl--;
		};
		
		if (countEl <= numberEl && countEl >= 1) {

			$(El + '.active').removeClass('active');
			$(elImg).removeClass('active');
			
			
			$(El + ':nth-child('+countEl+')').addClass('active');

			var elIndex  = $(El + '.active').index() + 1;
			
			$(elImg + ':nth-child(' + elIndex + ')').addClass('active');


			clearInterval(interval);
			interval = setInterval(function() {
		      	prg('next');
		    }, valDelay);

		} else if (countEl < 1) {
			countEl = numberEl;
			prg();
		} else {
			countEl = 1;
			prg();
		};
		
	};

	function init(){	    
		$(El + ':nth-child(1)').addClass('active');
		$(Img + ':nth-child(1)').addClass('active');
	};

	init();

	$(El).click(function(){
		var index = $(this).index() + 1;
		countEl = index;
		prg();
	})
	
	var interval = setInterval(function() {
    	prg('next');
    }, valDelay);

    valDelay = Delay;

};

function sectionQuotesCaroussel(Delay, Section, El, Img, Nav){

	El = Section + ' ' + El;
	Img = Section + ' ' + Img;
	Nav = Section + ' ' + Nav;

	var valDelay = 0;
	var numberEl = $(El).length;
	var countEl = 1;
	
	var drtc;

	function prg(drtc){

		var elImg = Img;

		if (drtc === 'next') {
			countEl++;
		} else if (drtc === 'prev') {
			countEl--;
		};

		if (countEl <= numberEl && countEl >= 1) {

			$(El + '.active').removeClass('active');
			$(elImg + '.active').removeClass('active').addClass('hide-after');

			$(El + ':nth-child('+countEl+')').addClass('active');
			$(elImg + ':nth-child('+countEl+')').removeClass('hide-before').addClass('active');


			setTimeout(function() {
				$(elImg + '.hide-after').removeClass('hide-after').addClass('hide-before');
			}, 1000);


			clearInterval(interval);
			interval = setInterval(function() {
		      prg('next');
		    }, valDelay);
		} else if (countEl < 1) {
			countEl = numberEl;
			prg();
		} else {
			countEl = 1;
			prg();
		};
		
	};

	function init(){	    
		$(El + ':nth-child(1)').addClass('active');
		$(Img + ':nth-child(1)').addClass('active');
		$(Img + '.active').nextAll().addClass('hide-before');
	};

	$(Nav + ':nth-child(1)').click(function(){
		clearInterval(interval);
		prg('next');
	})
	$(Nav + ':nth-child(2)').click(function(){
		clearInterval(interval);
		prg('prev');
	})

	init();

	var interval = setInterval(function() {
    	prg('next');
    }, valDelay);

    valDelay = Delay;
    

};
/*=================================================================================
================================= END BEFORE LOAD =================================
=================================================================================*/
$(window).on('load', function() {	


	var iframe = $('#section-cover iframe');
	var player = new Vimeo.Player(iframe);


	player.on('play', function(data) {
	    iframe.closest('.container-video').addClass('show');
	});


	/* SECTION LOGO CAROUSSEL */
	sectionLogosCaroussel(
		'#section-logos', 
		'.container-el .el', 
		1000
	);
	/* SECTION LOGO CAROUSSEL */

	if (window.matchMedia("(min-width: 1250px)").matches) {
		sectionFtrCaroussel(
			10000,
			'#section-features',  
			".container-el .el", 
			".container-img .img"
		);
	} else {
	  	sectionFtrCaroussel_mobile(
			10000,
			'#section-features',  
			".container-el .el", 
			".container-img .img"
		);
	}
	

	sectionQuotesCaroussel(
		10000,
		'#section-quotes',  
		".container-el .el",
		".container-img img", 
		'.container-nav .nav'
	);
})
