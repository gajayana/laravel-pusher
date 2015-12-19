/*jslint vars: true, plusplus: true, devel: true, nomen: true, maxerr: 50, regexp: true, browser: true, white: true */
/*global angular */

(function () {
    'use strict';
    
    var app = angular.module('todoApp', [], ['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }]);
    
    app.controller('todoController', ['$scope', '$http', function ($scope, $http) {
        $scope.todos = [];
        $scope.loading = false;
        
        $scope.init = function () {
            $scope.loading = true;
            $http.get('/api/todos')
                 .success(function (data) {
                     $scope.todos = data;
                     $scope.loading = false;
                 });
        };
        
        $scope.addTodo = function () {
            $scope.loading = true;
            // console.log($scope.todo);
            $http.post('/api/todos', {
                title : $scope.todo.title,
                done : $scope.todo.done
            }).success(function (data) {
                $scope.todos.push(data);
                $scope.loading = false;
                // console.log(data);
            }); 
        };
        
        $scope.updateTodo = function (todo) {
            $scope.loading = true;
            $http.put('/api/todos/' + todo.id, {
                title : todo.title,
                done : todo.done
            }).success(function (data) {
                todo = data;
                $scope.loading = false;
            });
        };
        
        $scope.deleteTodo = function (index) {
            $scope.loading = true;
            var todo = $scope.todos[index];
            
            $http.delete('/api/todos/' + todo.id).success(function () {
                $scope.todos.splice(index, 1);
                $scope.loading = false;
            });
        };
        
        $scope.init();
    }]);
}());

