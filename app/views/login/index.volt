{%set languages = globalobj.get_languages() %}
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js') }}"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js') }}"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Restaurant Maker Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<link rel="stylesheet" type="text/css" href="{{static_url('/tools/bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{static_url('/tools/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{static_url('/stylesheets/login/login.css')}}">
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->

  <div class="panel panel-primary login-panel">
  <div class="panel-heading">
    <div class="row">
       <div class="col-md-7 col-xs-6 col-sm-7" style="padding-top:10px;">
        <h3 class="panel-title"><i class="fa fa-lock"></i> {{'Administración'|t}}</h3></div>
      <div class="col-md-5 col-xs-6 col-sm-5">
      <ul class="dropdown" style="padding-top:10px;">
      <li style ="list-style:none;">
        {#Default language spanish#}
           {% set flag ='es.png' %}
           {% set languagename ='Spanish' %}
           {% for item in languages %}
             {% if session.get('language')== item.code %}
                 {% set flag = item.flag %}
                 {% set languagename = item.language %}
             {% endif %}
          {% endfor %}
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"> <img src="{{static_url('img/flags/'~flag)}}" alt="">{{' '}}{{languagename|t}}<span class="caret"></span></a>
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
    </div>
    </div>  
     
  </div>
	<div class="panel-body">
	{% set errorvar = content() %}
	{% if errorvar is not empty %}<div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	{{ content()}}
	</div>{% endif %}

     {{ form("id":"appform") }}
		<div class="form-group">
	    {{ form.label('username',['class':'control-label visible-ie8 visible-ie9']) }}
		<div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
       {{ form.render('username',['class':'form-control placeholder-no-fix','autocompete':'off']) }}
        </div>
        <label id="errorusername"><label>	
		</div>
		<div class="form-group">
        {{ form.label('password',['class':'control-label visible-ie8 visible-ie9']) }}
		<div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
        {{ form.render('password',['class':'form-control placeholder-no-fix','autocompete':'off']) }}
        </div>
        <label id="errorpassword"><label>	
        </div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary" >
			{{'Iniciar Sesión'|t}} <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
  </div>
</div>
</div>
<footer class="footer">
     <p align="center" style="padding-top:25px;">{{'2016 &copy; Restaurant Maker'}}</p>   
</footer>
<script>
var validatemessages = {user:'{{"user.required"|t}}',key:'{{"password.required"|t}}'};
</script>
<script src="{{static_url('tools/jquery/jquery2.2.0/jquery.min.js')}}"></script>
<script src="{{static_url('tools/bootstrap/js/bootstrap.min.js')}}"></script> 
<script src="{{static_url( 'metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{static_url('js/login/validatelogin.js')}}"></script>  
<script type="text/javascript" src="{{static_url('metronic/assets/global/plugins/select2/select2.min.js')}}"></script>

</body>
<!-- END BODY -->
</html>
