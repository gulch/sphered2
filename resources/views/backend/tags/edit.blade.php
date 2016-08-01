@extends('backend.template')

@section('content')
    <h1 class="ui header">
        <i class="tag icon"></i>
        Редактирование тега "{{ $tag->title }}"
    </h1>

    <div class="ui warning form segment">
        {!! Form::model($tag, ['url' => '/' . config('app.admin_segment_name') . '/tags/'.$tag->id, 'method' => 'PATCH']) !!}

        @include('backend.tags._form')

        {!! Form::close() !!}
    </div>
@endsection