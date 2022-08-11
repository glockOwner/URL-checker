<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>URL's checker</title>
</head>
<body>
    <header class="shadow-sm mb-5 d-flex">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link {{'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] == route('user.index') ? 'disabled' : ''}}" aria-current="page" href="{{route('user.index')}}">Проверка URL</a>
            </li>
        </ul>
        <ul class="nav justify-content-center" class="justify-end">
            @if(!auth()->user())
                <li class="nav-item">
                    <a class="nav-link {{'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] == route('register') ? 'disabled' : ''}}" aria-current="page" href="/register">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] == route('login') ? 'disabled' : ''}}" aria-current="page" href="/login">Авторизация</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endcan
        </ul>
    </header>

    @yield('content')

    <footer>

    </footer>
</body>
</html>
