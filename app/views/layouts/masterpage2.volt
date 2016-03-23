{{globalobj.checkuser(session.get('username'))}}
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
{% block head %}
{{assets.outputCss('mastercss')}}
{{assets.outputJs('masterjs')}}
 {% endblock %}
</head>
<body>
<div class="app-bar fixed-top darcula" data-role="appbar">
        {{link_to("index/home",'Restaurant Maker',"style":"font-weight:bold;","class":"app-bar-element branding")}}
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li>
                <a href="" class="dropdown-toggle">Nuevo</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">Nuevo Idioma</a></li>
                    <li><a href="">Nuevo Restaurante</a></li>
                    <li><a href="">Nuevo Menu</a></li>
                    <li><a href="">Nuevo Evento</a></li>
                </ul>
            </li>
            <li>  <a href="" class="dropdown-toggle">Seguridad</a>
                   <ul class="d-menu" data-role="dropdown">
                     <li>{{ link_to("user/list","Usuarios")}}</li>
                      <li><a href="">Roles</a></li>
                    </ul>

            <li>

        </ul>
         <a class="app-bar-element" href="{{ url('setlang')~'/en'}}">Ingles</a>
         <a class="app-bar-element" href="{{url('setlang')~'/es'}}">Español</a>
        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-user"></span> {{session.get('username')}}</span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">

                <ul class="unstyled-list fg-dark">
                    <li><a href="" class="fg-white1 fg-hover-yellow">Perfil</a></li>
                    <li>{{ link_to("login/logout","Salir","class":"fg-white3 fg-hover-yellow")}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-content" style="height:100%;padding-bottom:0;">
        <div class="flex-grid no-responsive-future"style="padding-bottom:0;">
            <div class="row auto-size" style="background-color: #71b1d1; padding-bottom:0;margin-bottom:0;">
                <div class="cell size-x200" id="cell-sidebar" style="background-color:#71b1d1;height:800px;">
                    <ul class="sidebar" id="sticky">

                        <li><a href="#">
                            <span class="mif-vpn-publ icon"></span>
                            <span class="title">Idiomas</span>

                        </a></li>
                        <li class="active"><a href="#">
                            <span class="mif-home icon"></span>
                            <span class="title">Restaurantes</span>

                        </a></li>
                        <li><a href="#">
                            <span class="mif-list icon"></span>
                            <span class="title">Menu</span>

                        </a></li>
                        <li><a href="#">
                            <span class="mif-star-full icon"></span>
                            <span class="title">Eventos</span>
                        </a></li>
                        <li><a href="#">
                            <span class="mif-file-image icon"></span>
                            <span class="title">Multimedia</span>
                        </a></li>

                    </ul>
                </div>
                <div class="cell auto-size bg-white" id="cell-content" style="padding-left:60px;padding-top:20px;padding-bottom:20px;padding-right:20px;" >
                  {% block content %}

                   {% endblock %}
                </div>
            </div>
        </div>
        <footer style="background-color:#0072c6;color:white;height:50px;padding-bottom:0px;margin:0;">
         <div  align="center" style="padding-top: 10px;">Restaurant Maker 2015</div>
      </footer>
    </div>
    <script type="text/javascript">
    $(document).ready(function()
    { // document ready
      if(screen.width <768)
      {
        $('#sticky').css({ position: 'fixed', top: 55 ,width:10});
        $('#cell-sidebar').css({ position: 'fixed', top: 55 ,width:20});
      }
		  if ($('#sticky').offset()) { // make sure ".sticky" element exists

		    var stickyTop = $('#sticky').offset().top; // returns number

		    $(window).scroll(function(){ // scroll event

		      var windowTop = $(window).scrollTop(); // returns number

		      if (stickyTop < windowTop){

            if(screen.width <768)
            {
              $('#sticky').css({ position: 'fixed', top: 55 ,width:20,left:0});
              $('#cell-sidebar').css({ position: 'fixed', top: 55 ,width:30});
            }
            else {
              $('#sticky').css({ position: 'fixed', top: 55 ,width:20});
                $('#cell-sidebar').css({ position: 'fixed', top: 55 ,width:30});
            }
		      }
		      else {

          if(screen.width <768)
          {
            $('#sticky').css({ position: 'static', top: 55 ,width:20,left:0});
            $('#cell-sidebar').css({ position: 'static', top: 55 ,width:30});
          }
          else {
            $('#sticky').css({ position: 'static' ,top: 55 ,width:20,left:0});
            $('#cell-sidebar').css({ position: 'static', top: 55 ,width:30});

          }
		      }

		    });

		  }

		});
	</script>
</body>
</html>
