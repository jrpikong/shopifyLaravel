$( document ).ready(function() {
    var element = $('.cart').find('[name="checkout"]');
    $.ajax({
        url: "https://91e2f64f.ngrok.io/maps",
    }).done(function (data) {
        $(element).before('<div id="popboxLocationApp">' + data + '</div>');
    });
});