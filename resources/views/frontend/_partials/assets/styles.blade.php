@if(config('app.env') === 'production')
    <link rel="stylesheet" href="{{ elixir('assets/css/build/f.css') }}">
@else
    <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/fa.css">
    <link rel="stylesheet" href="/assets/css/source/frontend.css">
@endif