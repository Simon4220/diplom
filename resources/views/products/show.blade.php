@extends('layouts.layout')

@section('title', $product->title)

@section('custom-js')
<script>
    $(document).ready(function() {
        $('.addToCart').on('click', function(e) {
            e.preventDefault()
            addToCart(this)
        })

        function addToCart(event) {
            var id = $(event).data('id')
            var count = parseInt($('#count-input').val())
            var price = parseInt($('.cost').text())
            let article = $(event).data('article')
            let all = $(event).data('count')
            if (all >= count) {
                var totalPrice = parseInt($('.menu__cost').text())
                var totalCount = parseInt($('.menu__count').text())
                totalCount += count
                totalPrice += price*count
                totalPrice = parseFloat(totalPrice)
                totalPrice += ' ₽'
                $('.menu__count').text(totalCount)
                $('.menu__cost').text(totalPrice)

                $.ajax({
                    url: "{{ route('addToCart') }}",
                    type: "POST",
                    data: {
                        id: id,
                        count: count,
                        article: article,
                        all: all
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {

                    },
                    error: (data) => {
                        console.log(data)
                    }
                })
            } else {
                $('.error-to-add').addClass('error-to-add-active')
                setTimeout(function() {
                    $('.error-to-add').removeClass('error-to-add-active')
                }, 3000)
            }

        }
    })
</script>
@endsection

@section('content')
<div class="container">
    <div class="product-information">
        <p class="page_title">Каталог</p>
        <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                <li class="bc__elem"><a href="{{ route('home') }}">Главная</a></li>
                <li class="bc__elem"><a href="{{ route('catalog') }}">Каталог</a></li>
                <li class="bc__elem"><a href="{{ route('category.show', ['category' => $product->category->slug]) }}">{{ $product->category->title }}</a></li>
                <li class="bc__elem" style="padding: 0;"><a>{{ $product->title }}</a></li>
            </ul>
        </div>
        <div class="magazin">
            <div class="categories__menu">
                @include('layouts.categories')
            </div>
            <div class="product__cart">
                <div class="product__cart-header">
                    <div class="header-image">
                        <img src="{{ $product->getImage() }}" alt="">
                    </div>
                    <div class="header_description">
                        <p class="description-title">
                            {{ $product->title }}
                        </p>
                        <div class="description-article">
                            <p class="article-title">Артикул: </p>
                            <p class="article-content">{{ $product->article }}</p>
                        </div>

                        <div class="descrption-count">
                            <p style="color: #1fc7b1; font-weight: 500;">В наличии</p>
                            <p style="color: rgba(50, 50, 50, .9); font-weight: 500;">{{ $product->count }} шт</p>
                        </div>
                        <div class="description-option">
                            <p class="cost">{{ $product->cost }}
                                <img src="{{ asset('assets/front/images/ruble-currency-sign.svg') }}" alt="">
                            </p>
                            <div class="option-count">
                                <input type="text" value="1" onKeyDown="if(this.value.length==4) this.value = this.value.slice(0,-1)" id="count-input" min="1" max="9999">
                                <button class="up" id="up">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                                    </svg></button>
                                <button class="down" id="down">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </button>
                            </div>
                            @if($product->count)
                            <button class="addToCart" 
                            data-id="{{ $product->id }}" 
                            data-count="{{ $product->count }}"
                            data-article="{{ $product->article }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <p>В корзину</p>
                            </button>
                            @else
                            <div class="count-false">
                                Нет в наличии
                            </div>
                            @endif
                        </div>
                        <div class="error-to-add">
                            Невозможно добавить больше чем доступно для заказа
                        </div>
                    </div>
                    <div class="tabs">
                        <div class="tabs-headers">
                            @if(!is_null($product->specifications))
                            <div class="specification">
                                <button class="header-button" id="spec-btn">
                                    <p class="tab-header">Характеристики</p>
                                </button>
                            </div>
                            @endif
                            @if(!is_null($product->description))
                            <div class="description">
                                <button class="header-button" id="desc-btn">
                                    <p class="tab-header">Описание</p>
                                </button>
                            </div>
                            @endif
                            @if(!is_null($product->applications))
                            <div class="application">
                                <button class="header-button" id="app-btn">
                                    <p class="tab-header">Приложения и сервисы</p>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="tabs-content">
                            @if(!is_null($product->specifications))
                            <div class="specification-content">
                                {!! $product->specifications !!}
                            </div>
                            @endif
                            @if(!is_null($product->description))
                            <div class="description-content">
                                {!! $product->description !!}
                            </div>
                            @endif
                            @if(!is_null($product->applications))
                            <div class="application-content">
                                {!! $product->applications !!}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection