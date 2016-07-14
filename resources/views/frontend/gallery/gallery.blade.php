<?php

$seoTitle = '';
$seoDescription = '';
$seoKeywords = '';

if(isset($selected_type)) {
    $seoTitle .= $selected_type->title . '. ';
    $seoDescription .= $selected_type->title . '. ';
    $seoKeywords .= mb_strtolower($selected_type->title) . ', ';
}

if(isset($selected_category)) {
    $seoTitle .= $selected_category->title . '. ';
    $seoDescription .= $selected_category->title . '. ';
    $seoKeywords .= mb_strtolower($selected_category->title) . ', ';
}

$seoTitle .= 'Галерея работ проекта Sphered. 3D панорамы, виртуальные 3D туры в HD и 4K качестве';
$seoDescription .= 'Галерея работ проекта инноваций 3D решений Sphered (сферед). Виртуальные 3д туры, сферические панорамы, трехмерные визуализации объектов.';
$seoKeywords .= 'галерея работ, галерея панорам, 3d экскурсия 3D презентация, 3д виртуальный тур, панорамы 360, 3d панорама html5';

?>

@extends('frontend.template', [
    'seoTitle' => $seoTitle,
    'seoDescription' => $seoDescription,
    'seoKeywords' => $seoKeywords
])

@section('content')
<h2 class="tc7 portfolio_title center">Некоммерческие работы</h2>

@include('frontend.gallery.filters', ['slug' => 'gallery'])

<div class="works_portfolio">
    <div class="container">
        @if(sizeof($items))
            <div class="wrapper row">
                @foreach ($items as $item)
                    <div class="item span4 active"">
                        <figure>
                            <img class="thumb"
                                 src="/assets/img/ph_img.png"
                                 data-echo="/uploads{{ $item->path_to_files . $item->gallery_image }}"
                                 width="420"
                                 height="420"
                                 alt="{{ $item->title }}"
                            >
                            <figcaption>
                                <div class="fc_wrapper">
                                    <div class="content">
                                        <h6 class="content_title">
                                            <a class="tc2"
                                               href="{{ $item->getUrlPath() }}"
                                            >
                                                {{ $item->title }}
                                            </a>
                                        </h6>
                                        <div class="category">
                                            <i class="fa fa-picture-o fa-2x tc2"></i>
                                            <h4 class="name dib tc2">
                                                {{ $item->itemType->title }}
                                            </h4>
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