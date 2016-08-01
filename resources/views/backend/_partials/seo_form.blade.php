<h3 class="ui top attached header">
    <i class="announcement icon"></i>
    SEO
</h3>
<div class="ui bottom attached segment">
    <div class="field">
        <label for="seo_title">
            Мета заголовок
            <span class="ui label counter">---</span>
        </label>
        <div class="ui icon info message">
            <i class="info circle icon"></i>
            <div class="content">
                Мета заголовок (тег "title") должен быть информативными и краткими (~55-80 символов)
                <br>
                Подробнее - <a target="_blank" href="https://support.google.com/webmasters/answer/35624?hl=ru&rd=1#3">https://support.google.com/webmasters/answer/35624?hl=ru&rd=1#3</a>
            </div>
        </div>
        {!! Form::text('seo_title',null) !!}
    </div>

    <div class="ui hidden divider"></div>

    <div class="two fields">
        <div class="field">
            <label for="seo_description">
                Мета описание
                <span class="ui label counter">---</span>
            </label>
            <div class="ui icon info message">
                <i class="info circle icon"></i>
                <div class="content">
                    Мета описание ("description") должно содержать информативное и краткое (~160 символов) описание содержания веб страницы
                    <br>
                    Подробнее - <a target="_blank" href="https://support.google.com/webmasters/answer/35624?hl=ru&rd=1#1">https://support.google.com/webmasters/answer/35624?hl=ru&rd=1#1</a>
                </div>
            </div>
            {!! Form::textarea('seo_description',null) !!}
        </div>
        <div class="field">
            <label for="seo_keywords">
                Ключевые слова
                <span class="ui label counter">---</span>
            </label>
            <div class="ui icon info message">
                <i class="info circle icon"></i>
                <div class="content">
                    Здесь можно составить список основных ключевых слов и словоформ, КОТОРЫЕ ВСТРЕЧАЮТСЯ НА СТРАНИЦЕ.
                    <br>
                    Добавлять ключевые слова - это скорее рекомендация.
                    <br>
                    Подробнее - <a target="_blank" href="http://googlewebmastercentral.blogspot.com/2009/09/google-does-not-use-keywords-meta-tag.html">http://googlewebmastercentral.blogspot.com/2009/09/google-does-not-use-keywords-meta-tag.html</a>
                </div>
            </div>
            {!! Form::textarea('seo_keywords',null) !!}
        </div>
    </div>
</div>