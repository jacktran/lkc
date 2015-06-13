/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/10/15
 * Time: 9:49 AM
 * To change this template use File | Settings | File Templates.
 */
(function () {
    'user strict',
        toolApp.factory('languageFactory', function ($resource) {
            return $resource('/admins/programming-language/create', {}, {
                create:{method:'POST'}
            });
        });
        toolApp.factory('languagesFactory',function($resource){
            return $resource('/admins/programming-language/get',{},{
                get:{method:'GET'}
            });
        });
}());