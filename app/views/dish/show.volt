{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
{% endblock %}
{% block content %}
<div class="row">
<div class="col-md-12">
<!-- BEGIN PORTLET-->
<div class="portlet box blue">
	<div class="portlet-title">
	<div class="caption">
	{{title|t}}{{' - '}}{{menu_name}}
	</div>
	</div>
	<div class="portlet-body form">
	<!-- BEGIN FORM-->
	{{ form(routeform, "method":"post","id":"appform","role":"form","class":"form-horizontal") }}
	<div class="form-body">
	<!-- FORM ERROR MESSAGES-->
	{% set errorvar = content() %}
	{% if errorvar is not empty %}
	<div class="alert alert-danger">
	<button data-close="alert" class="close"></button>
	{{ content() }}
	</div>
	{% endif %}
		<!-- LOAD FORM CONTROLS-->
	{% for index,item in formcolumns %}
	{% if item['name']=='image_path' %}
	<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-3 formlabel">
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
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-3 formlabel">
		{{item['label']|t}}
		</label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control",'disabled':'""']) }}
		</div>
		</div>
  {% endif %}
	{% endfor %}
	</div>
	<!-- FORM ACTION BUTTONS-->
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-2 col-md-4">
    <button class="btn red">{{delete_button_name|t}}</button>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn grey-cascade") }}
	</div>
	</div>
	</div>
	</form>
	<!-- END FORM-->
	</div>
</div>
<!-- END PORTLET-->
</div>
</div>
{% endblock %}
