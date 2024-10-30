<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <div class="header__overlay">
            <div class="header__wrapper">
                <div class="header__hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1 class="header__logo">Rese</h1>
            </div>
        </div>
        <div class="></div>
        <ul class="hamburger__menu">
            <li><a href="/" class="hamburger__menu-link">HOME</a></li>
            @if(Auth::check())
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button class="hamburger__menu-logout">Logout</button>
                </form>
            </li>
            <li><a href="/" class="hamburger__menu-link">Mypage</a></li>
            @else
            <li><a href="/register" class="hamburger__menu-link registration">Registration</a></li>
            <li><a href="/login" class="hamburger__menu-link">Login</a></li>
            @endif
        </ul>
    </header>
    <main class="main">
        <div class="main__overlay">
            @yield('main')
        </div>
    </main>

    <script type="text/javascript">
        $(function() {
            $('.header__hamburger').click(function() {
                $('.header__overlay,.header__wrapper,.header__hamburger,.header__logo,.hamburger__menu,.main__overlay').toggleClass('active');
            });
        });
    </script>
</body>

</html>