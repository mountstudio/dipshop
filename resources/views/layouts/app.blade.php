<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>
    <header class="">
        <nav class="navbar font-weight-normal shadow-sm navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand p-0" href="/"><img id="logo" src="/images/2.1.png" style="width:100px; height:auto;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="" class="nav-link">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">О проекте</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Контакты</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="py-5 position-relative" style="background-image: url('/images/pXdT4Eo.jpg'); background-size: cover; background-position: right;">
        <div class="backdrop"></div>
        <div class="container py-5">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">About</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light">Main</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light footer-link">Main</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
{{--<script src="{{ asset('js/classie.js') }}" defer></script>--}}
    <script>
        $(function () {
            var scroll;
            $(window).scroll(function() {
                scroll = $(window).scrollTop();
                if (scroll > 100) {
                    $('#logo').css('width', 60);
                }
                else if (scroll <= 100) {
                    $('#logo').css('width', 100);
                }
            });
        });
    </script>

    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

@stack('scripts')

</body>
</html>
