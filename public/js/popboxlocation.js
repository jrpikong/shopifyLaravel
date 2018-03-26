$( document ).ready(function() {
    var element = $('.cart').find('[name="checkout"]');
    $.ajax({
        url: "https://shopify.popbox.asia/maps",
    }).done(function (data) {
        $(element).before('<div id="popboxLocationApp">' + data + '</div>');
    });
});