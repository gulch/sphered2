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

$seoTitle .= 'Портфолио проекта Sphered. 3D панорамы, виртуальные 3D туры в HD и 4K качестве';
$seoDescription .= 'Портфолио проекта инноваций 3D решений Sphered (сферед). Виртуальные 3д туры, сферические панорамы, трехмерные визуализации объектов.';
$seoKeywords .= 'портфолио, 3D тур, галерея, 3d экскурсия, 3D презентация, 3д тур, панорамы 360, 3d панорама, 3d панорама html5';

?>

@extends('frontend.template', [
    'seoTitle' => $seoTitle,
    'seoDescription' => $seoDescription,
    'seoKeywords' => $seoKeywords
])

@section('content')
    <h1 class="tc7 font32 portfolio_title center">
        Портфолио
    </h1>

    @include('frontend.gallery.filters', ['slug' => 'portfolio'])

    <div class="works_portfolio">
        <div class="container">
            @if(sizeof($items))
                <div class="wrapper row">
                    @foreach ($items as $item)
                        <div class="row single">
                            <div class="item span5 offset1 active">
                                <figure>
                                    <img class="lazyload"
                                         src="/assets/img/placeholder.png"
                                         data-src="/uploads{{ $item->path_to_files . $item->gallery_image}}"
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

                            <div class="item span5 active">
                                <div class="content">
                                    <a href="{{ $item->getUrlPath() }}">
                                        <h3 class="heading font54 txt_upper tc11 bold">
                                            {{ $item->title }}
                                        </h3>
                                    </a>
                                    <article class="article tc13">
                                        {{ $item->description }}
                                    </article>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{--<div class="pagination row">
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
                </div>--}}

            @else
                <div class="wrapper row">
                    <p class="center font32 bold">Пока здесь ничего нет</p>
                </div>
            @endif

        </div>
    </div>
    @include('frontend._partials.startproject')
@endsection

