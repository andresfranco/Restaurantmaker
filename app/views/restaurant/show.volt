{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validatejs')}}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
{% endblock %}
{% block content %}

<div class="row">
<div class="col-md-12">
<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption">
		{{title|t}}
		</div>
		</div>
		<div class="portlet-body form">
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
			<label name="lblname" id="lblname" class="control-label col-md-3 formlabel">
			{{'Name'|t}}
			</label>
			<div class="col-md-4">
      {{ text_field("name", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>

			<div class="form-group">
			<label name="lblphone" id="lblphone" class="control-label col-md-3 formlabel">
				{{'Phone'|t}}
			</label>
			<div class="col-md-4">
			{{ text_field("phone", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>

			<div class="form-group">
			<label name="lbllogo" id="lblloko" class="control-label col-md-3 formlabel">
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
			<label name="lbladdress" id="lbladdress" class="control-label col-md-3 formlabel">
				{{' '}}{{'Address'|t}}
			</label>
			<div class="col-md-4">
			{{ text_area("rest_address", "class":"form-control","readonly":"") }}

		  </div>
		  </div>

		  <div class="form-group">
			<label name="email" id="lblemail" class="control-label col-md-3 formlabel">
				{{'Email'|t}}
			</label>
			<div class="col-md-4">
			{{ text_field("email", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>

			<div class="form-group">
			<label name="website" id="lblwebsite" class="control-label col-md-3 formlabel">{{'Website'|t}}</label>
			<div class="col-md-4">
			{{ text_field("website", "type" : "text","class":"form-control","readonly":"") }}
			</div>
			</div>
		</div>

			<div class="form-actions">
			<div class="row">
			<div class="col-md-offset-2 col-md-4">
			<input id="save_restaurant_button"class="btn red" value="{{'Delete'|t}}" type="submit">
			<a href="/Phalcontest/restaurant/list" class="btn grey-cascade">{{'Cancel'|t}}</a>	</div>
			</div>
			</div>
		</form>
</div>
</div>
</div>
</div>
{% endblock %}
