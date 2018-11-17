<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1440, initial-scale=0.1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<style type="text/css">
    @media screen and (min-width: 1000px){
        body {
            font-size: 0.7rem!important;
        }
    }
</style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('styles')
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">--}}
    @include('g_analytics')
</head>
<body>
    @include('_partials._header_contacts')
    @if(Session::has('order_status'))
        <div class="alert alert-success fixed-top alert-dismissible fade show w-25" role="alert" style="top: 10px; right: 10px; left: auto;">
            {{ Session::get('order_status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <main>
        @yield('content')
    </main>

    <footer class="position-relative bg-dark" >
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-auto px-3 py-2 transition-500 hover-shadow">
                    <a href="http://mount.kg" target="_blank" class="text-light small btn">
                        Made with <span class="text-danger">&hearts;</span> by Mount
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
    <script>
        $('.hover-shadow').hover(
            function (e) {
                $(this).addClass('shadow-lg');
            },
            function (e) {
                $(this).removeClass('shadow-lg');
            }
        );
    </script>
    @stack('scripts')
    <script src="{{ asset('js/cart.js') }}"></script>
</body>
</html>
