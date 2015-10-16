angular.module('directoryApp', ['ionic']) 
       .controller('directoryCtrl', function($ionicLoading){
         var dirList = this;

            dirList.toggle = false;

            dirList.list = [
                {name: 'Tony', age: 40},
                {name: 'Jose', age: 35},
                {name:'Chuito', age: 30}
            ];

            dirList.addPerson = function() {
                  $ionicLoading.show({
                        content: '<i class="icon ion-loading-b"></i><br/>Loading Data...',
                        animation: 'fade-in',
                        showBackdrop: true,
                        /*maxWidth: 320,*/
                        showDelay: 100
                    });
                      dirList.list.push({name: dirList.name, age: dirList.age});
                      dirList.name = '';
                      dirList.age = 0;              
                  window.setTimeout(function(){
                     $ionicLoading.hide();
                  }, 500);
                
            };
    
            
            /* ionic Loading show */
            dirList.loader = $ionicLoading.show({
                    content: '<i class="icon ion-loading-b"></i><br/>Loading Data...',
                    animation: 'fade-in',
                    showBackdrop: true,
                    /*maxWidth: 320,*/
                    showDelay: 500
            });
            

            /* ionic Loading hide with Timeout */
            window.setTimeout(function(){
                    $ionicLoading.hide();
            }, 3000);
    
              
    
       });
