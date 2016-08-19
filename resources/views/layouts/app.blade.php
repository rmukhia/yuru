<!DOCTYPE html>
<html lang="en">

<!-- 
    author: Raunak Mukhia 
    email: raunak.mukhia@gmail.com 
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ url ('favicon.png') }}">

    <title>Yuru Retreat</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    {{-- Styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            {{-- Collapsed Hamburger --}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- Branding Image --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('logo.png') }}" class="img-responsive" alt="Image">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav">
                
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('/') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.home') }}">Home</a></li>
                <li class="{{ Request::is('page/rooms') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.page' ,['page' => 'rooms']) }}">Rooms</a></li>
                <li class="{{ Request::is('page/restaurant') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.page' ,['page' => 'restaurant']) }}">Restaurant</a></li>
                <li class="{{ Request::is('page/property') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.page' ,['page' => 'property']) }}">Property</a></li>
                <li class="{{ Request::is('page/service') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.page' ,['page' => 'service']) }}">Service</a></li>
                <li class="{{ Request::is('page/itinerary') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.page' ,['page' => 'itinerary']) }}">Itinerary</a></li>
                <li class="{{ Request::is('page/whattodo') ? 'active' : null }}"><a class="navbar_underlined" href="{{ route('yuru.page' ,['page' => 'whattodo']) }}">What To Do At Yuru</a></li>
                @if (!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'home']) }}">Edit Home</a></li>
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'rooms']) }}">Edit Rooms</a></li>
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'restaurant']) }}">Edit Restaurant</a></li>
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'property']) }}">Edit Property</a></li>
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'service']) }}">Edit Service</a></li>
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'itinerary']) }}">Edit Itinerary</a></li>
                            <li><a href="{{ route('yuru.admin.page' ,['page' => 'whattodo']) }}">Edit What To Do At Yuru</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>



<div class="container">
    <div class="row">
        <div class="col-md-8 content-margin-bottom">
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
            @yield('content')
        </div>
        <div class="col-md-4">
            @yield('sidebar')
        </div>
    </div>
</div>

<hr>

<footer class="footer">
      <div class="container">
        <p class="text-muted">© 2016 Yuru Retreat Delo Kalimpong </p>
        <p><a href="{{url('/login')}}">Admin Page</a></p>
      </div>
</footer>


{{-- Footer --}}
{{-- JavaScripts --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
@yield('scripts')

<script type="text/javascript">
$(window).load(function() {
    $("#loader-wrapper").hide();
    $('html').css('opacity','1');
});
</script>

</body>
</html>
