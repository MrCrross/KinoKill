<?

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

if(Auth::user()){
    $role = DB::table('users')->find(Auth::user()->id);
}
?>
@if(Auth::user())
    @if($role->role == 1)
        <?$auth=1;?>
    @elseif($role->role == 0)
        <?$auth=0;?>
    @endif
    @else
        <?$auth=0;?>
@endif
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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-laravel" style="background-image:url({{asset('storage/icon/menu_texture.jpg')}})">
            <div class="container" >
                @if($auth==0)
                <a class="navbar-brand" href="{{ url('/')  }}">
                    <img src="{{asset('storage/icon/Logo.png')}}" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('films.index') }}">{{ __('Фильмы') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('schedule.index') }}">{{ __('Расписание') }}</a>
                        </li>
                    </ul>
                @endif
                @if($auth==1)
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('storage/icon/Logo.png')}}" class="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('films.create') }}">{{ __('Добавить фильм') }} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('schedule.create') }}">{{ __('Добавить расписание') }}</a>
                            </li>
                        </ul>
                @endif
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest

                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown" style="border: 3px solid #ffffff; background-image: url('http://127.0.0.1:8000/storage/icon/content.jpg');">
                                        <a class="dropdown-item text-light " style="background-image: url('http://127.0.0.1:8000/storage/icon/content.jpg');" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Выйти') }}
                                        </a>

                                        <form id="logout-form" class="" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @if($auth==1)
                                <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('regAdmin') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
