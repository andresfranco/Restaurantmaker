$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            role:{
                required:true

            }


        },
        // Specify the validation error messages
        messages: {
            role:{
                required:validatemessages.role

            }


        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
