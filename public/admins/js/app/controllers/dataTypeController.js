/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/13/15
 * Time: 10:54 AM
 * To change this template use File | Settings | File Templates.
 */
(function(){
    toolApp.controller('dataTypeController',['$scope','languagesFactory',function($scope,languagesFactory){
        languagesFactory.get().$promise.then(function(returnData){
            if(returnData.status)
            {
                $scope.languages = returnData.data;
                console.log($scope.languages);
            }

        });

    }]);
}());