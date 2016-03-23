<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Extra - 404 Page Option 2</title>
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
<link href="{{ static_url('metronic/assets/admin/pages/css/error.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('metronic/assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ static_url('metronic/assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ static_url('css/animate/animate.css')}}" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-404-full-page">
<div class="row">
	<div class="col-md-12 page-404">
            <h2><b>LA PÁGINA SOLICITADA NO SE ENCUENTRA</b></h2><p class="number animated zoomInDown"><b>404</b></p>
                <br><br>
		<div>
                    {{image('img/lostface.png',"id":"ogo","class":"animated flip")}}
		</div>
		
               <div class="details animated flip">
                   <h2><b>
				
				Por favor<a href="{{url('login')}}">
				Inicie Sesión </a> Nuevamente
                       </b>	
			</h2>
			
		</div> 
	</div>
</div>
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
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>