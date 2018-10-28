@extends('layouts.app')
@section('title', 'Оформление заказа')
@section('content')
    <div class="container">
        <h1 class="my-5">{{__('cart.checkouting')}}</h1>
        <h4 class='mb-5'>{{__('cart.order-info')}}</h4>
        <div id="cart-result" class="order-info"></div>

        <form action="/order" method="post">
            @csrf
            <div class="row">
                <div class="col d-flex justify-content-end mx-auto mt-3">
                    <button type="submit" class="btn btn-outline-dark ali my-3">{{ __('cart.checkout')  }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection