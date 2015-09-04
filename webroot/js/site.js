$(document).ready(function(){
	//alert('test');
	var img = location.protocol + '//' + location.host + '/img/capital.jpg';
	var imgtall = location.protocol + '//' + location.host + '/img/capital.jpg';
 
	 var windowsize = $(window).width();
     if (windowsize >= 481) {
			$.backstretch([img]);	
			
		} else {
			$.backstretch([imgtall]);	
		}	
		if(!Modernizr.input.placeholder){
	
		$('[placeholder]').focus(function() {
		  var input = $(this);
		  if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		  }
		}).blur(function() {
		  var input = $(this);
		  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		  }
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  $(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
			  input.val('');
			}
		  })
		});
	
	}
  
});
	
	
	