@extends('admin.template')

@section('pagetitle')
    <h1 class="ui header">
        <i class="file text outline icon"></i>
        Редактирование статьи {{ quotesString($article->title) }}
    </h1>
@endsection

@section('content')

    <div class="ui warning form segment">
        {!! Form::model($article, ['url' => url(config('app.admin_segment_name') . '/articles').'/'.$article->id, 'method' => 'PATCH']) !!}

        @include('admin.articles._form')

        {!! Form::close() !!}
    </div>
@endsection