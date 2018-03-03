$(document).ready(function () {
    $('._price-add').click(function (e) {
        e.preventDefault();

        var $template = $('._price-template').html();
        var $priceCount = $('._prices ._price-item').length;
        $("._prices").append($template);
        $("._prices ._price-item:last-child").find('.price-name').attr('name', 'Config[prices]['+$priceCount+'][name]');
        $("._prices ._price-item:last-child").find('.price-description').attr('name', 'Config[prices]['+$priceCount+'][description]');
        $("._prices ._price-item:last-child").find('.price-value').attr('name', 'Config[prices]['+$priceCount+'][price]');
        $('._prices ._price-item:last-child ._close').click(function() {
            e.preventDefault();
            $(this).parents('._price-item').remove();
        });
    });
    $('._prices ._price-item ._close').click(function (e) {
        e.preventDefault();
        $(this).parents('._price-item').remove();
    })
});