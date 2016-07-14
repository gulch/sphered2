<footer class="footer">
    <div class="contact bg7">
        <div class="container">
            <div class="row">
                <div class="content span12 clearfix">
                    <div class="row">
                        <div class="logo span2">
                            <a href="/">
                                <img src="/assets/img/gs_logo.png" width="110" height="110" alt="Sphered">
                            </a>
                        </div>
                        <div class="subscribe span5">
                            <p class="subscribe_header tc1 txt_upper">Подпишитесь на рассылку</p>
                            <div class="inputs clearfix">
                                <form id="subscribe" action="/message/subscribe" method="post">
                                    <input class="email tc9 left" type="email" name="email" placeholder="E-mail*"/>
                                    <input type="hidden" name="lang" value="rus"/>
                                    <div class="button bg8 right" onclick="$('#subscribe').submit();">
                                        <i class="fa fa-paper-plane fa-lg tc1"></i>
                                    </div>
                                    <div class="msg"></div>
                                </form>
                            </div>
                        </div>

                        <div class="contact_info span4">
                            <p class="contact_header tc1 txt_upper">Контакты</p>
                            <ul class="items_wrapper">
                                <li class="item email">
                                    <span class="icon dib"><i class="fa fa-envelope-o fa-2x tc8"></i></span>
                                    <span class="content bold tc8">{{ Html::obfuscate('HELLO@SPHERED.COM.UA') }}</span>
                                </li>
                                <li class="item">
                                    <a class="icon dib" target="_blank" rel="nofollow" href="http://www.facebook.com/sphered.com.ua" title="Страница Sphered на Facebook">
                                        <i class="fa fa-facebook-square fa-lg tc8 fb_cont"></i>
                                    </a>
                                    <a class="icon dib" target="_blank" rel="publisher" href="http://plus.google.com/+SpheredUa" title="Страница Sphered в Google+">
                                        <i class="fa fa-google-plus-square fa-lg tc8 gp_cont"></i>
                                    </a>
                                    <a class="icon dib" target="_blank" rel="nofollow" href="http://www.pinterest.com/sphered" title="Страница Sphered в Pinterest">
                                        <i class="fa fa-pinterest-square fa-lg tc8 pi_cont"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="span10 offset1">
                    <div class="copy tc10 left">&copy; 2012-2016 SPHERED</div>
                    <div class="desing tc10 right">
                        POWERED BY <a class="tc11" target="_blank" href="http://thetalab.tk/">THETA LAB</a>
                        &nbsp;&#8226;&nbsp;
                        НАШИ ДРУЗЬЯ - <a class="tc11" target="_blank" href="https://funtime.kiev.ua">FUNTIME KIEV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="hide" href="https://plus.google.com/104795813912758431648?rel=author">Sphered</a>
    <a class="hide" href="https://gulchuk.com">Gulchuk - Web Developer</a>
</footer>