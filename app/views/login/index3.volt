<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
{% block head %}
{{assets.outputCss('logincss')}}
{{assets.outputJs('loginjs')}}
 {% endblock %}

</head>
<body class ="bg-darkTeal">
<div class="login-form padding20 block-shadow">

    {{ form('class': 'form-login',"id":"appform") }}
		<h3 class="text-light">{{image("img/locker.png") }} System Admin</h3>
				<hr class="thin"/>
				<br>
			  <div class="error">{{ content() }}</div>

				<br><br>
        <div class="input-control text full-size" data-role ="input">
			      {{ form.label('username') }}
            {{ form.render('username') }}
        </div>
        <label id="errorusername"></label>
				<br>
				<br>
				<br>
        <div class="input-control password full-size" data-role ="input">
            {{ form.label('password') }}
            {{ form.render('password') }}
						<br><br>
        </div>
					<label id="errorpassword"></label>
          <br><br>
            {{ form.render('Login') }}

		{{ form.render('randomsting', ['value': security.getSessionToken()]) }}

    </form>
</div>
</body>
</html>
