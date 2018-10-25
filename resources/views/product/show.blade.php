@extends('layouts.app')

@section('content')
    {{--@include('_partials._banners')--}}
    @include('_partials._categories')
    <div class="container py-5">
        <div class="row">
            <div class="col-5 card pt-3">
                <img class="my-foto img-fluid px-1" src="{{ asset('uploads/large/'.$product->image) }}" alt="Card image cap">
            </div>
            <div class="col">
                <div class="row h-100">
                    <div class="col-12 mb-4">
                        <h2 class="text-center h1">{{ $product->name }}</h2>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach($product->properties as $property)
                                <div class="col-6 pl-4">
                                    <p class="mb-0">{{ $property->name }}</p>
                                </div>
                                <div class="col-6 text-right pr-4">
                                    <p class="mb-0 font-weight-bold">{{ $property->pivot->value }}</p>
                                </div>
                                <div class="col-12">
                                    <hr class="p-0 m-0 mb-2" style="border: 0; border-top: 2px solid rgba(0, 0, 0, 0.5);">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 mb-3 align-self-end">
                        <div class="row justify-content-around align-items-center">
                            <div class="col-auto text-capitalize font-weight-bold h3">{{ __('categories.'.$product->category->slug) }}</div>
                            @if(!Auth::guest())
                            <div class="col-auto">
                                <span class="h2 font-weight-bold">{{ number_format($product->price, 2) }}</span> <span class="currency h5">&euro;</span>
                            </div>
                                @endif
                        </div>
                    </div>
                    <div class="col-12 text-center align-self-end">
                        @include('_partials.buttons._add_to_cart', ['product' => $product])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <hr>
        <h3 class="text-center">{{ __('main.similar') }}</h3>
            @include('_partials._similar_slide', ['products' => $similars])

    </div>

    <div>
        <hr>
        <h3 class="text-center">{{ __('main.others') }}</h3>
            @include('_partials._similar_slide', ['products' => $products])
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