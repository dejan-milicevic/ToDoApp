// declare a module
var myAppModule = angular.module('myApp', ['ngRoute'], function($interpolateProvider) { // [] - list of modules myApp depends on e.g. 'ngRoute'
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

myAppModule.config(function($routeProvider) {
   $routeProvider
       .when('/', {
           templateUrl : '/templates/1.html',
           controller  : ''
       })
       .when('/2', {
           templateUrl : '/templates/2.html',
           controller  : 'DoubleController'
       })
       .when('/3', {
           templateUrl : '/templates/3.html',
           controller  : 'SpicyController'
       })
       .when('/4', {
           templateUrl : '/templates/4.html',
           controller  : ''
       });
});

myAppModule.controller('DoubleController', ['$scope', function($scope) {
    $scope.double = function(value) { return value * 2; };
}]);

myAppModule.controller('SpicyController', ['$scope', function($scope) {
    $scope.customSpice = "wasabi";
    $scope.spice = 'very';

    $scope.spicy = function(spice) {
        $scope.spice = spice;
    };
}]);

// configure the module.
// in this example we will create a greeting filter
myAppModule.filter('greet', function() {
    return function(name) {
        return 'Hello, ' + name + '!';
    };
});