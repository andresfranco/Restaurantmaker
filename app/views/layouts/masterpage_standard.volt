{{globalobj.checkuser(session.get('userid'))}}
{%set actions = globalobj.get_user_actions(session.get('userid')) %}
{%set languages = globalobj. get_languages() %}
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
{% block head %}
<head>
  <!-- Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="{{static_url('/tools/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{static_url('/tools/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{static_url('/stylesheets/masterpage_standard/layout.css')}}">
  <!-- End Stylesheets --> 
</head>
 {% endblock %}
<body>
 <!-- Main Row Container --> 
<div class="row">
  <!-- Header Nav bar--> 
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('index/home')}}">
      <i class="fa fa-cutlery"></i>{{' '}}{{'RESTAURANT MAKER'|t}}
      </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        {#Default language spanish#}
           {% set flag ='es.png' %}
           {% set languagename ='Spanish' %}
           {% for item in languages %}
             {% if session.get('language')== item.code %}
                 {% set flag = item.flag %}
                 {% set languagename = item.language %}
             {% endif %}
          {% endfor %}
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="{{static_url('img/flags/'~flag)}}" alt="">{{' '}}{{languagename|t}}<span class="caret"></span></a>
      <ul class="dropdown-menu">
        {% for item in languages %}
        <li>
        <a href="{{ url('setlang')~'/'~item.code}}">
        <img src="{{static_url('img/flags/'~item.flag)}}" alt="">{{' '}}{{item.language|t}} </a>
        </li>
        {% endfor %}
      </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="{{static_url('img/avatar.png')}}" width="16px" height="16px">{{' '}}{{session.get('username')}}<span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li> <a href="{{url('login/logout')}}"><i class="fa fa-sign-out"></i>{{' '}}{{'logout.text'|t}}</a></li>
      </ul>
      </li>
      </ul>
      </div>
    </div>
  </nav>
<!--End Header Nav bar--> 

  <!-- Content menu and main content -->
  <div class="row"> 
    <!-- Accordion Menu -->
    {% block sidebar_menu %}
      {% include "layouts/menu_standard.volt" %}
    {% endblock %} 
    {% block pagetitle %}
    {% endblock %}
    <!-- End Accordion Menu --> 
  <!-- Main Content--> 
  <div class="col-sm-12 col-md-10 col-xs-12 col-lg-10 column_content">
  <div class="main_content">
  {% block content %}

  <!--CONTENT-->

  {% endblock %}
  </div>
  </div>
  <!-- End Main Content-->   
  </div>
   <!-- End Content menu and main content -->
</div>
 <!-- End Main Row Container -->
 <!-- Footet-->  
<footer class="footer">
     <p align="center" style="padding-top:25px;">{{'2016 &copy; Restaurant Maker'}}</p>   
</footer>
<!-- End footer--> 

<!-- javaScripts --> 
  {% block javascripts %}
  <script src="{{static_url('tools/jquery/jquery2.2.0/jquery.min.js')}}"></script>
  <script src="{{static_url('tools/bootstrap/js/bootstrap.min.js')}}"></script> 
  {% endblock %}
  <!-- End JavaScripts --> 
</body>
</html>