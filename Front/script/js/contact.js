
// @codekit-prepend 'common.js'
$(window).on('load', function() {	


	$('#section-contact .container-form form .label input').focusin(function() {
		$(this).closest('.label').addClass('focus');
	})

	$('#section-contact .container-form form .label input').focusout(function() {
		$('#section-contact .container-form form .label').removeClass('focus');

		
		$('#section-contact .container-form form .label input').each(function(){
		   if($(this).val()!=""){
		      	$(this).closest('.label').addClass('fill');
		    } else {
		    	$(this).closest('.label').removeClass('fill');
		    }
		 });

		
	})


})