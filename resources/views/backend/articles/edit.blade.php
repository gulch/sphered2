@extends('backend.template')

@section('content')
    <h1 class="ui header">
        <i class="file text outline icon"></i>
        Редактирование статьи {{ $article->title }}
    </h1>

    <div class="ui warning form segment">
        {!! Form::model($article, [
            'url' => '/' . config('app.admin_segment_name') . '/articles/' . $article->id,
            'method' => 'PATCH'
        ]) !!}

        @include('backend.articles._form')

        {!! Form::close() !!}
    </div>
@endsection