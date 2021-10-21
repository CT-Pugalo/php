<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>custom auth</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
    <div class="navbar">
        <ul class="navbar-item">
            @guest
            <div class="login">
                <span><a href="{{ url("/login") }}">Login</a></span>
                /
                <span><a href="{{ url("/registration")}}">Register</a></span>
            </div>
            @endguest
            @auth
                <div class="login">
                    <span>{{ Auth::user()->name }}</span>
                    <span><a href="{{ route('signOut') }}">Deconnexion</a></span>
                </div>
            @endauth
            <li class="home"><a href="{{ url("/")}}">Home</a></li>
            <li class="menu">Menu</li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
