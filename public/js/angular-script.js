// declare a module
var myAppModule = angular.module('myApp', ['ngRoute'], function($interpolateProvider) { // [] - list of modules myApp depends on e.g. 'ngRoute'
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

myAppModule.config(function($routeProvider) {
   $routeProvider
       .when('/', {
           templateUrl : '/templates/todo.html',
           controller  : 'TodoController'
       })
       .when('/1', {
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

myAppModule.controller('TodoController', ['$scope', '$http', function($scope, $http) {

    $scope.todos = [];
    $scope.todo = {};

    $scope.init = function() {
        $http.get('/api/todos').
            success(function(data, status, headers, config) {
                $scope.todos = data;
            });
    }

    $scope.addTodo = function() {
        $http.post('/api/todos', {
            title: $scope.todo.title,
            priority: $scope.todo.priority,
            done: '0'
        }).success(function(data, status, headers, config) {
            $scope.todos.push(data);
            $scope.todo = {}
        });
    };

    $scope.updateTodo = function(todo) {
        $http.put('/api/todos/' + todo.id, {
            title: todo.title,
            done: todo.done,
            priority: todo.priority
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.todoForEdit = null;
            $scope.todo = {};
        });
    };

    $scope.deleteTodo = function(todo) {
        $http.delete('/api/todos/' + todo.id)
            .success(function(data, status, headers, config) {
                $scope.todos = data;
            });
    };

    $scope.enableEditTodo = function(todo) {
        $scope.todoForEdit = todo;
        $scope.todo = todo;
    };

    $scope.init();
}]);

myAppModule.controller('DoubleController', ['$scope', function($scope) {
    $scope.double = function(value) { return value * 2; };
}]);

myAppModule.controller('EditController', ['$scope', function($scope) {
    $scope.double = function(value) { return value * 2; };
}]);

myAppModule.controller('SpicyController', ['$scope', function($scope) {
    $scope.customSpice = "wasabi";
    $scope.spice = 'very';

    $scope.spicy = function(spice) {
        $scope.spice = spice;
    };
}]);

myAppModule.filter('greet', function() {
    return function(name) {
        return 'Hello, ' + name + '!';
    };
});