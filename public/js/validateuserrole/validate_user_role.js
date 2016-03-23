$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            roleid:{
                required:true

            }


        },
        // Specify the validation error messages
        messages: {
            roleid:{
                required:""

            }


        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
