$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
      errorClass: "has-error",

        // Specify the validation rules
        rules: {

            languagecode:{
                required:true
            },
            key:{
                required:true

            },
            translatevalue:{
                required:true

            }

        },
        // Specify the validation error messages
        messages: {
            languagecode:{
                required:""

            },
             key:{
                required:validatemessages.key

            },
            translatevalue:{
                required:validatemessages.value

            }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
