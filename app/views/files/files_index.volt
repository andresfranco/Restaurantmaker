{% extends "layouts/masterpage_standard.volt" %}
{% block pagetitle %}
<h3 class="page-title" align ="left">
	{{title_tags['main_title']|t}}
</h3>
<hr/>
{% endblock %}
{% block pagebar %}
{% endblock %}
{% block content %}
<div class="tiles">
<a href ="{{url('file/list/image')}}">
<div class="tile bg-green">
<div class="tile-body">
<i class="fa fa-file-photo-o"></i>
</div>
<div class="tile-object">
<div class="name"> {{title_tags['images_title']|t}} </div>
<div class="number"> </div>
</div>
</div>
</a>
<a href ="{{url('file/list/video')}}">
<div class="tile bg-green">
<div class="tile-body">
<i class="fa fa-file-video-o"></i>
</div>
<div class="tile-object">
<div class="name"> {{title_tags['videos_title']|t}} </div>
<div class="number"> </div>
</div>
</div>
</a>
<a href ="{{url('file/list/document')}}">
<div class="tile bg-green">
<div class="tile-body">
<i class="fa fa-file-excel-o"></i>
</div>
<div class="tile-object">
<div class="name"> {{title_tags['documents_title']|t}} </div>
<div class="number"> </div>
</div>
</div>
</a>
<a href ="{{url('file/list/other')}}">
<div class="tile bg-green">
<div class="tile-body">
<i class="fa fa-folder-o"></i>
</div>
<div class="tile-object">
<div class="name"> {{title_tags['others_title']|t}} </div>
<div class="number"> </div>
</div>
</div>
</a>
</div>

{% endblock %}
