{% extends "layouts/masterpage.volt" %}

{% block content %}
<div class="well row">

	{{ content() }}
    {{ form("tower/create", "method":"post") }}

        <div class="span6 offset4">
			     {{ form.label('companyid') }}
            {{ form.render('companyid') }}
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
