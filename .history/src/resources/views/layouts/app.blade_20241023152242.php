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

    <div id="modal-container">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
            <div class="modal__content">
                <a href="/">HOME</a>
                <form action="/logout" method="post">
                    <button>LOGOUT</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>