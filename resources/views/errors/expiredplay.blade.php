<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta name="robots" content="noindex,nofollow">
        <title>Expired :: Sphered Play</title>
        <meta charset="utf-8">
        <meta name="author" content="Sphered">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        @include('frontend._partials.assets.icons')
        @include('frontend._partials.assets.styles')
    </head>
    <body>
        <div class="main_wrapper">
            <div class="expired_page container">
                <div class="row-fluid">
                    <div class="content span12">
                        <h1 class="error tc1 bold fa">&#xf03d;</h1>
                        <h2 class="err_msg bold">Вставка для домена {{ $ref_domain }} отключена.</h2>
                        <h3 class="err_msg bold">Чтобы просмотреть контент, перейдите по
                            <a class="tc9" target="_blank" href="{{ $item_url }}">ссылке</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend._partials.counters')
    </body>
</html>