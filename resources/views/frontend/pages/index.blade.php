@extends('frontend.template', [
    'seoTitle' => 'Sphered [сферед] - проект популяризации VR решений.',
    'seoDescription' => 'Все о мультимедийных решених на основе панорам и 3D объектов. Исследуем и популяризуем виртуальные 3D туры, сферические и цилиндрические панорамы, 3D объекты, панорамное видео, и другие VR решения.',
    'seoKeywords' => 'сферед, sphered, о 3Д панорамах, о виртуальных 3D турах, виртуальные 3D туры, 3D панорамы, индивидуальные решения, HD качество, 4K качество'
])

@section('content')
<div class="main_box latest_works">
    <div class="container">
        <div class="mb_row row">
            <h5 class="title tc1 bold span10 offset1 txt_upper">Несколько из наших новых работ</h5>
            <div class="projects center clearfix">
                <ul>
                    @if(sizeof($works))
                        @foreach($works as $item)
                            <li class="span3">
                                <figure>
                                    <img class="thumb"
                                         src="/assets/img/ph_img.png"
                                         data-echo="/uploads{{ $item->path_to_files . $item->gallery_image }}"
                                         width="420"
                                         height="420"
                                         alt="{{ $item->itemTypeRUS->title }}"
                                    >
                                    <figcaption>
                                        <div class="fc_wrapper">
                                            <div class="content">
                                                <h6 class="content_title">
                                                    <a href="{{ URL::to('portfolio/'.$item->itemType->url_segment.'/'.$item->itemCategory->url_segment.'/'.$item->url_segment)}}">
                                                        {{ $item->itemRUS->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="hooks span12">
                <div class="buttons">
                    <div class="btn start dib">
                        <a class="txt_upper" href="/portfolio#start">Добавить свою работу</a>
                    </div>
                    <div class="btn view dib">
                        <a class="txt_upper" href="/portfolio">Портфолио</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mask"></div>
</div>
<div class="main_box">
    <div class="container">
        <div class="row">
            <h1 class="title tc7 bold span12">Все о мультимедийных решених на основе панорам и 3D объектов</h1>
        </div>
    </div>
    <div class="main_box rounded_bg_up about_us">
        <div class="mask top_mask"></div>
        <div class="container">
            <div class="row">
                <h2 class="heading tc1 bold span12 lineh36">
                    3D ПАНОРАМЫ
                    <br>ВИРТУАЛЬНЫЕ ТУРЫ
                    <br>УНИКАЛЬНЫЕ VR РЕШЕНИЯ
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="our_team span12">
            <h2 class="center tc7">Мы "Sphered" [сферед] - проект популяризации VR решений.</h2>
            <p class="paragraph work_desc">
                Исследуем и популяризуем виртуальные 3D туры, сферические и цилиндрические панорамы, 3D объекты, панорамное видео, и другие VR решения.
                Если вы заинтересованы в проекте, то будем рады познакомиться :). Все возможные способы связаться с нами на странице <a href="{{URL::to('contacts')}}" class="tc11">контактов</a>.
            </p>
        </div>
    </div>
</div>
@endsection