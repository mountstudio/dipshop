<div class="bg-dark text-light sticky-top" style="max-height: 34px;">
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-auto text-left">
                <p class="py-2" style="font-size: 16px;">{{__('main.address')}}</p>
            </div>
            <div class="col d-flex justify-content-around" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav mx-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link text-light">{{ __('main.main') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link text-light">{{ __('main.about')  }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contacts') }}" class="nav-link text-light">{{ __('main.contacts')  }}</a>
                    </li>
                </ul>

                @include('_partials._search')

                <!-- Right Side Of Navbar -->
                <ul class="nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">{{ __('main.signin') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('main.register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->admin)
                                    <a class="dropdown-item" href="{{ route('options') }}">Admin</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('main.signout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>

                <!-- Language switcher -->
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/images/flags/{{App::getLocale()}}.svg"/> {{strtoupper(App::getLocale())}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('set.language', 'en') }}">
                                <img src="/images/flags/en.svg"/> EN
                            </a>
                            <a class="dropdown-item" href="{{ route('set.language', 'ru') }}">
                                <img src="/images/flags/ru.svg"/> RU
                            </a>
                            <a class="dropdown-item" href="{{ route('set.language', 'de') }}">
                                <img src="/images/flags/de.svg"/> DE
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-auto text-right d-flex justify-content-end">
                <a href="mailto:dipmarket@1961.kg" class="py-2 mx-2 text-light" style="font-size: 16px;">dipmarket@1961.kg</a>
                <a href="tel:+996 (555) 961 967" class="py-2 mx-2 text-light" style="font-size: 16px;">+996 (555) 961 967</a>
                <a href="tel:+996 (312) 961 967" class="py-2 mx-2 text-light" style="font-size: 16px;">+996 (312) 961 967</a>
            </div>
        </div>
    </div>
</div>