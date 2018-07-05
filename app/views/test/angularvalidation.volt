<!DOCTYPE html>
<html lang="en-US">
{{assets.outputJs('angularjs')}}
<body>
  <div  ng-app="myApp" ng-controller="validateCtrl">
  <form  name="myForm" novalidate>
  <div>
    Name : <input type="text"  name="firstname" ng-model="first" required><br>
   <label id="nameerror" ng-show ="!myForm.firstname.$pristine && myForm.firstname.$error.required">{{"{{errornombre}}"}}</label>
  </div>
  <div>

    Lastname : <input type="text" id="lastname" name="lastname" ng-model="last" required><br>
     <label  id="lastnameerror"  ng-show ="!myForm.lastname.$pristine && myForm.lastname.$error.required" ng-model="lastnameerror">{{"{{errorapellido}}"}}</label>
  </div>
  <br>
  <input type="submit"
ng-disabled="!myForm.$valid">
</form>
</div>
<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
//$scope.first ="Andres";
$scope.errornombre="Nombre Requerido";

});
</script>
</body>
</html>
