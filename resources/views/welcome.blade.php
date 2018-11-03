@extends('layouts.app')

@section('content')
{{--    @include('_partials._after_header')--}}
    {{--@include('_partials._big_banner')--}}
    @include('_partials._categories', ['fixed' => true])
{{--    @include('_partials._banners')--}}
    @include('_partials._ad_blocks')
    <hr>
    <div id="products" class="container my-5">
        @include('product.index')
    </div>


@endsection