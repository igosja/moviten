jQuery(document).ready(function ($) {
    $('#language-select').on('selectmenuselect', function () {
        $('#language-form').submit();
    });

    if ($('#form-success').length) {
        if ($('.overlay-forms').is(':visible')) {
            $('.form-thanks').show();
        }
        else{
            $('.overlay-forms').show();
            $('.form-thanks').show();
        }
    }

    $('.portfolio-more').on('click', function () {
        var button = $(this);
        var offset = button.data('offset');
        var category = button.data('id');
        var project_div = $('.uslugi-b');

        $.ajax({
            beforeSend: function () {
                button.hide();
            },
            url: '/portfolio/more/' + category + '?offset=' + offset,
            success: function (data) {
                project_div.append(data);
                $.ajax({
                    dataType: 'json',
                    url: '/portfolio/check/' + category + '?offset=' + offset,
                    success: function (data) {
                        if (true === data.remove) {
                            button.remove();
                        } else {
                            button.data('offset', data.offset);
                            button.show();
                        }
                    }
                });
            }
        });
    });
});