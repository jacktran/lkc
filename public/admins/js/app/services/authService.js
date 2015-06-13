/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/1/15
 * Time: 6:00 PM
 * To change this template use File | Settings | File Templates.
 */

(function(){
    'use strict';
    //factory to post register request
    toolApp.factory('registerFactory', ['$resource', function ($resource) {
        return $resource('admins/auth/register', {}, {
            create:{method:'POST'}
        });
    }]);

    //factory to post login request
    toolApp.factory('loginFactory',['$resource',function($resource){
          return $resource('admins/auth/login',{}, {
              login:{method:'POST'}
          })
    }]);
}());

