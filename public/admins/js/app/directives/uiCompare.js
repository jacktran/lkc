
(function(){
    'use strict';
    toolApp.directive('equals',function(){
        return {
            require: '?ngModel',
            link:function(scope,elemnt,attrs,ngModel){
                if(!ngModel)
                    return;
                var validate = function(){
                    var firstValue = ngModel.$viewValue;
                    var secondValue = attrs.equals;
                    ngModel.$setValidity('equals',!firstValue || !secondValue || firstValue === secondValue);
                };

                scope.$watch(attrs.ngModel,function(){
                    validate();
                });
                attrs.$observe('equals',function(){
                    validate();
                });


            }
        }
    });


});
