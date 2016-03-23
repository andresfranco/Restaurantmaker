$(function() {
  // Setup form validation on the #register-form element
    $("#appform").validate({
        errorClass:'has-error',
        errorPlacement: function(error, element)
        {if (element.attr("name") == "comment_content" ) {error.appendTo('#lblcomment');}
        else{error.insertAfter(element);}},
        // Specify the validation rules
        rules: {articleid:{required:true},name:{required:true},email:{required:true,email:true}
        ,comment_content:{required:true}},
        // Specify the validation error messages
        messages: {articleid:{required:''},name:{required:validatemessages.name}
            ,email:{required:validatemessages.email ,email:validatemessages.valid_email}
            ,comment_content:{required:validatemessages.comment}},

        submitHandler: function(form) {
            form.submit();
        }
    });

});
