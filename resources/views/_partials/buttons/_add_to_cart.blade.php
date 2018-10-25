@if(Auth::user())
<p class="btn btn-success shadow-lg font-weight-light cart mb-3 to_cart" data-id="{{ $product->id }}"  data-toggle="tooltip" data-placement="bottom">
    <span class="to-cart-span">{{__('main.addtocart')}}</span>
    <span class="success-cart-span" style="display:none;"><i class="fas fa-check"></i></span>
</p>
@else
    <a class="btn btn-success shadow-lg font-weight-light cart mb-3" href="{{route('login')}}" data-id="{{ $product->id }}"  data-toggle="tooltip" data-placement="bottom">
        <span class="to-cart-span">{{__('main.addtocart')}}</span>
        <span class="success-cart-span" style="display:none;"><i class="fas fa-check"></i></span>
    </a>
@endif

