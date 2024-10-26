<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="header">
            <div class="header__hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h1 class="header__logo">Rese</h1>
        </div>
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
    <main>
        @yield('main')
    </main>

    <script type="text/javasc">
        $(function() {
            $('.header__hamburger').click(function() {
                $('.header__hamburger, .hamburger_menu').toggleClass('active');
            });
        });
    </script>
</body>

</html>