$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
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
           
            password:{
                required:"Debe ingresar un password"


            },
            confirm_password:{
                required:"Debe ingresar una confirmación de password",
                equalTo: "El password de confirmación debe ser igual al password"

            }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });

