<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,body {
        font-family: 'Open Sans', serif;
        background: #F2F6FA;
        }
        p {
            margin-bottom: 0;
        }
        .bottom-actions {
            margin-top: .5em;
        }
        .bottom-actions span {
            margin-right: .5em;
        }
        .box {
            color: #777;
        }
        footer {
        background-color: #F2F6FA !important;
        }
        .topNav {
        border-top: 5px solid #3498DB;
        }
        .topNav .container {
        border-bottom: 1px solid #E6EAEE;
        }
        .navbar-menu .navbar-item {
        padding: 0 2rem;
        }
        aside.menu {
        padding-top: 3rem;
        }
        aside.menu .menu-list {
        line-height: 1.5;
        }
        aside.menu .menu-label {
        padding-left: 10px;
        font-weight: 700;
        }
        .button.is-primary.is-alt {
        background: #00c6ff;
        background: -webkit-linear-gradient(to bottom, #0072ff, #00c6ff);
        background: linear-gradient(to bottom, #0072ff, #00c6ff);
        font-weight: 700;
        font-size: 14px;
        height: 3rem;
        line-height: 2.8;
        }
        .media-content p {
        font-size: 14px;
        line-height: 2.3;
        font-weight: 500;
        color: #777;
        }
        article.post {
        padding-bottom: 1rem;
        border-bottom: 1px solid #E6EAEE;
        }
        article.post:last-child {
        padding-bottom: 0;
        border-bottom: none;
        }
        .post__link {
            text-decoration: none;
        }
        .post__link:hover{
            text-decoration: none;
        }
        .menu-list li{
        padding: 5px;
        }
    </style>
</head>

<body style="padding-bottom: 100px; min-height: 100vh;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                                          Browse
                                                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (auth()->check())
                                    <a class="dropdown-item" href="/threads?by={{strtolower(auth()->user()->name)}}">My threads</a>
                                @endif
                                <a class="dropdown-item" href="/threads/">All Threads</a>
                            </div>
                        </li>
                        @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="/threads/create">New Thread</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                  Categories
                                </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                <a class="dropdown-item" href="/threads/{{$category->slug}}">{{$category->name}}</a>
                                <!-- end dropdown -->
                                @endforeach
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>