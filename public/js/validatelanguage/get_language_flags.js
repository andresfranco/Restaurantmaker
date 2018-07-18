$(document).ready(function()
{
  var l = window.location;
  var base_url = l.protocol + "//" + l.host + "/" ;
  var urlpath =base_url+"/metronic/assets/global/img/flags/";
  set_image(urlpath);
 $("#flag").change(function()
 {
  set_image(urlpath);
});
});

function set_image(urlpath)
{
  var imagename = $('#flag').val();
  if(imagename !="")
  {
   $("#flagimage").attr("src",urlpath+imagename);
   $("#flagimage").show();
  }
  else
  {
    $("#flagimage").hide();
  }

}
