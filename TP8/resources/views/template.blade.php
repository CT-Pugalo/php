<!DOCTYPE html>
<html lang="fr">
 <head>
 <title>@yield('title')</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-
F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
crossorigin="anonymous">
 </head>
 <body>
 <div class="container">
 <div class="card mt-4">
 <div class="card-header bg-primary text-white text-center">@yield('title')</div>
 <div class="card-body">@yield('content')</div>
 </div>
 </div>
 </body>
</html>
