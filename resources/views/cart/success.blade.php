@extends('layouts.layout')
@section('title', 'Оформление заказа')
@section('custom-js')

<script>
    $(document).ready(function() {
        $(document).on('click', '#method1', function() {
            $('#methodPay1').prop('disabled', false)
        })
        $(document).on('click', '#method2', function() {
            $('#methodPay1').prop('checked', false)
            $('#methodPay1').prop('disabled', true)
            $('#methodPay2').prop('checked', true)
        })
    })
</script>

@endsection
@section('content')
<div class="container">
    <div class="order-information">
        <div class="breadcrumbs" style="margin-bottom: 50px;">
            <div class="cart-line" style="margin: 0px auto;">
                <div class="line-elem">
                    <div class="line-elen-success" style="width: 100%;"></div>
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
                <div class="cart-line-elem-3" style="background: #1eb19d;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <p>Готово!</p>
                </div>
            </div>
        </div>
        <div class="success-body">
            <p class="thx">Благодарим за покупку!</p>
            <p class="thx-send">Информация о вашем заказе отправлена на почту</p>
        </div>
    </div>
</div>
@endsection