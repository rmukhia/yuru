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
    @yield('meta')
    <link rel="shortcut icon" href="{{ url ('favicon.png') }}">

    <title>Yuru Retreat</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    {{-- Styles --}}
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    @yield('css')

    <style>
    body {
        background: url('{{ $backgroundImage }}');
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    </style>

</head>
<body id="app-layout">
{{-- Google Analytics --}}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83570601-1', 'auto');
  ga('send', 'pageview');

</script>

<header>
<div id="logo">
    <img id="logo-main" src="{{ url('logo.png') }}" alt="Yuru">
    <h4 id="logo-tagline">hospitality on high</h4>
</div>

<nav id="navbar-primary" class="navbar navbar-default" data-spy="affix" data-offset-top="118" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            {{-- Collapsed Hamburger --}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                @foreach ($allPages as $eachPage)
                @if ($eachPage->name == 'home')
                <li class="{{ Request::is('/') ? 'active' : null }}"><a href="{{ route('yuru.home') }}">Home</a></li>
                @elseif ($eachPage->name == 'contact')
                <li class="{{ Request::is($eachPage->name) ? 'active' : null }}"><a href="{{ route('yuru.contact') }}">{{ $eachPage->title }}</a></li>
                @else
                <li class="{{ Request::is('page/'. $eachPage->name) ? 'active' : null }}"><a href="{{ route('yuru.page' ,['page' => $eachPage->name]) }}">{{ $eachPage->title }}</a></li>
                @endif
                @endforeach
                @if (!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                        @foreach ($allPages as $eachPage)
                            <li><a href="{{ route('yuru.admin.page' ,['page' => $eachPage->name]) }}">Edit 
                            @if ($eachPage->name == 'home')
                                Home
                            @else
                                {{ $eachPage->title}}
                            @endif
                            </a></li>
                        @endforeach
                            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
</header>

<div class="container">
<div class="row cutout">
</div>
    @yield('content')
</div>

{{-- Footer --}}
<footer class="footer">
      <div class="container text-center">
        <p class="text-muted">© 2016 Yuru Retreat Delo Kalimpong </p>
        <p><a href="{{url('/login')}}">Admin Page</a></p>
      </div>
</footer>



{{-- JavaScripts --}}
<script src={{ elixir('js/app.js') }} type="text/javascript" async></script>

@yield('scripts')

</body>
</html>
