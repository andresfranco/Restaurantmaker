$(document).ready(function()
{
 var l = window.location;
 var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
 var urlpath =base_url+"/get_state/";

 $("#countryid").change(function()
 {
   
  var countryid = $('#countryid').val();
   console.log(urlpath+countryid);
   $.ajax
  ({
   type: "POST",
   url: urlpath+countryid,
   data:{"countryid":countryid},
   cache: false,
   success: function(html)
   {
     
      $("#stateid").html(html);
   }
   });
  });
  
 
});