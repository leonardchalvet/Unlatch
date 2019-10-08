
// @codekit-prepend 'common.js'
$(window).on('load', function() {	


	$('#section-contact .container-form form .label-text input').focusin(function() {
		$(this).closest('.label').addClass('focus');
	})

	$('#section-contact .container-form form .label-text input').focusout(function() {
		$('#section-contact .container-form form .label-text').removeClass('focus');

		$('#section-contact .container-form form .label-text input').each(function(){
		   if($(this).val()!=""){
		      	$(this).closest('.label').addClass('fill');
		    } else {
		    	$(this).closest('.label').removeClass('fill');
		    }
		 });
		
	})

	$('#section-contact .container-form form .label-dropdown input').click(function() {
		if($(this).closest('.label').hasClass('focus')) {
			$(this).closest('.label').removeClass('focus');
		}
		else {
			$('#section-contact .container-form form .label-dropdown input').closest('.label').removeClass('focus');
			$(this).closest('.label').addClass('focus');
		}
	})

	$(document).click(function(){
		if (!$(event.target).closest('#section-contact .container-form form .label-dropdown input').length) {
			if($('#section-contact .container-form form .label-dropdown input').closest('.label').hasClass('focus')) {
				$('#section-contact .container-form form .label-dropdown input').closest('.label').removeClass('focus');
			}
		}
	})

	$('#section-contact .container-form form .label-dropdown .dropdown .el').click(function(){
		$(this).closest('.label').find('input').val($(this).text());
		$(this).closest('.label').addClass('fill').removeClass('focus');
	})


})