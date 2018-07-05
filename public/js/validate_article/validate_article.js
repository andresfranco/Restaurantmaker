$(function() {
  // Setup form validation on the #register-form element
    $("#appform").validate({
        errorClass:'has-error',
        errorPlacement: function(error, element)
        {if (element.attr("name") == "articlecontent" ) {error.appendTo('#lblcontent');}
        else{error.insertAfter(element);}},
        // Specify the validation rules
        rules: {title:{required:true},author:{required:true},articlecontent:{required:true}},
        // Specify the validation error messages
        messages: {title:{required:validatemessages.title}
            ,author:{required:validatemessages.author}
            ,articlecontent:{required:validatemessages.content}},

        submitHandler: function(form) {
            form.submit();
        }
    });

});
