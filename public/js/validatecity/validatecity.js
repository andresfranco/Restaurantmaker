$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
      errorClass: "has-error",
      errorPlacement: function(error, element) {
        //Custom position: first name
        if (element.attr("name") == "city" ) {
            $("#cityerror").html(error);
        }

        // Default position: if no match is met (other fields)

    },
        // Specify the validation rules
        rules: {
            countryid:{
                required:true

            },
            stateid:{
                required:true
            },
            city:{
                required:true

            }

        },
        // Specify the validation error messages
        messages: {
            countryid:{
                required:""

            },
             stateid:{
                required:"",

            },
            city:{
                required:validatemessages.city

            }

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
