
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechBlog | You are Awesome</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
</head>
<body>
{{--<header>--}}
    {{--<nav class="navbar navbar-default navbar-fixed-top">--}}
        {{--<div class="container">--}}
            {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
            {{--<div class="navbar-header">--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">--}}
                    {{--<span class="sr-only">Toggle navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                {{--<a class="navbar-brand" href="{{route('post.index')}}">TechBlog</a>--}}
            {{--</div>--}}

            {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
            {{--<div class="collapse navbar-collapse" id="the-navbar-collapse">--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li class="active"><a href="#">Blog</a></li>--}}
                    {{--<li><a href="#">About</a></li>--}}
                    {{--<li><a href="#">Contact</a></li>--}}
                {{--</ul>--}}
            {{--</div><!-- /.navbar-collapse -->--}}
        {{--</div><!-- /.container -->--}}
    {{--</nav>--}}
{{--</header>--}}

<header class="main-header ">
    <nav class="navbar-fixed-top navbar-default">


    <div class="container">
        <!-- Logo -->
        <a href="{{route('post.index')}}" class="logo pull-left no-margin no-padding" >
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>T</b>B</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg pull-left no-margin" style="color: gray"><b>TECH</b>BLOG</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="{{route('about')}}" class="" data-toggle="">
                            <span class="hidden-xs" style="color: gray; font-weight: bold; {{Route::current()->getName() == "about" ? "color: black" : "" }}">ABOUT</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="{{route('contact')}}" class="" data-toggle="">
                            <span class="hidden-xs" style="color: gray; font-weight: bold; {{Route::current()->getName() == "contact" ? "color: black" : "" }}">CONTACT</span>
                        </a>
                    </li>
                </ul>
                @if(\Illuminate\Support\Facades\Auth::user() !=null)
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('img/user'.rand(1,8).'-128x128.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('img/user'.rand(1,8).'-128x128.jpg')}}" class="img-circle" alt="User Image">

                                <p style="color: gray;">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}} - {{\Illuminate\Support\Facades\Auth::user()->role->name}}
                                    <small>{{\Illuminate\Support\Facades\Auth::user()->created_at->diffForHumans()}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('admin.post.index')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <form action="{{route('logout')}}" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                @else
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="{{route('login')}}" class="" data-toggle="">
                                <span class="hidden-xs" style="color: gray; font-weight: bold">LOGIN</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="{{route('register')}}" class="" data-toggle="">
                                <span class="hidden-xs" style="color: gray; font-weight: bold">REGISTER</span>
                            </a>
                        </li>
                    </ul>
                @endif

            </div>
        </nav>
    </div>
    </nav>
</header>

@include('layouts.message')
@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="copyright">&copy; 2019 T1804E</p>
            </div>
            <div class="col-md-4">
                <nav>
                    <ul class="social-icons">
                        <li><a href="#" class="i fa fa-facebook"></a></li>
                        <li><a href="#" class="i fa fa-twitter"></a></li>
                        <li><a href="#" class="i fa fa-google-plus"></a></li>
                        <li><a href="#" class="i fa fa-github"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery 2.2.3 -->
<script src={{ asset('js/jquery-2.2.3.min.js') }}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{ asset('js/bootstrap.min.js') }}></script>
<script src={{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}  ></script>
<script src={{asset('plugins/simple-mde/simplemde.min.js')}} ></script>

<!-- AdminLTE App -->
<script src={{ asset('js/app.min.js')}} ></script>
<script src={{ asset('js/custom.js') }}></script>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function(){
            $('.alert').fadeOut(500);
        }, 3000);
    });
</script>
</body>
</html>


