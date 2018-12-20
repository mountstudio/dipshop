@extends('layouts.app')
@section('title', 'Оформление заказа')
@section('content')

    <div class="container">
        <h2 class="mt-5 mb-2">{{__('cart.checkouting')}}</h2>
        <h3 class='mb-2'>{{__('cart.order-info')}}</h3>
        <table class="table table-bordered mb-0">
            <thead class="f-size-20 font-weight-bold">
            <tr>
                <th class="text-center" scope="col">№</th>
                <th class="text-center" scope="col">Image</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Price</th>
                <th class="text-center" scope="col">Count</th>
                <th class="text-center" scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th class="align-middle" scope="row">
                        <div class="row justify-content-center f-size-20 font-weight-bold">
                            {{ $loop->index + 1 }}
                        </div>
                    </th>
                    <td class="p-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-auto">
                                <img class="img-fluid" width="90" height="90" src="/uploads/small/{{ $product['item']->image }}">
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <span class="font-weight-bold">{{ $product['item']->name }}</span>
                        <br>
                        <b>{{ $product['item']->category->name }}</b>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="font-weight-bold ml-1">{{ number_format($product['one_price'], 2) }}&euro;</span>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="mx-1 font-weight-bold text-center" style="min-width: 13px;">{{ $product['qty'] }}</span>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="font-weight-bold ml-1">{{ number_format($product['price'], 2) }}&euro;</span>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end mt-3">
            <div class="col-auto">
                @if(Auth::user()->percent)
                    <p class="font-weight-bold f-size-20 text-right">Your discount: {{ Auth::user()->percent }}%</p>
                    <p class="font-weight-bold f-size-20 text-right">Total: {{ number_format($totalPrice, 2) }}&euro; - {{ number_format(round($totalPrice * Auth::user()->percent / 100, 2), 2) }}&euro; = {{ number_format($totalPrice - round($totalPrice * Auth::user()->percent / 100, 2), 2) }}&euro;</p>
                @else
                    <p class="font-weight-bold f-size-20 text-right">Total: {{ number_format($totalPrice, 2) }}&euro;</p>
                @endif
            </div>
        </div>

        @if(Session::has('cart') || Session::get('cart'))
            @if(Session::get('cart')->items)
                <form class="font-weight-normal f-size-18 py-3" action="{{ route('basket.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="percent" value="{{ Auth::user()->percent }}">
                    <div class="form-row my-4">
                        <div class="col">
                            <label for="name">{{ __('main.name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="col">
                            <label for="last_name">{{ __('main.last_name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ Auth::user()->last_name }}" class="form-control" name="last_name" id="last_name" required>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <label for="embassy">{{ __('main.embassy') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ Auth::user()->embassy }}" class="form-control" name="embassy" id="embassy" required>
                        </div>
                        <div class="col">
                            <label for="code">{{ __('main.code') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ Auth::user()->code }}" class="form-control" name="code" id="code" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ __('main.delivery') }}
                        <label class="switch">
                            <input type="checkbox" name="delivery" id="delivery">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div id="delivery-form">

                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end mx-auto mt-3">
                            <button type="submit" class="btn btn-success f-size-18 my-3">{{ __('cart.checkout')  }}</button>
                        </div>
                    </div>
                </form>
            @endif
        @endif
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        let html = $('<div class="form-row my-4">\n' +
            '                            <div class="col">\n' +
            '                                <label for="address">{{ __('main.order.address') }} <span class="text-danger">*</span></label>\n' +
            '                                <input type="text" class="form-control" name="address" id="address" required>\n' +
            '                            </div>\n' +
            '                            <div class="col">\n' +
            '                                <label for="date">{{ __('main.order.date') }} <span class="text-danger">*</span></label>\n' +
            '                                <input type="text" class="form-control" name="date" id="date" required>\n' +
            '                            </div>\n' +
            '                            <div class="col">\n' +
            '                                <label for="time">{{ __('main.order.time') }} <span class="text-danger">*</span></label>\n' +
            '                                <input type="time" class="form-control" name="time" id="time" required>\n' +
            '                            </div>\n' +
            '                        </div>');

        let deliveryForm = $('#delivery-form');

        $('#delivery').change(function (e) {
            if (this.checked) {
                deliveryForm.empty();
                deliveryForm.append(html);
                $('#date').datepicker({
                    format: "dd/mm/yyyy",
                    startDate: new Date(),
                    autoclose: true,
                    todayHighlight: true
                });
            } else {
                deliveryForm.empty();
            }
        });
    </script>
@endpush