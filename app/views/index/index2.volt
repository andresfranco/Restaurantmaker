{% extends "layouts/masterpage_standard.volt" %}
{% block pagetitle %}
	<h3 class="page-title" align ="left">
	{{title}}
	</h3>
	<hr/>
{% endblock %}
{% block pagebar %}
{% endblock %}
{% block content %}
  <!-- GRID SEARCH -->
	<div align="left" >
	{{ form(searchroute, "method":"post", "autocomplete" : "off") }}
	<div class="row">
	<div class="form-group col-md-10" style="padding-left:0;">
	{% for index,item in searchcolumns %}
	<div class="col-md-5">
	<label>{{item['title']}}</label>
	{{ text_field(item['name'], "size" : item['size'],"class":"form-control","placeholder":"") }}
	</div>
	{% endfor %}
	</div>
	</div>
	<div class="row">
	<div class="form-group col-md-8">
	<div class="col-md-1" align ="left" style="padding-left:0;">
	{{ submit_button("Buscar","class":"btn blue") }}
	</div>
	</div>
	</div>
	</form>
	</div>
  <!-- END GRID SEARCH-->

	 <!-- NEW ITEM ICON-->
	<div align="left">{{ link_to(newroute,'<i class="fa fa-plus"></i>','class':'btn btn-icon-only blue')}}</div>

	<br>
	{% if noitems ==""%}
	<table class="table table-bordered table-striped table-condensed flip-content">
	<thead>
	<tr>
	<!-- GRID HEADER-->
	{% for index,item in headercolumns %}
	<th style="background-color:#eee;">
	<span>{{item['title']}}</span>
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
				<td width ="40%">{{ entity.readAttribute(item['column_name'])}}</td>
			{% endfor %}
			<td width ="2%">{{link_to(editroute~entity.id,'<i class="fa fa-edit"></i>','class':'btn btn-icon-only green')}}</td>
			<td width ="2%">{{link_to(showroute~entity.id,'<i class="fa fa-remove"></i>','class':'btn btn-icon-only red')}}</td>
			</tr>
		{% endfor %}
		{% endif %}
		</tbody>
	<!--END GRID BODY -->
		</table>
		<!--END GRID PAGINATION -->
		<div align="left">{{ 'Página '~ page.current ~" de "~page.total_pages }}</div>
		<div align ="left">
		<ul class="pagination">
		<li>{{ link_to(listroute,'<i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>Primero') }}</li>
		<li>{{ link_to(listroute~"?page="~page.before, '<i class="fa fa-angle-left"></i>Anterior') }}</li>
		{% for i in 1..page.total_pages %}
		{% if page.current == i %}
		{% set classitem ='active' %}
		{% else %}
		{% set classitem ='' %}
		{% endif %}
		<li class="{{classitem}}">{{ link_to(listroute~"?page="~i, i) }}</li>
		{% endfor %}
		<li>{{ link_to(listroute~"?page="~page.next, 'Siguiente <i class="fa fa-angle-right"></i>') }}</li>
		<li>{{ link_to(listroute~"?page="~page.last, 'Ultimo <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>') }}</li>
		</ul>
		</div>
    <!--END GRID PAGINATION -->
	{% else %}
	  <!--NO ITEMS VALIDATION -->
		<div class="alert alert-warning alert-dismissable">
		<strong><i class="glyphicon glyphicon-warning-sign"></i> {{noitems}}</strong>
		</div>
	{% endif %}
{% endblock %}
