angular.module('directoryApp', [])
       .controller('directoryCtrl', function($scope){
          $scope.list = [
            {name: 'Tony', age: 40},
            {name: 'Jose', age: 35},
            {name:'Chuito', age: 30}
          ];

          $scope.addPerson = function() {

              $scope.list.push({name: $scope.name, age: $scope.age});
              $scope.name = '';
              $scope.age = 0;
          };
       });
