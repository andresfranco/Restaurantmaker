$(function() {

    // Setup form validation on the form
    $("#appform").validate({
      errorClass: "has-error",
      errorPlacement: function(error, element) {
        
        if (element.attr("name") == "code" ) {
            $("#codeerror").html(error);
        }
        if (element.attr("name") == "country" ) {
            $("#countryerror").html(error);
        }

    },
        // Specify the validation rules
        rules: {
            code:{
                required:true,
                minlength: 2,
                maxlength: 4
            },
            country:{
                required:true,    
            }
        },
        // Specify the validation error messages
        messages: {
            code:{
                required: validatemessages.code,
                minlength: validatemessages.min_code,
                maxlength: validatemessages.max_code

            },
             country:{
                required:validatemessages.country

            }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
