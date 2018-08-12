@extends('layouts.auth')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-6 py-4 position-relative" style="height: 100vh; background-image: url('/images/wall.jpg'); background-size: cover; background-position: center;">
                <div class="backdrop"></div>
                <div class="row justify-content-center h-100">
                    <div class="col-12 align-self-start">
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a href="/" class="nav-link underline-link text-light text-capitalize"><i class="fas fa-arrow-left"></i> to main</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">transactions</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                            <li class="nav-item"><a href="#" class="nav-link underline-link text-light text-capitalize">main</a></li>
                        </ul>
                    </div>
                    <div class="col-auto align-self-center">
                        <img src="/images/default.jpg" class="img-fluid rounded-circle" width="200" height="200" alt="">
                        <p class="text-light mt-4 text-center position-relative">{{ $user->name }}</p>
                    </div>
                    <div class="col-12 align-self-end">
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a href="#" class="nav-link text-light">{{ $user->email }}</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-light">{{ $user->password }}</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-light">main</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 py-4">
                <h2 class="text-center">Transactions</h2>

                <div class="row mt-5 justify-content-center">

                    <div class="col-10">
                        <a href="" class="text-dark nav-link history-link">
                            <div class="card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">12</p>
                                        <span>May</span>
                                    </div>
                                    <div>
                                        This is some text within a card body.
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">130</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-10">
                        <a href="" class="text-dark nav-link history-link">
                            <div class="card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">12</p>
                                        <span>May</span>
                                    </div>
                                    <div>
                                        This is some text within a card body.
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">130</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-10">
                        <a href="" class="text-dark nav-link history-link">
                            <div class="card shadow-sm border-right-0 border-bottom-0 border-top-0 border-danger">
                                <div class="card-body bg-light d-flex align-items-center">
                                    <div class="bg-white shadow-sm text-center py-3 px-4 mr-4">
                                        <p class="m-0">12</p>
                                        <span>May</span>
                                    </div>
                                    <div>
                                        This is some text within a card body.
                                    </div>
                                    <div class="ml-auto font-weight-bold text-success">
                                        $<span class="h4">130</span>
                                    </div>
                                </div>
                            </div>
                        </a>
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