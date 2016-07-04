@foreach(json_decode($pageMetadata->og_json) as $key=>$value)
    <meta property="{{$key}}" content="{{$value}}">
@endforeach
@if($pageMetadata->image_src)
    <meta property="og:image" content="{{URL::to('/').$pageMetadata->image_src}}">
@endif
<meta property="og:url" content="{{{URL::current()}}}">