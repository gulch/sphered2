@extends('frontend.template', [
    'seoTitle' => $article->seo_title,
    'seoDescription' => $article->seo_description,
    'seoKeywords' => $article->seo_keywords,
])

@section('content')
    <div class="blog">
        <div class="container">
            <div class="row-fluid">
                <ul class="posts span8">

                    <li class="item single clearfix">
                        <h1 class="title tc12">
                            {{ $article->title }}
                        </h1>
                        <figure class="media">
                            <img src="{{ config('app.post_image_upload_path') . $article->image->path }}"
                                 alt="{{ $article->image->alt }}"
                            >
                            <figcaption class="caption tc12 bold">
                                <ul class="meta">
                                    <li class="item author left">
                                        <i class="icon sp dib"></i>
                                        <div class="dib">Admin</div>
                                    </li>
                                    <li class="item date right">
                                        <i class="icon sp dib"></i>
                                        <div class="dib">
                                            {{ $article->created_at->format('d.m.Y') }}
                                        </div>
                                    </li>
                                </ul>
                            </figcaption>

                        </figure>
                        <div class="content tc13">
                            {!! $article->content !!}
                        </div>
                    </li>

                </ul>

                {{-- BLOG SIDEBAR --}}
                @include('frontend.blog.sidebar')

            </div>

        </div>
    </div>
@endsection