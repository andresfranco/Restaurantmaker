$(function()
{
    $("#appform").validate({
        errorClass:'has-error',
        // Specify the validation rules
        rules: {name:{required:true},title:{required:true}},
        // Specify the validation error messages
        messages: {name:{required:validatemessages.name},title:{required:validatemessages.title}},
        submitHandler: function(form) {form.submit();}
    });
});
