@extends('layouts.app')

@section('content')
    @include('_partials._categories', ['fixed' => true])

    <div class="container py-5">
       <h3 class="text-center">{{ __('main.search-results') }} ({{ $products->count()  }})</h3>
        @include('product.index')
    </div>

    <div>
        <hr>
        <h3 class="text-center">{{ __('main.others') }}</h3>
        @include('_partials._similar_slide', ['products' => $products])
    </div>

@endsection