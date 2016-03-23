$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {extension:{required:true}},
        // Specify the validation error messages
        messages: {extension:{required:validatemessages.extension}},

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
