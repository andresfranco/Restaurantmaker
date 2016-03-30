{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('change_password')}}
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
	    <div class="form-group">
		<label name="passwordlabel" id ="passwordlabel" class="control-label col-md-2 align_label_left">{{'Password'}}
                 <span class="required" aria-required="true">* </span>
                 </label>
		 <div class="col-md-4">
		 {{ password_field("password", "size" : 30 ,"class":"form-control") }}
		 <!-- LOAD CONTROL ERROR LABEL-->
		 </div>
		 </div>
         
         <div class="form-group">
		<label name="confirm_password_label" id ="confirm_password_label" class="control-label col-md-2 align_label_left">{{'Confirmar Password'}}
		<span class="required" aria-required="true">* </span>
		</label>
		 <div class="col-md-4">
		{{password_field("confirm_password", "size" : 30 ,"class":"form-control") }}
		 <!-- LOAD CONTROL ERROR LABEL-->
		 </div>
		</div>
	
       <div class="col-md-offset-2 col-md-3" style="padding-left:0;">
       	<input type="submit" class="btn btn-primary" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn btn-default") }}
       </div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
</div>
{% endblock %}