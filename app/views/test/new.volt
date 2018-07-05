{% extends "layouts/masterpage.volt" %}
{% block head %}
{{super()}}

{{assets.outputJs('angularjs')}}

{% endblock %}
{% block content %}
{{super()}}
<div align="left" class="grid" ng-app="myapp" ng-controller="mycontroller">
<label>{{"{{test}}"}}<label>

{{ form("test/new", "method":"post","id":"appform") }}
<div class="row cells12">
<div class="cell colspan12">
  <h4 align="left">TEST DEPENDENT SELECTS</h4>
  <br><hr class="control-label col-sm-12">
</div>
</div>
<br><div class="error" align="left">{{ content() }}</div><br>
<div class="grid">
<div class="row cells1">
   <div class="cell colspan3">
      <div class="input-control select full-size">
        {{ form.label('countryid') }}
         {{ form.render('countryid',["ng-model":"countryid","ng-change":"getstates(countryid)"]) }}
      </div>
   </div>
</div>
<div class="row cells1">
   <div class="cell colspan3">
      <div class="input-control select full-size">
        {{ form.label('stateid') }}

        <select>
          <option >Seleccione un Estado</option>
          <option  ng-repeat="state in states" value="{{'{{state.id}}'}}">{{"{{state.state}}"}}</option>

        </select>
      </div>
   </div>
</div>
<br>
<div class="row cells2">
  <div class="cell colspan0">
   {{ form.render('Guardar') }}
 </div>
 <div class="cell colspan0">
   {{ link_to("city/list","Cancelar","class":"button") }}
</div>
</div>
</div>
</form>
</div>
<script>
var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope,$http) {
//$scope.first ="Andres";
$scope.test="FUNCIONO ANGULAR";
$scope.getstates =function(countryid)
{
$http.post('get_state/'+countryid).then(function(response){
  $scope.states = response.data;
  });
};

});
</script>
{% endblock %}
