$(document).ready( function() {	
	$('.enabled').live('click', function() {
	
		var emailsubmitted = $('input[name="email"]').attr('value');
		var id_site = $('input[name="id_site"]').attr('value');
		
		var result = '';
		
		$('#match').fadeOut(300);
		$('.newsletterForm #form').fadeOut(300);		
				
		$.ajax({
			type: "POST",
			url: "modules/newsletter/newsletterSubmit.php",
			dataType: "html",
			success: function(result) {
				$('#submitting').fadeOut(300, function() {
					if(result == 'yes') {
						$.ajax({
							type: "POST",
							url: "modules/newsletter/newsletterMail.php",
							dataType: "html",
							data: 'email=' + emailsubmitted,
							success: function(emailresult) {
								if (emailresult == 'yes') {
									$('#submitting').fadeOut(300, function() {
										$('#submitted').fadeIn(300);
										var int = setInterval(function () {
       						 			$('#submitted').fadeOut(300);
										clearInterval(int);
    									}, 5 * 1000);  
									});
								}
								
								else {
									$('#submitted').fadeIn(300).text('هناك شيء خاطئ مع محاولة البريد الإلكتروني إلى عنوان بريدك.');
									var int = setInterval(function () {
       						 			$('#submitted').fadeOut(300);
										clearInterval(int);
    									}, 5 * 1000);  
								}
							}
						});
					}
					
					else {
						$('#submitted').fadeIn(300).text('البريد الإلكتروني موجود في قاعدة البيانات لدينا.');
						var int = setInterval(function () {
       						 			$('#submitted').fadeOut(300);
										clearInterval(int);
    									}, 5 * 1000);  
					}
				});
			},
			error: function() {
				$('#submitting').fadeOut(300, function() {
					$('#submitError').fadeIn(300);
				});
			},
			data: "email=" + emailsubmitted +"&id_site=" + id_site,
			beforeSend: function() {
				$('#submitting').fadeIn(300);
			}
		});
	});

	$("input, textarea").keyup(function() {	
		
		var address1 = $('input[name="email"]').attr('value');
		var address2 = $('input[name="emailconf"]').attr('value');
			
		if(address1 != address2) {
			$('#match').fadeOut(300, function(){
				$('#match').remove();
			});
			
			$('#bademail').slideUp(300, function() {
				$('#bademail').remove();
			});

			if($('input[name="emailconf"]').next().attr('id') != "nomatch" && address2 != $('input[name="emailconf"]').attr('defaultfield')) {
				$('input[name="emailconf"]').after('<div id="nomatch"></div>');
				$('#nomatch').fadeIn(300);
			}
		$('#submitButton').removeClass('enabled').addClass('disabled').css('cursor', 'default').attr('disabled', 'disabled');
						
		} else {
			$('#nomatch').fadeOut(300, function(){
				$('#nomatch').remove();
			});
			if($('input[name="emailconf"]').next().attr('id') != "match") {
				$('input[name="emailconf"]').after('<div id="match"></div>');
				$('#match').fadeIn(300, function() {
					
					if(!isValidEmailAddress(address1)){
						$('#match').after('<div id="bademail">تطابق الحقول، ولكن لديك عنوان بريد إلكتروني غير صالح. وينبغي أن تكون عليه مثل \'john@oneo.ma\'</div>');
						$('#bademail').slideDown(300);
					}
					
					else {
						$('#bademail').slideUp(300, function() {
							$('#bademail').remove();
						});
						$('#submitButton').removeClass('disabled').addClass('enabled').css('cursor', 'pointer').removeAttr('disabled');
					}
				});
			}
		}
	});
	
	$('.default-value').each(function() {
		var default_value = $(this).val();
		$(this).attr('rel', default_value);
	});
	
	$('.default-value').focus(function(){
		if($(this).val() == $(this).attr('rel')) { 
			$(this).val(''); 
		} 
	}); 
		
	$('.default-value').blur(function(){ 
		if($(this).val() == '') { 
			$(this).val($(this).attr('rel')); 
		} 
	});	

});

function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
}