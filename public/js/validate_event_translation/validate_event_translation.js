$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({

         errorClass:'has-error',
          errorPlacement: function(error, element)
        { 
          if (element.attr("name") == "eventcontent" ) 
          {
           error.appendTo('#lblcontent');
       
         }
        else{error.insertAfter(element);}},
        // Specify the validation rules
        rules: {
            languagecode:{required:true},
            name:{required:true},
            location:{required:true},
            eventcontent:{required:true}
            },
        // Specify the validation error messages
        messages: {
          languagecode:{required:''},
          name:{required:validatemessages.name}, 
          location:{required:validatemessages.location}, 
          eventcontent:{required:validatemessages.description}
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
