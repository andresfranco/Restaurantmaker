{% extends "layouts/masterpage_standard.volt" %}
{% block head %}
{{super()}}
<link href="{{static_url('metronic/assets/global/plugins/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
<link href="{{static_url('metronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{static_url('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{static_url('metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{static_url('metronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
{% endblock %}

{% block javascripts %}
{{assets.outputJs('validatejs')}}
{{assets.outputJs('date_picker')}}
<script>
var validatemessages = {
name:'{{"event.name.required"|t}}'
,start_date:'{{"event.start_date.required"|t}}'
,finish_date:'{{"event.finish_date.required"|t}}'
};
</script>
<script>
	jQuery(document).ready(function() {       
	// initiate layout and plugins
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	ComponentsPickers.init();
	});   
</script>
{% if session.get('language')!= 'en' %} 
<script type="text/javascript" src="{{static_url('metronic/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'~session.get('language')~'.js')}}" charset="UTF-8"></script>
{% endif %}
<script >
$(document).ready(function(){
$('#datetimepicker').datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
  
});
$('#datetimepicker2').datetimepicker({
    format: 'yyyy-mm-dd hh:ii'  
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
     {% if item['name']=='start_date'  or  item['name']=='finish_date' %}
        <div class="col-md-4">
        <div id ="{% if item['name']=='start_date' %}datetimepicker{%else%}datetimepicker2{%endif%}" class="input-group date"  data-date="">	
		{{ form.render(item['name'],["class":"form-control" ,"readonly":""]) }}
		<!-- LOAD CONTROL ERROR LABEL-->
		<span class="input-group-btn">
	    <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
	    </span>
		</div>
		<label class ="label_error" id ="{% if item['name']=='start_date'%}start_date_error{% else %}finish_date_error{% endif %}"></label>
		</div>
		<br><br><br>
     {% else %}
		<div class="col-md-4">
		{{ form.render(item['name'],["class":"form-control"]) }}
		<!-- LOAD CONTROL ERROR LABEL-->
		{{item['label_error']|t}}
		</div>
     {% endif %}
     </div>
	{% endfor %}
	</div>
	<!-- FORM ACTION BUTTONS-->
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-2 col-md-4">
		<input type="submit" class="btn blue-madison" value="{{'Guardar'|t}}"></input>
		{{ link_to(routelist,cancel_button_name|t,"class":"btn grey-cascade") }}
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
