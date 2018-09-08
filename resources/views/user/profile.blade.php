@extends('layouts.auth')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-6 py-4 position-relative" style="height: 100vh; background-image: url('/images/wall.jpg'); background-size: cover; background-position: center;">
                <div class="backdrop"></div>
                <div class="row justify-content-center h-100">
                    <div class="col-12 align-self-start">
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a href="/" class="nav-link underline-link text-light text-capitalize"><i class="fas fa-arrow-left"></i> Главное меню</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                            <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link underline-link text-light text-capitalize">Logout</a></li>
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </ul>
                    </div>
                    <div class="col-auto align-self-center">
                        <img src="/images/default.jpg" class="img-fluid rounded-circle" width="200" height="200" alt="">
                        <p class="text-light mt-4 text-center position-relative">{{ $user->name }}</p>
                    </div>
                    <div class="col-12 align-self-end">
                        <ul class="nav justify-content-center">
                            <li class="nav-item px-3 py-2 text-light">{{ $user->name }}</li>
                            <li class="nav-item px-3 py-2 text-light">{{ $user->password }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 py-4">
                <h2 class="text-center">История заказов</h2>

                <div class="row mt-5 justify-content-center">

                    <div class="col-10">
                        <a href="" class="text-dark nav-link history-link" data-toggle="modal" data-target="#exampleModal">
                            <div class="transition-500 card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">12</p>
                                        <span>Сентябрь</span>
                                    </div>
                                    <div>
                                        Информация о заказе.
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">1562</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-10">
                        <a href="" class="text-dark nav-link history-link" data-toggle="modal" data-target="#exampleModal">
                            <div class="transition-500 card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">09</p>
                                        <span>Август</span>
                                    </div>
                                    <div>
                                        Информация о заказе.
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">750</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-10">
                        <a href="" class="text-dark nav-link history-link" data-toggle="modal" data-target="#exampleModal">
                            <div class="transition-500 card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">01</p>
                                        <span>Май</span>
                                    </div>
                                    <div>
                                        Информация о заказе.
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">230</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border-bottom: 0px;"><h2 class="text-center">Заказ № 0546</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">

                                                <div class="col-12 py-4">
                                                    <div class="mb-4" style="text-align: center;">
                                                        <a href="/">
                                                            <img src="/images/2.1.png" style="width:120px; height: auto;" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="row mt-5 justify-content-center">

                                                        <div class="col-12">

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
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')

    <script type="application/javascript">
        $('.history-link').hover(
            function (e) {
                var card = $(e.currentTarget).find('.card');
                card.addClass('shadow-lg');
            },
            function (e) {
                var card = $(e.currentTarget).find('.card');
                card.removeClass('shadow-lg');
            }
        );
    </script>

@endpush