<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
    <script src="{{ asset('js/scripts.js') }}" defer></script> 
</head>
<body>

    <nav>
        <ul>
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('home') }}">Home</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>