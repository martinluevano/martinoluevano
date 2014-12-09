/**
 * Created by Martin on 12/8/2014.
 */
//jQuery for contact form
// validate the form using jQuery
$(document).ready(function()
{
	$("#contactMe").validate(
		{

			rules: {
				name: {
					required: true

				},
				email: {
					required: true,
					email: true

				},
				subject: {
					required: true

				},
				message: {
					required: true

				}

			},

			messages: {
				name : {
					required: "Please enter your Name"
				},
				email : {
					required: "Please enter a valid email"
				},
				subject: {
					required: "Subject required"
				},
				message: {
					required: "Message required"
				}

			},

			submitHandler: function(form) {
				$(form).ajaxSubmit(
					{
						type   : "POST",
						url    : "emailProcessor.php",
						success: function(ajaxOutput) {
							$("#outputArea").html(ajaxOutput);
						}
					});
			}
		})
});