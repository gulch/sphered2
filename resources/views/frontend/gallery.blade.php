@extends('frontend.template')

@section('content')
<h2 class="tc7 portfolio_title center">Некоммерческие работы</h2>
<div class="works_filters">
    <div class="container">
        <div class="row">
            <div class="filters span10 offset1">
                <ul class="list tc2">
                    <li class="item dib">
                        <a class="button {{Request::segment(2)?'':'active'}}" href="{{URL::to('gallery')}}">Все работы</a>
                    </li>
                    @if(sizeof($types))
                    @foreach($types as $type)
                    <li class="item dib">
                        <a class="button {{Request::segment(2)==$type->itemType->url_segment?'active':''}}"
                           href="{{URL::to('gallery/'.$type->itemType->url_segment)}}">
                            {{$type->itemTypeRUS->title}}
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @if($selected_type)
    <div class="container margin-top36">
        <div class="row">
            <div class="filters span10 offset1">
                <ul class="list tc2">
                    <li class="item dib">
                        <a class="button {{Request::segment(3)?'':'active category_active_btn'}}"
                           href="{{URL::to('gallery/'.$selected_type)}}"
                        >
                            Все категории
                        </a>
                    </li>
                    @if(sizeof($categories))
                        @foreach($categories as $category)
                        <li class="item dib">
                            <a class="button {{Request::segment(3)==$category->itemCategory->url_segment ? 'active category_active_btn':''}}"
                               href="{{URL::to('gallery/'.$selected_type.'/'.$category->itemCategory->url_segment)}}"
                            >
                                {{$category->itemCategoryRUS->title}}
                            </a>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="works_portfolio">
    <div class="container">
        @if(sizeof($gallery_items))
            <div class="wrapper row">
                @foreach ($gallery_items as $item)
                    <div class="item span4 active"">
                        <figure>
                            <img class="thumb"
                                 src="/assets/img/ph_img.png"
                                 data-echo="/uploads{{ $item->path_to_files.$item->gallery_image }}"
                                 width="420"
                                 height="420"
                                 alt="{{$item->itemRUS->title}}"
                            >
                            <figcaption>
                                <div class="fc_wrapper">
                                    <div class="content">
                                        <h6 class="content_title">
                                            <a class="tc2"
                                               href="{{URL::to('gallery/'.$item->itemType->url_segment.'/'.$item->itemCategory->url_segment.'/'.$item->url_segment)}}"
                                            >
                                                {{$item->itemRUS->title}}
                                            </a>
                                        </h6>
                                        <div class="category">
                                            <i class="fa fa-picture-o fa-2x tc2"></i>
                                            <h4 class="name dib tc2">{{$item->itemTypeRUS->title}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        @else
            <div class="wrapper row">
                <p class="center">Пока здесь ничего нет</p>
            </div>
        @endif
    </div>
</div>
@include('frontend._partials.startproject')
@endsection