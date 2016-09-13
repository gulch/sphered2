@extends('backend.template')

@section('content')
    <h1 class="ui header">
        <i class="file image outline icon"></i>
        Редактирование изображения "{{ $image->path }}"
    </h1>
    <div class="ui warning form segment">
        {!! Form::model($image, ['url' => url(config('app.admin_segment_name') . '/images').'/'.$image->id, 'method' => 'PATCH']) !!}

        @include('backend.images._form')

        {!! Form::close() !!}
    </div>
@endsection