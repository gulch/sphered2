<!DOCTYPE html>
<html lang="ru" itemscope="itemscope" itemtype="http://schema.org/WebSite">
    <head prefix="og: http://ogp.me/ns#; dcterms: http://purl.org/dc/terms/#">
        @include('frontend._partials.meta')
        @include('frontend._partials.assets.icons')
        @include('frontend._partials.assets.styles')
    </head>
    <body>
        <div class="main_wrapper">
            @include('frontend.header')
            @include('frontend.menu')
            @yield('content')
            @include('frontend.footer')
        </div>
        @include('frontend._partials.assets.scripts')
        @include('frontend._partials.counters')
    </body>
</html>