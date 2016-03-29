<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="@yield('title', config('settings.meta_description'))">
        <link rel="apple-touch-icon" href="{{asset('apple-touch-icon.png')}}">
        <meta name="author" content="Nasir Khan">
        <link rel="icon" href="{{asset('favicon.ico')}}">

        <title>@yield('title', config('settings.app_name'))</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

        <!-- Custom styles for this template -->
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

        </style>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="{{asset('js/ie8-responsive-file-warning.js')}}"></script><![endif]-->
        <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            @include('flash::message')
        </div>
        <div class="container">

            @include('includes.errors')

            <form method="POST" action="/auth/login" class="form-signin">
                <h2 class="form-signin-heading">Please sign in</h2>

                {!! csrf_field() !!}

                <label for="email" class="sr-only">Email address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required>

                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                <hr>

                <ul class="list-unstyled">
                    <li>
                        Do not have any account? <a href="/auth/register">Register here</a>.
                    </li>
                </ul>

                <hr>

                <ul class="list-unstyled">
                    <li>
                        <a href="/password/email">Click here</a> to Reset Password
                    </li>
                </ul>

                <hr>

                <ul class="list-inline">
                    <li>
                        <a class="btn btn-primary" href="{{ route('social.login', ['github']) }}">Github</a>
                    </li>
                    <li>
                        <a class="btn btn-primary" href="{{ route('social.login', ['facebook']) }}">Facebook</a>
                    </li>
                </ul>

            </form>

        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
    </body>
</html>
