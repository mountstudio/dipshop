@foreach($products as $product)

    <div style="min-width: 220px" class="col-2 mb-4">
        <div class="card hover-shadow transition-500 border pt-3" style="border: 3px solid #dee2e6 !important;">
            <a class="text-dark" href="{{ route('product.show', $product->id) }}" style="text-decoration: none;">
            <img class="card-img-top px-1" src="{{ asset('uploads/'.$product->image) }}" alt="Card image cap">
            <div class="card-body d-flex px-2 pb-1">
                <div class="text-capitalize mr-auto font-weight-bold">{{ __('categories.'.$product->category->slug) }}</div>
                <div class="card-title ml-auto font-weight-bold text-right" style="min-width: 70px;"><span class="h5">{{ number_format($product->price, 2) }}</span> &euro;</div>
            </div>
            <div class="card-body px-2 pb-0 pt-1 d-flex">
                <div class="card-title h6 mr-auto" style="min-height: 64px;">{{ $product->name }}</div>
            </div>
            </a>
            <div class="card-body px-0 pb-0 pt-2 text-center">
                @include('_partials.buttons._add_to_cart', ['product' => $product])
            </div>
        </div>
    </div>

@endforeach

