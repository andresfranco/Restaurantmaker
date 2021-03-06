{% extends "layouts/masterpage_standard.volt" %}
{% block head %}
 {{super()}}
	<link href="{{static_url('tools/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
{% endblock %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
<script src="{{static_url('tools/bootstrap-summernote/summernote.min.js')}}"></script>
<script>
var validatemessages = {
	name:'{{"menu.name.required"|t}}',
	title:'{{"menu.title.required"|t}}',
  description:'{{"menu.description.required"|t}}'
};
</script>
<script type="text/javascript">
$(document).ready(function() {
 $('#descriptioncontent').val($('#summernote').code());	
$('#summernote').summernote({
	height: "250px",
	width:"600px",
  onChange:function() {
   $('#descriptioncontent').val($('#summernote').code());
    }
});
});
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
	{% for index,item in formcolumns %}
		<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-2 align_label_left">
		{{item['label']|t}}
		{{item['required']}}
        </label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control"]) }}
		<!-- LOAD CONTROL ERROR LABEL-->
		<!-- LOAD CONTROL ERROR LABEL-->
		 {% if item['name']=='description'%}
       <label id="lbldescription" name ="lbldescription"></label>
     {% endif %}
		{{item['label_error']|t}}
		</div>
		</div>
	{% endfor %}
       <textarea id ="descriptioncontent" name="descriptioncontent" style="visibility:hidden;height:0;"></textarea>
       <div class="col-md-offset-2 col-md-3" style="padding-left:0;">
       	<input type="submit" class="btn btn-primary" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist~'/'~menuId,cancel_button_name|t,"class":"btn btn-default") }}
       </div>
    </div>   
	<!-- FORM ACTION BUTTONS-->
	</form>
	<!-- END FORM-->	
</div>
{% endblock %}