@extends('frontend.template', [
    'seoTitle' => 'FAQ. Вопросы и ответы. Sphered - 3D панорамы, виртуальные туры в 4K, FullHD',
    'seoDescription' => 'FAQ. Вопросы и ответы. о 3Д панорамах, виртуальных 3D турах. Sphered [сферед] - проект популяризации VR решений.',
    'seoKeywords' => 'FAQ, вопросы и ответы, о 3Д панорамах, о виртуальных 3D турах, виртуальные 3D туры, 3D панорамы, индивидуальные решения, HD качество, 4K качество'
])

@section('content')
<div class="skills">
    <h1 class="tc6 center">FAQ</h1>
    <h3 class="tc3 center">Ответы на самые распостраненные вопросы</h3>
    <div class="container">
        <div class="row">
            <div class="content span12 tc14">
                <div class="row-fluid">
                    <div id="accordion" class="accordion span12">

                        <div class="group accordion-group">
                            <div class="heading bold accordion-heading">
                                <div class="toggle accordion-toggle" data-target="#item1" data-toggle="collapse" data-parent="#accordion">
                                    <div class="acc_icon left"><span class="plus dib">+</span></div>
                                    <span>Что такое виртуальный тур?</span>
                                </div>
                            </div>
                            <div id="item1" class="acc_body accordion-body collapse">
                                <div class="inner accordion-inner">
                                    Виртуальный тур — это комбинация панорамных фотографий (сферических или цилиндрических), когда переход от одной панорамы к другой осуществляется через активные зоны (их называют точками привязки или точками перехода), размещаемые непосредственно на изображениях, а также с учетом плана виртуального 3D тура. Все это может дополняться озвучиванием переднего плана и фоновой музыкой, а при необходимости и обычными фотографиями, видеороликами, flash-роликами, планами туров, пояснениями, контактной информацией и пр.
                                </div>
                            </div>
                        </div>

                        <div class="group accordion-group">
                            <div class="heading bold accordion-heading">
                                <div class="toggle accordion-toggle" data-target="#item2" data-toggle="collapse" data-parent="#accordion">
                                    <div class="acc_icon left"><span class="plus dib">+</span></div>
                                    <div>Как виртуальный тур работает?</div>
                                </div>
                            </div>
                            <div id="item2" class="acc_body accordion-body collapse">
                                <div class="inner accordion-inner">
                                    Технически, виртуальный тур - это упорядоченый набор, специально подготовленных, изображений. Виртуальный тур может работать в онлайн и оффлайн режимах. Чаще всего, это мультимедийный flash-файл. Но, может быть собран как HTML5 приложение, с поддержкой мобильных устройств.
                                </div>
                            </div>
                        </div>

                        <div class="group accordion-group">
                            <div class="heading bold accordion-heading">
                                <div class="toggle accordion-toggle" data-target="#item3" data-toggle="collapse" data-parent="#accordion">
                                    <div class="acc_icon left"><span class="plus dib">+</span></div>
                                    <span>В каких сферах это может быть применимо?</span>
                                </div>
                            </div>
                            <div id="item3" class="acc_body accordion-body collapse">
                                <div class="inner accordion-inner">
                                    <ul>
                                        <li>&emsp;&emsp;•&emsp;недвижимость / аренда квартир</li>
                                        <li>&emsp;&emsp;•&emsp;экскурсии / туры / памятники истории / достопримечательности / архитектура</li>
                                        <li>&emsp;&emsp;•&emsp;выставки / галереи / музеи</li>
                                        <li>&emsp;&emsp;•&emsp;курорты / туристический бизнес / отели</li>
                                        <li>&emsp;&emsp;•&emsp;апартаменты</li>
                                        <li>&emsp;&emsp;•&emsp;ресторанный бизнес</li>
                                        <li>&emsp;&emsp;•&emsp;строительство / ремонт</li>
                                        <li>&emsp;&emsp;•&emsp;интерьерный / ландшафтный дизайн</li>
                                        <li>&emsp;&emsp;•&emsp;оздоровительные комплексы / санатории / спортивные комплексы</li>
                                        <li>&emsp;&emsp;•&emsp;аквапарки / бассейны / SPA-салоны</li>
                                    </ul>
                                    и так далее...
                                </div>
                            </div>
                        </div>

                        <div class="group accordion-group">
                            <div class="heading bold accordion-heading">
                                <div class="toggle accordion-toggle" data-target="#item4" data-toggle="collapse" data-parent="#accordion">
                                    <div class="acc_icon left"><span class="plus dib">+</span></div>
                                    <span>Что такое 3D панорама?</span>
                                </div>
                            </div>
                            <div id="item4" class="acc_body accordion-body collapse">
                                <div class="inner accordion-inner">
                                    3D панорама - (сферическая панорама) — это один из видов панорамной фотографии. Предназначена в первую очередь для показа на компьютере (при помощи специального программного обеспечения).<br>
                                    В основе 3D панорамы лежит «склеенное» из множества отдельных фотографий изображение в сферической или кубической проекции. Характерной чертой сферических панорам является максимально возможный угол обзора пространства (360 x 180 градусов).<br>
                                    В связи с тем, что сферическая проекция вносит специфические, но не значительные искажения в изображение, сферические панорамы практически никогда не демонстрируются в печатном виде или в виде обычного графического файла. Основным способом демонстрации есть визуализация на основе технологий <a class="tc11" target="_blank" href="http://ru.wikipedia.org/wiki/Adobe_Flash">Flash</a> (наиболее распространённый), <a class="tc11" target="_blank" href="http://ru.wikipedia.org/wiki/HTML5">HTML5</a> с адаптацией под мобильные платформы (iPhone, iPad, Android, Windows Phone и тп.).
                                    У зрителя создаётся иллюзия присутствия внутри сферы, на внутреннюю поверхность которой «натянуто» изображение окружающего пространства. При этом оптические искажения (сферические аберрации) совсем не видны. К тому же, как правило, сферические панорамы наделяются инструментами управления просмотром, позволяющими изменять направление просмотра, а также приближать, или отдалять изображение.<br>
                                    <br>Благодаря всему этому человек видит место, где производилась съёмка так, как если бы он находился там сам.
                                </div>
                            </div>
                        </div>

                        <div class="group accordion-group">
                            <div class="heading bold accordion-heading">
                                <div class="toggle accordion-toggle" data-target="#item6" data-toggle="collapse" data-parent="#accordion">
                                    <div class="acc_icon left"><span class="plus dib">+</span></div>
                                    <span>4K качество?</span>
                                </div>
                            </div>
                            <div id="item6" class="acc_body accordion-body collapse">
                                <div class="inner accordion-inner">
                                    4K — обозначение разрешающей способности в цифровом кинематографе и компьютерной графике, примерно соответствующее 4096 пикселей по горизонтали.<br>
                                    Работы, которые выполнены в таком качестве, будет комфортно просматривать на 4K дисплее.<br>
                                    <a class="tc11" target="_blank" href="http://ru.wikipedia.org/wiki/4K_(%D1%80%D0%B0%D0%B7%D1%80%D0%B5%D1%88%D0%B5%D0%BD%D0%B8%D0%B5)">Более детально о этом стандарте</a>
                                </div>
                            </div>
                        </div>

                        <div class="group accordion-group">
                            <div class="heading bold accordion-heading">
                                <div class="toggle accordion-toggle" data-target="#item7" data-toggle="collapse" data-parent="#accordion">
                                    <div class="acc_icon left"><span class="plus dib">+</span></div>
                                    <span>HD качество?</span>
                                </div>
                            </div>
                            <div id="item7" class="acc_body accordion-body collapse">
                                <div class="inner accordion-inner">
                                    <a class="tc11" target="_blank" href="http://ru.wikipedia.org/wiki/HD">HD</a> (High Definition) — формат высокой четкости, который позволяет рассмотреть все детали при просмотре на современных FullHD совместимых мониторах.<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection