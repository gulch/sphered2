@foreach(json_decode($pageMetadata->microdata_json) as $key=>$value)
<meta itemprop="{{$key}}" content="{{$value}}">
@endforeach