
$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',

        // Specify the validation rules
        rules: {
            galleryid:{required:true},

        },
        // Specify the validation error messages
        messages: {
            galleryid:{required:''}

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
