$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {restaurantid:{required:true},menu_name:{required:true}},
        // Specify the validation error messages
        messages: {  restaurantid:{required:""},menu_name:{ required:validatemessages.name}},

        submitHandler: function(form) {form.submit();}});
});
