// JavaScript Document

$(document).ready(function() {
	
	var validator = $("#form_wrap").validate({
		rules: {
			first_name: {
				required: true
			},
			last_name: {
				required: true
			},
			radio_button: {
				required: true
			},
			email: {
				required: true,
				email: true
			}			
			
		},
		submitHandler: function(form) {		
		
			var firstname = $("#first_name").val();
			var lastname = $("#last_name").val();
			var email = $("#email").val();
			var profession = $(".radio_button:checked").val();
			var other = $("#other_input").val();
			var comments = $("#comment_box").val();		
		
			$.ajax({
				type: 'POST',
				url: 'updates_form.php',
				data: {firstname: firstname, lastname: lastname, email: email, profession: profession, other: other, comments: comments},
				success: function(msg) {
					$("#php_alert_box").html(msg);
					
					validator.resetForm();
					form.reset();
				}
			});
		},
		messages: {
			first_name: {
				required: "Required"
			},
			last_name: {
				required: "Required"
			},
			radio_button: {
				required: "Required"
			},
			email: {		
				required: "Required",		
				email: "Format: name@domain.tld"
			}
		},
		errorPlacement: function(err, el) {
  			if(err.text() !== "") err.insertAfter(el);
		}
	});
	
	$("#reset_button").on("click", function() {
		validator.resetForm();
	});
	
});