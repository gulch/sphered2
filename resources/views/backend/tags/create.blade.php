@extends('backend.template')

@section('content')
    <h1 class="ui header">
        <i class="tag icon"></i>
        Добавление нового тега
    </h1>

    <div class="ui warning form segment">
        {!! Form::open(['url' => '/'. config('app.admin_segment_name') . '/tags']) !!}

        @include('backend.tags._form')

        {!! Form::close() !!}
    </div>
@endsection