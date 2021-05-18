@extends('layouts.layout')
@section('title', 'Оформление заказа')
@section('custom-js')

<script>
    /*$(document).ready(function() {
        $(document).on('click', '#method1', function() {
            $('#methodPay1').prop('disabled', false)
        })
        $(document).on('click', '#method2', function() {
            $('#methodPay1').prop('checked', false)
            $('#methodPay1').prop('disabled', true)
            $('#methodPay2').prop('checked', true)
        })
    })*/
</script>

@endsection
@section('content')
<div class="container">
    <div class="order-information">
        <div class="breadcrumbs" style="margin-bottom: 50px;">
            <a class="back-to-cart" href="">
                <p>Вернуться</p>
            </a>
            <div class="cart-line">
                <div class="line-elem">
                    <div class="line-elen-success" style="width: 50%;"></div>
                </div>
                <div class="cart-line-elem-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <p>Корзина</p>
                </div>
                <div class="cart-line-elem-2" style="background: #1eb19d;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <p>Оформление заказа</p>
                </div>
                <div class="cart-line-elem-3">
                    3
                    <p>Готово!</p>
                </div>
            </div>
        </div>
        @if(!Auth::check())
        <div class="pole-to-register">
            <p class="pole-text">Для удобного размещения заказов Вы можете создать аккаунт или войдите, если уже
                зарегистрированны</p>
            <button class="pole-href" id="openAuth">Войти</button>
            <p>/</p>
            <button class="pole-href" id="openAuth">Зарегистрироваться</button>
        </div>
        @endif
        <div class="order-data">
            <form class="order-form" action="{{ route('confirmedOrder') }}" method="POST">
                @csrf
                <div class="contact-data">
                    <p class="subject">1. Контактные данные</p>
                    <div class="users-data">
                        <label for="name">ФИО</label>
                        <input type="text" name="name" id="name" @if(Auth::check()) value="{{ Auth::user()->name }}" @endif>
                        <label for="phone">Номер телефона</label>
                        <input type="text" name="phone" id="phone"  @if(Auth::check()) value="{{ Auth::user()->phone }}" @endif>
                        <label for="email">Ваш e-mail</label>
                        <input type="email" name="email" @if(Auth::check()) value="{{ Auth::user()->email }}" @endif>
                    </div>
                    <div class="users-adress">
                        <label for="sity">Город</label>
                        <input type="text" name="city" id="city" @if(Auth::check()) value="{{ Auth::user()->city }}" @endif>
                        <label for="adress">Адрес</label>
                        <textarea name="adress" id="adress" cols="30" rows="10">@if(Auth::check()) {{ Auth::user()->adress }} @endif</textarea>
                    </div>
                </div>
                <div class="delivery">
                    <p class="subject">2. Способ доставки</p>

                    <label class="radio-label">
                        <input class="radio" type="radio" name="method" id="method1" value="Курьером до адреса" checked>
                        <span class="fake"></span>
                        <span class="radio-text">Курьером до адреса</span>
                    </label>

                    <label class="radio-label">
                        <input class="radio" type="radio" name="method" id="method2" value="Забрать из пункта выдачи">
                        <span class="fake"></span>
                        <span class="radio-text">Забрать из пункта выдачи</span>
                    </label>
                    <textarea placeholder="Пожалуйста, введите индекс и адрес почтового отделения" class="delidery-desc" name="delivery" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="comment-to-order">
                    <p class="subject">3. Комментарий к заказу</p>
                    <p class="subject-desc">Необязательно</p>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                </div>
                <div class="method-to-pay">
                    <p class="subject">4. Способ оплаты</p>
                    <label class="radio-label">
                        <input class="radio" type="radio" name="methodPay" id="methodPay1" value="Оплатить наличными при получении" checked>
                        <span class="fake"></span>
                        <span class="radio-text">Оплатить наличными при получении</span>
                    </label>
                    <label class="radio-label">
                        <input class="radio" type="radio" name="methodPay" id="methodPay2" value="Оплатить онлайн">
                        <span class="fake"></span>
                        <span class="radio-text">Оплатить онлайн</span>
                    </label>
                    <button class="order-ready" type="submit">Оформить заказ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection