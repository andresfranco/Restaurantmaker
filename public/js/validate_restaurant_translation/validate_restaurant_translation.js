$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            languagecode:{required:true},
            name:{required:true},
            image_title:{required:true}
            },
        // Specify the validation error messages
        messages: {
          languagecode:{required:''},
          name:{required:validatemessages.name},
          image_title:{required:validatemessages.image_title}
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
