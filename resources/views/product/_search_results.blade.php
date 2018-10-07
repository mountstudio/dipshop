@extends('layouts.app')

@section('content')
    @include('_partials._banners')
    @include('_partials._categories')

    <div class="container py-5">
        <h3 class="text-center">{{ __('main.search-results') }} ({{ $count  }})</h3>
       <div class="row">
           @include('product._list')
       </div>
    </div>

    <div>
        <hr>
        <h3 class="text-center">{{ __('main.others') }}</h3>
        @include('_partials._similar_slide', ['products' => $products])
    </div>


@endsection