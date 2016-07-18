<?php
    $target_blank = false;
    if (strpos($item->link, 'http://') !== false){
        $target_blank = true;
    }
?>

@extends('frontend.template', [
    'seoTitle' => $item->title,
    'seoDescription' => $item->description,
    'seoKeywords' => $item->keywords,
    'seoImage' => $item->path_to_files . $item->gallery_image
])

@section('content')
<div class="posts_nav">
    <div class="container">
        <div class="row">
            <div class="wrapper span12">
                <div class="pagination">
                    <nav class="nav_wrapper clearfix">
                        <div class="post_title">
                            <h1 class="title tc8 bold">
                                {{ $item->title }}
                            </h1>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="breadcrumb">
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/{{ Request::segment(1) }}" itemprop="url">
                    <span itemprop="title">
                        {{ Request::segment(1) == 'portfolio' ? 'Портфолио' : 'Галерея' }}
                    </span>
                </a>
            </span>
            &nbsp;>&nbsp;
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/{{ Request::segment(1) }}/{{  $item->itemType->url_segment }}" itemprop="url">
                    <span itemprop="title">
                        {{ $item->itemType->title }}
                    </span>
                </a>
            </span>
            &nbsp;>&nbsp;
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/{{ Request::segment(1) }}/{{ $item->itemType->url_segment }}/{{  $item->itemCategory->url_segment }}"
                   itemprop="url"
                >
                    <span itemprop="title">
                        {{ $item->itemCategory->title }}
                    </span>
                </a>
            </span>
        </div>
    </div>

    <div class="post">
        <div class="container">
            <div class="row">
                <div class="content span12">
                    <div class="image">
                        @if(!Agent::isMobile() && !Agent::isTablet() && !$target_blank)
                            <a href="{{ $item->link }}?lightbox[width]=75p&lightbox[height]=95p&lightbox[iframe]=true"
                               alt="Посмотреть {{ $item->itemType->title }} {{$item->title}}"
                               class="lightbox">
                        @else
                            <a href="{{ $item->link }}"
                               target="_blank"
                               alt="Посмотреть {{$item->itemType->title}} {{$item->title}}"
                            >
                        @endif
                                <img src="/uploads{{ $item->path_to_files . $item->big_image }}"
                                     width="1170"
                                     height="890"
                                     alt="{{$item->title}}"
                                >
                            </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container work_desc">
            <div class="row">
                <div class="content span12">
                    <div class="body row">
                        <div class="meta span4">
                            <ul>
                                <li class="clearfix">
                                    <div class="social_btns right">
                                        <script async type="text/javascript" src="https://yandex.st/share/share.js" charset="utf-8"></script>
                                        <div class="yashare-auto-init"
                                             data-yashareL10n="ru"
                                             data-yashareQuickServices="vkontakte,facebook,gplus,twitter,pinterest,odnoklassniki,yaru,moimir"
                                             data-yashareTheme="counter"
                                             data-yasharetype="small"
                                             data-yashareImage="{{ URL::to($item->path_to_files . $item->gallery_image) }}">
                                        </div>
                                    </div>
                                </li>
                                <li class="item clearfix">
                                    <b class="label left">Тип работы</b>
                                    <span class="value right text_right">
                                        {{ $item->itemType->title }}
                                    </span>
                                </li>
                                <li class="item clearfix">
                                    <b class="label left">Категория</b>
                                    <span class="value right text_right">
                                        {{ $item->itemCategory->title }}
                                    </span>
                                </li>
                                <li class="item clearfix">
                                    <b class="label left">Опубликовано</b>
                                    <span class="value right text_right">
                                        {{  date("d.m.Y", strtotime($item->created_at)) }}
                                    </span>
                                </li>
                            </ul>
                            <div class="btn_3 center">
                                @if(!Agent::isMobile() && !Agent::isTablet() && !$target_blank)
                                    <a href="{{ $item->link }}?lightbox[width]=75p&lightbox[height]=95p&lightbox[iframe]=true"
                                       alt="Посмотреть {{ $item->itemType->title }} {{ $item->title }}"
                                       class="lightbox"
                                    >
                                        Посмотреть
                                    </a>
                                @else
                                    <a href="{{ $item->link }}"
                                       target="_blank"
                                       alt="Посмотреть {{ $item->itemType->title }} {{ $item->title }}"
                                    >
                                        Посмотреть
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="main_content span8 justify">
                            {!! $item->content !!}
                        </div>
                        <div class="offset4 embed-code span8 clearfix">
                            <div class="trigger bold left">
                                <i class="fa fa-cogs fa-lg"></i>
                                <b>Получить код вставки</b>
                            </div>
                        </div>
                        <div class="offset4 get-ecode span8 clearfix hide">
                            <div class="form_box">
                                <div class="form new_project">
                                    <form id="contact_form" action="/message/requestcode" method="post">
                                        <div class="row-fluid">
                                            <span class="tc8 font13">
                                                Напишите на каком сайте и несколько слов о том, в каких целях будет использоваться наша работа.
                                                Для некомерческого использования мы предоставляем код вставки абсолютно бесплатно.
                                            </span>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="element span4">
                                                <input class="span12" name="name" type="text" placeholder="Имя" />
                                            </div>
                                            <div class="element span4">
                                                <input class="span12" name="email" required type="text" placeholder="E-mail*" />
                                            </div>
                                            <div class="element span4">
                                                <input class="span12" name="site" required type="text" placeholder="Сайт*" />
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="element span9">
                                                <textarea class="span12" name="goal" placeholder="Цель использования"></textarea>
                                            </div>
                                            <div class="element span3">
                                                <input class="tc1 bold bg6 txt_upper" type="submit" value="Отправить" />
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <span class="font14">* поля обязательные для заполнения</span>
                                        </div>
                                        <div class="alert a_headsup hide">
                                            <div class="left rmargin15">
                                                <i class="fa fa-exclamation-triangle fa-3x"></i>
                                            </div>
                                            <a class="close fa" data-dismiss="alert" href="javascript:void(0)">×</a>
                                            <span class="msg tc2"></span>
                                        </div>
                                        {{ csrf_token() }}
                                        <input type="hidden" value="{{ $item->title }}" name="workname"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(sizeof($similar_items))
        <div class="works_portfolio">
            <div class="container">
               <div class="wrapper row">
                    <h6 class="font32 txt_upper center bold tc11">Также посмотрите</h6>
                    <br>
                    @foreach($similar_items as $similar_item)
                        <div class="item span4 active">
                            <figure>
                                <img class="lazyload"
                                     src="/assets/img/placeholder.png"
                                     data-src="/uploads{{ $similar_item->path_to_files . $similar_item->gallery_image }}"
                                     width="420"
                                     height="420"
                                     alt="{{ $similar_item->title }}"
                                >
                                <figcaption>
                                    <div class="fc_wrapper">
                                        <div class="content">
                                            <h6 class="content_title">
                                                <a class="tc2" href="{{ $similar_item->getUrlPath() }}">
                                                    {{ $similar_item->title }}
                                                </a>
                                            </h6>
                                            <div class="category">
                                                <i class="fa fa-picture-o fa-2x tc2"></i>
                                                <h4 class="name dib tc2">
                                                    {{ $similar_item->itemType->title }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(!Agent::isMobile() && !Agent::isTablet() && !$target_blank)
        <link rel="stylesheet" href="/assets/vendor/lightbox/themes/default/jquery.lightbox.min.css" type="text/css" media="screen"/>
        <script type="text/javascript">
            document.onreadystatechange = function()
            {
                if (document.readyState == "complete")
                {
                    var sce = document.createElement('script');
                    sce.type = 'text/javascript';
                    sce.defer = true;
                    sce.src = "/assets/vendor/lightbox/lightbox.min.js";
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(sce, s);
                }
            }
        </script>
    @endif
@endsection