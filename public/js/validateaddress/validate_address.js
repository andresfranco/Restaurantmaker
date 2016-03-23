$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({

      errorClass: "has-error",
      
        // Specify the validation rules
        rules: {
          countryid:{
              required:true

          },
          stateid:{
              required:true

          },
            cityid:{
                required:true

            },
            townshipid:{
                required:true
            },
            neighborhoodid:{
                required:true
            },
            address:{
                required:true
            }

        },
        // Specify the validation error messages
        messages: {
          countryid:{
              required:""

          },
          stateid:{
              required:""

          },
            cityid:{
                required:""

            },
             townshipid:{
                required:""

            },
            neighborhoodid:{
               required:""

           },
           address:{
              required:validatemessages.address

          },


        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
