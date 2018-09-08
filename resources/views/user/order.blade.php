@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="container">
            <div class="col-12 py-4">
                <div class="mb-4" style="text-align: center;">
                    <a href="/">
                <img src="/images/2.1.png" style="width:120px; height: auto;" alt="">
                    </a>
                </div>
                <h2 class="text-center">Заказ № 0546</h2>

                <div class="row mt-5 justify-content-center">

                    <div class="col-10">

                            <div class="transition-500 card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-2 px-4 mr-4">
                                        <p class="m-0">Ф.И.О заказчика</p>
                                    </div>
                                    <div class="mx-auto font-weight-bold">
                                        <span class="h4">Иванов Иван Иванович</span>
                                    </div>
                                </div>
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-2 px-4 mr-4">
                                        <p class="m-0">Дип. номер</p>
                                    </div>

                                    <div class="mx-auto font-weight-bold">
                                        <span class="h4">874324</span>
                                    </div>
                                </div>
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-2 px-4 mr-4">
                                        <p class="m-0">Номер посольства</p>
                                    </div>

                                    <div class="mx-auto font-weight-bold">
                                        <span class="h4">433</span>
                                    </div>
                                </div>
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-2 px-4 mr-4">
                                        <p class="m-0">Дата доставки</p>
                                    </div>

                                    <div class="mx-auto font-weight-bold">
                                        <span class="h4">18.09.2018</span>
                                    </div>
                                </div>
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-2 px-4 mr-4">
                                        <p class="m-0">Товары</p>
                                    </div>

                                    <div class="mx-auto font-weight-bold">
                                        <span class="h4">dsfsdf</span>
                                    </div>
                                </div>
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">Сумма заказа</p>
                                    </div>

                                    <div class="mx-auto font-weight-bold text-success">
                                        <span class="h4 fa fa-check"> Выполнен </span>
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">1500</span>
                                    </div>
                                </div>
                            </div>

                    </div>


                </div>
            </div>
            </div>

        </div>
    </div>
@endsection