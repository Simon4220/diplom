@extends('layouts.layout')

@section('title', 'produkty-i-servisy')

@section('content')
<div class="container">
    <div class="services-information">
        <p class="page_title">Продукты и сервисы</p>
        <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                <li class="bc__elem">Главная</li>
                <li class="bc__elem">Продукты и сервисы</li>
            </ul>
        </div>
        <div class="services-title">
            <p class="page-title">
                Программное обеспечение и сервисы
            </p>
            <p class="page-desc">
                Для реализации проектов с технологиями Интеренета вещей требуется специализированное
                программное обеспечение. Мы предлагаем полный набор приложений, программного обеспечения и онлайн-сервисов для создания,
                запуска и управления проектами, а также анализа их эффективности
            </p>
        </div>
        <div class="services-elem">
            <div class="img-elem">
                <a href="https://tagl.me/ru/link.html"><img src="{{ asset('assets/front/images/link_top.jpg') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <img src="{{ asset('assets/front/images/logo_link.png') }}" alt="">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
                <a href="https://tagl.me/ru/link.html">Подробнее</a>
            </div>
        </div>
        <div class="services-elem">
            <div class="img-elem">
                <a href="https://tagl.me/ru/console.html"><img src="{{ asset('assets/front/images/console_top.jpg') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <img src="{{ asset('assets/front/images/logo_console.png') }}" alt="">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
                <a href="https://tagl.me/ru/console.html">Подробнее</a>
            </div>
        </div>
        <div class="services-elem">
            <div class="img-elem">
                <a href="https://tagl.me/ru/desktop.html"><img src="{{ asset('assets/front/images/software_development.jpg') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <img src="{{ asset('assets/front/images/logo_desktop.png') }}" alt="">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
                <a href="https://tagl.me/ru/desktop.html">Подробнее</a>
            </div>
        </div>
        <div class="services-elem">
            <div class="img-elem">
                <a href="https://tagl.me/ru/encoder.html"><img src="{{ asset('assets/front/images/encoder_top.jpg') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <img src="{{ asset('assets/front/images/logo_encoder.png') }}" alt="">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
                <a href="https://tagl.me/ru/encoder.html">Подробнее</a>
            </div>
        </div>
        <div class="services-elem">
            <div class="img-elem">
                <a href="https://github.com/taglme"><img src="{{ asset('assets/front/images/index_github_screen.png') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <img src="{{ asset('assets/front/images/github_logo.png') }}" alt="">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
                <a href="https://github.com/taglme">Подробнее</a>
            </div>
        </div>
        <p class="page-title" style="margin: 80px 0px 70px 0px;">Метки и оборудование</p>
        <div class="services-elem">
            <div class="img-elem" style="width: 35%;">
                <a><img src="{{ asset('assets/front/images/tag_production.jpg') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
            </div>
        </div>
        <div class="services-elem" style="margin-bottom: 70px;">
            <div class="img-elem" style="width: 35%;">
                <a><img src="{{ asset('assets/front/images/brand_tag.jpg') }}" alt=""></a>
            </div>
            <div class="desc-elem">
                <p class="desc-elem-title">Онлайн управление NFC, BLE, QR метками</p>
                <p class="desc-elem-content">
                    Веб-приложение для управление контентом,
                    который получат пользователи, взаимодействуя с вашими метками
                </p>
            </div>
        </div>
    </div>
</div>
@endsection