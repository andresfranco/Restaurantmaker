$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
         errorPlacement: function(error, element)
        { 
          if (element.attr("name") == "descriptioncontent" ) 
          {
           error.appendTo('#lbldescription');
       
         }
        else{error.insertAfter(element);}},
        // Specify the validation rules
        rules: {
            languagecode:{required:true},
            name:{required:true},
            title:{required:true},
            descriptioncontent:{required:true}
            },
        // Specify the validation error messages
        messages: {
          languagecode:{required:''},
          name:{required:validatemessages.name},
          title:{required:validatemessages.title},
          descriptioncontent:{required:validatemessages.description}
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });

