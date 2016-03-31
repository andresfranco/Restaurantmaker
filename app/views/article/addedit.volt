{% extends "layouts/masterpage_standard.volt" %}
{% block head %}
 {{super()}}
	<link href="{{static_url('tools/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
{% endblock %}

{% block javascripts %}
{{super() }}
<script src="{{static_url('tools/bootstrap-summernote/summernote.min.js')}}"></script>
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
<script>
var validatemessages = {
title:'{{"article.title.required"|t}}',
author:'{{"article.author.required"|t}}',
content:'{{"article.content.required"|t}}'
};
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#summernote').summernote({
	height: "250px",
	width:"600px",
  onChange:function() {
  $('#articlecontent').val($('#summernote').code());
  }

});
});
</script>
{% endblock %}
{% block content %}
<div class="row">
<div class="col-md-12">
<!-- BEGIN PORTLET-->
<div class="row row_container_form">
	<div class="row">
     <h3>{{title|t}}</h3>
	</div>
	<hr></hr>
	<div class="row">
	<!-- BEGIN FORM-->
	{{ form(routeform, "method":"post","id":"appform","role":"form","class":"form-horizontal") }}
	<div class="form-body">
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
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-1 align_label_left" style="padding-right:0;">
		{{item['label']|t}}
		{{item['required']}}
                </label>
		<div class="col-md-4">
		{{ form.render(item['name']) }}
		<!-- LOAD CONTROL ERROR LABEL-->
    {% if item['name']=='content'%}
     <label id="lblcontent" name ="lblcontent"></label>
    {% endif %}
		{{item['label_error']|t}}
		</div>
		</div>
	{% endfor %}

	</div>
	<!-- FORM ACTION BUTTONS-->
	<div class="col-md-offset-1 col-md-3" style="padding-left:0;">
       	<input type="submit" class="btn btn-primary" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn btn-default") }}
       </div>
    <textarea id ="articlecontent" name= "articlecontent" style="visibility: hidden; height: 0;"></textarea>
	</form>
	<!-- END FORM-->
	</div>
</div>
<!-- END PORTLET-->
</div>
</div>

{% endblock %}
