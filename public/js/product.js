
$(".btn_buy_product").click(function(e){
    e.preventDefault();

    $.ajax({
        url: '/product/' + $(this).attr("pid"),
        method: 'POST'
    }).then(function(res) {
        $(".cart_state").text("CART (" + res.cart + ")");
    });
});


/*var $container = $('.js-vote-arrows');
$container.find('a').on('click', function(e) {
    e.preventDefault();
    var $link = $(e.currentTarget);
    $.ajax({
        url: '/comment/10/vote/'+$link.data('direction'),
        method: 'POST'
    }).then(function(response) {
        $container.find('.js-vote-total').text(response.votes);
    });
});*/