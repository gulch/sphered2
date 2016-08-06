@if(sizeof($articles))
    <ul class="posts">
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

        {{--BLOG POSTS PAGINATION--}}
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

    </ul>
@endif