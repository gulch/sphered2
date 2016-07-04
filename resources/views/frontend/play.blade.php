<html lang="uk">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{$item->itemUKR->title}}. {{$item->itemCategoryUKR->title}} - Sphered.com.ua</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <script type="text/javascript" src="{{URL::to('/').$item->path_to_files}}swfobject.js"></script>
    <script type="text/javascript">
        function hideUrlBar() {
            if (((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))))
            {
                container = document.getElementById("container");
                if (container) {
                    var cheight;
                    switch(window.innerHeight) {
                        case 208:cheight=268; break;
                        case 260:cheight=320; break;
                        case 336:cheight=396; break;
                        case 356:cheight=416; break;
                        case 424:cheight=484; break;
                        case 444:cheight=504; break;
                        default:
                            cheight=window.innerHeight;
                    }
                    if ((cheight) && ((container.offsetHeight!=cheight) || (window.innerHeight!=cheight))) {
                        container.style.height=cheight + "px";
                        setTimeout(function() { hideUrlBar(); }, 1000);
                    }
                }
            }
            document.getElementsByTagName("body")[0].style.marginTop="1px";
            window.scrollTo(0, 1);
        }
        window.addEventListener("load", hideUrlBar);
        window.addEventListener("resize", hideUrlBar);
        window.addEventListener("orientationchange", hideUrlBar);
    </script>
    <style type="text/css">
        html {
            height:100%;
        }
        body {
            height:100%;
            margin: 0px;
            overflow:hidden;
        }
        ::-webkit-scrollbar {
            background-color: rgba(0,0,0,0.5);
            width: 0.75em;
        }
        ::-webkit-scrollbar-thumb {
            background-color:  rgba(255,255,255,0.5);
        }
    </style>
</head>
<body>
    <script type="text/javascript" src="{{URL::to('/').$item->path_to_files}}pano2vr_player.js"></script>
    <script type="text/javascript" src="{{URL::to('/').$item->path_to_files}}skin.js"></script>
    <div id="container" style="width:100%;height:100%;">
        <p style="text-align: center">Цей контент потребує підтримку HTML5/CSS3, WebGL, або Adobe Flash Player.</p>
    </div>
    <script type="text/javascript">
        if (swfobject.hasFlashPlayerVersion("9.0.0")) {
            var flashvars = {};
            var params = {};
            params.quality = "high";
            params.bgcolor = "#ffffff";
            params.allowscriptaccess = "sameDomain";
            params.allowfullscreen = "true";
            var attributes = {};
            attributes.id = "pano";
            attributes.name = "pano";
            attributes.align = "middle";
            flashvars.skinxml="{{URL::to('/').$item->path_to_files}}skin.xml";
            flashvars.panoxml="{{URL::to('/').$item->path_to_files.$item->path_to_xml}}";
            params.base=".";
            swfobject.embedSWF(
                "{{URL::to('/').$item->path_to_files}}pano2vr_player.swf", "container",
                "100%", "100%",
                "9.0.0", "",
                flashvars, params, attributes);

        } else
        if (ggHasHtml5Css3D() || ggHasWebGL()) {
            pano=new pano2vrPlayer("container");
            skin=new pano2vrSkin(pano);
            pano.readConfigUrl("{{URL::to('/').$item->path_to_files.$item->path_to_xml}}");
            hideUrlBar();
        }
    </script>
    <noscript>
        <p><b>Увімкніть Javascript!</b></p>
    </noscript>
    @include('common.counters')
</body>
</html>