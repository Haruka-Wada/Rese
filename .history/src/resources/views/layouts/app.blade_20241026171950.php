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
    <header>
        <div class="header">
            <div class="header__humber">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h1 class="header__logo">Rese</h1>
        </div>
        <ul class="header__menu">
            <li><a href="/" class="modal__content-link">HOME</a></li>
            @if(Auth::check())
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button class="modal__content-logout">Logout</button>
                </form>
            </li>
            <li><a href="/" class="modal__content-link">Mypage</a></li>
            @else
            <li><a href="/register" class="modal__content-link registration">Registration</a></li>
            <li><a href="/login" class="modal__content-link">Login</a></li>
            @endif
        </ul>
    </header>
    <main>
        @yield('main')
    </main>

    <div id="menu" class="modal">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
            <a href="#" class="modal__close-btn">×</a>
            <div class="modal__content">


            </div>

        </div>
    </div>
</body>

</html>