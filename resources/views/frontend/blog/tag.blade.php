@extends('frontend.template', [
    'seoTitle' => $tag->seo_title,
    'seoDescription' => $tag->seo_description,
    'seoKeywords' => $tag->seo_keywords
])

@section('content')
    <div class="blog">
        <div class="container">
            <div class="row-fluid">

                <div class="span8">

                    <div class="tag-box">
                        <h1 class="tc12 tag-title">{{ $tag->title }}</h1>
                        <p>
                            {!! $tag->content !!}
                        </p>
                    </div>

                    @include('frontend.blog.articles', [
                        'articles' => $tag->articles()->get()
                    ])
                </div>

                {{-- BLOG SIDEBAR --}}
                @include('frontend.blog.sidebar')

            </div>
        </div>
    </div>
@endsection