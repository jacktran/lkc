/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/1/15
 * Time: 5:58 PM
 * To change this template use File | Settings | File Templates.
 */
(function(){
    'use strict'
    toolApp.controller('loginController', ['$activityIndicator','$rootScope','$state','$scope','loginFactory','currentUser','localStorageService',function($activityIndicator,$rootScope,$state,$scope,loginFactory,currentUser,localStorageService){

//        if(typeof $cookieStore.get('currentUser') !== 'undefined')
//        {
//            var user = $cookieStore.get('currentUser');
//            currentUser.email = user.email;
//            currentUser.password  = user.password;
//            var previous_state = localStorageService.get('previous_state');
//            if(previous_state == 'login')
//                return $state.go('home');
//            return $state.go(previous_state);
//        }
        $scope.login = function(user){
            $activityIndicator.startAnimating();
            loginFactory.login(user).$promise.then(function(returnData){
                    if(returnData.status)
                    {
                        var data = returnData.data;
                        currentUser.email = data.email;
                        currentUser.password  = data.password;
                        localStorageService.cookie.set('currentUser',currentUser);
                        $state.go('home');
                    }
                    $activityIndicator.stopAnimating();

            });
        }
    }]);

    toolApp.controller('registerController',['$rootScope','$state','$scope','registerFactory',function ($rootScope,$state,$scope,registerFactory){
        $scope.create = function(user){
            registerFactory.create(user).$promise.then(function(returnData){


            });
        }
    }]);
}());
