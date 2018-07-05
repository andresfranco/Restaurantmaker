{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validatejs')}}
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
	<div class="form-group">
			<label name="lblname" id="lblname" class="control-label col-md-1 formlabel">
			{{'Name'|t}}
			</label>
			<div class="col-md-4">
      {{ text_field("name", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>

			<div class="form-group">
			<label name="lblphone" id="lblphone" class="control-label col-md-1 formlabel">
				{{'Phone'|t}}
			</label>
			<div class="col-md-4">
			{{ text_field("phone", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>

			<div class="form-group">
			<label name="lbllogo" id="lblloko" class="control-label col-md-1 formlabel">
			{{'Logo'|t}}
			</label>
			<div class="col-md-2">
			{{ text_field("logo" ,"type" : "text","class":"form-control","readonly":"") }}
			</div>
			<div id ="logo_image" class="col-md-2">
				{% if mode =='show' and logo_path !="" %}
				<img id="theImg" src="{{url('files/images/'~logo_path)}}" width="50px" heigh="50px"/>
				{% endif %}
			</div>
		</div>

			<div class="form-group">
			<label name="lbladdress" id="lbladdress" class="control-label col-md-1 formlabel">
				{{' '}}{{'Address'|t}}
			</label>
			<div class="col-md-4">
			{{ text_area("rest_address", "class":"form-control","readonly":"") }}

		  </div>
		  </div>

		  <div class="form-group">
			<label name="email" id="lblemail" class="control-label col-md-1 formlabel">
				{{'Email'|t}}
			</label>
			<div class="col-md-4">
			{{ text_field("email", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>

			<div class="form-group">
			<label name="website" id="lblwebsite" class="control-label col-md-1 formlabel">{{'Website'|t}}</label>
			<div class="col-md-4">
			{{ text_field("website", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>
       <div class="col-md-offset-1 col-md-3" style="padding-left:0;">
       	<input id="save_restaurant_button"class="btn btn-danger" value="{{'Delete'|t}}" type="submit">
			<a href="{{url('restaurant/list')}}" class="btn btn-default">{{'Cancel'|t}}</a>	</div>
       </div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
</div>
{% endblock %}
