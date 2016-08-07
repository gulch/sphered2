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

$(document).ready(function () {

    $('#translit_button').click(function () {
        var title = $('input[name="title"]').val();
        if (title.length) {
            $('input[name="slug"]').val(toTranslit(title).toLowerCase());
        }
    });

    putCount($('textarea[name="seo_keywords"]'));
    putCount($('textarea[name="seo_description"]'));
    putCount($('input[name="seo_title"]'));

    $('textarea[name="seo_keywords"], textarea[name="seo_description"], input[name="seo_title"]').on('keyup', function () {
        var $elem = $(this);
        putCount($elem);
    });
});

