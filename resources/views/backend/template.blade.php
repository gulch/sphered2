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
    <div class="ui main stackable large menu">
        <a href="/" class="header item">
            <img class="logo" src="/assets/img/logo_mono_144x144.png">
        </a>
        <a href="/{{ config('app.admin_segment_name') }}" class="item">
            <i class="dashboard icon"></i>
            Админ панель
        </a>
        <a href="/{{ config('app.admin_segment_name') }}/tags" class="item">
            <i class="tags icon"></i>
            Теги
        </a>
        <div class="right menu">
            <a href="/logout" class="ui item">Выйти</a>
        </div>
    </div>

    <div class="ui hidden divider"></div>
    <div class="ui container">
        @yield('content')
    </div>

    <script defer src="/assets/vendor/jquery/jquery.min.js"></script>
    <script defer src="/assets/vendor/semantic/semantic.min.js"></script>
    <script defer src="/assets/js/source/general.js"></script>
    <script defer src="/assets/js/source/backend.js"></script>
</body>
</html>
