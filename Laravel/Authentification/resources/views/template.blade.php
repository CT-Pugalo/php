<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titre')</title>
    <link rel="stylesheet" href="{{ asset('css\app.css') }}">
</head>
<body class="bg-white text-center">
    @yield('content')
</body>
</html>
