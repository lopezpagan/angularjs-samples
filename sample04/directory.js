angular.module('directoryApp', [])
       .controller('directoryCtrl', function(){

         var dirList = this;

         dirList.toggle = false;

          dirList.list = [
            {name: 'Tony', age: 40},
            {name: 'Jose', age: 35},
            {name:'Chuito', age: 30}
          ];

          dirList.addPerson = function() {

              dirList.list.push({name: dirList.name, age: dirList.age});
              dirList.name = '';
              dirList.age = 0;
          };
       });
