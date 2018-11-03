@extends('layouts.app')

@section('content')

    {{--@include('_partials._banners')--}}
    @include('_partials._categories', ['fixed' => true])

    <div class="container w-100 py-5 border-bottom">
        @include('_partials._filters')
    </div>

    <div class="container py-4">
        @include('product.index')
    </div>

@endsection