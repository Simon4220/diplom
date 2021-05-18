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
        <button class="delete-btn" id="delete-btn" data-id="{{ $product->id }}" data-cartcount="{{\Cart::session($_COOKIE['cart_id'])->getTotalQuantity()}}" data-cartsum="{{\Cart::session($_COOKIE['cart_id'])->getTotal()}} ₽">
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
        <div class="process-delete">
            <p>Удаление...</p>
        </div>
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
        <a href="" class="continue">Продолжить покупки</a>
        <a href="" class="pay">Оформить заказ</a>
    </div>
</div>