function toTranslit(text) {
    return text.replace(/([а-яё])|([\s_-])|([^a-z\d])/gi,
        function (all, ch, space, words, i) {
            if (space || words) {
                return space ? '-' : '';
            }
            var code = ch.charCodeAt(0),
                index = code == 1025 || code == 1105 ? 0 :
                    code > 1071 ? code - 1071 : code - 1039,
                t = ['yo', 'a', 'b', 'v', 'g', 'd', 'e', 'zh',
                    'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
                    'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh',
                    'shch', '', 'i', '', 'e', 'yu', 'ya'
                ];
            return t[index];
        });
}

function putCount($elem) {
    if ($elem.length > 0) {
        $elem.closest('.field').find('.counter').html($elem.val().length);
    }
}

function createAndShowImageModal(key, type) {
    $(document.body).append(
        '<div id="image_choose_modal" class="ui modal">' +
        '<input name="image_chooser_key" type="hidden" value="' + key + '">' +
        '<i class="close icon"></i>' +
        '<div class="content">' +
        '<div class=\"ui active inverted dimmer\"><div class=\"ui loader\"></div></div>' +
        '</div>' +
        '</div>');

    $modal = $('#image_choose_modal');
    $modal.modal({
        allowMultiple: false,
        blurring: false,
        closable: true,
        duration: 100,
        onHidden: function () {
            $('#image_choose_modal').html('').remove();
        }
    }).modal('show');

    $.ajax({
        type: "POST",
        url: '/admin/images/all/list',
        data: {type: type},
        dataType: "json",
        timeout: 10000,
        success: function (result) {
            if (result.success == 1) {
                if (result.content) {
                    $modal.find('.content').html(result.content);
                    $modal.modal('refresh');

                    $('#image_choose_modal [data-image-id]').click(function () {
                        var elem = $(this);
                        var image_id = elem.attr('data-image-id');
                        if (image_id !== undefined) {
                            var key = $('#image_choose_modal input[name=image_chooser_key]').val();
                            $('#image_fieldname_' + key).val(image_id);
                            var image_preview = $('#image_preview_' + key);
                            image_preview.find('img').attr('src', elem.find('img').attr('src'));
                            image_preview.show();
                            $('#image_choose_modal').modal('hide');
                            $('#image_choose_modal').html('').remove();
                        }
                    });

                }
            } else {
                $modal.find('.dimmer').remove();
            }
        },
        error: function (request, status, err) {
            if (status == "timeout") {
                showErrorModalMessage("Не удалось выполнить действие. Возможно нет доступа к интернету.");
            } else {
                showErrorModalMessage("Непредвиденная ошибка. Попробуйте, пожалуйста, еще раз.");
            }
            $modal.find('.dimmer').remove();
        }
    });
}


/* DOCUMENT READY */
$(document).ready(function () {

    $('#translit_button').click(function () {
        var title = $('input[name="title"]').val();
        if (title.length) {
            $('input[name="slug"]').val(toTranslit(title).toLowerCase());
        }
    });

    var checkboxes = $('.ui.checkbox');
    checkboxes.length && checkboxes.checkbox();

    var dropdowns = $('.ui.dropdown');
    dropdowns.length && dropdowns.dropdown();

    putCount($('textarea[name="seo_keywords"]'));
    putCount($('textarea[name="seo_description"]'));
    putCount($('input[name="seo_title"]'));

    $('textarea[name="seo_keywords"], textarea[name="seo_description"], input[name="seo_title"]').on('keyup', function () {
        var $elem = $(this);
        putCount($elem);
    });
});

