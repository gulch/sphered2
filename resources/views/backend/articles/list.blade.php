@extends('backend.template')

@section('content')
    <h1 class="ui header">
        <div class="content">
            Статьи
            <div class="sub header">Управление статьями в блоге</div>
        </div>
    </h1>

    <div class="ui stackable menu">
        <div class="item">
            <i class="file text outline large icon"></i>
        </div>

        <div class="right menu">
            <a href="/{{ config('app.admin_segment_name') }}/articles/create" class="item">
                <i class="add icon"></i>
                Добавить
            </a>
        </div>
    </div>

    <div class="ui clearing divider"></div>

    @if (sizeof($articles))
        <div class="ui relaxed items">
            @foreach($articles as $article)
                <div class="item ui segment @unless($article->is_published) unpublished @endunless"
                     data-id="{{ $article->id }}"
                     data-action-element="1"
                >
                    <div class="image">
                        @if($article->image)
                            <img src="{{ config('app.thumb_image_upload_path') . $article->image->path }}">
                        @else
                            <img src="{{ config('app.assets_img_path') }}/placeholder/ph-white-175x130.svg">
                        @endif
                    </div>

                    <div class="content">

                        <a class="ui large header"
                           target="_blank"
                           href="/blog/{{ $article->slug }}"
                        >
                            {{ $article->title }}
                        </a>

                        <div class="description">
                            Создано <b>{{ $article->created_at->format('d.m.Y H:i:s') }}</b>
                            <br>
                            Отредактировано <b>{{ $article->updated_at->format('d.m.Y H:i:s') }}</b>

                            @if(!$article->seo_title || !$article->seo_description || !$article->seo_keywords)
                                <br>
                                <span class="ui red label">
                                    <i class="warning sign icon"></i> Не все SEO поля заполнены
                                </span>
                            @endif

                            @if(!$article->is_published)
                                <span class="ui basic label">
                                    <i class="info icon"></i> Неопубликовано
                                </span>
                            @endif
                        </div>

                        <div class="extra">
                            <a href="{{ url(config('app.admin_segment_name') . '/articles').'/'.$article->id.'/edit' }}">
                                <i class="edit icon"></i>Редактировать
                            </a>

                            {{-- Опубликовать / Снять с публикации --}}
                            @if(!$article->is_published)
                                <a data-action-name="publish"
                                   data-action="{{ url(config('app.admin_segment_name') . '/articles').'/'.$article->id.'/publish' }}">
                                    <i class="unhide icon"></i>Опубликовать
                                </a>
                            @else
                                <a data-action-name="unpublish"
                                   data-action="{{ url(config('app.admin_segment_name') . '/articles').'/'.$article->id.'/unpublish' }}">
                                    <i class="hide icon"></i>Снять с публикации
                                </a>
                            @endif

                            {{-- Удалить --}}
                            <a data-popup="1">
                                <i class="remove circle icon"></i>Удалить
                            </a>
                            <div class="ui custom popup">
                                <div class="ui huge header center aligned">Точно удалить?</div>
                                <span class="ui negative button" data-action-name="remove"
                                      data-action="/{{ config('app.admin_segment_name') }}/articles/{{  $article->id }}"
                                      data-method="DELETE">Да</span><span class="ui button">Нет</span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="ui hidden divider"></div>

        <div class="ui middle aligned stackable centered grid container">
            <div class="ui row">
                {!! $articles->render() !!}
            </div>
        </div>

    @else
        @include('backend._partials.nothingfound')
    @endif
@endsection