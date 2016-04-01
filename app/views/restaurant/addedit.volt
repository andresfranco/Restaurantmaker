{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
<script>
var validatemessages = {
name:'{{"restaurant.name.required"|t}}',
address:'{{"restaurant.address.required"|t}}',
phone:'{{"restaurant.phone.required"|t}}',
email:'{{"restaurant.email.required"|t}}',
valid_email:'{{"restaurant.email.valid"|t}}'
};
</script>
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
		<label name="lblname" id="lblname" class="control-label col-md-1 align_label_left">
		{{'Name'|t}}<span class="required" aria-required="true">* </span>
		</label>
		<div class="col-md-4">
		{{ text_field("name", "type" : "text","class":"form-control") }}
		</div>
		</div>
        <div class="form-group">
			<label name="lblphone" id="lblphone" class="control-label col-md-1 align_label_left">
				{{'Phone'|t}}<span class="required" aria-required="true">* </span>
			</label>
			<div class="col-md-4">
			{{ text_field("phone", "type" : "text","class":"form-control") }}
			</div>
			</div>

			<div class="form-group">
			<label name="lbllogo" id="lblloko" class="control-label col-md-1 align_label_left">
				<a href="#ModalEditor" id="logourl"  data-toggle="modal" ><i class="fa fa-file-image-o"></i>
					{{' '}}{{'Logo'|t}} </a>
			</label>
			<div class="col-md-2">
			{{ text_field("logo" ,"type" : "text","class":"form-control") }}
			</div>
			<div id ="logo_image" class="col-md-2">
				{% if mode =='edit' and logo_path !="" %}
        <img id="theImg" src="{{url('files/images/'~logo_path)}}" width="50px" heigh="50px"/>
				{% endif %}
			</div>
		</div>

			<div class="form-group">
			<label name="lbladdress" id="lbladdress" class="control-label col-md-1 align_label_left" style="padding-right:0;">
			<a href="#responsive" id="pencil"  data-toggle="modal" ><i class="fa fa-location-arrow"></i>
				{{' '}}{{'Address'|t}} </a><span class="required" aria-required="true">* </span>
			</label>
			<div class="col-md-4">
			{{ text_area("rest_address", "class":"form-control","readonly":"") }}
			<label id="erroraddress" name ="erroraddress"></label>
			{{text_field("addressid", "type" : "text","class":"form-control","style":"display:none;") }}
		  </div>
		  </div>

		  <div class="form-group">
			<label name="email" id="lblemail" class="control-label col-md-1 align_label_left">
				{{'Email'|t}}<span class="required" aria-required="true">* </span>
			</label>
			<div class="col-md-4">
			{{ text_field("email", "type" : "text","class":"form-control") }}
			</div>
			</div>

			<div class="form-group">
			<label name="website" id="lblwebsite" class="control-label col-md-1 align_label_left">{{'Website'|t}}</label>
			<div class="col-md-4">
			{{ text_field("website", "type" : "text","class":"form-control") }}
			</div>
			</div> 

       <div class="col-md-offset-1 col-md-3" style="padding-left:0;">
       <input id="save_restaurant_button"class="btn btn-primary" value="{{'Save'|t}}" type="submit">
	   <a href="{{url('restaurant/list')}}" class="btn btn-default">{{'Cancel'|t}}</a>	</div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
</div>

<!-- Modal Form-->
<div id="responsive" class="modal fade" tabindex="-1" data-width="760" >
<div id ="modalbody">
<div class="row" style="background-color:white !important;">
	   <div class="row" style="padding-bottom:10px; padding-left:20px; padding-right:20px;">
       <h3>{{'Restaurant Address'|t}}</h3>
        <hr></hr>
	    </div>
	    <div class="row"style="padding-bottom:10px; padding-left:20px; padding-right:20px;">
 		<form novalidate="novalidate" action="" id="modalform" class="form-horizontal" method="post" role="form">
		<div class="form-group">
		<label name="countryid" id="item['name']" class="control-label col-md-3 formlabel">
		{{'Country'|t}}	<span class="required" aria-required="true">* </span>    </label>
		<div class="col-md-4">
		 <select id="countryid" name="countryid" class="form-control">
		<option value=""> {{'Select a Country'|t}}</option>
		{% for index,item in countries_data   %}
		<option value="{{item['id']}}"> {{item['country']|t}}</option>
		{% endfor  %}
		</select>
		</div>
		</div>

		<div class="form-group">
		<label name="stateid" id="item['name']" class="control-label col-md-3 formlabel">
		{{'State'|t}}<span class="required" aria-required="true">* </span>    </label>
		<div class="col-md-4">
		<select id="stateid" name="stateid" class="form-control">
		<option value=""> {{'Select a State'|t}}</option>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label name="cityid" id="item['name']" class="control-label col-md-3 formlabel">
		{{'City'|t}}<span class="required" aria-required="true">* </span>    </label>
		<div class="col-md-4">
		<select id="cityid" name="cityid" class="form-control">
		<option value="">{{'Select a City'|t}}</option>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label name="townshipid" id="item['name']" class="control-label col-md-3 formlabel">
		{{'Township'|t}}<span class="required" aria-required="true">* </span>    </label>
		<div class="col-md-4">
		 <select id="townshipid" name="townshipid" class="form-control">
		<option value="">{{'Select a Township'|t}}</option>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label name="neighborhoodid" id="item['name']" class="control-label col-md-3 formlabel">
		{{'Neighborhood'|t}}<span class="required" aria-required="true">* </span>    </label>
		<div class="col-md-4">
		<select id="neighborhoodid" name="neighborhoodid" class="form-control">
		<option value="">{{'Select a Neighborhood'|t}}</option>
		</select>
		</div>
		</div>
		<div class="form-group">
		<label name="addresslbl" id="item['name']" class="control-label col-md-3 formlabel">
		{{'Address'|t}}<span class="required" aria-required="true">* </span>    </label>
		<div class="col-md-4">
		<textarea id="address" name="address" class="form-control" maxlength="400"></textarea>
		</div>
		</div>
		

		<div class="form-actions">
		<div class="row">
		<div class="col-md-offset-3 col-md-4" style="padding-left:0;">
		<button type="button" data-dismiss="modal" class="btn btn-primary">{{'Close'|t}}</button>
		<button type="submit" id ="save_address_button" class="btn btn-default">{{'Save'|t}}</button>
		</div>
	    </div>
		</div>
		</form>
	    </div>
 </div>
 </div>
 </div>
 </div>

 <!-- Image Modal -->
 <div id="ModalEditor" class="modal fade"  tabindex="-1" data-width="760" >
  <div class="modal-body">
	<div class="col-md-12">
	<div class="portlet box blue" >
		<div class="portlet-title">
		<div class="caption">{{'Images'|t}}</div>
		</div>
		<div class="portlet-body form" >
		<div class="col-md-12" style="background-color:white;">
		{% for index,item in images %}
		<div class="col-md-1" style="padding-top:15px;">
	  <img  class="modal_hover" id ="{{item['name']}}" src="{{url('files/images/'~item['name'])}}"  height="100" width="100" onclick="selectImage(this.id);">
		</div>
		{% endfor %}
	  </div>
		<br><br>
		<div class="col-md-12" style="background-color:white; padding-left:30px;padding-top:30px;padding-bottom:30px;">
		<button type="button" data-dismiss="modal" class="btn btn-default">{{'Close'|t}}</button>
		</div>
		</div>
	 </div>
 </div>
	</div>

 </div>
</div>
</div>
</div>

{% endblock %}



