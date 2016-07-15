<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
</head>
<body style="margin: 0; padding: 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="10px" colspan="4" style="background: url('{{url('/')}}/img/stripe.png') repeat-x top left"></td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td width="24px">&nbsp;</td>
        <td width="280px" style="font-family: sans-serif; font-size: 56px; font-weight: bold; color: #a3bd44;">SPHERED</td>
        <td style="font-family: sans-serif; font-size: 19px; color: #6d6d6d;">ВСЕ О МУЛЬТИМЕДИЙНЫХ РЕШЕНИХ<br>НА ОСНОВЕ 3D ПАНОРАМ</b></td>
        <td width="24px">&nbsp;</td>
    </tr>
    <tr>
        <td width="24px">&nbsp;</td>

        <td colspan="2">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="79px">
                        <img src="{{ url('/') }}/assets/img/logo_48x48.png" width="48" height="48" alt="Sphered"/>
                    </td>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr style="font-family: sans-serif; font-size: 11px; font-weight: bold;">
                                <td>
                                    <b style="color: #9dc575;">E:</b>&nbsp;<a style="text-decoration: none; color: #313131;" href="mailto:hello@sphered.com.ua" alt="Написать письмо">hello@sphered.com.ua</a><br>
                                    <b style="color: #7adbfa;">W:</b>&nbsp;<a style="text-decoration: none; color: #313131;" href="https://sphered.com.ua/" target="_blank" alt="Наш веб-сайт">sphered.com.ua</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td width="24px">&nbsp;</td>
    </tr>
    <tr>
        <td width="24px" style="padding-top: 100px;">&nbsp;</td>
        <td colspan="2" style="vertical-align: bottom; font-family: sans-serif; font-size: 24px; color: #555555;">
            @yield('subject')
        </td>
        <td width="24px">&nbsp;</td>
    </tr>
    <tr>
        <td width="24px" style="padding-top: 24px">&nbsp;</td>
        <td colspan="2" style="text-align: justify; vertical-align: bottom; font-family: sans-serif; font-size: 16px; color: #555555;">
            @yield('bodytext')
        </td>
        <td width="24px">&nbsp;</td>
    </tr>
    <tr>
        <td width="24px" style="padding-top: 100px;">&nbsp;</td>
        <td colspan="2" width="40px" style="font-family: sans-serif; font-size: 11px; vertical-align: bottom; color: #525252;">
            Отслеживайте нас в социальных сетях:<br>
            <a href="https://www.facebook.com/sphered.com.ua" target="_blank">
                <img width="32" height="32" src="{{ url('/') }}/assets/img/fb32.png"/>
            </a>
            <a href="https://plus.google.com/+SpheredUa" target="_blank">
                <img width="32" height="32" src="{{ url('/') }}/assets/img/gp32.png"/>
            </a>
            <a href="https://www.pinterest.com/sphered/" target="_blank">
                <img width="32" height="32" src="{{ url('/') }}/assets/img/pin32.png"/>
            </a>
        </td>
        <td width="24px">&nbsp;</td>
    </tr>
    <tr>
        <td height="10px" colspan="4" style="background: url('{{ url('/') }}/assets/img/stripe.png') repeat-x top left"></td>
    </tr>
    <tr>
        <td width="24px">&nbsp;</td>
        <td colspan="2" style="font-family: sans-serif; font-size: 10px; vertical-align: bottom; color: #525252;">
            Если сообщение отображается некорректно, то нажмите «Показать картинки»
        </td>
        <td width="24px">&nbsp;</td>
    </tr>
</table>
</body>
</html>