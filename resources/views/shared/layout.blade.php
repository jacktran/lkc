<!DOCTYPE html>
<html>
<head>
    <title>Free Online Tool Formatter And Conversion - LikeCharm.com</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <meta name="robots" content="all"/>
    <meta name="rating" content="general"/>
    <meta name="title" content="Free Online Tool Formatter And Conversion - LikeCharm.com"/>
    <meta name="description" content="Multiple formatter and conversion tools help programming developer reduce their mount of work"/>
    <meta name="keywords" content="HTML,JSON,JSON,CSS,Jquery,Javascript,Converter,Formatter,Free Tool,C#,Framweork,XMK,MVC">

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57342270-1', 'auto');
  ga('send', 'pageview');

</script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/customize.css')}}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css">
    @yield('styles')

</head>
<body>
<nav class="navbar navbar-default" role="navigation" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="header">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
               <div id="square">
                LIKECHARM.COM
               </div>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="active" href="{{Asset('/')}}" data-action="home" title="Back to homepage">Home</a></li>
                <li><a href="{{Asset('/articles')}}" data-action="articles" title="List all current articles of LikeCharm.com">Articles</a></li>
                <li><a href="{{Asset('/tools')}}" data-action="tools" title="List all current tools of LikeCharm.com">Tools</a></li>
                <li><a href="#" data-action="contact">Contact</a></li>
                <li><a href="#" data-action="donate">Donate</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- /#ccr-header -->

<section id="ccr-main-section">
    <div class="container">
        <aside id="ccr-right-section" class="col-md-3 ccr-home">
            <section id="sidebar-popular-post">
                    <div class="search">
                        <form method="GET" action="" accept-charset="UTF-8" >
                            <input class="txtsearch" placeholder="search"  name="query" type="text" value="">
                        </form>
                    </div>
                <!-- .ccr-gallery-ttile -->

                @include('partials.left_menu')
            </section>
            <!-- /#sidebar-popular-post -->


<!--            <section id="ccr-sidebar-add-place">-->
<!--                <div class="sidebar-add-place">-->
<!--                    370x250 px-->
<!--                </div>-->
<!--            </section>-->
            <!-- /#ccr-sidebar-add-place -->

            <!-- /#ccr-sidebar-newslater -->
            <!-- /#ccr-find-on-fb -->


        </aside>
        <!-- / .col-md-4  / #ccr-right-section -->
        <section id="ccr-left-section" class="col-md-9">
            @yield('body')
        </section>

    </div>
</section>


<footer id="ccr-footer">
    <div class="container">
        <div class="copyright">
            &copy; 2015, Copyrights <a href="http://likecharm.com">Likecharm</a>. All Rights Reserved
        </div>
        <!-- /.copyright -->

        <div class="footer-social-icons">
            <ul>
                <li>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </li>
            </ul>

        </div>
        <!--  /.cocial-icons -->

    </div>
    <!-- /.container -->
</footer>
<!-- /#ccr-footer -->
<script type="text/javascript" src="{{URL::asset('js/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/customize.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/run_prettify.js')}}"></script>
<script>
    $(document).ready(function() {


        var el = {
            btnAction: $('#action'),
            input: $('#input'),
            result: $('#result')

        };

        el.btnAction.on('click', function(){
            var json = el.input.val();

            var data;
            try{ data = JSON.parse(json); }
            catch(e){

                var message_element = $(".alert.alert-danger");
                message_element.text("not valid JSON");
                message_element.show();
                return;
            }


            var node = new PrettyJSON.view.Node({
                el:el.result,
                data: data,
                dateFormat:"DD/MM/YYYY - HH24:MI:SS"
            });
            node.expandAll();
        });
    });
</script>
@yield('scripts')
</body>
</html>