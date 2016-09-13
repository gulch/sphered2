@include('backend._partials.errorsmessage')

<div class="field">
    {!! Form::label('alt','Описание') !!}
    {!! Form::text('alt',null, ['placeholder' => 'Введите описание (alt атрибут)']) !!}
</div>
<div id="photo_segment" class="ui segment photos">
    <div id="ph_photo_upload" class="content pointer">
        <div class="center">
            <h3 class="ui icon header center aligned">
                <i class="icon circular emphasized photo"></i>
                Перетащите сюда изображение
            </h3>
        </div>
    </div>

    <input id="photo_input" type="file" class="hide" accept="image/*">

    <div id="image_preview" class="ui segment @if(!isset($image)) hide @endif">
        @if(isset($image))
            <img class="ui centered image" src="{{ config('app.thumb_image_upload_path') . $image->path }}">
        @else
            <img class="ui centered image">
        @endif
    </div>
</div>
<input type="hidden" name="path" @if(isset($image)) value="{{ $image->path }}" @endif>

{!! Form::submit('Сохранить',['class' => 'ui submit primary button']) !!}
<a class="ui button" href="{{ url(config('app.admin_segment_name').'/images') }}">Отмена</a>

<script>
    $(document).ready(function () {

        var tests = {
                    filereader: typeof FileReader != 'undefined',
                    dnd: 'draggable' in document.createElement('span'),
                    formdata: !!window.FormData
                },
                acceptedTypes = {
                    'image/png': true,
                    'image/jpeg': true,
                    'image/gif': true
                };
        var photo_segment = document.getElementById('ph_photo_upload');

        if(photo_segment !== undefined) {
            photo_segment.onclick = function () {
                $("#photo_input").trigger('click');
                return false;
            };

            photo_segment.ondrop = function (e) {
                e.preventDefault();
                e.stopPropagation();
                sendFiles(e.dataTransfer.files);
            };

            photo_segment.ondragover = function () {
                return false;
            };
            photo_segment.ondragend = function () {
                return false;
            };

            photo_segment.ondropover = function (e) {
                e.stopPropagation();
                e.preventDefault();
                e.dataTransfer.dropEffect = 'copy';
            }
        }

        $('#photo_input').bind('change',function(){
            sendFiles(this.files);
        });

        function sendFiles(files)
        {
            if(files.length > 0)
            {
                var formData = tests.formdata ? new FormData() : null;
                if (formData)
                {
                    formData.append('image', files[0]);
                    formData.append('_token',$('input[name="_token"]').val());

                    var segment = $('#photo_segment');
                    segment.append("<div class=\"ui active inverted dimmer\"><div class=\"ui text loader\">Секундочку</div></div>");

                    $.ajax({
                        url: "/{{ config('app.admin_segment_name') }}/images/upload",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (result)
                        {
                            segment.find('.dimmer').remove();

                            if(result.success !== undefined)
                            {
                                $('input[name="path"]').val(result.path);
                                $('#image_preview').show().find('.image').attr('src', result.filelink);
                            }
                            else
                            {
                                if(result.message) {
                                    showErrorModalMessage(result.message);
                                }
                            }
                        }
                    });
                }

            }
        }
    });
</script>