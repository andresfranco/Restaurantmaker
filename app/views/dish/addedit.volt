{% extends "layouts/masterpage_standard.volt" %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
<script>
var validatemessages = {
categoryid:'{{"dish.category.required"|t}}'
,name:'{{"dish.name.required"|t}}'
,price:'{{"dish.price.required"|t}}'
,price_number:'{{"dish.price.number"|t}}'
};
</script>
{% endblock %}
{% block content %}
<div class="row row_container_form">
	<div class="row">
     <h3>{{title|t}}{{' - '}}{{menu_name}}</h3>
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
		<label name="lbllogo" id="lblloko" class="control-label col-md-1 formlabel">
			<a href="#ModalEditor" id="logourl"  data-toggle="modal" ><i class="fa fa-file-image-o"></i>
				{{' '}}{{'Image'|t}} </a>
		</label>
		<div class="col-md-2">
		{{ form.render(item['name'],["class":"form-control"]) }}
		</div>
		<div id ="logo_image" class="col-md-2">
			{% if mode =='edit' and image_path !="" %}
			<img id="theImg" src="{{url('files/images/'~image_path)}}" width="50px" heigh="50px"/>
			{% endif %}
		</div>
	</div>
		{% else %}
		<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-1 formlabel">
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
       <div class="col-md-offset-1 col-md-3" style="padding-left:0;">
       	<input type="submit" class="btn btn-primary" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist~'/'~menuid,cancel_button_name|t,"class":"btn btn-default") }}
       </div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
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
{% endblock %}
