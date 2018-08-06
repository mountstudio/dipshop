@extends('layouts.app')

@section('content')
        <div class="container p-5 bg-white">
            <div class="row justify-content-center">
            <div class="slider border border-dark w-100">
                <img class="w-100" src="/images/main.jpg" alt="">
            </div>
            </div>
        </div>

    <div class="container mb-5">
        <div class="row">

            <div class="col-3 pl-2 pr-2">

                <div class="shadow-lg card rounded bg-white border border-light p-3" style="width:100%; height: 350px;">
                    <div class="article" style="height: 20px;">
                        <span class="float-left">Glen Grant</span>
                        <span class="float-right">bla bla</span>
                    </div>
                    <div class="description">
                        <p>Royal tipo luchshaya vipivka ept</p>
                    </div>
                    <div class="prod-img mb-3" style="background-image: url('images/2.jpg')">
                    </div>

                    <div class="price p-2" style="border-top: solid 1.5px #e1e1e1;">
                        <span class="float-left main-font">Price</span>
                        <span class="float-right main-font">200$</span>

                    </div>
                </div>

            </div>

            <div class="col-3 pl-2 pr-2">

                <div class="shadow-lg card rounded bg-white border border-light p-3" style="width:100%; height: 350px;">
                    <div class="article" style="height: 20px;">
                        <span class="float-left">Glen Grant</span>
                        <span class="float-right">bla bla</span>
                    </div>
                    <div class="description">
                        <p>Royal tipo luchshaya vipivka ept</p>
                    </div>
                    <div class="prod-img mb-3" style="background-image: url('images/2.jpg')">
                    </div>

                    <div class="price p-2" style="border-top: solid 1.5px #e1e1e1;">
                        <span class="float-left main-font">Price</span>
                        <span class="float-right main-font">200$</span>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection