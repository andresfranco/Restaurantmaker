$(document).ready(function()
{
  var l = window.location;
  var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
  var urlpath =base_url+"/township/get_citydata/";
  var cityid = $('#cityid').val();
  //$('#country').val('');
  //$('#state').val('');
  //getcitydata(cityid,urlpath);
 $("#cityid").change(function()
 {
  cityid = $('#cityid').val();
  getcitydata(cityid,urlpath);
});

$("#appform").bind("submit", function() {
      cityid = $('#cityid').val();
      getcitydata(cityid,urlpath);
  });

function getcitydata(cityid,urlpath)
{
  $.ajax
  ({
   type: "POST",
   url: urlpath+cityid ,
   dataType: 'json',
   cache: false,
   data:{"cityid":cityid},
   success: function(res)
   {
      $('#country').val(res.country);
       $('#state').val(res.state);
  },
    error:function(xhr, textStatus, error) {
        //alert("ERROR: "+xhr.statusText+' '+textStatus+' '+error);
    }
   });
  }
});
