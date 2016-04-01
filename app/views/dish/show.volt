{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
{% endblock %}
{% block content %}
<div class="row row_container_form">
	<div class="row">
     <h3>{{title|t}}</h3>
	</div>
	<hr></hr>
	<div class="row">
	<!-- BEGIN FORM-->
	{{ form(routeform, "method":"post","id":"appform","role":"form","class":"form-horizontal") }}
	<!-- FORM ERROR MESSAGES-->
	{% set errorvar = content() %}
	{% if errorvar is not empty %}
	<div class="alert alert-danger">
	<button data-close="alert" class="close"></button>
	{{ content()|t}}
	</div>
	{% endif %}
	<!-- LOAD FORM CONTROLS-->
	{% for index,item in formcolumns %}
	{% if item['name']=='image_path' %}
	<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-1 formlabel">
		{{item['label']|t}}
		</label>
	<div class="col-md-2">
	{{ form.render(item['name'],["class":"form-control",'disabled':'""']) }}
	</div>
	<div id ="logo_image" class="col-md-2">
    {% if image_path %}
		<img id="theImg" src="{{url('files/images/'~image_path)}}" width="50px" heigh="50px"/>
		{% endif %}
	</div>
</div>
	{% else %}
		<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-1 formlabel">
		{{item['label']|t}}
		</label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control",'disabled':'""']) }}
		</div>
		</div>
  {% endif %}
	{% endfor %}
       <div class="col-md-offset-1 col-md-3" style="padding-left:0;">
       	<button class="btn btn-danger">{{delete_button_name|t}}</button>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn btn-default") }}
       </div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
</div>

{% endblock %}