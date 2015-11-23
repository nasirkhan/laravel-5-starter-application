<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title', config('settings.app_name'))</title>
        <meta name="description" content="@yield('title', config('settings.meta_description'))">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">


        <link rel="stylesheet" href="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}">


    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title', config('settings.app_name'))</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Help</a></li>
                        @if (Auth::guest())
                        <li>{!! link_to('auth/login', 'Login') !!}</li>
                        <li>{!! link_to('auth/register', 'Register') !!}</li>
                        @else
                        <li class="dropdown">                        
                            <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! link_to('dashboard', 'Dashboard') !!}</li>
                                <li>{!! link_to('auth/password/change', 'Change Password') !!}</li>
                                <li>{!! link_to('auth/logout', 'Logout') !!}</li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h2>Admin Dashboard</h2>                
            </div>
        </div>

        <div class="container">
            
            <!--content area-->
            @yield('content')

            <hr>

            <footer>
                <p>&copy; Company 2015</p>
            </footer>
        </div> <!-- /container -->        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>

        <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>

        @include('includes.google-analytics')
        
    </body>
</html>
