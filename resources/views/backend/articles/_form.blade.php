<div class="inline field">
    <?php
    if (isset($article)) {
        $published_date = $article->published_at->format('d.m.Y H:i');
    } else {
        $published_date = date('d.m.Y H:i');
    }
    ?>
    {!! Form::label('published_at', 'Дата публикации*') !!}
    {!! Form::text('published_at', $published_date, ['placeholder' => 'Дата публикации', 'id' => 'datetimepicker', 'readonly' => true]) !!}
</div>
<div class="ui divider"></div>

<div class="fields center aligned">
    <div class="eight wide field">
        {!! Form::label('name','Название*') !!}
        {!! Form::text('title',null) !!}
    </div>
    <div class="one wide field">
        <label>Транслит</label>

        <div id="translit_button" class="ui animated fluid button" tabindex="0">
            <div class="visible content">
                <i class="translate icon"></i>
            </div>
            <div class="hidden content">
                <i class="right arrow icon"></i>
            </div>
        </div>
    </div>
    <div class="seven wide field">
        {!! Form::label('slug','Алиас*') !!}
        {!! Form::text('slug',null, ['class' => 'slug-field']) !!}
    </div>
</div>

<div class="field" id="content">
    {!! Form::label('main_text','Основной текст') !!}
    {!! Form::textarea('content', null, ['class' => 'redactor']) !!}
</div>

<div class="field">
    {!! Form::label('image_id','Главное изображение') !!}
    @include('admin._image_upload_or_choose', [
        'field_name' => 'image_id',
        'id' => isset($article) ? $article->image_id : null,
        'image' => isset($article) ? $article->image : null,
        'key' => uniqid(),
        'setup' => 'blog',
        'path' => config('app.uploaded_bg_image_path')
        ])
</div>

<div class="field" id="seo">
    @include('admin._seo_form')
</div>

@include('admin._submit_buttons')
{{-- DateTimePicker --}}
<link rel="stylesheet" type="text/css" href="{{ url(config('app.plugins_path')) }}/datetimepicker/jquery.datetimepicker.css">
<script src="{{ url(config('app.plugins_path')) }}/datetimepicker/jquery.datetimepicker.full.js"></script>

<script>
    $(document).ready(function () {
        $.datetimepicker.setLocale('ru');
        $('#datetimepicker').datetimepicker({
            format: 'd.m.Y H:i',
            inline: false,
            lang: 'ru'
        });
    });
</script>
@include('admin._redactor', ['setup' => 'redactor_blog'])