$(document).ready(function(){
	
	$("#form_contact").validate({
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
			var Val=$('#form_contact').serialize();
			$(".buttonsubmit").hide();
			$(".buttonloading").fadeIn('fast');
			$.ajax({
				type : "POST",
				url : "action/contact.do.php",
				data : Val,
				success : function(data){
					document.form_contact.reset();
					$(".success").fadeIn('fast');
					$(".buttonloading").hide();
					$(".buttonsubmit").fadeIn('fast');
					return false;
				}
			});
		}
	});
		
});