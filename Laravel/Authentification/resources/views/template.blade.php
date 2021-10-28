<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titre')</title>
    <link rel="stylesheet" href="{{ asset('css\app.css') }}">
</head>
<body class="text-center bg-white">
    <div class="text-xl font-medium text-black ">
        <nav class="bg-purple-300 h-15">
            <ul class="grid justify-center grid-cols-4 align-middle">
                <li class="col-start-1 col-end-2 mt-auto mb-auto h-15"><a href="#">Menu</a></li>
                <li class="col-start-2 col-end-3 mt-auto mb-auto h-15"><a href="#">Home</a></li>
                <li class="col-start-3 col-end-4 mt-auto mb-auto h-15"><a href="#">Contact</a></li>
                <li class="flex col-start-4 col-end-5 mt-auto mb-auto h-15 justify-items-center">
                    @guest
                    <img class="ml-auto mr-auto" src="{{ asset('storage/image/blankProfile.svg') }}" height="auto" width="20%" alt="imageProfile">
                    <span class="mt-auto mb-auto"><a href="{{ route('auth.login') }}">login</a>/<a href="{{ route('auth.register') }}">register</a> </span>
                    @endguest
                    @auth
                        <img src="{{ asset('storage/image/blankProfile.svg')}}" height="auto" width="20%" alt="imageProfile">
                        <a href="{{ route('auth.logout') }}">logout</a>
                    @endauth
                </li>
                </ul>
        </nav>
    </div>

    @yield('content')
</body>
</html>
