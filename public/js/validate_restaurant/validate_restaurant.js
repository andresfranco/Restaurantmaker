$(document).ready(function()
{

  $("#save_restaurant_button").click(function()
  {


    // Setup form validation on the #register-form element
    $("#appform").validate({
      ignore: [],
      errorClass: "has-error",
      errorPlacement: function(error, element)

      {

        if (element.attr("name") == "addressid" )
        {error.appendTo('#erroraddress');$('#rest_address').addClass('has-error')}
        else{error.insertAfter(element);}},
        // Specify the validation rules
        rules: {
          name:{
              required:true
          },
          phone:{
              required:true
          },
            email:{
                required:true,
                email:true

            },
            addressid:{
                required:true
            }
        },
        // Specify the validation error messages
        messages: {
          name:{
              required:validatemessages.name

          },
          phone:{
              required:validatemessages.phone

          },
            email:{
                required:validatemessages.email,
                email:validatemessages.valid_email

            },
             addressid:{
                required:validatemessages.address

            }


        },


        submitHandler: function(form) {
                form.submit();
        }

    });

  });


    $("#save_address_button").click(function()
    {
      // Setup form validation on the #register-form element
      $("#modalform").validate({

        errorClass: "has-error",

          // Specify the validation rules
          rules: {
            countryid:{
                required:true

            },
            stateid:{
                required:true

            },
              cityid:{
                  required:true

              },
              townshipid:{
                  required:true
              },
              neighborhoodid:{
                  required:true
              },
              address:{
                  required:true
              }

          },
          // Specify the validation error messages
          messages: {
            countryid:{
                required:""

            },
            stateid:{
                required:""

            },
              cityid:{
                  required:""

              },
               townshipid:{
                  required:""

              },
              neighborhoodid:{
                 required:""

             },
             address:{
                required:validatemessages.address

            },


          },


          submitHandler: function(form) {

             var base_url =get_url_path();
             var address_data =JSON.stringify({
               countryid:$('#countryid').val()
               ,cityid:$('#cityid').val()
               ,stateid:$('#stateid').val()
               ,townshipid:$('#townshipid').val()
               ,neighborhoodid:$('#neighborhoodid').val()
               ,address:$('#address').val()
             });

               var description  = $('#countryid option:selected').text()
               +','+$('#stateid option:selected').text()
               +','+$('#townshipid option:selected').text()
               +','+$('#neighborhoodid option:selected').text()
               +','+$('#address').val();
               ;
               $('#addressid').val(address_data);

               $('#rest_address').val(description);
               $('#responsive').modal('hide');
               $("#erroraddress").hide();
               $('#rest_address').removeClass('has-error');

          }

      });

    });



});

function selectImage(clicked_id)
{
  var base_url =get_url_path();
  var urlpath =base_url+"/files/images/"+clicked_id;
  $("#logo").val(clicked_id);
  $('#logo_image').html('<img id="theImg" src="'+urlpath+'" width="50px" heigh="50px"/>')
  $('#ModalEditor').modal('hide');

}
