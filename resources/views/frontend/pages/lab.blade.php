@extends('frontend.template', [
    'seoTitle' => 'Собственные разработки Sphered. Cферед - проект популяризации VR решений.',
    'seoDescription' => 'Мы активно занимаемся исследованием, тестирований и внедрением VR решений и в последствии представляем сообществу свои наработки. О 3Д панорамах, виртуальных 3D турах.',
    'seoKeywords' => 'разработка, исследования, сферед, sphered, о 3Д панорамах, о виртуальных 3D турах, виртуальные 3D туры, 3D панорамы, индивидуальные решения, HD качество, 4K качество'
])

@section('content')
<div class="our_services">
    <div class="container">
        <div class="row">
            <div class="content span12 justify tc14">
                <h1 class="tc6 center">НАШИ РАЗРАБОТКИ</h1>
                <h3 class="tc2 center">Мы активно занимаемся исследованием, тестирований и внедрением VR решений и в последствии представляем сообществу свои наработки.</h3>

               {{-- <p class="font54" align="center">
                    <i class="fa fa-cog fa-spin fa-2x tc6"></i>
                </p>
                <p class="tc7 font32 bold txt_upper" align="center">
                    Cтраница в процессе наполнения...
                </p>
                <br>--}}
            </div>
        </div>

        <p></p><p></p>

        <div class="row-fluid">
            <ul class="list span12">

                <li class="span4"></li>

                <li class="service span4">
                    <figure>
                        <div class="icon">
                            <img alt="Панель управления Mono. Логотип" src="/assets/img/logo_mono_144x144.png">
                        </div>
                        <figcaption class="caption tc7 bold">Панель управления "Mono"</figcaption>
                    </figure>
                    <p class="description">
                        Графическая оболочка (скин) для программы Pano2VR
                        <br>
                        Проект на <a target="_blank" class="tc11" href="https://github.com/gulch/mono-pano2vr-skin">Github</a>
                    </p>
                </li>

                <li class="span4"></li>

            </ul>
        </div>

    </div>
</div>
@endsection