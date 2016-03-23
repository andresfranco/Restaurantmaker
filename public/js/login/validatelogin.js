$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({

      errorPlacement: function(error, element) {
        //Custom position: first name
        if (element.attr("name") == "username" ) {
            $("#errorusername").html(error);
        }

        //Custom position: second name
        if (element.attr("name") == "password" ) {
            $("#errorpassword").html(error);
        }

        // Default position: if no match is met (other fields)

    },
        // Specify the validation rules
        rules: {
            username:{
                required:true

            },
            password:{
                required:true

            }

        },
        // Specify the validation error messages
        messages: {
            username:{
                required:"You must enter a username"

            },
             password:{
                required:"You must enter a password",

            }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
