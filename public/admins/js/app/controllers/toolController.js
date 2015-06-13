/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 3/24/15
 * Time: 9:57 PM
 * To change this template use File | Settings | File Templates.
 */




toolApp.controller('toolsController', ['$activityIndicator','$scope','$location','$stateParams','dataService','toolsFactory',function ($activityIndicator,$scope,$location,$stateParams, dataService, toolsFactory) {
    $scope.create = function(tool){
        toolsFactory.create(tool).$promise.then(function(data){
                console.log(tool);
        })
    };
    $scope.getAll = function () {
        $scope.title = "Tool Management";
        $activityIndicator.startAnimating();
        toolsFactory.query().$promise.then(function (data) {
            $scope.data = data;
            $scope.options = {
                exceptColumns:["id", "update_at", "created_at", "updated_at", "toJSON"],
                advanceColumns:[
                    {
                        name:"#",
                        position:0,
                        expression:"{{$index + 1}}"
                    },
                    {
                        name:"<a ui-sref='toolManagement.add'><span class='icon'>&#61717;</span></a> ",
                        position:5,
                        expression:"<a href='#/tool-management/view/{{item.id}}'>  <span class='icon'>&#61698;</span></a> <a href='#/tool-management/eidt/{{item.id}}'><span class='icon'>&#61706; </span></a>"
                    }

                ],
                alias:{
                    name:"Name",
                    name_url:"Url Name",
                    features:"Features",
                    description:"Description"
                }
            };
            $activityIndicator.stopAnimating();
        });

    };
    if($location.path()  == "/tool-management/list")
    {
        $scope.getAll();
    }



}]);

toolApp.controller('toolController', function ($scope, toolFactory) {


});


toolApp.controller('pLanguageController', function ($scope) {

});

toolApp.controller('structureController', function ($scope, dataService) {

    return;
    var leftElement = {

    }
    var formElement = {
        type:"form"
    }


    var firstElement = {
        type:"div",
        class:"panel panel-default",
        element:{
            type:"textbox",
            class:"form-control",
            placeholder:"Enter email"
        }

    };

    firstElement.element2 = firstElement.element;
    var secondElement = jQuery.extend({}, firstElement);
    secondElement.class = "shit";
    formElement.element1 = firstElement
    formElement.element2 = secondElement;
    var elements = [];
    elements.push(formElement);
    console.log(elements);
    $scope.elements = elements;
});
