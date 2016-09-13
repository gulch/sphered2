@extends('backend.template')

@section('content')
    <h1 class="ui header">
        <div class="content">
            Изображения
            <div class="sub header">Управление изображениями</div>
        </div>
    </h1>

    <div class="ui divider"></div>

    @include('backend.images._images-list')

    <div class="ui hidden divider"></div>

    <div class="ui middle aligned stackable centered grid container">
        <div class="ui row">
            {!! $images->render() !!}
        </div>
    </div>
@endsection