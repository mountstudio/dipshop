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

function updateHtml(res) {
    if (res.cart !== null) {
        $('#cart-qty').html(res.cart.totalQty);
    }
    let result = $('#cart-result').html(res.result);
    result.find('.to_cart').each(function (key, item) {
        registerAddToCart($(item));
    });
    result.find('.from_cart').each(function (key, item) {
        registerRemoveFromCart($(item));
    });
    result.find('.delete_from_cart').each(function (key, item) {
        registerDeleteFromCart($(item));
    });
}

//ADD TO CART

$('.to_cart').each(function (key, item) {
    registerAddToCart($(item));
});

function registerAddToCart(item) {
    item.click(function (e) {
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
}

//REMOVE FROM CART

$('.from_cart').each(function (key, item) {
    registerRemoveFromCart($(item));
});

function registerRemoveFromCart(item) {
    item.click(function(e) {
        e.preventDefault();
        let btn = $(e.currentTarget);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/remove-from-cart',
            data: {
                'product_id': btn.data('id')
            },
            type: 'POST',
            success: function (res) {
                console.log(res);
                updateHtml(res);
            },
            error: function () {
                console.log('error');
            }
        });
    })
}

//DELETE FROM CART

$('.delete_from_cart').each(function (key, item) {
    registerDeleteFromCart($(item));
});

function registerDeleteFromCart(item) {
    item.click(function(e) {
        e.preventDefault();
        let btn = $(e.currentTarget);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/delete-from-cart',
            data: {
                'product_id': btn.data('id')
            },
            type: 'POST',
            success: function (res) {
                updateHtml(res);
            },
            error: function () {
                console.log('error');
            }
        });
    })
}