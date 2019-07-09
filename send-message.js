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

		 $("#message-form").validate({
		  rules:
		  {
				senderName: {
					required: true,
					validname: true,
					minlength: 3
				},

				senderEmail: {
					required : true,
					validemail: true,
					minlength: 3
				},

				senderMessage: {
					required: true,
					minlength: 10
				}
		   },
		   messages:
		   {
				senderName: {
					required: "You must enter your name",
					validname: "Name must contain alphabets and spaces only",
					minlength: "Name cannot be too short"
				},

				senderEmail: {
					required : "You must enter your email",
					validemail: "The entered email is not valid",
					minlength: "The email cannot be too short"
				},

				senderMessage: {
					required: "You must write your message to continue",
					minlength: "At least 10 characters should be entered"
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
			   		url: 'send-message.php',
			   		type: 'POST',
					data: $('#message-form').serialize(),
			   		dataType: 'json'
			   })
			   .done(function(data){

			   		$('#btn-send-message').html('<img src="ajax-loader.gif" />&nbsp;Sending...').prop('disabled', true);
			   		$('input[type=text],input[type=email],input[type=textarea]').prop('disabled', true);

			   		setTimeout(function(){

						if (data.status==='success') {

							$('#errorDiv').slideDown('fast', function(){
								$('#errorDiv').html('<div class="alert alert-info">'+data.message+'</div>');
								$("#message-form").trigger('reset');
								$('input[type=text],input[type=email],input[type=textarea]').prop('disabled', false);
								$('#btn-send-message').html('<i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Send').prop('disabled', false);
							}).delay(3000).slideUp('fast');


					    } else {

						    $('#errorDiv').slideDown('fast', function(){
						      	$('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#message-form").trigger('reset');
							  	$('input[type=text],input[type=email],input[type=textarea]').prop('disabled', false);
							  	$('#btn-send-message').html('<i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Send').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}

					},3000);

			   })
			   .fail(function(){
			   		$("#message-form").trigger('reset');
			   		alert('An unknown error occoured. Please try again later.');
			   });

}
});
