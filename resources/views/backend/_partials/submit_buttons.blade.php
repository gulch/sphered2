<div class="field">
    <a id="save-button"
       data-content="Просто сохранить не закрывая страницу. Удобно при создании большой публикации, периодично сохраняя результаты работы."
       data-variation="tiny"
       class="ui green large button">Сохранить</a>
    <a id="save-n-close-button" class="ui olive large button">Сохранить и закрыть</a>
    <div class="ui message hide save-message"></div>
</div>

<script>
    function initSubmitButtons() {
        if (typeof jQuery !== 'undefined') {
            activateSubmitButton();
        } else {
            setTimeout(initSubmitButtons, 200);
        }
    }
    initSubmitButtons();

    function activateSubmitButton() {
        var send_func = function ($btn, do_redirect) {
            if (typeof do_redirect == "undefined") {
                do_redirect = 0;
            }
            var form = $btn.closest('form');
            form.append("<div class=\"ui active inverted dimmer\"><div class=\"ui loader\"></div></div>");

            var form_data = form.serialize();
            form_data += '&do_redirect=' + do_redirect;

            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form_data,
                dataType: "json",
                timeout: 10000,
                success: function (result) {
                    if (result.success == 1) {
                        if (result.redirect) {
                            window.location.href = result.redirect;
                        }
                        if(result.id) {
                            if(!form.find('input[name="id"]').length) {
                                $('<input>').attr({
                                    type: 'hidden',
                                    value: result.id,
                                    name: 'id'
                                }).appendTo('form');
                            }
                        }
                    }
                    if (result.message) {
                        form.find('.save-message').html(result.message).removeClass('hide');
                    }
                    form.find('.dimmer').remove();
                },
                error: function (request, status, err) {
                    if (status == "timeout") {
                        showErrorModalMessage("Не удалось выполнить действие. Возможно нет доступа к интернету.");
                    } else {
                        showErrorModalMessage("Непредвиденная ошибка. Попробуйте, пожалуйста, еще раз.");
                    }
                    form.find('.dimmer').remove();
                }
            });
        }

        $('#save-button').click(function () {
            send_func($(this), 0);
        });

        $('#save-n-close-button').click(function () {
            send_func($(this), 1);
        });
    }
</script>