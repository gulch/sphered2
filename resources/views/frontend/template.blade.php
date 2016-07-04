<!DOCTYPE html>
<html lang="ru" @if($pageMetadata->microdata_json) itemscope itemtype="http://schema.org/{{$pageMetadata->microdata_type}}" @endif @if($pageMetadata->og_json) prefix="og: http://ogp.me/ns#" @endif>
    <head>
        <title>{{ $pageMetadata->title }}</title>

        <meta charset="utf-8">
        <meta name="description" content="{{{$pageMetadata->description}}}">
        <meta name="keywords" content="{{{$pageMetadata->keywords}}}">
        <meta name="author" content="Sphered">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        @if($pageMetadata->image_src)
            <link rel="image_src" href="{{URL::to('/').$pageMetadata->image_src}}">
        @endif

        @if($pageMetadata->microdata_json)
            @include('frontend._partials.microdata.microdata')
        @endif

        @if($pageMetadata->og_json)
            @include('frontend._partials.microdata.og')
        @endif

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