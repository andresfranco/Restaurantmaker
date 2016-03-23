$(document).ready(function()
{
 $("#companyid").change(function()
 {

  var id=$(this).val();
  var companyid = $('#companyid').val();

  $.ajax
  ({
   type: "POST",
   url: "gettower/"+companyid,
   data:{"companyid":companyid},
   cache: false,
   success: function(html)
   {
      $("#towerid").html(html);
   }
   });
  });
});
