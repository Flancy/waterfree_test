<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Waterfree') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a id="navbarCity" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{{ Session::get('city') ?? 'Выберите город' }}</span>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarCity">
                                    @foreach($citiesHeader ?? '' as $city)
                                        <a class="dropdown-item" href="{{ route('set_citie', $city->name) }}">
                                            {{ $city->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="row align-items-center justify-content-between">
                            <div class="topbar-social">
                                <a href="#"><i class="fab fa-vk"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="topbar-phone">
                                <a href="tel:+7(933)333-34-24"><i class="fab fa-phone"></i> +7(933)333-34-24</a>
                            </div>
                            <ul class="navbar-nav topbar-auth">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"></i> {{ __('Вход') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            @if(Auth::user()->role === 2)
                                                <a class="dropdown-item" href="{{ route('user.firm.orders.index') }}">
                                                    {{ __('Личный кабинет') }}
                                                </a>
                                            @elseif(Auth::user()->role === 1)
                                                <a class="dropdown-item" href="{{ route('user.orders.index') }}">
                                                    {{ __('Ваши заказы') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('user.setting.index') }}">
                                                    {{ __('Личный кабинет') }}
                                                </a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Выход') }}
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
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('pages.products.index') }}" class="nav-link">Продукция</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pages.contacts.index') }}" class="nav-link">Контакты</a>
                        </li>
                        @if(Auth::check() && Auth::user()->role == 0)
                            <li class="nav-item {{ Route::is('admin.home') ? 'active' : '' }}">
                                <a href="{{ route('admin.home') }}" class="nav-link">Административная панель</a>
                            </li>
                        @endif
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <cart-dropdown></cart-dropdown>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h3 class="h3">О нас</h3>

                        <p class="text-description"><b>WaterFree</b> - это сервис, на котором вы можете найти и заказать воду в вашем городе. Отслеживать заказы, узнавать о скидках и предложениях предприятий</p>

                        <a href="{{ route('login') }}" class="footer-link">Вход для пользователей</a>
                        <a href="{{ route('login') }}" class="footer-link">Вход для компании</a>
                    </div>
                    <div class="col-sm-3">
                        <h3 class="h3">Контакты</h3>

                        <div class="footer-contact"><span>Телефон:</span> <a href="tel:+7(922)051-71-82">+7 (922) 051-71-82</a></div>
                        <div class="footer-contact"><span>Email:</span><a href="mailto:water_free@mail.ru">water_free@mail.ru</a></div>
                        <div class="footer-contact"><span>Режим работы:</span>Пн-Пт с 08:00 до 17:00</div>
                    </div>
                    <div class="col-sm-3">
                        <h3 class="h3">Головной офис</h3>
                        
                        <div class="footer-contact"><span>Телефон:</span> <a href="tel:+7(922)051-71-82">+7 (922) 051-71-82</a></div>
                        <div class="footer-contact"><span>Адрес:</span>г.Черкесск, ул.Алиева, 18</div>
                        <div class="footer-contact"><span>Режим работы:</span>Пн-Пт с 08:00 до 17:00</div>
                    </div>
                    <div class="col-sm-3">
                        <h3 class="h3">Следуйте за нами</h3>

                        <a href="#" class="footer-link">Мы Вконтакте</a>
                        <a href="#" class="footer-link">Мы в Facbook</a>
                        <a href="#" class="footer-link">Мы в Instagram</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <script src="https://api-maps.yandex.ru/2.1/?apikey=975e872d-c3c6-4768-9569-dc49e52afa62
&lang=ru_RU" type="text/javascript"></script>
    <script scr="{{ asset('js/app.js') }}"></script>
</body>
</html>
