@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center py-4">
            <h2 class="h1">{{ __('main.about') }}</h2>
        </div>
        <div class="row">
            <div class="col-12 f-size-18 font-weight-normal">
                {!! __('main.about-desc') !!}
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-6">
                @include('contacts.dipshop')
            </div>
            <div class="col-6">
                @include('contacts.aerea')
            </div>
        </div>
    </div>
@endsection