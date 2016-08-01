function activateAjaxModelCallers() {
    if ($('[data-ajaxmodel-url]').length > 0) {
        $('[data-ajaxmodel-url]').click(function () {
            createAndShowAjaxModal($(this).data('ajaxmodel-url'), $(this).data())
        });
    }
}

function createAndShowAjaxModal(request_url, params) {
    if (request_url) {
        $(document.body).append(
            '<div id="ajax_modal" class="ui small modal">' +
            '<i class="close fi-remove icon"></i>' +
            '<div class="content">' +
            '<div class=\"ui active inverted dimmer\"><div class=\"ui loader\"></div></div>' +
            '</div>' +
            '</div>');

        $modal = $('#ajax_modal');
        $modal.modal({allowMultiple: false, closable: true}).modal('show');

        if (!params) {
            params = [];
        }

        $.ajax({
            type: "POST",
            url: '//' + window.location.hostname + '/' + request_url,
            dataType: "json",
            data: params,
            timeout: 10000,
            success: function (result) {
                if (result.success == 1) {
                    if (result.content) {
                        $modal.find('.content').html(result.content);
                        $modal.modal('refresh');
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
}

function activeFormSubmit() {
    $('.button.form-submit-btn').click(function () {
        var form = $(this).closest('form');
        form.append("<div class=\"ui active inverted dimmer\"><div class=\"ui loader\"></div></div>");
        $.post(form.attr('action'), form.serialize(), function (result) {
            if (result.success == 1) {
                form[0].outerHTML = '<div class="ui message">' +
                    '<h2 class="ui icon green header">' +
                    '<i class="fi-check icon"></i>' +
                    '<div class="content">Успешно!' +
                    '<div class="sub header">' + result.message + '</div>' +
                    '</div>' +
                    '</h2>' +
                    '</div>';
            } else {
                form.find('.message').html(result.message).removeClass('hide');
            }

            form.find('.dimmer').remove();
        }, "json");
    });
}

function activateDataAction() {
    $('span[data-action], a[data-action], div[data-action]').on('click', function () {
        var elem = $(this);
        var action = elem.attr('data-action');
        var action_name = elem.attr('data-action-name');
        var segment = elem.closest('div[data-action-element]');
        if (!segment.length) {
            segment = elem.closest('.segment');
        }
        /*var params = '_token=' + $('input[name="_token"]').val();*/
        var params = '_token=' + $('meta[name="csrf-token"]').attr('content');
        if (elem.attr('data-method')) params += '&_method=' + elem.attr('data-method');
        if (action) {
            segment.addClass('ui basic segment');
            segment.append("<div class=\"ui active inverted dimmer\"><div class=\"ui text loader\">Секундочку</div></div>");
            $.post(action, params, function (result) {
                if (result) {
                    segment.find('.dimmer').remove();

                    if (result.success !== undefined) {
                        switch (action_name) {
                            case 'remove':
                                segment.remove();
                                break;
                            case 'publish':
                                elem[0].outerHTML = '<i class="fi-check icon"></i>Опубликовано';
                                break;
                            case 'unpublish':
                                elem[0].outerHTML = '<i class="fi-check icon"></i>Снято с публикации';
                                break;
                        }
                    }
                    else {
                        showErrorModalMessage(result.message);
                    }
                }
            }, "json");
        }
    });
}

/* Модальный диалог ошибки */
function showErrorModalMessage(message, text, icon) {
    if (message == undefined) {
        message = 'Неизвестная ошибка';
    }
    if (icon == undefined) {
        icon = 'orange fi-warning';
    }
    if (text == undefined) {
        text = 'Ошибка';
    }
    var key = Math.floor(Math.random() * 1000);
    $(document.body).append(
        '<div id="errormodal_' + key + '" class="ui small modal">' +
        '<i class="fi-remove close icon"></i>' +
        '<div class="header"><i class="' + icon + ' circle middle big icon"></i>' + text + '</div>' +
        '<div class="content"><p>' + message + '</p></div>' +
        '<div class="actions">' +
        '<div class="ui large basic button">OK</div>' +
        '</div>' +
        '</div>');
    $('#errormodal_' + key).modal({allowMultiple: false}).modal('show');
    $('#errormodal_' + key + ' .button').click(function () {
        $(this).closest('.modal').modal('hide').remove();
    });
}

/* Показать Dimmer */
function showPageDimmer($id) {
    $('body').addClass('dimmed').addClass('dimmable');
    $id.dimmer('show');
}
/* Скрыть Dimmer */
function hidePageDimmer($id) {
    $id.dimmer('hide');
    $('body').removeClass('dimmed').removeClass('dimmable');
}

function initPopups() {
    /* Активация попапов */
    $('[data-title], [data-content]').length && $('[data-title], [data-content]').popup();
}

$(document).ready(function () {

    /* Закрывать Page Dimmer по нажатию клавиши ESC */
    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            if ($('.page.dimmer.active').length > 0) {
                hidePageDimmer($('.page.dimmer.active'));
            }
        }
    });

    /* Закрытие сообщения по клику на (х) кнопке закрытия */
    $('.message .close').length && $('.message .close').on('click', function () {
        $(this).parent().transition('scale out', 200, function () {
            this.remove();
        });
    });

    /* Активация Dropdown */
    $('.menu .dropdown').length && $('.menu .dropdown').dropdown();

    /* Активация чекбоксов */
    $('.ui.checkbox').length && $('.ui.checkbox').checkbox();

    initPopups();
    activeFormSubmit();
    activateDataAction();
    activateAjaxModelCallers();
});