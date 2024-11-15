<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <header>
        <div class="header__wrapper">
            <nav class="header__hamburger">


            </nav>
            <h1 class="header__logo">Rese</h1>
            @yield('search')
        </div>

        <div class="menu__overlay">
            
        </div>
    </header>
    <main class="main">
        <div class="main__overlay">
            @yield('main')
        </div>
    </main>

    <script type="text/javascript">
        $(function() {
            $('.header__hamburger').click(function() {
                $('.header__overlay,.header__wrapper,.header__hamburger,.header__logo,.header__search,.menu__overlay,.main__overlay').toggleClass('active');
            });
        });
    </script>
</body>

</html>