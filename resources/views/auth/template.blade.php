<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{ $title ?? 'Sphered' }}</title>
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/assets/vendor/semantic/semantic.min.css">
</head>
<body>
    {{-- Меню --}}
    <div class="ui borderless main menu">
        <div class="ui text container">
            <a href="/" class="header item">
                <img class="logo" style="width: 32px; height: 32px" src="/assets/img/logo_mono_144x144.png">
            </a>
            <div class="right menu">
                <a href="/password/reset" class="ui item">Забыли пароль?</a>
                <a href="/login" class="ui item">Войти</a>
            </div>
        </div>
    </div>

    @yield('content')

    <script defer src="/assets/vendor/jquery/jquery.min.js"></script>
    <script defer src="/assets/vendor/semantic/semantic.min.js"></script>
    <script defer src="/assets/js/backend.js"></script>
</body>
</html>