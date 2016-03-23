{% extends "layouts/masterpage_standard.volt" %}

{% block content %}
   <h3 class="page-title" align ="left">{{title|t}}</h3>
	<hr/>
  <!-- GRID SEARCH -->
	<div align="left" >
	{{ form(searchroute, "method":"post", "autocomplete" : "off") }}
	<div class="row">
	<div class="form-group col-md-10" style="padding-left:0;">
	{% for index,item in searchcolumns %}
	<div class="col-md-4 col-sm-4" style="padding-left:0;">
	<label>{{item['title']|t}}</label>
	{{ text_field(item['name'], "size" : item['size'],"class":"form-control","placeholder":"") }}
	</div>
	{% endfor %}
	</div>
	</div>
	<div class="row search_button">
	<div class="col-md-1" style="padding-left:0;">
	{{ submit_button("Buscar"|t,"class":"btn btn-primary") }}
	</div>
	
	</div>
	</form>
	</div>
  <!-- END GRID SEARCH-->

	{% if permissions['create']=='Y' %}
	 <!-- NEW ITEM ICON-->
	<div align="left">{{ link_to(newroute,'<i class="fa fa-plus fa-lg"></i>')}}</div>
  {% endif %}
	<br>
	{% if noitems ==""%}
	<table class="table table-bordered table-striped table-condensed flip-content">
	<thead>
	<tr>
	<!-- GRID HEADER-->
	{% for index,item in headercolumns %}
	<th style="background-color:#eee;">
	<span>{{item['title']|t}}</span>
	<div class="btn-group pull-right">
	<button aria-expanded="false" type="button" class="btn btn-fit-height gray dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
	{% if order =='asc' %}
		{% set order_class ='fa fa-arrow-up'%}
	{% else %}
		{% if order =='desc' %}
			{% set order_class ='fa fa-arrow-down'%}
		{% else %}
			{% set order_class ='fa fa-sort'%}
		{% endif %}
	{% endif %}
	<i class="{{order_class}}"></i>
	</button>
	<!-- GRID HEADER-->
	<ul class="dropdown-menu pull-right" role="menu">
	<li class="ms-hover">
	<a href="{{ '..'~ router.getRewriteUri() ~'?page='~page.current~'&order='~item['column_name']~' asc'}}">
	<i class="fa fa-arrow-up"></i>
	{{' Asc'}}
	</a>
	</li>
	<li class="divider">
	</li>
	<li class="ms-hover">
	<a href="{{ '..'~ router.getRewriteUri() ~'?page='~page.current~'&order='~item['column_name']~' desc'}}">
	<i class="fa fa-arrow-down"></i>
	{{' Desc'}}
	</a>
	</li>
	</ul>
	</div>
	</th>
	{% endfor %}
	<th></th>
	<th></th>
	</tr>
	</thead>
	<!-- END HEADER-->
	<!-- GRID BODY -->
		<tbody>
		{% if page.items is defined %}
		{% for entity in page.items %}
		<tr>
		{% for index,item in headercolumns %}
		{% if item['column_name'] =='flag' %} 
		<td width ="10%"><img src ="{{static_url('metronic/assets/global/img/flags/'~ entity.readAttribute(item['column_name']))}}"></img></td>
		{% else %}
		<td width ="20%">{{ entity.readAttribute(item['column_name'])}}</td>
		{% endif %}     
		{% endfor %}

		<td width ="2%">
		{% if permissions['edit']=='Y' %}
		{{link_to(editroute~entity.code,'<i class="fa fa-edit fa-lg"></i>','class':'btn btn-icon-only green')}}
		{% endif %}
		</td>

		<td width ="2%">
		{% if permissions['delete']=='Y' %}
		{{link_to(showroute~entity.code,'<i class="fa fa-remove fa-lg"></i>','class':'btn btn-icon-only red')}}
		{% endif %}
		</td>
		</tr>
		{% endfor %}
		{% endif %}
		</tbody>
	<!--END GRID BODY -->
		</table>
		<!--END GRID PAGINATION -->
		<div align="left">{{ 'Página'|t~' '~ page.current ~' '~'de'|t ~' '~page.total_pages }}</div>
		<div align ="left">
		<ul class="pagination">
		<li>{{ link_to(listroute,'<i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>') }}</li>
		<li>{{ link_to(listroute~"?page="~page.before, '<i class="fa fa-angle-left"></i>') }}</li>
		{% for i in 1..page.total_pages %}
		{% if page.current == i %}
		{% set classitem ='active' %}
		{% else %}
		{% set classitem ='' %}
		{% endif %}
		<li class="{{classitem}}">{{ link_to(listroute~"?page="~i, i) }}</li>
		{% endfor %}
		<li>{{ link_to(listroute~"?page="~page.next, '<i class="fa fa-angle-right"></i>') }}</li>
		<li>{{ link_to(listroute~"?page="~page.last, '<i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>') }}</li>
		</ul>
		</div>
    <!--END GRID PAGINATION -->
	{% else %}
	  <!--NO ITEMS VALIDATION -->
		<div class="alert alert-warning alert-dismissable">
		<strong><i class="glyphicon glyphicon-warning-sign"></i> {{noitems|t}}</strong>
		</div>
	{% endif %}
{% endblock %}