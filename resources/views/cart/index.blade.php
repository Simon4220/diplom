@extends('layouts.layout')

@section('title', 'Корзина')

@section('custom-js')

<script>
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault()
        deleteItem(this)
    })

    function deleteItem(event) {
        let id = $(event).data('id')
        let ItemSum = $(event).parent().find('.elem-sum').children('#' + id).data('price')
        let ItemCount = $(event).parent().find('.count-input').val()
        $(event).parent().children('.process-delete').css('display', 'block')
        $.ajax({
            url: "{{ route('delete-elem') }}",
            type: "POST",
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $('.cart-elems').html(data)
                if (($('.delete-btn').length)) {
                    $('.menu__cost').text($('.delete-btn').data('cartsum'))
                    $('.menu__count').text($('.delete-btn').data('cartcount'))
                } else {
                    $('.menu__cost').text(0)
                    $('.menu__count').text(0)
                }
            },
            error: (data) => {
                console.log(data)
            }
        })
    }

    $(document).on('click', '.update-count', function(e) {
        e.preventDefault()
        updateItem(this)
    })
    $(document).on('input', '.count-input', function() {
        let id = $(this).data('id')
        let ItemPrice = $(this).data('price')
        let ItemCount = $(this).val()
        let ItemSum = parseInt(ItemPrice * ItemCount)
        $(this).parent().parent().parent().children('.elem-sum').find('#' + id).text(ItemSum + ' ₽')
        $(this).parent().parent().parent().children('.elem-sum').find('#' + id).attr('data-sum', ItemSum)
    })

    function updateItem(event) {
        let id = $(event).data('id')
        /* Количество товара после изменения */
        let afterItemCount = $(event).parent().find('.count-input').val()
        if (afterItemCount <= $(event).data('all')) {
            /* Количество товара до изменения */
            let beforeItemCount = $(event).parent().find('.count-input').data('count');
            /* Сумма одного товара до изменения */
            let beforeItemSum = $(event).parent().parent().children('.elem-sum').find('#' + id).data('price')
            /* Считывает сумму изменяемого товара */
            let afterItemSum = $(event).parent().parent().children('.elem-sum').find('#' + id).data('sum')
            /* Считает столько добавили или убрали */
            let ItemCount = afterItemCount - beforeItemCount;
            /* Cчитает на сколько изменилась цена */
            let ItemSum = afterItemSum - beforeItemSum
            /* Считывает количество товаров в корзине до изменения*/
            let ItemCountInCart = parseInt($('.menu__count').text())
            /* Считывает сумму корзины до изменения*/
            let ItemSumInCart = parseInt($('.menu__cost').text())
            console.log(afterItemCount, beforeItemCount, beforeItemSum, afterItemSum, ItemCount, ItemSum, ItemCountInCart, ItemSumInCart)
            ItemCountInCart += ItemCount
            ItemSumInCart += ItemSum
            $('.menu__count').text(ItemCountInCart)
            $('.menu__cost').text(ItemSumInCart + ' ₽')
            $('#SumByCart').text(ItemSumInCart + ' ₽')
            $('#SumToPay').text(ItemSumInCart + ' ₽')
            $.ajax({
                url: "{{ route('update-elem') }}",
                type: "POST",
                data: {
                    id: id,
                    count: ItemCount,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.cart-elems').html(data)
                    if (($('.delete-btn').length)) {
                        $('.menu__cost').text($('.delete-btn').data('cartsum'))
                        $('.menu__count').text($('.delete-btn').data('cartcount'))
                    } else {
                        $('.menu__cost').text(0)
                        $('.menu__count').text(0)
                    }
                },
                error: (data) => {
                    console.log(data)
                }
            })
        } else {
            $('.error-to-update').addClass('error-to-update-active')
            setTimeout(function() {
                $('.error-to-update').removeClass('error-to-update-active')
            }, 2500)
        }
    }
</script>
@endsection

@section('content')
<div class="container">
    <div class="cart-information">
        <p class="page_title">Корзина</p>
        <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                <li class="bc__elem"><a href="{{ route('home') }}">Главная</a></li>
                <li class="bc__elem">Корзина</li>
            </ul>
            <div class="cart-line">
                <div class="line-elem">
                    <div class="line-elen-success"></div>
                </div>
                <div class="cart-line-elem-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <p>Корзина</p>
                </div>
                <div class="cart-line-elem-2">
                    2
                    <p>Оформление заказа</p>
                </div>
                <div class="cart-line-elem-3">
                    3
                    <p>Готово!</p>
                </div>
            </div>
        </div>
        <div class="cart-elems">
            <div class="cart-header">
                <p class="foto">Фото</p>
                <p class="naim">Наименование</p>
                <p class="cena">Цена</p>
                <p class="colvo">Количество</p>
                <p class="summa">Сумма</p>
            </div>
            <div class="cart-body">
                @if(count($products))
                @foreach($products as $product)
                <div class="body-element">
                    <button class="delete-btn" id="{{ $product->id }}" data-id="{{ $product->id }}" data-cartcount="{{ \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() }}" data-cartsum="{{ \Cart::session($_COOKIE['cart_id'])->getTotal() }} ₽">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16" style="color: white;">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <div class="image-elem">
                        <img src="{{ asset('uploads/'.$product->attributes->thumbnail.'') }}" alt="">
                    </div>
                    <div class="elem-title">
                        <div>
                            <p class="title-title">
                                {{ $product->name }}
                            </p>
                            <p class="title-article">
                                Артикул: {{ $product->attributes->article }}
                            </p>
                        </div>

                    </div>
                    <div class="elem-cost">
                        <p class="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->price }} ₽</p>

                    </div>
                    <div class="elem-colvo">
                        <div class="colvo-count">
                            <input class="count-input" data-id="{{ $product->id }}" data-article="{{ $product->attributes->article }}" data-count="{{ $product->quantity }}" data-price="{{ $product->price }}" type="number" value="{{ $product->quantity }}" onKeyDown="if(this.value.length==4) this.value = this.value.slice(0,-1)" min="1" max="9999">
                        </div>
                        <button class="update-count" data-id="{{ $product->id }}" data-quantity="{{ \Cart::get($product->id)->quantity }}" data-all="{{ $product->attributes->count }}">
                            Обновить кол-во
                        </button>
                        <div class="error-to-update">
                            Достигнут лимит доступного количества
                        </div>
                    </div>
                    <div class="elem-sum">
                        <p id="{{ $product->id }}" data-sum="" data-price="{{\Cart::get($product->id)->getPriceSum()}}">{{\Cart::get($product->id)->getPriceSum()}} ₽</p>
                    </div>
                   <!-- <div class="process-delete">
                        <p></p>
                    </div>-->
                </div>
                @endforeach

                @else
                <p style="width: 100%; font-size: 25px; font-weight: 700; margin-top: 100px; text-align: center;">Ваша корзина пуста</p>
                @endif
            </div>
            <div class="total-sum">
                <div class="total-cart-sum">
                    <div>
                        <p class="" style="color: rgba(80, 80, 80, 0.6);">
                            Сумма заказа
                        </p>
                        <p id="SumByCart" data-sum="{{ \Cart::getSubTotal() }}" style="display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: 600;">
                            {{ \Cart::getSubTotal() }} ₽

                        </p>
                    </div>

                </div>
                <div class="total-to-pay">
                    <div>
                        <p style="color: rgb(63, 63, 63);">Итого к оплате</p>
                        <p id="SumToPay" data-sum="{{ \Cart::getSubTotal() }}" style="display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: 600;">
                            {{ \Cart::getSubTotal() }} ₽
                        </p>

                    </div>

                </div>
                <div class="buttons">
                    <a href="{{ route('catalog') }}" class="continue">Продолжить покупки</a>
                    @if((\Cart::session($_COOKIE['cart_id'])->getContent()->count()) && ( \Cart::getSubTotal() >= 500))
                    <a href="{{ route('order') }}" class="pay">Оформить заказ</a>
                    @else
                    <p style="width:100%; font-size:18px; padding: 10px 40px 0px 40px; text-align:center; font-weight:500;">Минимальная сумма заказа 500руб.</p>
                    @endif
                </div>
            </div>
            @if(session()->has('error'))
                <div class="errors-on-page">
                    {{session('error')}}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection