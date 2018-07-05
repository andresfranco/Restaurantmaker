<!-- BEGIN SIDEBAR MENU -->
<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->

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
<ul class="page-sidebar-menu page-sidebar-menu-closed" data-slide-speed="200" data-auto-scroll="true" data-keep-expanded="false">
   {% if address =='Y'%}
  <li class="{% for key,name in ['country','state','city','township','neighborhood','address'] %}
    {% if name  in router.getRewriteUri() %}
        active open
    {% else %}
    start
    {% endif%}
    {% endfor %}">
    <a href="" style="padding-left:20px;">
    <span class="arrow "></span>
    <p align="left"><b><i class="fa fa-home"></i>{{' '}}{{'Direcciones'|t}}</b></p>
    </a>
    <ul class="sub-menu">
      {% if countries =='Y'%}
        <li class="{% if 'country' in router.getRewriteUri() %}active{% endif %}">
          <a href="{{ url("country/list") }}" ><p align="left"><i class="icon-flag" >
          </i>{{' '}}{{'Paises'|t}}</p>
          </a>
        </li>
      {% endif %}
      {% if states =='Y'%}
        <li class="{% if 'state' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("state/list") }}" >
            <p align="left">
            <i class="icon-flag" >
            </i>{{' '}}{{'Estados'|t}}</p>
          </a>
        </li>
      {% endif %}
      {% if cities =='Y'%}
        <li class="{% if 'city' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("city/list") }}" >
            <p align="left">
              <i class="icon-flag" ></i>
              {{' '}}{{'Ciudades'|t}}</p>
          </a>
        </li>
      {% endif %}
      {% if townships =='Y'%}
        <li class="{% if 'township' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("township/list") }}" >
            <p align="left"><i class="icon-flag" ></i>
              {{' '}}{{'Sectores'|t}}</p>
            </a>
          </li>
        {% endif %}
        {% if neighborhoods =='Y'%}
        <li class="{% if 'neighborhood' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("neighborhood/list") }}" >
            <p align="left"><i class="icon-flag"></i>
               {{' '}}{{'Barrios'|t}}</p>
             </a>
           </li>
          {% endif %}
         {% if addresses =='Y'%}
        <li class="{% if 'address' in router.getRewriteUri()%}active{% endif %}">
        <a href="{{ url("address/list") }}">
          <p align="left"><i class="icon-flag"></i>
          {{' '}}{{'Direcciones'|t}}</p>
        </a>
        </li>
        {% endif %}
    </ul>
  </li>
  {% endif %}
   {% if security =='Y'%}
  <li class="{% for key,name in ['user','role','action'] %}
    {% if name  in router.getRewriteUri() %}
        active open
    {% else %}
    start
    {% endif%}
    {% endfor %}">
    <a href="" style="padding-left:20px;">
    <span class="arrow "></span>
    <p align="left"><b><i class="fa fa-lock"></i>{{' '}}{{'Seguridad'|t}}</b></p>
    </a>
    <ul class="sub-menu">
       {% if users =='Y'%}
       <li class="{% if 'user' in router.getRewriteUri() %}active{% endif %}">
         <a href="{{ url("user/list") }}" >
         <p align="left"><i class="icon-user" ></i>{{' '}}{{'Usuarios'|t}}</p>
         </a>
       </li>
       {% endif %}
       {% if roles =='Y'%}
        <li class="{% if 'role' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("role/list") }}" >
             <p align="left"><i class="icon-shield" ></i>{{' '}}{{'Roles'|t}}<p>
          </a>
        </li>
       {% endif %}
       {% if action =='Y'%}
        <li class="{% if 'action' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("action/list") }}" >
            <p align="left"><i class="icon-star" ></i>{{' '}}{{'Acciones'|t}}</p>
          </a>
        </li>
      {% endif %}
    </ul>
  </li>
  {% endif %}
  {% if translation =='Y'%}
 <li class="{% for key,name in ['language','/translation'] %}
   {% if name  in router.getRewriteUri() %}
       active open
   {% else %}
   start
   {% endif%}
   {% endfor %}">
   <a href="" style="padding-left:20px;">
   <span class="arrow "></span>
   <p align="left"><b><i class="fa fa-language"></i>{{' '}}{{'Traducciones'|t}}</b></p>
   </a>
   <ul class="sub-menu">
      {% if languages =='Y'%}
      <li class="{% if 'language' in router.getRewriteUri() %}active{% endif %}">
        <a href="{{ url("language/list") }}" >
        <p align="left"><i class="fa fa-flag" ></i>{{' '}}{{'Idiomas'|t}}</p>
        </a>
      </li>
      {% endif %}
      {% if translation =='Y'%}
       <li class="{% if 'translate' in router.getRewriteUri()%}active{% endif %}">
         <a href="{{ url("translation/list") }}" >
            <p align="left"><i class="fa fa-language" ></i>{{' '}}{{'Traducciones'|t}}<p>
         </a>
       </li>
      {% endif %}
   </ul>
 </li>
 {% endif %}
  {% if media =='Y'%}
 <li class="{% for key,name in ['media','set_files','files/','/gallery'] %}
   {% if name  in router.getRewriteUri() %}
       active open
   {% else %}
   start
   {% endif%}
   {% endfor %}">
   <a href="" style="padding-left:20px;">
   <span class="arrow "></span>
   <p align="left"><b><i class="fa fa-file-image-o"></i>{{' '}}{{'Manage Media'|t}}</b></p>
   </a>
   <ul class="sub-menu">
      {% if files =='Y'%}
      <li class="{% if 'set_files' in router.getRewriteUri() %}active{% endif %}">
        <a href="{{ url("file/set_files") }}" >
        <p align="left"><i class="fa fa-cloud-upload"></i>{{' '}} {{'Upload Files'|t}}</p>
        </a>
      </li>
      <li class="{% if ('files/' in router.getRewriteUri()) or ('file/list' in router.getRewriteUri())  %}active{% endif %}">
          <a href="{{ url("files/list") }}" >
              <p align="left"><i class="fa fa-file-archive-o  " ></i>{{' '}} {{'Manage Files'|t}}</p>
          </a>
      </li>
          <li class="{% if 'gallery' in router.getRewriteUri() %}active{% endif %}">
              <a href="{{ url("gallery/list") }}" >
                  <p align="left"><i class="fa fa-file-archive-o  " ></i>{{' '}} {{'Manage Galleries'|t}}</p>
              </a>
          </li>
      {% endif %}
   </ul>
 </li>
 {% endif %}
 {% if system_parameter =='Y'%}
<li class="{% for key,name in ['systemparameter','fileformat'] %}
  {% if name  in router.getRewriteUri() %}
      active open
  {% else %}
  start
  {% endif%}
  {% endfor %}">
  <a href="" style="padding-left:20px;">
  <span class="arrow "></span>
  <p align="left"><b><i class="fa fa-gear"></i>{{' '}}{{'Parámetros del Sistema'|t}}</b></p>
  </a>
  <ul class="sub-menu">
     {% if  system_parameter =='Y'%}
     <li class="{% if 'systemparameter' in router.getRewriteUri()%}active{% endif %}">
       <a href="{{ url("systemparameter/list") }}" >
         <p align="left"><i class="fa fa-gear" ></i>{{' '}}{{'Parámetros Generales'|t}}</p>
       </a>
     </li>
     <li class="{% if 'fileformat' in router.getRewriteUri()%}active{% endif %}">
       <a href="{{ url("fileformat/list") }}" >
         <p align="left"><i class="fa fa-file-text-o " ></i>{{' '}}{{'Formatos de Archivos'|t}}</p>
       </a>
     </li>
     {% endif %}
  </ul>
</li>
{% endif %}

    {% if articles =='Y'%}
        <li class="{% for key,name in ['/article','/article_translation','article_comment'] %}
  {% if name  in router.getRewriteUri() %}
      active open
  {% else %}
  start
  {% endif%}
  {% endfor %}">
  <a href="" style="padding-left:20px;">
      <span class="arrow "></span>
      <p align="left"><b><i class="fa fa-book"></i>{{' '}}{{'Artículos'|t}}</b></p>
  </a>
  <ul class="sub-menu">
      {% if  articles =='Y'%}
          <li class="{% if '/article' in router.getRewriteUri()%}active{% endif %}">
              <a href="{{ url("article/list") }}" >
                  <p align="left"><i class="fa fa-book" ></i>{{' '}}{{'Artículos'|t}}</p>
              </a>
          </li>
      {% endif %}
      {% if  article_comments =='Y'%}
          <li class="{% if '/article_comment' in router.getRewriteUri()%}active{% endif %}">
              <a href="{{ url("article_comment/list") }}" >
                  <p align="left"><i class="fa fa-comment-o " ></i>{{' '}}{{'Comentarios'|t}}</p>
              </a>
          </li>
      {% endif %}
  </ul>
  </li>
    {% endif %}
    {% if restaurant =='Y'%}
        <li class="{% for key,name in ['restaurant','menu','dish','dish_translation','dish_category'] %}
  {% if name  in router.getRewriteUri() %}
      active open
  {% else %}
  start
  {% endif%}
  {% endfor %}">
  <a href="" style="padding-left:20px;">
      <span class="arrow "></span>
      <p align="left"><b><i class="fa fa-cutlery"></i>{{' '}}{{'Restaurants'|t}}</b></p>
  </a>
  <ul class="sub-menu">
      <li class="{% if 'restaurant' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("restaurant/list") }}" >
              <p align="left"><i class="fa fa-cutlery" ></i>{{' '}}{{'Restaurants'|t}}</p>
          </a>
      </li>
      {% if  menu =='Y'%}
      <li class="{% if ('menu' in router.getRewriteUri()) or ('dish' in router.getRewriteUri())%}active{% endif %}">
          <a href="{{ url("menu/list") }}" >
              <p align="left"><i class="fa fa-list-alt" ></i>{{' '}}{{'Menu'|t}}</p>
          </a>
      </li>
      <li class="{% if 'dish_category' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("dish_category/list") }}" >
              <p align="left"><i class="fa fa-list-alt" ></i>{{' '}}{{'Category'|t}}</p>
          </a>
      </li>
      {% endif %}
  </ul>
  </li>
    {% endif %}

    {% if event =='Y'%}
        <li class="{% for key,name in ['event','eventgallery'] %}
  {% if name  in router.getRewriteUri() %}
      active open
  {% else %}
  start
  {% endif%}
  {% endfor %}">
  <a href="" style="padding-left:20px;">
      <span class="arrow "></span>
      <p align="left"><b><i class="fa fa-calendar"></i>{{' '}}{{'Events'|t}}</b></p>
  </a>
  <ul class="sub-menu">
      <li class="{% if 'event' in router.getRewriteUri()%}active{% endif %}">
          <a href="{{ url("event/list") }}" >
              <p align="left"><i class="fa fa-calendar" ></i>{{' '}}{{'Events'|t}}</p>
          </a>
      </li>
  </ul>
  </li>
    {% endif %}

</ul>


</ul>
<!-- END SIDEBAR MENU -->
</div>
