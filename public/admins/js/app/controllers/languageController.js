/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/10/15
 * Time: 10:22 AM
 * To change this template use File | Settings | File Templates.
 */
(function () {
    'use strict'
    toolApp.controller('languageController', ['$scope', 'languageFactory','languagesFactory', function ($scope, languageFactory,languagesFactory) {

        $scope.create = function (language) {
            languageFactory.create(language).$promise.then(function (returnData) {
                    console.log(returnData);
            });
        };
    }]);
//    toolApp.controller('languagesController', ['$scope', 'languagesFactory', function ($scope, languageFactory) {
//        $scope.get = function () {
//            languageFactory.get().$promise.then(function (returnData) {
//                console.log(returnData);
//            });
//        };
//    }]);


}());