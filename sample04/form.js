(function(){
var app = angular.module('formApp', []);
        
    app.controller('formCtrl', function(){
         var formList = this;

            formList.toggle = false;

            formList.list = [{
                fname: 'Tony', 
                lname: 'Lopez', 
                mname: 'Pagan', 
                email: 'tony@lopezpagan.com', 
                phone: '999-999-9999', 
                ccnumber: '9999',
                cctype: 'Visa',
                terms: '1',
                LANG: 'ES'
            }];
    
            formList.submit = function(form) {
                if(form.$valid) {
                    formList.addPerson();
                } 
            };

                formList.addPerson = function() {

                    //alert(formList.data.selectedOption.value);

                    formList.list.push({fname: formList.fname, lname: formList.lname, mname: formList.mname, email: formList.email, phone: formList.phone, ccnumber: formList.ccnumber, cctype: formList.data.selectedOption.value, terms: formList.terms, LANG: formList.LANG  });

                    /*formList.fname = '';
                    formList.lname = '';
                    formList.mname = '';
                    formList.email = '';
                    formList.phone = '';
                    formList.ccnumber = '';
                    formList.cctype = '';
                    formList.cctype = '';
                    formList.terms = '';*/

                };
    
            formList.data = {
                availableOptions: [
                  {value: '', text: 'Tarjeta de crédito'},
                  {value: 'Visa', text: 'Visa'},
                  {value: 'MasterCard', text: 'MasterCard'}
                ],
                selectedOption: {value: '', text: 'Tarjeta de crédito'} //This sets the default value of the select in the ui
            };           

              
    
       });
})();