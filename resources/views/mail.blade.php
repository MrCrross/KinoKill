<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('http://127.0.0.1:8000/storage/icon/content.jpg')">
    <nav class="navbar navbar-expand-md navbar-laravel" style="background-image:url({{asset('storage/icon/menu_texture.jpg')}})">
        <div class="container" >
            <a class="navbar-brand">
                <img src="{{asset('storage/icon/Logo.png')}}" class="logo">
            </a>
        </div>
    </nav>
    <main class="py-4" style="color: #ffffff;">
        Ваши места:<br>
    </main>
</body>
</html>