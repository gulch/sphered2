@include('backend._partials.errorsmessage')

<div class="inline field">
    <div class="ui checkbox">
        {!! Form::checkbox('is_published', 1) !!}
        {!! Form::label('is_published','Опубликовать?') !!}
    </div>
</div>

<div class="fields center aligned">
    <div class="eight wide field">
        {!! Form::label('title','Название*') !!}
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
        {!! Form::text('slug',null) !!}
    </div>
</div>

<div class="field">
    {!! Form::label('content', 'Контент') !!}
    {!! Form::textarea('content', null, ['class' => 'wysiwyg-editor']) !!}
</div>

<div class="field">
    @include('backend._partials.seo_form')
</div>

@include('backend._partials.submit_buttons')

@include('backend._partials.editor')
