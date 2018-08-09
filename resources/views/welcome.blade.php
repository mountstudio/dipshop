@extends('layouts.app')

@section('content')
    @include('_partials._after_header')
    @include('_partials._categories')
    @include('_partials._banners')

    <div class="container mb-5">
        <div class="row">


            {{--<div class="col-3 mb-4">--}}
                {{--<div class="shadow card rounded bg-white border border-light p-3">--}}
                    {{--<div class="article" style="height: 20px;">--}}
                        {{--<span class="float-left">Виски</span>--}}
                        {{--<span class="float-right">#15864</span>--}}
                    {{--</div>--}}
                    {{--<div class="description">--}}
                        {{--<p>Jack Daniels 0.5</p>--}}
                    {{--</div>--}}
                    {{--<div class="prod-img mb-3" style="background-image: url('images/1.png')">--}}
                    {{--</div>--}}

                    {{--<div class="price p-2" style="border-top: solid 1.5px #e1e1e1;">--}}
                        {{--<span class="text-left main-font">Цена</span>--}}
                        {{--<span class="float-right main-font">100$</span><br>--}}
                        {{--<span class="text-left main-font">Кол-во</span>--}}
                        {{--<span class="float-right main-font">1</span>--}}

                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<a class="btn btn-outline-success">В корзину</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


            <div class="col-3 mb-4">
                <div class="card shadow-sm px-4 pt-3 border">
                    <img class="card-img-top" src="/images/0_0_orig.png" alt="Card image cap">
                    <div class="card-body d-flex px-0 pb-0">
                        <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                        <div class="ml-auto text-muted">#21243</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-1 d-flex">
                        <div class="card-title mr-auto">Jack Daniels</div>
                        <div class="card-title ml-auto font-weight-bold">$100</div>
                    </div>
                    <div class="card-body px-0  text-center">
                        <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
                    </div>
                </div>
            </div>

            <div class="col-3 mb-4">
                <div class="card shadow-sm px-4 pt-3 border">
                    <img class="card-img-top" src="/images/0_0_orig.png" alt="Card image cap">
                    <div class="card-body d-flex px-0 pb-0">
                        <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                        <div class="ml-auto text-muted">#21243</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-1 d-flex">
                        <div class="card-title mr-auto">Jack Daniels</div>
                        <div class="card-title ml-auto font-weight-bold">$100</div>
                    </div>
                    <div class="card-body px-0  text-center">
                        <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
                    </div>
                </div>
            </div>

            <div class="col-3 mb-4">
                <div class="card shadow-sm px-4 pt-3 border">
                    <img class="card-img-top" src="/images/0_0_orig.png" alt="Card image cap">
                    <div class="card-body d-flex px-0 pb-0">
                        <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                        <div class="ml-auto text-muted">#21243</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-1 d-flex">
                        <div class="card-title mr-auto">Jack Daniels</div>
                        <div class="card-title ml-auto font-weight-bold">$100</div>
                    </div>
                    <div class="card-body px-0  text-center">
                        <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
                    </div>
                </div>
            </div>

            <div class="col-3 mb-4">
                <div class="card shadow-sm px-4 pt-3 border">
                    <img class="card-img-top" src="/images/0_0_orig.png" alt="Card image cap">
                    <div class="card-body d-flex px-0 pb-0">
                        <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                        <div class="ml-auto text-muted">#21243</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-1 d-flex">
                        <div class="card-title mr-auto">Jack Daniels</div>
                        <div class="card-title ml-auto font-weight-bold">$100</div>
                    </div>
                    <div class="card-body px-0  text-center">
                        <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
                    </div>
                </div>
            </div>

            <div class="col-3 mb-4">
                <div class="card shadow-sm px-4 pt-3 border">
                    <img class="card-img-top" src="/images/0_0_orig.png" alt="Card image cap">
                    <div class="card-body d-flex px-0 pb-0">
                        <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                        <div class="ml-auto text-muted">#21243</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-1 d-flex">
                        <div class="card-title mr-auto">Jack Daniels</div>
                        <div class="card-title ml-auto font-weight-bold">$100</div>
                    </div>
                    <div class="card-body px-0  text-center">
                        <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
                    </div>
                </div>
            </div>

            <div class="col-3 mb-4">
                <div class="card shadow-sm px-4 pt-3 border">
                    <img class="card-img-top" src="/images/0_0_orig.png" alt="Card image cap">
                    <div class="card-body d-flex px-0 pb-0">
                        <div class="text-capitalize mr-auto font-weight-bold">whiskey</div>
                        <div class="ml-auto text-muted">#21243</div>
                    </div>
                    <div class="card-body px-0 pb-0 pt-1 d-flex">
                        <div class="card-title mr-auto">Jack Daniels</div>
                        <div class="card-title ml-auto font-weight-bold">$100</div>
                    </div>
                    <div class="card-body px-0  text-center">
                        <a href="#" class="btn btn-success shadow-lg font-weight-light">В корзину</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            autoplayTimeout: 1000,
            margin:10,
            nav:true,
            dots: true,
            items: 1
        })
    </script>
@endpush