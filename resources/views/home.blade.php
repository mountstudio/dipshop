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
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-right">
                <a class="nav-link" href="{{ route('login') }}">{{ __('main.signin') }}</a>
        </div>
        @auth
            <a class="" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                {{ __('main.signout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth

        <div class="col-auto m-auto">
            <img id="logo" src="/images/2.1.png"  alt="">
        </div>
        <div class="col-12 text-center mt-5">
            <h1 class="font-weight-bold f">Сайт временно не доступен</h1>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/smooth-scroll.js') }}"></script>
{{--<script src="{{ asset('js/classie.js') }}" defer></script>--}}
{{--<script>--}}
    {{--$(function () {--}}
        {{--var scroll;--}}
        {{--$(window).scroll(function() {--}}
            {{--scroll = $(window).scrollTop();--}}
            {{--if (scroll > 100) {--}}
                {{--$('#logo').css('width', 60);--}}
            {{--}--}}
            {{--else if (scroll <= 100) {--}}
                {{--$('#logo').css('width', 100);--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

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

</body>
</html>
