// JavaScript Validation For Registration Page

$('document').ready(function()
{

		 // name validation
		 var nameregex = /^[a-zA-Z ]+$/;
		 $.validator.addMethod("validname", function(value, element) {
		     return this.optional(element) || nameregex.test(value);
		 });

		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional(element) || eregex.test(value);
		 });

		 //Valid URL pattern
		 var urlregex = /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		 $.validator.addMethod("validurl", function(value, element) {
			return this.optional(element) || urlregex.test(value);
		});

		 $("#register-form").validate({
		  rules:
		  {
				name: {
					required: true,
					validname: true,
					minlength: 4
				},

				email: {
				required : true,
				validemail: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $("#email").val();
						}
					}
				}
				},

				profile_picture: {
					required: true,
					accept: "image/*"
				},

				website: {
					required: false,
					validurl: true,
					minlength: 4
				},

				twitter: {
					required: false,
					validurl: true,
					minlength: 4
				},

				password: {
					required: true,
					minlength: 6,
					maxlength: 15
				},

				cpassword: {
					required: true,
					equalTo: '#password'
				},

				about: {
					required: true,
					minlength: 30,
					maxlength: 255
				},

				agree: {
					required: true
				}
		   },
		   messages:
		   {
				name: {
					required: "Name is required.",
					validname: "Name must contain only alphabets and spaces.",
					minlength: "Your name is too short."
				},

				email: {
					required: "Email is required.",
					validemail: "Please enter a valid email address.",
					remote: "The email already exists."
				},

				password: {
					required: "Password is required.",
					minlength: "Password must have at least have 6 characters."
				},

				cpassword: {
					required: "Retype your password",
					equalTo: "The password did not match!"
				},

				website: {
					required: "This is optional.",
					validurl: "Please enter a valid URL.",
					minlength: "The URL cannot be too short."
				},

				twitter: {
					required: "This is optional.",
					validurl: "Please enter a valid URL.",
					minlength: "The Twitter URL cannot be too short."
				},

				about: {
					required: "You must provide information about yourself.",
					minlength: "You must enter at least 30 characters.",
					maxlength: "You cannot write more than 255 characters."
				},

				profile_picture: {
					required: "You must upload your profile picture.",
					accept: "Only images are accepted."
				},

				agree: {
					required: "You must accept the Terms and Conditions to contiune."
				}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
				submitHandler: submitForm
		   });


		   function submitForm(){
				$.ajax({
			   		url: 'ajax-signup.php',
			   		type: 'POST',
					data: new FormData(document.getElementById("register-form")),
					cache: false,
					contentType: false,
					processData: false,
			   		dataType: 'json'
			   })
			   .done(function(data){

			   		$('#btn-signup').html('<img src="ajax-loader.gif" />&nbsp; Registering...').prop('disabled', true);
			   		$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop('disabled', true);

			   		setTimeout(function(){

						if (data.status==='success') {

							$('#errorDiv2').slideDown('fast', function(){
								$('#errorDiv2').html('<div class="alert alert-info">'+data.message+'</div>');
								$("#register-form").trigger('reset');
								$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop('disabled', false);
								$('#btn-signup').html('Register').prop('disabled', false);
							}).delay(3000).slideUp('fast');


					    } else {

						    $('#errorDiv2').slideDown('fast', function(){
						      	$('#errorDiv2').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#register-form").trigger('reset');
							  	$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop('disabled', false);
							  	$('#btn-signup').html('Register').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}

					},3000);

			   })
			   .fail(function(){
			   		$("#register-form").trigger('reset');
			   		alert('An unknown error occoured. Please try again later.');
			   });

}
});
