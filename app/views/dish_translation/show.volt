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
	{{title|t}}
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
	<div class="form-group">
	<label name="lbldishname" id="lbldishname" class="control-label col-md-3 formlabel">
	{{'Dish Name'|t}} </span>
	</label>
	<div class="col-md-4">
	{{ text_field("dish_name", "type" : "text","class":"form-control","value":dish_name,"readonly":"") }}
	</div>
	</div>
		<!-- LOAD FORM CONTROLS-->
	{% for index,item in formcolumns %}
		<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-3 formlabel">
		{{item['label']|t}}
		</label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control",'disabled':'""']) }}
		</div>
		</div>
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
