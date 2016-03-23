{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('change_password')}}
{% endblock %}
{% block content %}
<div class="row">
<div class="col-md-12">
<!-- BEGIN PORTLET-->
<div class="portlet box blue">
	<div class="portlet-title">
	<div class="caption">
	{{title}}
	</div>
	</div>
	<div class="portlet-body form">
	<!-- BEGIN FORM-->
	{{ form(routeform~id, "method":"post","id":"appform","role":"form","class":"form-horizontal") }}
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
	
		 <div class="form-group">
		 <label name="passwordlabel" id ="passwordlabel" class="control-label col-md-3 formlabel">{{'Password'}}
                 <span class="required" aria-required="true">* </span>
                 </label>
		 <div class="col-md-4">
		 {{ password_field("password", "size" : 30 ,"class":"form-control") }}
		 <!-- LOAD CONTROL ERROR LABEL-->
		 </div>
		 </div>
                 <div class="form-group">
		 
		 <label name="confirm_password_label" id ="confirm_password_label" class="control-label col-md-3 formlabel">{{'Confirmar Password'}}
                 <span class="required" aria-required="true">* </span>
                 </label>
		 <div class="col-md-4">
		{{password_field("confirm_password", "size" : 30 ,"class":"form-control") }}
		 <!-- LOAD CONTROL ERROR LABEL-->
		 </div>
		 </div>
     
	</div>
	<!-- FORM ACTION BUTTONS-->
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-2 col-md-4">
		{{ submit_button("Guardar","class":"btn btn-primary") }}
		{{ link_to(routelist,cancel_button_name,"class":"btn grey-cascade") }}
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