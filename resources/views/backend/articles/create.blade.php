@extends('backend.template')

@section('pagetitle')
    <h1 class="ui header">
        <i class="file text outline icon"></i>
        Добавление новой статьи
    </h1>
@endsection

@section('content')
    <div class="ui warning form segment">
        {!! Form::open(['url' => '/' . config('app.admin_segment_name') . '/articles']) !!}

        @include('backend.articles._form')

        {!! Form::close() !!}
    </div>
@endsection