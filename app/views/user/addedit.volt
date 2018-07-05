{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
<script>
var validatemessages = {
username:'{{"username.required"|t}}'
,email_req:'{{"email.required"|t}}'
,email:'{{"email.valid"|t}}'
,pass:'{{"pass.required"|t}}'
,confirm:'{{"confirm.required"|t}}'
,equal:'{{"confirm.equal"|t}}'
};
</script>
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
	  {% if(mode=='edit')  %}
     {% if item['name'] not in['password','confirm_password']  %}
		<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-1 align_label_left">
		{{item['label']|t}}
		{{item['required']}}
        </label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control"]) }}
		<!-- LOAD CONTROL ERROR LABEL-->
		{{item['label_error']|t}}
		</div>
		</div>
	{% endif %}	
	{% else %}
      <div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-2 align_label_left">
		{{item['label']|t}}
		{{item['required']}}
        </label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control"]) }}
		<!-- LOAD CONTROL ERROR LABEL-->
		{{item['label_error']|t}}
		</div>
		</div>
	{% endif %}
	{% endfor %}
       <div class="{% if(mode=='edit') %}col-md-offset-1{% else %}col-md-offset-2{% endif %} col-md-3" style="padding-left:0;">
       	<input type="submit" class="btn btn-primary" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn btn-default") }}
       </div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
</div>

{% endblock %}