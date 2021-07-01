@extends('layouts.layout')
@section('title', 'Личный кабинет')

@section('content')
<div class="container">
    <div class="cabinet">
        <div class="user-element">
            <p class="cab-info">Ваши данные</p>
            <form action="{{ route('changeData') }}" method="POST" class="user-data">
                @csrf
                <div class="to-update-data">
                    <label for="">ФИО</label>
                    <input type="text" name="name" id="name" class="user-input" value="{{ Auth::user()->name }}" placeholder="Введите Ваше ФИО">
                    <label for="">Номер телефона</label>
                    <input type="text" name="phone" id="phone" class="user-input" value="{{ Auth::user()->phone }}" placeholder="Введите номер телефона">
                    <label for="">E-mail</label>
                    <input type="email" name="email" id="email"  class="user-input" value="{{ Auth::user()->email }}" placeholder="Введите e-mail">
                    <input type="submit" class="cabinet-submit" value="Сохранить данные">
                </div>
                <div class="div">
                    <label for="">Город</label>
                    <input type="text" name="city" id="city"class="user-input" value="{{ Auth::user()->city }}" placeholder="Введите свой город">
                    <label for="">Адрес</label>
                    <input type="text" name="adress" id="adress" class="user-input" value="{{ Auth::user()->adress }}" placeholder="Введите свой адрес">
                    @if(session()->has('success'))
                    <p class="data-success">
                        {{ session('success') }}
                    </p>
                    @endif
                </div>


            </form>
            <form action="{{ route('changePass') }}" method="POST" class="user-password">
                @csrf
                @if ($errors->any())
                <p class="pas-error">{{ $errors }}</p>
                @endif
                @if(session()->has('error'))
                <p class="pas-error">
                    {{ session('error') }}
                </p>
                @endif
                <p style="font-weight: 500; ">Смена пароля</p>
                <input type="password" name="old_password" required id="" class="user-input" autocomplete="on" placeholder="Введите текущий пароль">
                <input type="password" name="password" required class="user-input" autocomplete="on" placeholder="Введите новый пароль">
                <input type="password" name="password_confirmation" required class="user-input" autocomplete="on" placeholder="Повторите новый пароль">
                <input type="submit" class="cabinet-submit" value="Изменить">
            </form>
        </div>
        <div class="order-elements">
            <p class="cab-info">Ваши заказы</p>
            @if(count($orders))
            <table class="orders-info">
                <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Дата заказа</th>
                        <th>Статус</th>
                        <th>Адрес доставки</th>
                        <th>Город</th>
                        <th></th>
                        <th>Сумма</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->number_of_order }}</td>
                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                        <td style="color: rgba(65, 65, 65, 0.39);">{{ $order->getStatus($order->status) }}</td>
                        <td>{{ $order->data_order['adress'] }}</td>
                        <td>{{ $order->data_order['city'] }}</td>
                        <td>
                            <button id="orderShow" data-order="{{ $order->number_of_order }}">
                                Просмотр заказа
                            </button>
                        </td>
                        <td>{{ $order->sum }} ₽</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p style="width: 100%; text-align:center; font-size:24px; font-weight:500; height: 300px; padding-top:50px;">У вас еще не было заказов</p>
            @endif
        </div>
    </div>

</div>
@endsection
@section('modalCabinet')
@if(count($orders))
@foreach($orders as $order)
<div class="modalOrder" id="modalOrder{{$order->number_of_order}}">
    <div class="order__content" id="order__content">
        <p class="cab-info">Просмотр заказа</p>
        <div class="order-user">
            <div style="display: flex;">
                <div class="user-info">
                    <p style="width: 75px;">Имя</p>
                    <p class="user-name">{{ Auth::user()->name }}</p>
                </div>
                <div class="user-info">
                    <p style="width: 150px;">Способ оплаты</p>
                    <p class="user-name">{{ $order->data_order['methodPay'] }}</p>
                </div>
            </div>
            <div style="display: flex;">
                <div class="user-info">
                    <p style="width: 75px;">Номер</p>
                    <p class="user-name">{{ Auth::user()->phone }}</p>
                </div>
                <div class="user-info">
                    <p style="width: 130px;">Способ доставки</p>
                    <p class="user-name">{{ $order->data_order['method'] }}</p>
                </div>
            </div>
        </div>
        <div class="order-info">
            <table class="orders-info" style="margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Дата заказа</th>
                        <th>Статус</th>
                        <th>Адрес доставки</th>
                        <th>Город</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->number_of_order }}</td>
                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                        <td>{{ $order->getStatus($order->status) }}</td>
                        <td>{{ $order->data_order['adress'] }}</td>
                        <td>{{ $order->data_order['city'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="order-elements">
            <table class="elems">
                <thead>
                    <tr>
                        <th>Фото</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Сумма</th>
                    </tr>
                </thead>
                <tbody class="order-body-info">
                    @foreach($order->products_in_order as $product)
                    <tr>
                        <td><img src="{{ asset('uploads/'.$product->attributes->thumbnail.'') }}" alt=""></td>
                        <td style="text-align: left;">{{ $product->name }}
                            <p>Артикул: {{ $product->attributes->article }}</p>
                        </td>
                        <td>{{ $product->price }} ₽</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price*$product->quantity }} ₽</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="order-cost">
            <p class="summazakaza">Сумма заказа</p>
            <p class="summazakazaprice">{{ $order->sum }} ₽</p>
            <div class="order-sum">
                <p class="itogosum">Итого к оплате</p>
                <p class="itogosumprice">{{ $order->sum }} ₽</p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection