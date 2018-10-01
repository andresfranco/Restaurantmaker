{% extends "layouts/masterpage_standard.volt" %}
{% block pagetitle %}

{% endblock %}
{% block content %}
<div class="row">
<h3 class="page-title" align ="left">
	{{'restaurants.title'|t}}
</h3>
<hr/>
{% for restaurant in restaurants %}
  <div class="col-sm-6 col-md-3 col-lg-3">
    <div class="card">
     <a href="{{"/front_end/"~restaurant.id}}">
       <div class="card-block well">
          <img id="main_image" src="{{url('files/images/'~restaurant.main_image)}}"width="300px" height="150px"/>
          <h5 class="text-bold"> <b>{{ restaurant.name }}</b></h5>
       </div>
      </a> 
   </div>
 </div>
{% endfor %}

</div>
{% endblock %}
