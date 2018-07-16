$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
      errorClass: "has-error",

        // Specify the validation rules
        rules: {

            languagecode:{
                required:true
            },
            translatekey:{
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
             translatekey:{
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
