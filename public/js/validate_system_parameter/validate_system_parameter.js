$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {code:{required:true},parameter:{required:true},textvalue:{required:true}},
        // Specify the validation error messages
        messages: {code:{required:validatemessages.code},parameter:{required:validatemessages.parameter}
        ,textvalue:{required:validatemessages.textvalue}},

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
