<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta name="author" content="Sphered">
<?php
    if(!isset($seoTitle)) $seoTitle = 'Sphered';
    if(!isset($seoDescription)) $seoDescription = '';
    if(!isset($seoKeywords)) $seoKeywords = '';
    if(!isset($seoImage)) $seoImage = '/assets/img/favicon/mstile-150x150.png';
?>

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}" />
<meta name="keywords" content="{{ $seoKeywords }}" />
<link rel="image_src" href="{{ $seoImage }}">

{{-- RSS Feed --}}
{{--<link rel="alternate" type="application/rss+xml" title="Sphered RSS Feed" href="{{ url('feed') }}">--}}

{{--
    Preconnect
    * https://w3c.github.io/resource-hints/#dfn-preconnect
--}}
{{--<link rel="preconnect" href="https://maps.googleapis.com">--}}

{{--
    Preload
    * https://www.w3.org/TR/preload/
--}}
<link rel="preload" href="/assets/vendor/jquery/jquery.min.js" as="script">

@if(isset($canonical) && $canonical)
    <link rel="canonical" href="{!! $canonical !!}" />
@endif

@if(isset($noIndex) && $noIndex)
    <meta name="robots" content="noindex, nofollow">
@endif

{{-- Dublin Core  --}}
<meta property="dcterms:title" content="{{ $seoTitle }}"/>
<meta property="dcterms:description" content="{{ $seoDescription }}"/>
<meta property="dcterms:type" content="text/html"/>

{{-- Social: Google+ / Schema.org  --}}
<link href="https://plus.google.com/+SpheredUa" rel="publisher">
<meta itemprop="name" content="{{ $seoTitle }}">
<meta itemprop="description" content="{{ $seoDescription }}">
<meta itemprop="image" content="{{ $seoImage }}">
<meta itemprop="url" content="{{ URL::current() }}">

{{-- Social: Facebook / Open Graph --}}
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:image" content="{{ $seoImage }}"/>
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:site_name" content="Sphered">

{{-- Social: Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@sphered3d">
<meta name="twitter:creator" content="Sphered">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image:src" content="{{ $seoImage }}">