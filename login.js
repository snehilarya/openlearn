// JavaScript Validation For Login Page

$('document').ready(function()
{
		// valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional(element) || eregex.test(value);
		 });

		 $("#login-form").validate({
		  rules:
		  {
				instEmail: {
					required: true,
					validemail: true,
					minlength: 3
				},

				instPassword: {
					required : true,
					minlength: 6
				},

				rememberMe: {
					required: false
				}
		   },
		   messages:
		   {
				instEmail: {
					required: "You must enter your email",
					validemail: "You must enter a valid email",
					minlength: "The email cannot be too short"
				},

				instPassword: {
					required : "A password is required for authentication",
					minlength: "The password cannot be too short"
				},

				rememberMe: {
					required: "Optional"
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
			   		url: 'login-validation.php',
			   		type: 'POST',
					data: $('#login-form').serialize(),
			   		dataType: 'json'
			   })
			   .done(function(data){

			   		$('#btn-login').html('<img src="ajax-loader.gif" />&nbsp;Logging in...').prop('disabled', true);
			   		$('input[type=email],input[type=password]').prop('disabled', true);

			   		setTimeout(function(){

						if (data.status==='success') {
							
							window.location.replace("admin/admin_dashboard.php");

					    } else {

						    $('#errorDiv').slideDown('fast', function(){
						      	$('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#login-form").trigger('reset');
							  	$('input[type=email],input[type=password]').prop('disabled', false);
							  	$('#btn-login').html('Login').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}

					},3000);

			   })
			   .fail(function(){
			   		$("#login-form").trigger('reset');
			   		alert('An unknown error occoured. Please try again later.');
			   });

}
});
