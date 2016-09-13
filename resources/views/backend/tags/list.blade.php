@extends('backend.template')

@section('content')

    <h1 class="ui header">
        <div class="content">
            Теги
            <div class="sub header">Управление тегами</div>
        </div>
    </h1>

    <div class="ui stackable menu">
        <div class="item">
            <i class="tags large icon"></i>
        </div>

        <div class="right menu">
            <a href="/{{ config('app.admin_segment_name') }}/tags/create" class="item">
                <i class="add icon"></i>
                Добавить
            </a>
        </div>
    </div>

    <div class="ui clearing divider"></div>

    @if (!is_null($tags))
        <div class="ui relaxed items">
            @foreach($tags as $tag)
                <div class="item"
                     data-id="{{ $tag->id }}"
                     data-action-element="1"
                >
                    <div class="content">
                        <div class="ui segment {{ $tag->is_published ? 'raised' : 'secondary' }}">

                            <div class="ui statistic tiny right floated">
                                <div class="value">
                                    <i class="file text outline icon"></i>
                                    {{ $tag->articles->count() }}
                                </div>
                                <div class="label">Публикаций</div>
                            </div>

                            <a class="ui large header"
                               target="_blank"
                               href="/blog/tag/{{ $tag->slug }}"
                            >
                                {{ $tag->title }}
                            </a>

                            <div class="meta">
                                Создано: {{ $tag->created_at->format('d.m.Y H:i:s') }}
                            </div>

                            <div class="description">
                                {!! str_limit(strip_tags($tag->content), 100) !!}
                            </div>

                            <div class="extra">

                                <a href="/{{ config('app.admin_segment_name') }}/tags/{{ $tag->id }}/edit">
                                    <i class="edit icon"></i>Редактировать
                                </a>
                                <a data-popup="1">
                                    <i class="remove circle icon"></i>Удалить
                                </a>
                                <div class="ui custom popup">
                                    <div class="ui huge header center aligned">Точно удалить?</div>
                                    <span class="ui negative button"
                                          data-action-name="remove"
                                          data-action="/{{ config('app.admin_segment_name') }}/tags/{{ $tag->id }}"
                                          data-method="DELETE">Да
                                        </span>
                                    <span class="ui button">Нет</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        @include('backend._partials.nothingfound')
    @endif
@endsection