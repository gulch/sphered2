<div class="ui center aligned segment">
    <div id="image_segment_{{ $key }}" class="ui segment photos">
        <div id="image_upload_module_{{ $key }}" class="pointer">
            <div class="center">
                <h5 class="ui icon header center aligned">
                    <i class="icon circular emphasized photo"></i>
                    Перетащите сюда изображение или кликните здесь
                </h5>
            </div>
        </div>
        <div id="image_preview_{{ $key }}" class="ui segment @if(!isset($image)) hide @endif preview-uploaded-image">
            <div class="ui image dimmable">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="bottom">
                            <div class="ui mini red button">
                                <i class="trash icon"></i>Удалить
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($image))
                    <img class="ui centered image" src="{{ $path . $image->path }}">

                @else
                    <img class="ui centered image">
                @endif
            </div>
        </div>
        <input id="image_input_{{ $key }}" type="file" class="hide" accept="image/*">
        <input id="image_fieldname_{{ $key }}" type="hidden" name="{{ $field_name }}" @if($id) value="{{ $id }}" @endif>
    </div>
    <div class="ui horizontal divider">
        или
    </div>
    <div id="image_choose_btn_{{ $key }}" class="ui labeled icon button">
        Выберите из существующих
        <i class="counterclockwise rotated sign out icon"></i>
    </div>
</div>

{{-- Image choose modal form --}}
<div id="image_choose_modal_{{ $key }}" class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Выбрать изображение
    </div>
    <div class="content">

    </div>
</div>

<script>
    $(document).ready(function () {
        var key = '{{ $key }}';

        (function () {
            var tests = {
                filereader: typeof FileReader != 'undefined',
                dnd: 'draggable' in document.createElement('span'),
                formdata: !!window.FormData
            };
            var acceptedTypes = {
                'image/png': true,
                'image/jpeg': true,
                'image/gif': true
            }

            var image_module = document.getElementById('image_upload_module_' + key);

            if (image_module !== undefined) {
                image_module.onclick = function () {
                    $("#image_input_" + key).trigger('click');
                    return false;
                }

                image_module.ondrop = function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    sendFiles(e.dataTransfer.files);
                }

                image_module.ondragover = function () {
                    return false;
                };
                image_module.ondragend = function () {
                    return false;
                };

                image_module.ondropover = function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'copy';
                }
            }

            $('#image_input_' + key).bind('change', function () {
                sendFiles(this.files);
            });

            function sendFiles(files) {
                if (files.length > 0) {
                    var formData = tests.formdata ? new FormData() : null;
                    if (formData) {
                        formData.append('image', files[0]);
                        formData.append('_token', $('input[name="_token"]').val());
                        formData.append('setup', '{{ $setup }}');

                        var segment = $('#image_segment_' + key);
                        segment.append("<div class=\"ui active inverted loading dimmer\"><div class=\"ui text loader\">Секундочку</div></div>");

                        $.ajax({
                            url: "/{{ config('app.admin_segment_name') }}/images/upload/getid",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            success: function (result) {
                                segment.find('.loading.dimmer').remove();

                                if (result.success !== undefined) {
                                    $('input[name="{{ $field_name }}"]').val(result.id);
                                    $('#image_preview_' + key).removeClass('hide').show().find('.image').attr('src', result.filelink);
                                }
                                else {
                                    if (result.message) {
                                        showErrorModalMessage(result.message);
                                    }
                                }
                            }
                        });
                    }

                }
            }
        })();

        $('#image_preview_' + key).find('.image').dimmer({on: 'hover'});

        $('#image_preview_' + key + ' .dimmer .button').click(function () {
            $('input[name="{{ $field_name }}"]').val('');
            $('#image_preview_' + key).hide().find('.image').removeAttr('src');
        });

        $('#image_choose_btn_' + key).click(function () {
            var $modal = $('#image_choose_modal');
            if ($modal.length > 0) {
                $modal.modal('show');
                $modal.find('input[name=image_chooser_key]').val(key);
            } else {
                createAndShowImageModal(key, '{{ $setup }}');
            }
        });
    });
</script>