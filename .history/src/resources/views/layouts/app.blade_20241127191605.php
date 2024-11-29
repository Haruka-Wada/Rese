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
            <button class="header__nav" onclick="navFunc()"></button>
            <nav class="header__hamburger">
                <ul class="hamburger__menu">
                    <li><a href="/" class="hamburger__menu-link">HOME</a></li>
                    @if(Auth::check())
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="hamburger__menu-logout">Logout</button>
                        </form>
                    </li>
                    <li><a href="/mypage" class="hamburger__menu-link">Mypage</a></li>
                    @elseif(!Auth::check() && !Auth::guardcheck())
                    <li><a href="/register" class="hamburger__menu-link registration">Registration</a></li>
                    <li><a href="/login" class="hamburger__menu-link">Login</a></li>
                    @endif
                </ul>
            </nav>
            <h1 class="header__logo">Rese</h1>
            @yield('search')
        </div>
    </header>
    <main class="main">
        @yield('main')
    </main>

    <script type="text/javascript">
        function navFunc() {
            document.querySelector('html').classList.toggle('open');
        }
    </script>
</body>

</html>