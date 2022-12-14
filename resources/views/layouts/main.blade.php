<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>URL's checker</title>
</head>
<body>
    <header>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link {{$_SERVER['REQUEST_URI'] == route('user.index') ? 'disabled' : ''}}" aria-current="page" href="{{route('user.index')}}">Проверка URL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </header>

    @yield('content')

    <footer>

    </footer>
</body>
</html>
