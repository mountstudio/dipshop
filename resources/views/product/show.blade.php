@extends('layouts.app')

@section('content')
    @include('_partials._banners')
    @include('_partials._categories')
    <div class="container py-5">
        <div class="row">
            <div class="col-5 card pt-3">
                <img class="my-foto img-fluid px-1" src="{{ asset('uploads/'.$product->image) }}" alt="Card image cap">
            </div>
            <div class="col">
                <div class="row justify-content-center mb-4">
                    <h2 class="">{{ $product->name }}</h2>
                </div>
                <div class="row mb-3">
                    <div class="col-auto text-capitalize font-weight-bold">{{ __('categories.'.$product->category->slug) }}</div>
                </div>
                <div class="row">
                    <div class="col-auto font-weight-bold">
                        <span class="h2">{{ number_format($product->price, 2) }}</span> &euro;
                    </div>
                </div>
                <div class="text-center position-absolute" style="bottom: 0; right: 0; left: 0;">
                    <p class="btn btn-success shadow-lg font-weight-light cart mb-3 to_cart" data-id="{{ $product->id }}"  data-toggle="tooltip" data-placement="bottom" title="{{__('main.cartnotwork')}}">{{__('main.addtocart')}}</p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <hr>
        <h3 class="text-center">{{ __('main.similar') }}</h3>
            @include('_partials._similar_slide')

    </div>

    <div>
        <hr>
        <h3 class="text-center">{{ __('main.others') }}</h3>
        <div id="products" class="container my-5">
            @include('product.index')
        </div>
    </div>


@endsection
@push('scripts')
    <script src="{{ asset('js/jquery-1.8.2.min.js') }}"></script>
    <script src="{{ asset('js/zoomsl-3.0.min.js') }}"></script>
    <script>
        $(function(){
            $(".my-foto").imagezoomsl({
                zoomrange: [3, 3]
            });
        });
    </script>
@endpush