$(document).ready(function(){
	
	$(".viewgallery").fancybox({
		beforeShow : function() {
			$('.fancybox-overlay').css({'background-color' :'#000'});
		},
		padding: 0,
		prevEffect : 'fade',
		nextEffect : 'fade',
		nextClick : true,
		openEffect : 'fade',
		openSpeed  : 'fast',
		closeEffect : 'fade',
		closeSpeed  : 'fast',
		helpers : {
			thumbs : {
				width  : 80,
				height : 60
			}
		}
	});
	
	$("#form_enquiry").validate({
		rules: {
			Name: { required: true, minlength: 3 },
			Email: { required: true, email: true },
			Country: { required: true },
			Phone: { required: true, minlength: 8 },
			Message: { required: true, minlength: 15 },
		},
		messages: {
			Name: { required: "Please complete your name", minlength: "Name must be at least 3 characters" },
			Email: { required: "Please complete your e-mail address", email: "Invalid email address" },
			Country: { required: "Please choose your living country" },
			Phone: { required: "Please complete your telephone number", minlength: "Telephone number must be at least 8 characters" },
			Message: { required: "Please complete your contact message", minlength: "Message must be at least 15 characters"  },
		},
		submitHandler: function(){ 
			var Val=$('#form_enquiry').serialize();
			$(".buttonsubmit").hide();
			$(".buttonloading").fadeIn('fast');
			$.ajax({
				type : "POST",
				url : "action/property_enquiry.do.php",
				data : Val,
				success : function(data){
					document.form_enquiry.reset();
					$(".success").fadeIn('fast');
					$(".buttonloading").hide();
					$(".buttonsubmit").fadeIn('fast');
					return false;
				}
			});
		}
	});
		
});