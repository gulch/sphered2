@extends('frontend.template', [
    'seoTitle' => 'Контакты. Sphered - 3D панорамы, виртуальные туры в 4K, FullHD',
    'seoDescription' => 'Контакты. все способы обратной связи. Sphered [сферед] - проект популяризации VR решений.',
    'seoKeywords' => 'контакты, как связаться, виртуальные 3D туры, 3D панорамы, индивидуальные решения, HD качество, 4K качество'
])

@section('content')
<div class="contact">
    <div class="container">
        <div class="body row-fluid">
            <div class="map span7 tc8">
                <h4 class="tc10 font16">Если вас интересует наш проект, свяжитесь с нами</h4>
                <p>Будем рады сотрудничать с людьми, готовыми помочь в популяризации VR решений: виртуальные 3D туры, сферические и цилиндрические панорамы, панорамное видео и тп.</p>
                <p>Также готовы помочь в реализации общественных и социальньно-направленных проектов на волонтерской основе.</p>
            </div>
            <div class="info span5">
                <h1 class="label tc11">Контакты</h1>
                <ul class="list">
                    <li class="item clearfix">
                        <i class="fa fa-envelope-o fa-3x tc12 left"></i>
                        <div class="meta">
                            <h5 class="label tc12">E-Mail</h5>
                            <h6 class="value">
                                <a rel="nofollow" class="tc12" href="mailto:{{ Html::obfuscate('hello@sphered.com.ua') }}">
                                    {{ Html::obfuscate('hello@sphered.com.ua') }}
                                </a>
                            </h6>
                        </div>
                    </li>
                    <li class="item clearfix">
                        <i class="fa fa-thumbs-up fa-3x tc12 left"></i>
                        <div class="meta">
                            <h5 class="label tc12">Мы в социальных сетях</h5>
                            <div class="pagination row pag-social">
                                <nav class="nav_wrapper">
                                    <ul class="nav">
                                        <li class="btn large tc15 dib">
                                            <a target="_blank" href="http://www.facebook.com/sphered.com.ua"><i class="fa fa-facebook fa-2x"></i></a>
                                        </li>
                                        <li class="btn large tc15 dib">
                                            <a target="_blank" href="https://plus.google.com/+SpheredUa"><i class="fa fa-google-plus fa-2x"></i></a>
                                        </li>
                                        <li class="btn large tc15 dib">
                                            <a target="_blank" href="http://www.pinterest.com/sphered/"><i class="fa fa-pinterest fa-2x"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="form_box container">
    <div class="form new_project">
        <form id="contact_form" action="/message/contact" method="post">
            <div class="row">
                <div class="span12">
                    <h4 class="heading tc12 txt_upper bold">Оставьте сообщение</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="element span6">
                    <input class="span12" name="name" required type="text" placeholder="Имя*" />
                </div>
                <div class="element span6">
                    <input class="span12" name="email" required type="email" placeholder="Email*" />
                </div>
            </div>
            <div class="row-fluid">
                <div class="element span10">
                    <textarea class="span12" name="client_message" required placeholder="Сообщение*"></textarea>
                </div>
                <div class="element span2">
                    <input class="tc1 bold bg6 txt_upper" type="submit" value="Отправить" />
                </div>
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
            <input type="hidden" value="rus" name="lang"/>
        </form>
    </div>
</div>
@endsection