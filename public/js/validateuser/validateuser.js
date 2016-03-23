$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            username:{
                required:true

            },
            email:{
                required:true,
                email:true

            },
            password:{
                required:true

            },
            confirm_password:{
                required:true,
                equalTo: "#password"

            }

        },
        // Specify the validation error messages
        messages: {
            username:{
                required: validatemessages.username//"Debe ingresar un username"

            },
             email:{
                required:validatemessages.email_req,
                email:validatemessages.email

            },
            password:{
                required:validatemessages.pass

            },
            confirm_password:{
                required:validatemessages.confirm,
                equalTo:validatemessages.equal

            }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
