$('.to_cart').click(function (e) {
    e.preventDefault();

    var btn = $(e.target);

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
        },
        error: function () {
            console.log('error');
        }
    });
});