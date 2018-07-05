$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            code:{
                required:true

            },
            language:{
                required:true

            },
            flag:{
                required:true

            }

        },
        // Specify the validation error messages
        messages: {
          code:{
              required:validatemessages.code

          },
          language:{
              required:validatemessages.language

          },
          flag:{
              required:""

          }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
