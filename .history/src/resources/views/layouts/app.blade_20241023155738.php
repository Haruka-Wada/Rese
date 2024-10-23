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
            <a href="#modal-container" class="header__logo">Rese</a>
        </div>
    </header>
    <main>
        @yield('main')
    </main>

    <div id="modal-container" class="modal">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
            <a href="#" class="modal__close-btn">×</a>
            <div class="modal__content">
                <a href="/" class="modal__content">HOME</a>
                @if(Auth::check())
                <form action="/logout" method="post">
                    @csrf
                    <button>Logout</button>
                </form>
                <a href="/">Mypage</a>
                @else
                <a href="/register">Registration</a>
                <a href="/login">Login</a>
                @endif
            </div>

        </div>
    </div>
</body>

</html>