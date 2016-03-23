$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
        // Specify the validation rules
        rules: {
            categoryid:{required:true},
            name:{required:true},
            price:{required:true,number: true}

        },
        // Specify the validation error messages
        messages: {
          categoryid:{required:''},
          name:{required:validatemessages.name},
          price:{required:validatemessages.price,number:validatemessages.price_number}

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });

function get_url_path()
{
  var l = window.location;
  var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
  return base_url;
}

function selectImage(clicked_id)
{
  var base_url =get_url_path();
  var urlpath =base_url+"/files/images/"+clicked_id;
  $("#image_path").val(clicked_id);
  $('#logo_image').html('<img id="theImg" src="'+urlpath+'" width="50px" heigh="50px"/>')
  $('#ModalEditor').modal('hide');

}
