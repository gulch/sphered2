<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
@foreach(json_decode($pageMetadata->DC_json) as $key=>$value)
    <meta name="{{$key}}" content="{{$value}}"/>
@endforeach