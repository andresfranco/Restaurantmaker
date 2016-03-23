{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
<script>
var validatemessages = {
code:'{{"language.code.required"|t}}'
,language:'{{"language.required"|t}}'
};
</script>
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
		<!-- LOAD FORM CONTROLS-->
	{% for index,item in formcolumns %}
		<div class="form-group">
		<label name="{{item['name']|t}}" id ="item['name']" class="control-label col-md-3 formlabel">
		{{item['label']|t}}
		{{item['required']}}
    </label>
		{% if item['name']=='flag'%}
			<div class="col-md-4">
				<div class="col-md-10" style ="padding-left:0;">
		  {{ form.render(item['name'],["class":"form-control"]) }}
			</div>
			<div class="col-md-2">
			<img id ="flagimage"></img>
		   </div>

		{% else %}
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control"]) }}
		<!-- LOAD CONTROL ERROR LABEL-->
		{{item['label_error']}}
		</div>
		{% endif  %}
		</div>
	{% endfor %}
	</div>
	<!-- FORM ACTION BUTTONS-->
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-2 col-md-4">
		 <input type="submit" class="btn blue-madison" value="{{'Guardar'|t}}"></input>
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
