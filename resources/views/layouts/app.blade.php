<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styleMain.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <script type="text/javascript" src="{{ asset('js\jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\main.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('app.login')</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">@lang('app.register')</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->hasRole('Admin') ||Auth::user()->hasRole('Moderator'))
                                      <a class="dropdown-item" href="{{ route('admin.admin') }}"
                                         onclick="event.preventDefault(); document.getElementById('admin-form').submit();">
                                          @lang('app.admin_panel')
                                      </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('home.index') }}"
                                       onclick="event.preventDefault(); document.getElementById('home-form').submit();">
                                        @lang('app.home')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('achievement') }}"
                                       onclick="event.preventDefault(); document.getElementById('achievement-form').submit();">
                                        @lang('app.achievement')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('settings') }}"
                                       onclick="event.preventDefault(); document.getElementById('settings-form').submit();">
                                        @lang('app.settings')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang('app.logout')
                                    </a>

                                    @if(Auth::user()->hasRole('Admin') ||Auth::user()->hasRole('Moderator'))
                                      <form id="admin-form" action="{{ route('admin.admin') }}" method="GET" style="display: none;">
                                          @csrf
                                      </form>
                                    @endif

                                    <form id="home-form" action="{{ route('home.index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="achievement-form" action="{{ route('achievement') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="settings-form" action="{{ route('settings') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @lang('app.language')
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <ul style="list-style: none; padding-left: 0;">
                                  <li>
                                    <a class="dropdown-item" href="{{ route('locale', ['locale'=> 'ru']) }}"
                                      onclick="event.preventDefault(); document.getElementById('ru-form').submit();">
                                      @lang('app.russia')
                                      <img src="{{ asset('image/local/language_ru.png') }}" width="45px" style="float: right; margin-top: -12px;"/>
                                    </a>

                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="{{ route('locale', ['locale'=> 'eng']) }}"
                                      onclick="event.preventDefault(); document.getElementById('eng-form').submit();">
                                      @lang('app.english')
                                      <img src="{{ asset('image/local/language_eng.png') }}" width="45px" style="float: right; margin-top: -12px;"/>
                                    </a>
                                  </li>
                                </ul>
                                <form id="ru-form" action="{{ route('locale', ['locale'=> 'ru']) }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                                <form id="eng-form" action="{{ route('locale', ['locale'=> 'eng']) }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          @include('partials.success')
          @yield('content')
        </main>
    </div>
</body>
</html>
