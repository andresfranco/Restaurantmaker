{% extends "layouts/masterpage_standard.volt" %}
{% block head %}
{{super()}}
<link href="{{static_url('metronic/assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
{% endblock %}

{% block javascripts %}
{{super() }}
<script src="{{static_url('tools/bootstrap-summernote/summernote.min.js')}}"></script>
{{assets.outputJs('validate_forms_js')}}
{{assets.outputJs('validatejs')}}

<script>
var validatemessages = {
name:'{{"article_comment.name.required"|t}}',
email:'{{"article_comment.email.required"|t}}',
valid_email:'{{"article_comment.email"}}',
comment:'{{"article_comment.comment.required"|t}}'
};
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#summernote').summernote({
	height: "250px",
	width:"600px",
  onChange:function() {
  $('#comment_content').val($('#summernote').code());
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
	{{title|t}}
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
		{{ form.render(item['name']) }}
		<!-- LOAD CONTROL ERROR LABEL-->
    {% if item['name']=='comment'%}
     <label id="lblcomment" name ="lblcomment"></label>
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
  <input id ="savebutton" type="submit" class="btn blue-madison" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn grey-cascade") }}
	</div>
	</div>
	</div>
  <textarea id ="comment_content" name= "comment_content" style="visibility: hidden; height: 0;"></textarea>
	</form>
	<!-- END FORM-->
	</div>
</div>
<!-- END PORTLET-->
</div>
</div>

{% endblock %}
