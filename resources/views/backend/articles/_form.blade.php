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

<div class="field">
    {!! Form::label('content', 'Контент') !!}
    {!! Form::textarea('content', null, ['class' => 'wysiwyg-editor']) !!}
</div>

<div class="field">
    {!! Form::label('article_tags','Тэги') !!}

    @if(isset($article) && sizeof($article->tags))
        {!! Form::select('article_tags[]',
                     $tags,
                     $article->tags->lists('id')->all(),
                     ['multiple' => 'multiple', 'class' => 'ui search selection large dropdown']) !!}
    @else
        {!! Form::select('article_tags[]', $tags, null, ['multiple' => 'multiple', 'class' => 'ui search selection large dropdown']) !!}
    @endif
</div>

<div class="field">
    {!! Form::label('id__Image','Изображение') !!}
    @include('backend._partials.image_upload_or_choose', [
        'field_name' => 'id__Image',
        'id' => isset($article) ? $article->id__Image : null,
        'image' => isset($article) ? $article->image : null,
        'key' => uniqid(),
        'setup' => 'post',
        'path' => config('app.post_image_upload_path')
    ])
</div>

<div class="field" id="seo">
    @include('backend._partials.seo_form')
</div>

@include('backend._partials.submit_buttons')

@include('backend._partials.editor')