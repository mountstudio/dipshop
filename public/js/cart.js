$('.to_cart').click(function (e) {
    e.preventDefault();

    let btn = $(e.target);

    console.log(btn);

    // let successSpan = btn.find('.success-cart-span');
    // let toCartSpan = btn.find('.to-cart-span');

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    //
    // $.ajax({
    //     url: '/add-to-cart',
    //     data: {
    //         'product_id': btn.data('id')
    //     },
    //     type: 'POST',
    //     success: function (res) {
    //         console.log(res);
    //     },
    //     error: function () {
    //         console.log('error');
    //     }
    // });
});