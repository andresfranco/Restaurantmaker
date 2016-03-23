$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
          errorPlacement: function(error, element)
        {if (element.attr("name") == "articlecontent" ) {error.appendTo('#lblcontent');}
        else{error.insertAfter(element);}},
        // Specify the validation rules
        rules: {
            languagecode:{required:true},
            title:{required:true},
            articlecontent:{required:true}
            },
        // Specify the validation error messages
        messages: {
          languagecode:{required:''},
          title:{required:validatemessages.title},
          articlecontent:{required:validatemessages.content}
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
