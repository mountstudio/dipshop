$('.to_cart').click(function (e) {
    e.preventDefault();

    let btn = $(e.currentTarget);

    console.log(btn);

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
            console.log(res);
            successSpan.fadeIn(0).delay(5000).fadeOut(0);
            toCartSpan.fadeOut(0).delay(5001).fadeIn(0);
        },
        error: function () {
            console.log('error');
        }
    });
});