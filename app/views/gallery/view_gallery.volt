{% extends "layouts/masterpage_standard.volt" %}

{% block pageheader %}
   {{super()}}
    <!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{static_url('tools/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
{% endblock %}
{% block javascripts %}
{{super()}}
<script type="text/javascript" src="{{static_url('tools/fancybox//lib/jquery.mousewheel-3.0.6.pack.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{static_url('tools/fancybox/source/jquery.fancybox.css')}}" />
<script type="text/javascript" src="{{static_url('tools/fancybox/source/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{static_url('tools/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-buttons.css')}}" />
<script type="text/javascript" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-buttons.js')}}"></script>
<script type="text/javascript" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-media.js')}}"></script>
<link rel="stylesheet" type="text/css" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-thumbs.css')}}"/>
<script type="text/javascript" src="{{static_url('tools/fancybox/source/helpers/jquery.fancybox-thumbs.js')}}"></script>
<script type="text/javascript" src="{{static_url('js/validate_gallery/delete_image_modal.js')}}"></script>
    <!-- Optionally add helpers - button, thumbnail and/or media -->
<script>
 jQuery(document).ready(function(){$(".zoom").fancybox({openEffect : 'elastic',closeEffect : 'elastic',helpers : {title : {type : 'inside'}}}); });
</script>
  
        {{assets.outputJs('delete_modal_js')}}
{% endblock %}
{% block pagetitle %}
    
{% endblock %}
{% block pagebar %}
{% endblock %}
{% block content %}
    {% if gallery_images %}
    <div class="margin-top-10">
    <div class="row mix-grid">
      <h3 class="page-title" align ="left">
      {{gallery_data['title']|t}}<div align="right"><a href ="{{url('gallery/list')}}" class="btn btn blue">{{'Galleries'|t}} <i class="fa fa-arrow-right "></i> </a></div>
    </h3>
    <hr/>
    {% for file in gallery_images %}
    <div style="display: block;  opacity: 1;" class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
      <div class="mix-inner">
      <img height="50" width="50"src="{{static_url('files/galleries/'~gallery_data['name']~'_gallery/'~file['name'])}}" alt="">
      <div class="mix-details">
      
        <a class="mix-link" data-toggle="modal" data-id="{{file['imageid']}}" href="#basic">
          <i class="fa fa-remove fa-lg"></i>
        </a>
        <a  id ="single_1" class="zoom" href="{{static_url('files/galleries/'~gallery_data['name']~'_gallery/'~file['name'])}}"  data-rel="fancybox-button">
          <i class="fa fa-search fa-lg"></i>
        </a>
      </div>
      </div>
    </div>
    {% endfor %}
    </div>
    </div>
    <div style="display: none;" class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{'¿ Esta seguro que desea borrar este archivo ?'  }}</h4>
       </div>
       <div class="modal-footer">
   			<input id="filename" type="hidden" name="filename" data-name ="{{gallery_data['id']}}" value="">
        <button id ="deletebutton" type="button" class="btn blue">{{ 'Eliminar'|t }}</button>
        <button type="button" class="btn default" data-dismiss="modal">{{ 'Cerrar'|t }}</button>

       </div>
      </div>
      <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
    </div>
  
  {% else %}
  <div class="alert alert-warning alert-dismissable">
   <strong><i class="glyphicon glyphicon-warning-sign"></i> {{noitems|t}}</strong>
  </div>
  {% endif %}

  
{% endblock %}
