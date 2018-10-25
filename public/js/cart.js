$.ajax({
    url: '/get-cart',
    type: 'GET',
    success: function (res) {
        updateHtml(res);
    },
    error: function () {
        console.log('error');
    }
});

$('.to_cart').click(function (e) {
    e.preventDefault();
    let btn = $(e.currentTarget);

    let successSpan = btn.find('.success-cart-span');
    let toCartSpan = btn.find('.to-cart-span');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/add-to-cart',
        data: {
            'product_id': btn.data('id')
        },
        type: 'POST',
        success: function (res) {
            updateHtml(res);
            updateBtns();
        },
        error: function () {
            console.log('error');
        }
    });

    function updateBtns() {
        successSpan.fadeIn(0, function () {
            btn.addClass('px-5');
        }).delay(5000).fadeOut(0, function () {
            btn.removeClass('px-5');
        });
        toCartSpan.fadeOut(0).delay(5000).fadeIn(0);
    }
});

function updateHtml(res) {
    if (res.cart !== null) {
        $('#cart-qty').html(res.cart.totalQty);
    }
    $('#cart-result').html(res.result);
}