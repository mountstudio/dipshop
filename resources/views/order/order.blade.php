@extends('layouts.app')
@section('title', 'Оформление заказа')
@section('content')
    <content>
        <div class="container">
            <h1 class="my-5">Оформление Заказа</h1>
            <h4 class='mb-5'>Информация о заказе</h4>
            <div class="order-info">
                @if($products)
                    <div class=" d-none d-lg-flex row text-center justify-content-lg-between p-3">
                        <div class="col-lg-1">
                            {{__('cart.image')}}
                        </div>
                        <div class="col-auto">
                            {{__('cart.name')}}
                        </div>
                        <div class="col-auto">
                            {{__('cart.price')}}
                        </div>
                        <div class="col-auto">
                            {{__('cart.count')}}
                        </div>
                        <div class="col-auto">
                            {{__('cart.summ')}}
                        </div>
                        <div class="col-auto">
                            {{__('cart.action')}}
                        </div>
                    </div>
                @endif
                @if($products)
                    @foreach($products as $product)
                        <div class="row align-items-center border bg-dark text-light rounded text-center p-3">
                            <div class="col-4 col-lg-2">
                                <div class="row">
                                    <div class="col">
                                        <img class="w-100" src="{{asset('uploads/small/' . $product['item']->image)}}" alt="" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-10">
                                <div class="row align-items-center justify-content-center justify-content-lg-between">
                                    <div class="col-12 col-md-auto col-lg-auto">
                                        {{ $product['item']->name }}
                                    </div>
                                    <div class="col-auto col-lg-auto d-none d-md-block">
                                        {{ $product['item']->price }} &euro;
                                    </div>
                                    <div class="col-12 col-lg-auto my-4">
                                        <a href="/remove-from-cart }}" class="p-2 font-weight-bold bg-danger text-light">-</a>
                                        <span class="mx-1">{{ $product['qty'] }}</span>
                                        <a href="/add-to-cart" class="btn btn-success p-2 font-weight-bold  text-light to_cart">+</a>
                                    </div>
                                    <div class="col-auto col-lg-auto">
                                        {{ $product['price'] }} сом
                                    </div>
                                    <div class="col-auto col-lg-auto">
                                        <a href="/delete-from-cart"  class="btn btn-danger">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            {{--</div>--}}
            {{--<h4 class="mb-3">Контактные данные</h4>--}}
            {{--<p class="shrift-ton">Укажите свои контактные данные</p>--}}
            {{--<form action="/store/basket" method="POST">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="row mb-4">--}}
                    {{--<div class="col">--}}
                        {{--<label for="name">Ваше имя <span style="color: red;">*</span></label>--}}
                        {{--<input type="text" name="name" value="@if(Session::has('vip')) {{ Session::get('vip')->name }} @endif" class="form-control" placeholder="Ваше Имя" id="name" required>--}}
                    {{--</div>--}}
                    {{--<div class="col">--}}
                        {{--<label for="phone">Ваш телефон <span style="color: red;">*</span></label>--}}
                        {{--<input type="tel" value="@if(Session::has('vip')) {{ Session::get('vip')->phone_number }} @endif"  pattern="+996-[0-9]{3}-[0-9]{3}-[0-9]{3}" name="phone_number" class="form-control" placeholder="+996-777-777-777" id="phone" required>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <input type="hidden" value="{{ Session::get('cart')->totalPrice }}" name="totalPrice">
                <input type="hidden" value="{{ Session::get('cart')->realPrice }}" name="summ">
                <div class="row">
                    <div class="col d-flex justify-content-end mx-auto mt-3">
                        <b style="font-size: 18px;">{{__('cart.total')}}: <span class="totalPrice">{{ $totalPrice }}</span> &euro;</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end mx-auto mt-3">
                        <button type="submit" class="btn btn-outline-dark ali">{{ __('cart.checkout')  }}</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            var ali = document.getElementsByClassName('ali');
            var text = ali[0].innerText;

            function elsom_function() {
                var new_text = "Получить код";
                var elsom = document.getElementsByClassName('elsom');
                var elsom_checked = elsom[0].checked;

                if (elsom_checked) {
                    ali[0].innerText = new_text;
                }
                else {
                    ali[0].innerText = text;
                }
            }
        </script>
    </content>

@endsection