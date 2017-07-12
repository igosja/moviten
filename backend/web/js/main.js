jQuery(document).ready(function () {
    $('.ajax-toogle').on('change', function () {
        $.ajax({
            url: $(this).data('url')
        });
    });

    $('.sorting-table').rowSorter({
        handler: '.glyphicon-resize-vertical',
        onDrop: function (tbody, row, new_index, old_index) {
            var url = $(row).data('url');
            $.ajax({
                url: url + '?order_new=' + new_index + '&order_old=' + old_index
            });
        }
    });
});