<?php

$seoTitle = '';

$seoTitle .= 'Портфолио проекта Sphered. 3D панорамы, виртуальные 3D туры в HD и 4K качестве';
$seoDescription = 'Портфолио проекта инноваций 3D решений Sphered (сферед). Виртуальные 3д туры, сферические панорамы, трехмерные визуализации объектов.';
$seoKeywords = 'портфолио, 3D тур, виртуальный тур, галерея панорам, 3d экскурсия 3D презентация, 3д виртуальный тур, панорамы 360, 3d панорама, 3d панорама html5';

?>

@extends('frontend.template', [
    'seoTitle' => $seoTitle,
    'seoDescription' => $seoDescription,
    'seoKeywords' => $seoDescription
])

@section('content')
<h1 class="tc7 font32 portfolio_title center">Портфолио</h1>
<div class="works_filters">
    <div class="container">
        <div class="row">
            <div class="filters span10 offset1">
                <ul class="list tc2">
                    <li class="item dib">
                        <a class="button {{Request::segment(2)?'':'active'}}" href="{{URL::to('portfolio')}}">Все работы</a>
                    </li>
                    @if(sizeof($types))
                        @foreach($types as $type)
                            <li class="item dib">
                                <a class="button {{Request::segment(2)==$type->itemType->url_segment?'active':''}}"
                                   href="{{URL::to('portfolio/'.$type->itemType->url_segment)}}">
                                    {{ $type->itemType->title }}
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
                            <a class="button {{Request::segment(3)?'':'active category_active_btn'}}" href="{{URL::to('portfolio/'.$selected_type)}}">Все категории</a>
                        </li>
                        @if(sizeof($categories))
                            @foreach($categories as $category)
                                <li class="item dib">
                                    <a class="button {{Request::segment(3)==$category->itemCategory->url_segment?'active category_active_btn':''}}"
                                       href="{{URL::to('portfolio/'.$selected_type.'/'.$category->itemCategory->url_segment)}}">
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
                    <div class="row single">
                        <div class="item span5 offset1 active">
                            <figure>
                                <img class="thumb" src="/assets/img/ph_img.png"
                                     data-echo="/uploads{{ $item->path_to_files . $item->gallery_image}}"
                                     width="420"
                                     height="420"
                                     alt="{{$item->itemRUS->title}}">
                                <figcaption>
                                    <div class="fc_wrapper">
                                        <div class="content">
                                            <h6 class="content_title">
                                                <a class="tc2" href="{{URL::to('portfolio').'/'.$item->itemType->url_segment.'/'.$item->itemCategory->url_segment.'/'.$item->url_segment}}">{{$item->itemRUS->title}}</a>
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

                        <div class="item span5 active">
                            <div class="content">
                                <a href="{{URL::to('portfolio').'/'.$item->itemType->url_segment.'/'.$item->itemCategory->url_segment.'/'.$item->url_segment}}">
                                    <h3 class="heading font54 txt_upper tc11 bold">{{$item->itemRUS->title}}</h3>
                                </a>
                                <article class="article tc13">{{$item->itemRUS->short_description}}</article>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>

        @if(1==2)
        <div class="pagination row">
            <nav class="nav_wrapper">
                <ul class="nav">
                    <li class="btn normal tc15 dib">
                        <a href="#">
                            <i class="fa fa-arrow-circle-o-down fa-lg"></i>
                            ПОКАЗАТЬ ЕЩЕ
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        @endif

        @else
            <div class="wrapper row">
                <p class="center font32 bold">Пока здесь ничего нет</p>
            </div>
        @endif

    </div>
</div>
@include('frontend._partials.startproject')
@endsection

