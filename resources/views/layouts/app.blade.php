<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} |@endif Budget Manager - Zarządzaj swoim budżetem</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            "csrfToken" => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url("/") }}">
                    Budget Manager
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::check())
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="{{ route("budget.index") }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @lang("general.budget") <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route("budget.index") }}">@lang("general.list")</a></li>
                                <li><a href="{{ route("budget.addform") }}">@lang("general.add")</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="{{ route("source.index") }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @lang("general.sources") <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route("source.index") }}">@lang("general.list")</a></li>
                                <li><a href="{{ route("source.addform") }}">@lang("general.add")</a></li>
                            </ul>
                        </li>

                        <!-- <li><a href="#">|</a></li>
                        <li><a href="">lang("general.statistics")</a></li> -->
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::guest())
                        <li><a href="{{ url("/login") }}">@lang("auth.login")</a></li>
                        <li><a href="{{ url("/register") }}">@lang("auth.register")</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url("/logout") }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        @lang("auth.logout")
                                    </a>

                                    <form id="logout-form" action="{{ url("/logout") }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(Session::has("message"))
        <div class="alert {{ Session::get("alert-class", "alert-info") }}">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get("message") }}
        </div>
    @endif

    @yield("content")

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
