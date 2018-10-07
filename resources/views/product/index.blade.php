<div class="row">
    @include('product._list')
</div>

@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        {{ $products->appends(request()->query())->links() }}
    </div>
@endif

@push('scripts')

    <script src="{{ asset('js/cart.js') }}"></script>

@endpush