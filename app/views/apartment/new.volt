{% extends "layouts/masterpage.volt" %}
{% block head %}
{{super()}}
{{assets.outputJs('ajaxjs')}}
{% endblock %}

{% block content %}
<div class="well row">

	{{ content() }}
	{{password}}
    {{ form("apartment/create", "method":"post") }}

        <div class="span6 offset4">
			     {{ form.label('companyid') }}
            {{ form.render('companyid') }}
        </div>
        <div class="span6 offset4">
            {{ form.label('towerid') }}
            {{ form.render('towerid') }}
        </div>
        <div class="span6 offset4">
            {{ form.label('name') }}
            {{ form.render('name') }}
        </div>
        <div class="span6 offset4">
            {{ form.render('save') }}

		</div>
    </form>
</div>
{% endblock %}
