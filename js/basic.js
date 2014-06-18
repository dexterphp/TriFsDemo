$(document).ready(function(){
	// Live checker on typing
	$('.number').keyup(function(e) {
		//String.fromCharCode(e.which)
		$.ajax({
			type: "POST",
			url: "functions/number_handler.php",
			dataType: 'json',
			data: { action: 'formatMobileNumber',m_num: this.value  }
		})
		.done(function( return_data ) {

			if (return_data.output == 'ok'){
				on_screen = return_data.msg;
			} else {
				on_screen = '';
				$.each( return_data.msg, function( key, value ) {
					on_screen += value;
				});
			}
			
			$.colorbox({html:on_screen,height:'200px',overlayClose:false});
			$('.number').val('');
		});		
	})	
	//Mask on INPUT
	$(".number").mask("00 386 99 999999");
});

