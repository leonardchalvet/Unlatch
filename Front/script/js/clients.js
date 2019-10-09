
// @codekit-prepend 'common.js'


/*=============================================================================
================================= BEFORE LOAD =================================
=============================================================================*/
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

	let state = false;
	$(Nav + ':nth-child(1)').click(function(){
		if(!state) {
			clearInterval(interval);
			prg('next');
			state = true;
			setTimeout(function(){
				state = false;
			}, 1100)
		}
	})
	$(Nav + ':nth-child(2)').click(function(){
		if(!state) {
			clearInterval(interval);
			prg('prev');
			state = true;
			setTimeout(function(){
				state = false;
			}, 1100)
		}
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

	sectionQuotesCaroussel(
		10000,
		'#section-cover',  
		".container-el .el",
		".container-img .el", 
		'.container-nav .nav'
	);
})
