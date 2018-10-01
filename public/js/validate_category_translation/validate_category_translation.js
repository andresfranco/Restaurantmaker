$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({

         errorClass:'has-error'
        ,
        // Specify the validation rules
        rules: {
            languagecode:{required:true},
            category:{required:true}
            },
        // Specify the validation error messages
        messages: {
          languagecode:{required:''},
          category:{required:validatemessages.category}
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });