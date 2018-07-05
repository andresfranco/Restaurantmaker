$(document).ready(function()
{
  var l = window.location;
  var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
  var urlpath =base_url+"/neighborhood/get_township_data/";

 $("#cityid").change(function()
 {
  var cityid = $('#cityid').val();
  $.ajax
  ({
   dataType:'json',
   type: "POST",
   url: urlpath+cityid ,
   data:{"cityid":cityid},
   cache: false,
   success: function(data)
   {
        var townshipdata = data['township'];
        var citydata =data.citydata;
         $("#townshipid").empty().append('<option selected="selected" value="">Seleccione un Sector</option>');
         $('#state').val(data.citydata.state);
         $('#country').val(data.citydata.country);
         $.each(townshipdata, function(index, object) {
         $("#townshipid").append('<option value="' +object.id + '">' + object.township + '</option>');
        });
   }
   });
  });
});
