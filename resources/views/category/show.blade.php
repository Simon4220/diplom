@extends('layouts.layout')

@section('title', $category->title)

@section('custom-js')
<script>
    $(document).on('click', '.addToCart', function(e) {
        e.preventDefault()
        addToCart(this)
    })

    function addToCart(event) {
        let id = $(event).data('id')
        let price = parseInt($(event).data('price'))
        let count = 1
        let totalPrice = parseInt($('.menu__cost').text())
        let totalCount = parseInt($('.menu__count').text())
        totalPrice += price
        totalCount += count
        $('.menu__count').text(totalCount)
        $('.menu__cost').text(totalPrice + ' ₽')
        let article = $(event).data('article');
        $.ajax({
            url: "{{ route('addToCart') }}",
            type: "POST",
            data: {
                id: id,
                count: count,
                article: article,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data)
            },
            error: (data) => {
                console.log(data)
            }
        })
    }
    $(document).on('click', '.sort-by-cost', function(e) {
        e.preventDefault()
        sortByPrice(this)
    })

    function sortByPrice(event) {
        $('.sort-by-cost').removeClass('sort-cost-active')
        $(event).addClass('sort-cost-active')
        let slug = $('orderByCategory').data('slug')
        console.log(slug)
        let orderCost = $('.sort-by-cost.sort-cost-active').data('sort')
        let orderCount = $('.sort-by-count.sort-count-active').data('sort')
        console.log(orderCost)
        console.log(orderCount)
        $.ajax({
            uri: "{{ route('category.show', ['category' => " + slug + "]) }}",
            type: "GET",
            data: {
                orderCost: orderCost,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $('.products').html(data)
            },
            error: (data) => {
                console.log(data)
            }
        })
    }
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
                <li class="bc__elem"><a>{{ $category->title }}</a></li>
            </ul>
        </div>
        <div class="magazin">
            <div class="categories__menu">
                @include('layouts.categories')
            </div>

            <div class="magazin-products">
                <div class="sort">
                    <p class="sort-by">Сортировка по:</p>
                    <div class="sort-by-cost sort-cost-active" data-sort="default">По умолчанию</div>
                    <div class="sort-by-cost" data-sort="min-max">Увеличению цены</div>
                    <div class="sort-by-cost" data-sort="max-min">Уменьшению цены</div>
                </div>
                <div class="products">
                    @foreach($products as $product)
                    <div class="product-element">
                        <div class="elem-image">
                            <a href="{{ route('product.show', [
                                'category' => $product->category->slug,
                                'slug' => $product->slug
                            ]) }}"><img src="{{ $product->getImage() }}" alt=""></a>
                        </div>
                        <a href="" class="elem-desc">

                            <p class="elem-desc-title">{{ $product->title }}</p>
                            <p class="elem-desc-arc">Артикул:</p>
                            <p class="elem-desc-arc-title">{{ $product->article }}</p>

                        </a>

                        <div class="elem-action">
                            <p class="cost">{{ $product->cost }} ₽</p>
                            <button class="addToCart" data-id="{{ $product->id }}" data-article="{{ $product->article }}" data-price="{{ $product->cost }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <p>В корзину</p>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection