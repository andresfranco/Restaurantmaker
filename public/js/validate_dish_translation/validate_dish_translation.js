$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            languagecode:{required:true},
            name:{required:true},
            description:{required:true}
            },
        // Specify the validation error messages
        messages: {
          languagecode:{required:''},
          name:{required:validatemessages.name},
          description:{required:validatemessages.description}
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
