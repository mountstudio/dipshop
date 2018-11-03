@extends('layouts.app')

@section('content')

    {{--@include('_partials._banners')--}}
    @include('_partials._categories', ['fixed' => true])

    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <h2 class="h1">{{__('main.devpagetitle')}}</h2>
        </div>
        <div class="row justify-content-center">
            <p class="font-weight-normal h2">{{__('main.devpagetext')}}</p>
        </div>
    </div>

@endsection