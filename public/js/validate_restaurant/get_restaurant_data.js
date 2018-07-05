$(document).ready(function()
{

 $("#countryid").unbind('change').change(function()
 {

    get_states();

    remove_select_options("#stateid","Select a State");
    remove_select_options("#cityid","Select a City");
    remove_select_options("#townshipid","Select a Township");
    remove_select_options("#neighborhoodid","Select a Neighborhood");
  });

  $("#stateid").unbind('change').change(function()
  {

    get_cities();
    remove_select_options("#cityid","Select a City");
    remove_select_options("#townshipid","Select a Township");
    remove_select_options("#neighborhoodid","Select a Neighborhood");

  });
  $("#cityid").unbind('change').change(function()
  {

   get_townships();
   remove_select_options("#townshipid","Select a Township");
   remove_select_options("#neighborhoodid","Select a Neighborhood");

  });
  $("#townshipid").unbind('change').change(function(e)
  {
  get_neighborhoods();

  });
});



  function get_states()
  {
    var base_url =get_url_path();
    var urlpath =base_url+"/address/get_state_data/";
    var countryid = $('#countryid').val();
    remove_select_options("#stateid","Seleccione un Estado");
    $.ajax
    ({
     dataType:'json',
     type: "POST",
     url: urlpath+countryid ,
     data:{"countryid":countryid},
     cache: false,
     success: function(data)
     {

           $("#stateid").empty().append('<option selected="selected" value="">'+'Seleccione un Estado'+'</option>');
           $.each(data, function(index, object) {
           $("#stateid").append('<option value="' +object.id + '">' + object.state+ '</option>');
          });
     }
     });
  }

  function get_cities()
  {
    var base_url =get_url_path();
    var countryid =$('#countryid').val();
    var stateid = $('#stateid').val();
    var urlpath =base_url+"/address/get_city_data/";
    remove_select_options("#cityid","Seleccione una Ciudad");
    $.ajax
    ({
     dataType:'json',
     type: "POST",
     url: urlpath+countryid+'/'+stateid,
     data:{"countryid":countryid,"stateid":stateid},
     cache: false,
     success: function(data)
     {

           $("#cityid").empty().append('<option selected="selected" value="">'+'Seleccione una Ciudad'+'</option>');
           $.each(data, function(index, object) {
           $("#cityid").append('<option value="' +object.id + '">' + object.city+ '</option>');
          });
     }
     });

  }

  function get_townships()
  {
    var base_url =get_url_path();
    var urlpath =base_url+"/address/get_township_data/";
    var cityid = $('#cityid').val();
    remove_select_options("#townshipid","Seleccione un Sector");
    $.ajax
    ({
     dataType:'json',
     type: "POST",
     url: urlpath+cityid ,
     data:{"cityid":cityid},
     cache: false,
     success: function(data)
     {
           $("#townshipid").empty().append('<option selected="selected" value="">Seleccione un Sector</option>');
           $.each(data, function(index, object) {
           $("#townshipid").append('<option value="' +object.id + '">' + object.township + '</option>');
          });
     }
    });
  }

  function get_neighborhoods()
  {
    var base_url =get_url_path();
    var urlpath =base_url+"/address/get_neighborhood_data/";
    var cityid = $('#cityid').val();
    var townshipid =$('#townshipid').val();
    remove_select_options("#neighborhoodid","Seleccione un Barrio");

    $.ajax
    ({
     dataType:'json',
     type: "POST",
     url: urlpath+cityid+'/'+townshipid,
     data:{"cityid":cityid,"townshipid":townshipid},
     cache: false,
     success: function(data)
     {
           $("#neighborhoodid").empty().append('<option selected="selected" value="">'+'Seleccione un Barrio'+'</option>');
           $.each(data, function(index, object) {
           $("#neighborhoodid").append('<option value="' +object.id + '">' + object.neighborhood + '</option>');
          });
     }
     });
  }
  function get_url_path()
  {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    return base_url;
  }
  function remove_select_options(name,select_text)
  {

 $(name)
    .find('option')
    .remove()
    .end()
    .append('<option value="" selected>'+select_text+'</option>')
    .val('')
;


  }
