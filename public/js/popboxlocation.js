$( document ).ready(function() {
    var element = $('.cart').find('[name="checkout"]');
    $.ajax({
        url: "https://5e400a17.ngrok.io/maps",
    }).done(function (data) {
        $(element).before('<div id="popboxLocationApp">' + data + '</div>');
    });
});