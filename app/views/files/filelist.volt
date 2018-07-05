{% extends "layouts/masterpage_standard.volt" %}
{% block pagetitle %}
	<h3 class="page-title" align ="left">
	{{title|t}} <div align="right"><a href ="{{url('file/index')}}" class="btn btn blue">{{'files.button.title'|t}} <i class="fa fa-arrow-right "></i> </a></div>
	</h3>
	<hr/>
{% endblock %}
{% block pagebar %}
{% endblock %}
{% block content %}

 <!-- GRID SEARCH -->
<div align="left" >
{{ form(searchroute, "method":"post", "autocomplete" : "off") }}
<div class="row">
<div class="form-group col-md-10" style="padding-left:0;">
{% for index,item in searchcolumns %}
<div class="col-md-5">
<label>{{item['title']|t}}</label>
{{ text_field(item['name'], "size" : item['size'],"class":"form-control","placeholder":"") }}
</div>
{% endfor %}
</div>
</div>
<div class="row">
<div class="form-group col-md-8">
<div class="col-md-1" align ="left" style="padding-left:0;">
{{ submit_button("Buscar"|t,"class":"btn blue") }}
</div>
</div>
</div>
</form>
</div>
{% if noitems ==""%}
 <!-- END GRID SEARCH-->
 <table class="table table-bordered table-striped table-condensed flip-content">
 <thead>
 <tr>
 <th>{{'File Name'|t}}</th>
 <th>{{'Type'|t}}</th>
 <th>{{'Size'|t}}</th>
 <th></th>
 </tr>
  </thead>
 <tbody>
 {% if page.items is defined %}
 {% for index,file_names in page.items %}
    {% if 'image'in router.getRewriteUri() %}
      {% set downloadroute = download_path~'images/' %}
    {% elseif 'video' in router.getRewriteUri()%}
      {% set downloadroute = download_path~'videos/' %}
    {% elseif 'document' in router.getRewriteUri() %}
      {% set downloadroute = download_path~'documents/' %}
    {% elseif 'other' in router.getRewriteUri() %}
      {% set downloadroute = download_path~'other/' %}
   {% endif %}
  <tr>
 	<td width ="30%"><a href ="{{downloadroute~file_names['name'] }}">{{ file_names['name']}}</a></td>
 	<td width ="30%">{{ file_names['type']}}</td>
	<td width ="30%">{{ file_names['size']}}{{'MB'}}</td>
	<td><a id ="{{'deleteicon'~index}}" name="{{'deleteicon'~index}}" class="btn btn-icon-only red" data-toggle="modal" data-id="{{ file_names['name']}}" href="#basic">
      <i class="fa fa-remove"></i> </a></td>
	</tr>
 {% endfor %}
 {% endif %}

 </tbody>
 </table>
 <div align="left">{{ 'Página'|t~' '~ page.current ~' '~'de'|t ~' '~page.total_pages }}</div>
 <div align ="left">
  <ul class="pagination">
   <li>{{ link_to(listroute,'<i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>'~'Primero'|t) }}</li>
   <li>{{ link_to(listroute~"?page="~page.before, '<i class="fa fa-angle-left"></i>'~'Anterior'|t) }}</li>
   {% for i in 1..page.total_pages %}
    {% if page.current == i %}
     {% set classitem ='active' %}
    {% else %}
     {% set classitem ='' %}
    {% endif %}
    <li class="{{classitem}}">{{ link_to(listroute~"?page="~i, i) }}</li>
   {% endfor %}
   <li>{{ link_to(listroute~"?page="~page.next, 'Siguiente'|t~'<i class="fa fa-angle-right"></i>') }}</li>
   <li>{{ link_to(listroute~"?page="~page.last, 'Ultimo'|t~'<i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>') }}</li>
  </ul>
 </div>

 <div style="display: none;" class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
     <h4 class="modal-title">{{'¿ Esta seguro que desea borrar este archivo ?'  }}</h4>
    </div>
    <div class="modal-footer">
			<input id="filename" type="hidden" name="filename" value="">
     <button id ="deletebutton" type="button" class="btn blue">{{ 'Eliminar'|t }}</button>
     <button type="button" class="btn default" data-dismiss="modal">{{ 'Cerrar'|t }}</button>

    </div>
   </div>
   <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
 </div>
 <!--Scripts-->
 {{assets.outputJs('delete_modal_js')}}
{% else %}
 <!--NO ITEMS VALIDATION -->
 <div class="alert alert-warning alert-dismissable">
  <strong><i class="glyphicon glyphicon-warning-sign"></i> {{noitems|t}}</strong>
 </div>
{% endif %}

{% endblock %}
