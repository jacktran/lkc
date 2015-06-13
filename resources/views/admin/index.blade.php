<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="toolApp">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Free Bootstrap Admin </title>
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- BOOTSTRAP STYLES-->
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/bootstrap.css')}}">

    <!--CUSTOM STYLES-->
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/style.css')}}">

    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/customize.css')}}">

    <!-- FONTAWESOME ICONS STYLES-->
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('admins/css/font-awesome.css')}}">


    <!-- JAVASCRIPT -->
    <script src="{{URL::asset('admins/js/jquery-1.11.1.js')}}"></script>

    <script src="{{URL::asset('admins/js/bootstrap.js')}}"></script>

    <script src="{{URL::asset('admins/js/custom.js')}}"></script>


    <script src="{{URL::asset('admins/js/jquery.metisMenu.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>

    <script src="https://code.angularjs.org/1.3.15/angular-route.min.js"></script>
    <script src="https://code.angularjs.org/1.3.15/angular-resource.min.js"></script>

    <script type="text/javascript" src="{{URL::asset('admins/js/app.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('admins/js/services/requestHelper.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('admins/js/directives/uiTree.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('admins/js/directives/uiForm.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('admins/js/directives/uiTable.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('admins/js/controllers/script.js')}}"></script>

</head>

<!DOCTYPE HTML>
<body lang="en">
    <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">DesignBootstrap

        </a>
    </div>

    <div class="notifications-wrapper">
        <ul class="nav">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>

                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">30% Complete</span>
                                </p>

                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                        <span class="sr-only">30% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>

                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">90% Complete</span>
                                </p>

                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                        <span class="sr-only">90% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See Tasks List + </strong>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-plus"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user-plus"></i> My Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="assets/img/user.jpg" class="img-circle"/>


                </div>

            </li>
            <li>
                <a href="#"> <strong> Romelia Alexendra </strong></a>
            </li>

            <li>
                <a class="active-menu" href="#/tool-management"><i class="fa fa-dashboard "></i>Tool</a>
            </li>
            <li>
                <a href="#/programing-language-management"><i class="fa fa-venus "></i>Programing Language</a>
            </li>

            <li>
                <a href="#/data-type-management.html"><i class="fa fa-bolt "></i>Data Type</a>

            </li>

            <li>
                <a href="#/data-type-key-management.html"><i class="fa fa-code "></i>Data Type Key</a>
            </li>
            <li>
                <a href="#/access-modifier-management.html"><i class="fa fa-code "></i>Access Modifier</a>
            </li>

            <li>
                <a href="#/collection-management.html"><i class="fa fa-code "></i>Collection</a>
            </li>


            <li>
                <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-cogs "></i>Second Link</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bullhorn "></i>Second Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Link</a>
                            </li>
                            <li>
                                <a href="#">Third Link</a>
                            </li>

                        </ul>

                    </li>
                </ul>
            </li>
            <li>
                <a href="blank.html"><i class="fa fa-dashcube "></i>Blank Page</a>

            </li>


        </ul>

        <script type="text/ng-template" id="tpl.html">
            <div>
                <p>Just test template</p>
            </div>
        </script>
        <script type=text/ng-template id="home.html">
            <!-- Home -->
            <ul>
                <li><a href="#/list">Show Items</a></li>
                <li><a href="#/settings">Settings</a></li>
            </ul>
        </script>
    </div>

</nav>
<!-- /. SIDEBAR MENU (navbar-side) -->
<div id="page-wrapper" class="page-wrapper-cls">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">

                <div ng-view></div>

                <div ng-controller="toolsController">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<footer>
    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
</footer>
<!-- /. FOOTER  -->


</body>
</html>
