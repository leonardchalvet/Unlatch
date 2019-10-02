
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
		$(this).closest('.label').addClass('focus');
	})

	$('#section-contact .container-form form .label-dropdown .dropdown .el').click(function(){
		$(this).closest('.label').find('input').val($(this).text());
		$(this).closest('.label').addClass('fill').removeClass('focus');
	})


})