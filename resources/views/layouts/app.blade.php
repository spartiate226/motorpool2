<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/startmin/bootstrap.min1.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{asset('css/startmin/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/startmin/startmin.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('css/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header" >
            <a class="navbar-brand" style="color: white!important" href="index.html">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#" style="color: white!important"><i class="fa fa-home fa-fw"></i> Trip Monitor</a></li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            @guest
                {{--<li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>--}}
            @else
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color: white!important" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->firstname}} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </li>
            @endguest

        </ul>
        <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            @yield('sidebare')
    </div>
    <!-- /.sidebar-collapse -->
</div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header border-bottom-0"></h1>
                    @yield('content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('js/startmin/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('js/startmin/startmin.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
