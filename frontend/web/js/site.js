jQuery(document).ready(function ($) {
    $('#language-select').on('selectmenuselect', function () {
        $('#language-form').submit();
    });

    $('.portfolio-more').on('click', function () {
        var page = $(this).data('page');
        var id = $(this).data('id');

        $.ajax({
            url: '/portfolio/more/' + id + '?page=' + page,
            dataType: 'json',
            success: function (data) {
                $('.uslugi-b').append(data.list);
                if (data.more) {
                    page++;
                    $('.portfolio-more').data('page', page);
                } else {
                    $('.portfolio-more').hide();
                }
            }
        });
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
});