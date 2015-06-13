/**
 * Created with JetBrains PhpStorm.
 * User: PhucTran
 * Date: 3/26/15
 * Time: 8:32 PM
 * To change this template use File | Settings | File Templates.
 */


    // initialize angular app
    var toolApp = angular.module('toolApp', ['ui.router', 'ngResource', 'ngCookies', 'ngActivityIndicator', 'LocalStorageModule']);

    // initialize constant variables
    toolApp.constant('PATH', {
        'templateFolder':'/admins/js/app/views/',
        'homeTemplateFolder':'/admins/js/app/views/homes/',
        'authTemplateFolder':'/admins/js/app/views/authenticates/'
    });

    toolApp.constant('APP', {
        'name':'LikeCharm',
        'version':'1'
    });

    // initialize values variables
    toolApp.value('currentUser', {
        'email':'',
        'password':''
    });


//    toolApp.factory('sessionInjector', function ($q) {
//        var sessionInjector = {
//            request:function (config) {
//
//                config.headers['x-session-token'] = 'abc';
//                return config;
//            }
//        };
//        return  sessionInjector;
//    });

    // ui-router otherwise configuration
    toolApp.config(function ($urlRouterProvider) {

        // if the path doesn't match any of the urls you configured
        // otherwise will take care of routing the user to the specified url
        $urlRouterProvider.otherwise('/home');


    });

    toolApp.config(function ($urlRouterProvider) {
        $urlRouterProvider.when('/', 'index');
    });

    //local storage configuration
    toolApp.config(['localStorageServiceProvider', 'APP', function (localStorageServiceProvider, APP) {
        localStorageServiceProvider.setPrefix(APP.name)
            .setStorageType('sessionStorage')
            .setNotify(true, true);
    }]);

    toolApp.config(['$httpProvider', '$stateProvider', '$locationProvider', 'PATH', function ($httpProvider, $stateProvider, $locationProvider, PATH) {
        //$httpProvider.interceptors.push('sessionInjector');
        $stateProvider
            .state('root', {
                url:'/',
                template:'<section ui-view></section>',
                data:{
                    requireLogin:true
                }
            })
            .state('login', {
                url:'/login',
                templateUrl:PATH.authTemplateFolder + 'auth.html',
                controller:'loginController',
                data:{
                    requireLogin:false
                }
            })
            .state('home', {
                url:'/home',
                templateUrl:PATH.homeTemplateFolder + 'home.html',
                controller:'',
                data:{
                    requireLogin:true
                }
            })
            .state('toolManagement', {
                abstract:true,
                templateUrl:PATH.homeTemplateFolder + 'home.html'
            })
            .state('toolManagement.list', {
                url:'/tool-management/list',
                templateUrl:PATH.templateFolder + 'tool_management_list.html',
                controller:'toolsController',
                data:{
                    requireLogin:true
                }
            })

            .state('toolManagement.add', {
                url:'/tool-management/add',
                templateUrl:PATH.templateFolder + 'tool_management_add.html',
                data:{
                    requireLogin:true
                }
            })
            .state('auth', {
                abstract:true,
                template:'<ui-view />'
            })

    }]);

    toolApp.run(['$rootScope', '$state', 'currentUser', 'localStorageService', function ($rootScope, $state, currentUser, localStorageService) {
        $rootScope.$on('$stateChangeStart', function (event, toState, toParams) {
            //localStorageService.cookie.clearAll();
            var requireLogin = toState.data.requireLogin;
            if (requireLogin) {
                if (currentUser.email == '' || currentUser.password == '') {
                    var loggedUser = localStorageService.cookie.get('currentUser');
                    console.log(loggedUser);
                    console.log(toState);
                    if (loggedUser == null) {
                        event.preventDefault();
                        return $state.transitionTo('login');
                    }
                    currentUser.email = loggedUser.email;
                    currentUser.password = loggedUser.password;
                }
            }
        });
        $rootScope.$on('$stateChangeSuccess', function (event, toState, toParams, fromState, fromParams) {
            localStorageService.set('previous_state', toState.name);
        });


    }]);



