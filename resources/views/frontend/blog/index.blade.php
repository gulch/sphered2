@extends('frontend.template', [
    'seoTitle' => 'Блог проекта Sphered [сферед]',
    'seoDescription' => 'Блог о всем, что связано с панорамным фото, мультимедийных решених на основе панорам и 3D объектов. Виртуальные 3D туры, сферические и цилиндрические панорамы, 3D объекты, панорамное видео, и другие VR решения.',
    'seoKeywords' => 'блог, публикации, новости, фото, сферед, sphered, о 3Д панорамах, о виртуальных 3D турах, виртуальные 3D туры, 3D панорамы'
])

@section('content')
    <div class="blog">
        <div class="container">
            <div class="row-fluid">

                @if(sizeof($articles))
                <ul class="posts span8">

                    @foreach($articles as $article)
                        <li class="item clearfix">
                            <figure class="media">

                                <a href="/blog/{{ $article->slug }}">
                                    <img src="{{ config('app.image_upload_path') . $article->image->path }}"
                                         alt="{{ $article->image->alt }}"
                                    >
                                </a>

                                <figcaption class="caption tc12 bold">
                                    <a href="/blog/{{ $article->slug }}">
                                        <h1 class="title tc12">
                                            {{ $article->title }}
                                        </h1>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="content tc13">
                                {{ $article->seo_description }}
                            </div>
                            <div class="more left">
                                <a href="/blog/{{ $article->slug }}">Читать</a>
                            </div>
                        </li>
                    @endforeach


                    <!-- BLOG POSTS PAGINATION -->
                    {{--<li class="pagination">
                        <div class="span12">
                            <nav class="nav_wrapper">
                                <ul class="nav blog_nav">

                                    @if($articles->currentPage() !== 1)
                                    <li class="btn large tc15 dib">
                                        <a href="/blog?page={{ $articles->currentPage() - 1 }}">
                                            Предыдущая
                                        </a>

                                    </li>
                                    @endif

                                    @if($articles->lastPage() !== $articles->currentPage())
                                    <li class="btn large tc15 dib">
                                        <a href="/blog?page={{ $article->currentPage() + 1 }}">
                                            Следующая страница
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </li>--}}
                    <!-- /BLOG POSTS PAGINATION -->
                </ul>
                @endif

                {{-- BLOG SIDEBAR --}}
                @include('frontend.blog.sidebar')

            </div>
        </div>
    </div>
@endsection