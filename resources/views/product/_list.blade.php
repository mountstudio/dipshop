<div class="row">
    @foreach($products as $product)
        <div class="col-3 mb-4">
            <div class="card hover-shadow transition-500 border pt-3" style="border: 3px solid #dee2e6 !important;">
                <img class="card-img-top px-1" src="{{ asset('uploads/'.$product->image) }}" alt="Card image cap">
                <div class="card-body d-flex px-2 pb-1">
                    <div class="text-capitalize mr-auto font-weight-bold">{{ $product->category->name }}</div>
                </div>
                <div class="card-body px-2 pb-0 pt-1 d-flex">
                    <div class="card-title h5 mr-auto" style="min-height: 64px;">{{ $product->name }}</div>
                    <div class="card-title ml-auto font-weight-bold text-right" style="min-width: 70px;"><span class="h4">{{ number_format($product->price, 2) }}</span> &euro;</div>
                </div>
                <div class="card-body px-0 pb-0 pt-2 text-center">
                    <p class="btn btn-success shadow-lg font-weight-light cart mb-3"  data-toggle="tooltip" data-placement="bottom" title="Корзина временно не доступна">В корзину</p>
                </div>
            </div>
        </div>
    @endforeach


</div>

@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        {{ $products->appends(request()->query())->links() }}
    </div>
@endif

