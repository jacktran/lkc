<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"   ><![endif]-->
<html ng-app="toolApp">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="format-detection" content="telephone=no">
    <meta charset="UTF-8">

    <meta name="description" content="Violate Responsive Admin Template">
    <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

    <title>Super Admin Responsive Template</title>
    <!-- CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/bootstrap.min.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/animate.min.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/font-awesome.min.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/form.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/calendar.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/style.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/icons.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/generics.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/ngActivityIndicator.min.css')}}">
    <!-- END -->

    <!-- Angular Material CSS using RawGit to load directly from `bower-material/master` -->
    <link rel="stylesheet" href="https://rawgit.com/angular/bower-material/master/angular-material.css">


</head>
<body id="skin-blur-violate" ui-view>

<!-- Angular js -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="https://code.angularjs.org/1.3.15/angular-cookies.min.js"></script>
<script src="https://code.angularjs.org/1.3.15/angular-resource.min.js"></script>
<script src="http://angular-ui.github.io/ui-router/release/angular-ui-router.min.js"></script>

<!-- Javascript Libraries -->
<!-- jQuery -->
<script type="text/javascript" src="{{URL::asset('admins/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/jquery.easing.1.3.js')}}"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="{{URL::asset('admins/js/bootstrap.min.js')}}"></script>

<!-- Charts -->
<script type="text/javascript" src="{{URL::asset('admins/js/charts/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/charts/jquery.flot.time.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/charts/jquery.flot.animator.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/charts/jquery.flot.resize.min.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('admins/js/sparkline.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/easypiechart.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/charts.js')}}"></script>

<!-- Map -->
<script type="text/javascript" src="{{URL::asset('admins/js/maps/jvectormap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/maps/usa.js')}}"></script>

<!--  Form Related -->
<script type="text/javascript" src="{{URL::asset('admins/js/icheck.js')}}"></script>

<!-- UX -->
<script type="text/javascript" src="{{URL::asset('admins/js/scroll.min.js')}}"></script>

<!-- Other -->
<script type="text/javascript" src="{{URL::asset('admins/js/calendar.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/feeds.min.js')}}"></script>

<!-- All JS functions -->
<script type="text/javascript" src="{{URL::asset('admins/js/functions.js')}}"></script>


<!--<script src="https://code.angularjs.org/1.3.15/angular-route.min.js"></script>-->


<!-- preloader animation angularjs  -->
<script src="{{URL::asset('admins/js/app/libraries/ngActivityIndicator.min.js')}}"></script>

<!-- local storage angularjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-local-storage/0.2.2/angular-local-storage.js"></script>


<!--<script type="text/javascript" src="{{URL::asset('admins/js/app/services/pathHelper.js')}}"></script>-->
<script type="text/javascript" src="{{URL::asset('admins/js/app/app.js')}}"></script>

<!--  angularjs service -->
<script type="text/javascript" src="{{URL::asset('admins/js/app/services/requestHelper.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/services/authService.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/services/languageService.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('admins/js/app/directives/uiTree.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/directives/uiForm.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/directives/uiTable.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/directives/uiCompare.js')}}"></script>

<!--  angularjs controller -->
<script type="text/javascript" src="{{URL::asset('admins/js/app/controllers/toolController.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/controllers/authController.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/controllers/languageController.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admins/js/app/controllers/dataTypeController.js')}}"></script>


<!-- Angular Material Dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.js"></script>

<!-- Angular Material Javascript using RawGit to load directly from `bower-material/master` -->
<script src="https://rawgit.com/angular/bower-material/master/angular-material.js"></script>

</body>
</html>
