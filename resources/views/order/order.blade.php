@extends('layouts.app')
@section('title', 'Оформление заказа')
@section('content')
    <div class="container">
        <h1 class="my-5">{{__('cart.checkouting')}}</h1>
        <h4 class='mb-5'>{{__('cart.order-info')}}</h4>
        <div id="cart-result" class="order-info"></div>

            {{--@if($products)--}}
                {{--<span class="d-none">{{ $i = 0  }}</span>--}}
                {{--<table class="table table-bordered mb-0">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th class="text-center" scope="col">№</th>--}}
                        {{--<th class="text-center" scope="col">{{__('cart.image')}}</th>--}}
                        {{--<th class="text-center" scope="col">{{__('cart.name')}}</th>--}}
                        {{--<th class="text-center" scope="col">{{__('cart.price')}}</th>--}}
                        {{--<th class="text-center" scope="col">{{__('cart.count')}}</th>--}}
                        {{--<th class="text-center" scope="col">{{__('cart.summ')}}</th>--}}
                        {{--<th class="text-center" scope="col">{{__('cart.action')}}</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                        {{--@foreach($products as $product)--}}
                            {{--<tr>--}}
                                {{--<th scope="row">{{$i + 1}}</th>--}}
                                {{--<td class="p-2"><img class="img-fluid" width="70" height="70" src="{{asset('uploads/small/' . $product['item']->image) }}"/></td>--}}
                                {{--<td class="align-middle"><span class="font-weight-bold">{{$product['item']->name}}</span><br><b>{{__('categories.' . $product['item']->category->slug)}}</b></td>--}}
                                {{--<td class="align-middle">--}}
                                    {{--<div class="d-flex align-items-center">--}}
                                        {{--<span class="font-weight-bold ml-1">{{ number_format($product['item']->price, 2)  }} &euro;</span>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                                {{--<td class="align-middle">--}}
                                    {{--<p class="btn btn-danger m-0 font-weight-bold from_cart" data-id="{{$product['item']->id}}">-</p>--}}
                                    {{--<span class="mx-1 font-weight-bold text-center" style="min-width: 13px;">{{$product['qty']}}</span>--}}
                                    {{--<p class="btn btn-success m-0 font-weight-bold to_cart" data-id="{{$product['item']->id}}">+</p>--}}
                                {{--</td>--}}
                                {{--<td class="align-middle">--}}
                                    {{--<span class="font-weight-bold ml-1">{{$product['qty'] * number_format($product['item']->price, 2)}} &euro;</span>--}}
                                {{--</td>--}}
                                {{--<td class="align-middle">--}}
                                    {{--<p class="btn btn-danger m-0 font-weight-bold delete_from_cart" data-id="{{$product['item']->id}}">X</p>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--<span class="d-none">{{$i++}}</span>--}}
                        {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--@endif--}}
        <form>
            <input type="hidden" value="{{ Session::get('cart')->totalPrice }}" name="totalPrice">
            <input type="hidden" value="{{ Session::get('cart')->realPrice }}" name="summ">
            <div class="row">
                <div class="col d-flex justify-content-end mx-auto mt-3">
                    <button type="submit" class="btn btn-outline-dark ali my-3">{{ __('cart.checkout')  }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection