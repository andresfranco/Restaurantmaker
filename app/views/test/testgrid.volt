{% extends "layouts/masterpage.volt" %}
{% block head %}
{{super()}}
{{assets.outputJs('angularjs')}}
{% endblock %}
{% block content %}
{{super()}}
<div align="left"><h4>{{'TEST GRID ANGULAR JS'}}</h4></div>
	<hr class="thin"/>


<div align="left" class="grid" ng-app="myapp" ng-controller="mycontroller">
  <br>{{"{{test}}"}}<br>

  <br>
  {{ form("method":"post", "autocomplete" : "off") }}
 <div class="row cells2">
	 <div class="cell colspan3">
	     <label class="search" for="city">Pais</label>
	  <div class="input-control full-size">
	      {{ text_field("pais", "size" : 30,"ng-model":"pais") }}
	  </div>
		<input type="submit" class="button" ng-click="getdata(pais)">
	</div>
</form>
</div>
<div>
<table class ="table">
	<thead>
	<th>ID</th>
	<th>PAIS</th>
</thead>
	<tbody>
	<tr ng-repeat="country in countries">
		<td>{{"{{country.id}}"}}<td>
		<td>{{"{{country.country}}"}}<td>
		</tr>
  </tbody>

</table>
</div>
</div>
<script>
var app = angular.module('myapp', []);

app.controller('mycontroller', function($scope,$http) {
//$scope.first ="Andres";
$scope.test="FUNCIONO ANGULAR";
$scope.getdata =function(pais)
{
  $http.post('getcountries/'+pais).then(function(response){
  $scope.countries = response.data;
  });
};

});s
</script>
{% endblock %}
