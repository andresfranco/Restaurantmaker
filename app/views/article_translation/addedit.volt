{% extends "layouts/masterpage_standard.volt" %}
{% block head %}
 {{super()}}
	<link href="{{static_url('metronic/assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{static_url('metronic/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}"></script>
{% endblock %}
{% block javascripts %}
{{super() }}
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}
<script>
var validatemessages = {
	title:'{{"article_translation.title.required"|t}}',
	content:'{{"article_translation.content.required"|t}}'
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
<div class="portlet box blue">
	<div class="portlet-title">
	<div class="caption">
	{{title|t}}{{' - '}}{{article_name}}
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
	{{ content()|t}}
	</div>
	{% endif %}
		<!-- LOAD FORM CONTROLS-->
	{% for index,item in formcolumns %}
		<div class="form-group">
		<label name="{{item['name']}}" id ="item['name']" class="control-label col-md-3 formlabel">
		{{item['label']|t}}
		{{item['required']}}
                </label>
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control"]) }}
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
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-2 col-md-4">
		<input type="submit" class="btn blue-madison" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist~'/'~articleid,cancel_button_name|t,"class":"btn grey-cascade") }}
	</div>
	</div>
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
