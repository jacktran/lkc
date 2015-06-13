toolApp.factory('dataService', function ($http, $q) {
    var deferred = $q.defer();
    return{
        callBack:function (url) {
            $http({url:url}).success(function (data) {
                deferred.resolve(data);
            }).error(function (data) {
                    deferred.reject(data);
                });
            return deferred.promise;
        }
    }

});


toolApp.factory('toolsFactory', function ($resource) {
    return $resource('/admin/tools', {}, {
        query:{method:'GET', isArray:true},
        create:{method:'POST'}
    });
});

toolApp.factory('toolFactory', function ($resource) {
    return $resource('/admin/tools/:id', {}, {
        show:{method:'GET'},
        update:{method:'POST'},
        delete:{method:'POST'}
    })

});

toolApp.factory('pLanguageFactory',function($resource){
    return $resource('')

});
