<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>
<body>
    <head>
        <div class="header">
            a
            <h1 class="header__logo">Rese</h1>
        </div>
    </head>
    <main>
        @yield('main')
    </main>
</body>
</html>