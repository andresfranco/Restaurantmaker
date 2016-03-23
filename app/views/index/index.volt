{% extends "layouts/masterpage_standard.volt" %}
{% block pagetitle %}
<h3 class="page-title" align ="left">
	{{'MANTENIMIENTO DEL SISTEMA'}}
</h3>
<hr/>
{% endblock %}
{% block content %}
	<div class="tiles">
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> Idiomas </div>
	<div class="number"> </div>
	</div>
	</div>
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> Restaurantes </div>
	<div class="number"> </div>
	</div>
	</div>
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> Menú</div>
	<div class="number"> </div>
	</div>
	</div>
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> Eventos</div>
	<div class="number"> </div>
	</div>
	</div>
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> Multimedia</div>
	<div class="number"> </div>
	</div>
	</div>
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> Seguridad </div>
	<div class="number"> </div>
	</div>
	</div>
	<div class="tile bg-green">
	<div class="tile-body">
	<i class="fa fa-bar-chart-o"></i>
	</div>
	<div class="tile-object">
	<div class="name"> {{ link_to("address/menu",'Direcciones')}} </div>
	<div class="number"> </div>
	</div>
	</div>
	</div>
{% endblock %}
