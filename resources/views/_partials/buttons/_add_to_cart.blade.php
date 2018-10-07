<p class="btn btn-success shadow-lg font-weight-light px-5 cart mb-3 to_cart" data-id="{{ $product->id }}"  data-toggle="tooltip" data-placement="bottom" title="{{__('main.cartnotwork')}}">{{--<span class="to-cart-span f-size-22 transition-1000">--}}{{__('main.addtocart')}}{{--</span>--}}{{--<span class="success-cart-span transition-1000"><i class="fas fa-2x fa-check"></i></span>--}}</p>

@prepend('scripts')

    <script src="{{ asset('js/cart.js') }}"></script>

@endprepend