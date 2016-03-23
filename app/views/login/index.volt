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


<link href="{{ static_url('metronic/assets/admin/layout/css/googleapifonts.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{ static_url('metronic/assets/global/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/admin/pages/css/login3.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{ static_url('metronic/assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ static_url('metronic/assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
<span class="btn btn-lg black" style ="color:white;"><i class="fa fa-cutlery"></i> {{'RESTAURANT MAKER'}}</span>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
    {{ form('class': 'login-form',"id":"appform") }}
		<h4><i class="fa fa-lock fa-2x"></i> Administración</h4>
      {% set errorvar = content() %}
		{% if errorvar is not empty %}<div class="alert alert-danger">
      <button class="close" data-close="alert"></button>
      {{ content()}}
    </div>{% endif %}

		<div class="form-group">
      {{ form.label('username',['class':'control-label visible-ie8 visible-ie9']) }}
			<div class="input-icon">
				<i class="fa fa-user"></i>
          {{ form.render('username',['class':'form-control placeholder-no-fix','autocompete':'off', 'placeholder':'Usuario']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-lock"></i>
        {{ form.label('password',['class':'control-label visible-ie8 visible-ie9']) }}
        {{ form.render('password',['class':'form-control placeholder-no-fix','autocompete':'off', 'placeholder':'Password']) }}
			</div>
		</div>
		<div class="form-actions" style="padding-bottom:50px;padding-top:30px;">
			<button type="submit" class="btn green-haze pull-right" >
			Iniciar Sesión <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
</div>
<div class="copyright"> 2015 © Restaurant Maker </div>
 <script src="{{static_url('metronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>

<script src="{{static_url( 'metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{static_url('metronic/assets/global/plugins/select2/select2.min.js')}}"></script>

<script src="{{static_url('metronic/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{static_url('metronic/assets/admin/pages/scripts/login.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();
  Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
