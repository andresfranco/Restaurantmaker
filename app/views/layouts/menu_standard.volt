{# MENU OPTIONS SECURITY#}
{% set security ='N' %}
{% set address ='N' %}
{% set users ='N' %}
{% set action ='N' %}
{% set roles ='N' %}
{% set translation ='N' %}
{% set languages ='N' %}
{% set countries ='N' %}
{% set states ='N' %}
{% set cities ='N' %}
{% set townships ='N' %}
{% set neighborhoods ='N' %}
{% set media ='N' %}
{% set files ='N' %}
{% set restaurant ='N' %}
{% set system_parameter ='N' %}
{% set articles ='N' %}
{% set article_comments ='N' %}
{% set restaurant ='N' %}
{% set menu ='N' %}
{% set event ='N' %}
{# END MENU OPTIONS SECURITY#}
{% for item in actions %}
{#Chek menu options#}
{% if item.action =='Manage Security' %}
 {% set security ='Y'%}
{% endif %}
{% if item.action =='Manage Addresses' %}
 {% set address ='Y' %}
{% endif %}
{% if item.action =='Manage Users' %}
 {% set users ='Y' %}
{% endif %}
{% if item.action =='Manage Actions' %}
 {% set action ='Y' %}
{% endif %}
{% if item.action =='Manage Roles' %}
 {% set roles ='Y' %}
{% endif %}
{% if item.action =='Manage System Parameter' %}
 {% set system_parameter ='Y' %}
{% endif %}
{% if item.action =='Manage Translations' %}
 {% set translation ='Y' %}
{% endif %}
{% if item.action =='Manage Languages' %}
 {% set languages ='Y' %}
{% endif %}
{% if item.action =='Manage Countries' %}
 {% set countries ='Y' %}
{% endif %}
{% if item.action =='Manage States' %}
 {% set states ='Y'%}
{% endif %}
{% if item.action =='Manage Cities' %}
 {% set cities ='Y' %}
{% endif %}
{% if item.action =='Manage Townships' %}
 {% set townships ='Y'%}
{% endif %}
{% if item.action =='Manage Neighborhoods' %}
 {% set neighborhoods ='Y'%}
{% endif %}
{% if item.action =='Manage Addresses' %}
 {% set addresses ='Y'%}
{% endif %}
{% if item.action =='Manage Media'%}
 {% set media ='Y'%}
{% endif %}
{% if item.action =='Manage Files' %}
 {% set files ='Y'%}
{% endif %}
{% if item.action =='Manage Articles' %}
    {% set articles ='Y'%}
{% endif %}
{% if item.action =='Manage Article Comment' %}
    {% set article_comments ='Y'%}
{% endif %}
{% if item.action =='Manage Restaurant'%}
    {% set restaurant ='Y'%}
{% endif %}
{% if item.action =='Manage Menu'%}
    {% set menu ='Y'%}
{% endif %}
{% if item.action =='Manage Event'%}
    {% set event ='Y'%}
{% endif %}
{% endfor %}
<div class="col-sm-12 col-md-2 col-xs-12 col-lg-2 accordion_menu">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      {% for key,name in ['country','state','city','township','neighborhood','address'] %}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">  
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-home"></span><b>{{' '}}{{'Direcciones'|t}}</b></h4>
      </div>
    </a>
      <div id="collapseOne" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          {% if countries =='Y'%}
          <a href="{{ url("country/list") }}">
          <li class="list-group-item {% if 'country' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-flag"></span>{{' '}}{{'Paises'|t}}
          </li>
          </a>
          {% endif %}
          {% if states =='Y'%}
          <a href="{{ url("state/list") }}">
          <li class="list-group-item {% if 'state' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-flag"></span>{{' '}}{{'Estados'|t}}
          </li>
          </a>
          {% endif %}
          {% if cities =='Y'%}
          <a href="{{ url("city/list") }}">
          <li class="list-group-item {% if 'city' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-flag"></span>{{' '}}{{'Ciudades'|t}}
          </li>
          </a>
          {% endif %}
          {% if townships =='Y'%}
          <a href="{{ url("township/list") }}">
          <li class="list-group-item {% if 'township' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-flag"></span>{{' '}}{{'Sectores'|t}}
          </li>
          </a>
          {% endif %}
          {% if neighborhoods =='Y'%}
          <a href="{{ url("neighborhood/list") }}">
          <li class="list-group-item {% if 'neighborhood' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-flag"></span>{{' '}}{{'Barrios'|t}}
          </li>
          </a>
          {% endif %}
          {% if addresses =='Y'%}
          <a href="{{ url("address/list") }}">
          <li class="list-group-item {% if 'address' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-flag"></span>{{' '}}{{'Direcciones'|t}}
          </li>
          </a>
          {% endif %}
        </ul>
      </div>
    </div>
     {% if security =='Y'%}
     <div class="panel panel-default">
      {% for key,name in ['user','role','action'] %}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">  
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-lock"></span><b>{{' '}}{{'Seguridad'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse2" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          {% if users =='Y'%}
          <a href="{{ url("user/list") }}">
          <li class="list-group-item {% if ('user' in router.getRewriteUri()) or ('/userrole' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-user"></span>{{' '}}{{'Usuarios'|t}}
          </li>
          </a>
          {% endif %}
          {% if roles =='Y'%}
          <a href="{{ url("role/list") }}">
          <li class="list-group-item {% if ('/role' in router.getRewriteUri()) or ('/actionrole/list' in router.getRewriteUri()) %}option_active{% endif %}">
            <span class="fa fa-user-plus"></span>{{' '}}{{'Roles'|t}}
          </li>
          </a>
          {% endif %}
          {% if action =='Y'%}
          <a href="{{ url("action/list") }}">
          <li class="list-group-item {% if '/action/list' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-check-circle-o"></span>{{' '}}{{'Acciones'|t}}
          </li>
          </a>
          {% endif %}
        </ul>
      </div>
    </div>
    {% endif %}

    {% if translation =='Y'%}
     <div class="panel panel-default">
      {% for key,name in ['language','/translation'] %}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">  
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-exchange"></span><b>{{' '}}{{'Traducciones'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse3" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          {% if languages =='Y'%}
          <a href="{{ url("language/list") }}">
          <li class="list-group-item {% if 'language' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-language"></span>{{' '}}{{'Idiomas'|t}}
          </li>
          </a>
          {% endif %}
          {% if translation =='Y'%}
          <a href="{{ url("translation/list") }}">
          <li class="list-group-item {% if 'translation' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-exchange"></span>{{' '}}{{'Traducciones'|t}}
          </li>
          </a>
          {% endif %}
        </ul>
      </div>
    </div>
    {% endif %}

    {% if media =='Y'%}
     <div class="panel panel-default">
      {% for key,name in ['media','file/set_files','files/','/gallery']%}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">  
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-file-image-o"></span><b>{{' '}}{{'Manage Media'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse4" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          {% if files =='Y'%}
          <a href="{{ url("file/set_files")}}">
          <li class="list-group-item {% if 'file/set_files' in router.getRewriteUri() %}option_active{% endif %}">
            <span class="fa fa-cloud-upload"></span>{{' '}} {{'Upload Files'|t}}
          </li>
          </a>
          <a href="{{ url("files/list") }}">
          <li class="list-group-item {% if ('files/' in router.getRewriteUri()) or ('file/list' in router.getRewriteUri())  %}option_active{% endif %}">
            <span class="fa fa-file-archive-o"></span>{{' '}} {{'Manage Files'|t}}
          </li>
          </a>
          <a href="{{ url("gallery/list") }}">
          <li class="list-group-item {% if ('gallery' in router.getRewriteUri()) or ('file/list' in router.getRewriteUri())  %}option_active{% endif %}">
            <span class="fa fa-picture-o"></span>{{' '}}{{'Manage Galleries'|t}}
          </li>
          </a>
          {% endif %}
        </ul>
      </div>
    </div>
    {% endif %}

    {% if system_parameter =='Y'%}
      <div class="panel panel-default">
      {% for key,name in ['systemparameter','fileformat']%}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"> 
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-gear"></span><b>{{' '}}{{'Parámetros del Sistema'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse5" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          {% if  system_parameter =='Y'%}
          <a href="{{ url("systemparameter/list") }}">
          <li class="list-group-item {% if ('systemparameter' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-gear"></span>{{' '}}{{'Parámetros Generales'|t}}
          </li>
          </a>
          <a href="{{ url("fileformat/list") }}">
          <li class="list-group-item {% if ('fileformat' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-picture-o"></span>{{' '}}{{'Formatos de Archivos'|t}}
          </li>
          </a>
          {% endif %}
        </ul> 
      </div>
    </div>
    {% endif %}
    
    {% if articles =='Y'%}
      <div class="panel panel-default">
      {% for key,name in ['/article','/article_translation','article_comment']%}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"> 
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-book"></span><b>{{' '}}{{'Artículos'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse6" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          {% if  articles =='Y'%}
          <a href="{{ url("article/list") }}">
          <li class="list-group-item {% if ('/article/' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-book"></span>{{' '}}{{'Artículos'|t}}
          </li>
          </a>
          {% endif %}
          {% if  article_comments =='Y'%}
          <a href="{{ url("article_comment/list") }}">
          <li class="list-group-item {% if ('/article_comment' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-comment-o"></span>{{' '}}{{'Comentarios'|t}}
          </li>
          </a>
          {% endif %}
        </ul> 
      </div>
    </div>
    {% endif %}

    {% if restaurant =='Y'%}
      <div class="panel panel-default">
      {% for key,name in ['restaurant','menu','dish','dish_translation','dish_category'] %}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"> 
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-cutlery"></span><b>{{' '}}{{'Restaurants'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse7" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
          <a href="{{ url("restaurant/list") }}">
          <li class="list-group-item {% if ('restaurant' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-cutlery"></span>{{' '}}{{' '}}{{'Restaurants'|t}}
          </li>
          </a>
          {% if  menu =='Y'%}
          <a href="{{ url("menu/list") }}">
          <li class="list-group-item {% if ('menu' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-list-alt"></span>{{' '}}{{' '}}{{'Menu'|t}}
          </li>
          </a>
          <a href="{{ url("dish_category/list") }}">
          <li class="list-group-item {% if ('dish_category' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-bookmark-o"></span>{{' '}}{{'Category'|t}}
          </li>
          </a>
          {% endif %}
        </ul> 
      </div>
    </div>
    {% endif %}

     {% if event =='Y'%}
      <div class="panel panel-default">
      {% for key,name in  ['event','eventgallery']%}
      {% if name  in router.getRewriteUri() %}
         {% set class_colapse ='collapse in'%}
         {% set active_class ='panel-heading main_option_active'%} 
         {% break %} 
      {% else %}
         {% set class_colapse ='collapse'%}
         {% set active_class ='panel-heading'%}
      {% endif %}
      {% endfor %}
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8"> 
      <div class="{{active_class}}">
      <h4 class="panel-title"><span class="fa fa-calendar"></span><b>{{' '}}{{'Events'|t}}</b></h4>
      </div>
    </a>
      <div id="collapse8" class="panel-collapse {{class_colapse}}">
        <ul class="list-group">
         
          <a href="{{ url("event/list") }}">
          <li class="list-group-item {% if ('event' in router.getRewriteUri())%}option_active{% endif %}">
            <span class="fa fa-calendar"></span>{{' '}}{{'Events'|t}}
          </li>
          </a>
        </ul> 
      </div>
    </div>
    {% endif %}

  </div>
</div>