@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-6 card pt-3">
                <img class="my-foto card-img-top px-1" src="{{ asset('uploads/'.$product->image) }}" alt="Card image cap">
            </div>
            <div class="col-6">
                    <div class="card-body d-flex px-2 pb-1">
                    <div class="text-capitalize mr-auto font-weight-bold">{{ __('categories.'.$product->category->slug) }}</div>
                    <div class="card-title ml-auto font-weight-bold text-right" style="min-width: 70px;"><span class="h5">{{ number_format($product->price, 2) }}</span> &euro;</div>
                    </div>
                    <div class="card-body px-2 pb-0 pt-1 d-flex">
                    <div class="card-title h6 mr-auto" style="min-height: 64px;">{{ $product->name }}</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-2 text-center">
                    <p class="btn btn-success shadow-lg font-weight-light cart mb-3 to_cart" data-id="{{ $product->id }}"  data-toggle="tooltip" data-placement="bottom" title="{{__('main.cartnotwork')}}">{{__('main.addtocart')}}</p>
                    </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')

    <script>
        jQuery(function(){

            $(".my-foto").imagezoomsl({

                zoomrange: [3, 3]
            });
        });
    </script>

@endpush