<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preload" href="{{ asset('assets/front/css/front.css') }}" as="style" type="text/css">
    <link rel="preload" href="{{ asset('assets/front/js/front.js') }}" as="script">
    <link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body @if(session()->has('error')) style="overflow-y: hidden; height: 100vh; padding-right: 17px;" @endif>
    <header>
        <div class="info">
            <div class="container">
                <div class="row">
                    <div class="col-4 info__desc">
                        <p>NFC метки и оборудования</p>
                    </div>
                    <div class="col-3 info__phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        <p style="color: rgba(153, 153, 153, 1); font-size: 13px; margin-right: 10px;">Телефон</p>
                        <p style="color:rgb(46, 46, 46); font-weight: 500;">8 (499) 391 54 05</p>
                    </div>
                    <div class="col-3 info__email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                        </svg>
                        <p style="color: rgba(153, 153, 153, 1); font-size: 13px; margin-right: 10px;">email</p>
                        <p style="color:rgb(46, 46, 46); font-weight: 500;">info@nfcpoint.ru</p>
                    </div>
                    <div class="col-2 info__login">
                        @if(Auth::check())
                        <svg xmlns="http://www.w3.org/2000/svg" style="left: -5px;" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <button class="openAuth">{{ Auth::user()->email }}</button>
                        <svg xmlns="http://www.w3.org/2000/svg" style="top: 14px; right: -5px;" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                        <div class="auth-option">
                            <ul>
                                <li class="cab"><a href="{{ route('cabinet') }}">Личный кабинет</a></li>
                                <li class="logout"><a href="{{ route('logout') }} ">Выйти</a></li>
                            </ul>
                        </div>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" style="left: 60px;" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <button id="openAuth" class="openAuth">Войти</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/front/images/go.png') }}"></a>
                    </div>
                    <div class="col-2 menu__elem"><a class="menu-href" href="{{ route('secondServices') }}">Продукты и сервисы</a></div>
                    <div class="col-2 menu__elem"><a class="menu-href" href="{{ route('services') }}">Решения и услуги</a></div>
                    <div class="col-2 menu__elem"><a class="menu-href" href="">Оплата и доставка</a></div>
                    <div class="col-1 menu__elem"><a class="menu-href" href="{{ route('articles') }}">Блог</a></div>
                    <div class="col-1 menu__elem"><a class="menu-href" href="{{ route('contact') }}">Контакты</a></div>
                </div>
                <div class="row">
                    <div class="col-2  menu__elem">
                        <a class="menu__catalog" href="{{ route('catalog') }}">
                            <span class="menu__icon"></span>
                            <p>Каталог</p>
                        </a>
                    </div>
                    <div class="col-9  menu__elem">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        <form action="{{ route('search') }}" method="GET">
                        <input type="text" id="search" class="menu__search" name="search" data-href="/catalog" value="{{ old('search') }}" placeholder="Поиск по каталогу...">
                        </form>
                        
                    </div>
                    <div class="col-1  menu__elem">
                        <a class="menu__cart" href="{{ route('cart') }}">
                            <span class="menu__count"> {{isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : '0'}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <p class="cart">Корзина</p>
                            <p class="menu__cost">
                                {{isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotal() : '0'}} ₽
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer>

        <div class="container">
            <div class="footer">
                <div class="footer__elem">
                    <p class="logo" style="font-family: 'Ramabhadra', sans-serif">LOGO</p>
                    <p class="copy"><img src="{{ asset('assets/front/images/copyright.png') }}" style="height: 14px; width: 14px; margin: 0px 5px 3px 0px ;">2017 - 2020 при цитировании
                        ссылка на сайт обязательна</p>
                    <a href="" class="conf">Политика конфиденциальности</a>
                </div>
                <div class="footer__elem">
                    <div class="footer-menu">
                        <div class="footer-menu__elem1">
                            <a href="">Главная</a><br>
                            <a href="">Магазин</a>
                            <ul>
                                <li><a href="">NFC метки</a></li>
                                <li><a href="">NFC наборы</a></li>
                                <li><a href="">NFC сервисы и ПО</a></li>
                                <li><a href="">Bluetooth</a></li>
                                <li><a href="">Средства разработки</a></li>
                                <li><a href="">Печатная продукция</a></li>
                            </ul>
                        </div>
                        <div class="footer-menu__elem2">
                            <ul>
                                <li><a href="">Продукты и сервисы</a></li>
                                <li><a href="">Решения и услуги</a></li>
                                <li><a href="">Доставка и Оплата</a></li>
                                <li><a href="">Блог</a></li>
                                <li><a href="">Медиа</a></li>
                                <li><a href="">Контакты</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="footer__elem">
                    <div class="footer-image">
                        <img src="{{ asset('assets/front/images/footer.png') }}" alt="">
                    </div>
                </div>
                <div class="footer__elem">
                    <div class="elem">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-footer-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg>
                            E-mail
                        </p>
                        <p class="footer-info">info@nfcpoint.ru</p>
                    </div>
                    <div class="elem">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-footer-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            Телефон</p>
                        <p class="footer-info">8 (499) 391 54 05</p>
                    </div>
                    <div class="elem">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>Адрес
                        </p>
                        <p class="footer-info"> г. Москва, ул. <br> Промышленная, д.11, стр. 3</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    @if(Auth::check())
    @else
    <div class="modalAuth" id="modalAuth" @if(session()->has('error')) style="visibility: visible; opacity: 1;" @endif>
        <div class="modalAuth__content" id="modalAuth__content">
            <div class="content__header">
                <p class="enter">Вход</p>
                <p>У вас еще нет аккаунта?</p>
                <p class="modal-href" id="modal-href-to-register">Зарегистрироваться</p>
                @if(session()->has('error'))
                <p class="modal-error">{{session('error')}}</p>
                @endif
            </div>
            <form action="{{ route('login') }}" id="form-auth" method="POST" class="content__form">
                @csrf
                <label for="" style="width: 100%;">E-mail</label>
                <input type="email" name="email" class="input" value="{{ old('email') }}" required>
                <label for="" style="width: 100%;">Пароль</label>
                <input type="password" name="password" class="input" required autocomplete="on">
                <input type="submit" class="submit" value="Вход">
            </form>
        </div>
    </div>
    <div class="modalAuth" id="modalReg">
        <div class="modalAuth__content" id="modalReg__content">
            <div class="content__header">
                <p class="enter">Регистрация</p>
                <p>Вы уже зарегистрированны?</p>
                <p class="modal-href" id="modal-href-to-auth">Авторизоваться</p>
            </div>
            <form action="{{route('register')}}" method="POST" class="content__form">
                @csrf
                <label for="email" style="width: 100%;">E-mail</label>
                <input type="email" name="email" class="input" required>
                <label for="password" style="width: 100%;">Пароль</label>
                <input type="password" name="password" class="input" autocomplete="on">
                <label for="password_confirmation" style="width: 100%;">Повторите пароль</label>
                <input type="password" name="password_confirmation" class="input" autocomplete="on">
                <input type="submit" class="submit" value="Зарегистрироваться">
            </form>
        </div>
    </div>
    @endif

    @yield('modalCabinet')
    @yield('custom-js')
    <script src="{{ asset('assets/front/js/front.js') }}"></script>
</body>

</html>