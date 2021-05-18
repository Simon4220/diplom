@extends('layouts.layout')

@section('title', 'NFCpoint')

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
        let all = $(event).data('count')
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
                all: all
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data)
            },
            error: (data) => {
                console.log('Нет такого количества')
            }
        })
    }
</script>

@endsection

@section('content')
<div class="container">
    <div class="face">
        <div class="slider">
            <div class="slider__item">
                <img src="{{ asset('assets/front/images/slide.png') }}" alt="">
            </div>
        </div>
        <div class="face-second">
            <div class="face-second__elem" style="padding-bottom: 5px;">
                <a href=""><img src="{{ asset('assets/front/images/blue.png') }}" alt=""></a>
            </div>
            <div class="face-second__elem" style="padding-top: 5px;">
                <a href=""><img src="{{ asset('assets/front/images/tagle.png') }}" alt=""></a>
            </div>
        </div>
    </div>

    <div class="desc-categories">
        <a class="desc-category elem1" href="">
            <p>NFC метки</p>
            <img src="{{ asset('assets/front/images/nefak3.png') }}" alt="">
        </a>

        <a class="desc-category elem2" href="">
            <p>NFC наборы</p>
            <img src="{{ asset('assets/front/images/fakebublik.png') }}" alt="" style="height: 130%; width: 35%;">
        </a>
        <a class="desc-category elem2" href="">
            <p>NFC сервисы и ПО</p>
            <img src="{{ asset('assets/front/images/nefake1.png') }}" alt="">
        </a>
        <a class="desc-category elem2" href="">
            <p>Bluetooth метки</p>
            <img src="{{ asset('assets/front/images/ebotnya.png') }}" alt="" style="width: 30%; height: 100%; right: 30px;">
        </a>
        <a class="desc-category elem2" href="">
            <p>Средства разработки</p>
            <img src="{{ asset('assets/front/images/blackhui.png') }}" alt="" style="height: 130%; width: 40%;">
        </a>
        <a class="desc-category elem1" href="">
            <p>Печатная продукция</p>
            <img src="{{ asset('assets/front/images/tisfak.png') }}" alt="">
        </a>
    </div>
    <div class="recomended">
        <p class="recomended__desc">Рекомендованные товары</p>
        @foreach($products as $product)
        <div class="recomended__elem">
            <div class="image">
                <img src="{{ $product->getImage() }}" alt="">
            </div>
            <div class="title">
                <p>{{ $product->title }}</p>
            </div>
            <div class="cost-cart">
                <div class="cost">
                    <p>{{ $product->cost }} ₽</p>
                </div>
                <button class="addToCart" data-price="{{ $product->cost }}" data-id="{{ $product->id }}" data-article="{{ $product->article }}" data-count="{{ $product->count }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <p>В корзину</p>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="about">
        <div class="about__image">
            <img src="{{ asset('assets/front/images/about.png') }}" alt="">
        </div>
        <div class="about__desc">
            <p class="desc__header">О нас</p>
            <p class="desc__desc">NFCpoint - поставщик решений, программного обеспечения, оборудования,
                онлайн-сервисов и меток для
                NFC, QR, BLE и других технологий IoT.</p>
            <p class="desc__content">Мы соединяем онлайн, и физические миры через мобильные устройства и
                беспроводные датчики, делая
                окружающее пространство и предметы интерактивными. С момента основания в 2013 году мы приняли
                участие в реализации множества проектов, работая с компаниями по всех России.</p>
        </div>
    </div>
    <div class="why">
        <p class="desc__header">Почему NFCpoint?</p>
        <div class="why__elems">
            <div class="elem-why">
                <div class="elem-why-image">
                    <img src="{{ asset('assets/front/images/about1.png') }}" alt="">
                </div>
                <div class="elem-why-desc">
                    <p class="elem__header">Профессиональная команда</p>
                    <p class="elem__desc">Детальное знание технологий <br> Собственная разработка сервисов и
                        программного обеспечения</p>
                </div>
            </div>
            <div class="elem-why">
                <div class="elem-why-image">
                    <img src="{{ asset('assets/front/images/about2.png') }}" alt="">
                </div>
                <div class="elem-why-desc">
                    <p class="elem__header">Оперативная доставка</p>
                    <p class="elem__desc">Более 100 000 товаров в наличии на складе.
                        Работаем с ведущими службами
                        доставки</p>
                </div>
            </div>
            <div class="elem-why">
                <div class="elem-why-image">
                    <img src="{{ asset('assets/front/images/about3.png') }}" alt="">
                </div>
                <div class="elem-why-desc">
                    <p class="elem__header">Индивидуальный подход</p>
                    <p class="elem__desc">Персонализация продукции под заказ клиента</p>
                </div>

            </div>
            <div class="elem-why">
                <div class="elem-why-image">
                    <img src="{{ asset('assets/front/images/about4.png')}}" alt="">
                </div>
                <div class="elem-why-desc">
                    <p class="elem__header">Надежный партнер</p>
                    <p class="elem__desc">Работаем на рынке с 2013 года.<br>Участие во множестве проектов с
                        компаниями по всей России</p>
                </div>

            </div>
        </div>
    </div>
    <div class="confidence">
        <p class="desc__header">Нам доверяют</p>
        <div class="companies">
            <img src="{{ asset('assets/front/images/componies/ant-yapi.jpg') }}" alt="">
            <img src="{{ asset('assets/front/images/componies/logoeurocement.png') }}" alt="">
            <img src="{{ asset('assets/front/images/componies/media.png')}}" alt="">
            <img src="{{ asset('assets/front/images/componies/unipro.jpg')}}" alt="">
            <img src="{{ asset('assets/front/images/componies/vulkan.png')}}" alt="">
            <img src="{{ asset('assets/front/images/componies/РусВинил_LOGO.png')}}" alt="">
        </div>
    </div>
    <div class="picture-info">
        <div class="picture-image">
            <img src="{{ asset('assets/front/images/zelenka.jpg')}}" alt="">
        </div>
        <p class="picture-header">У Вас уже есть идеи? Свяжитесь с нами сегодня и расскажите о Вашем проекте</p>
        <p class="picture-desc">Мы окажем консультацию по технологии и подберем оборудование</p>
        <form action="{{ route('contact') }}" method="GET">
            <button type="submit" class="picture-connect">Связаться</button>
        </form>

    </div>
    <div class="popular-posts">
        <p class="desc__header">Интересные статьи</p>
        <div class="posts-elems">
            @foreach($posts as $post)
            <div class="elem">
                <div class="previe">
                    <a href="{{ route('article.show', ['article' => $post->slug]) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                </div>
                <div class="post-desc">
                    <p class="date">
                        {{ $post->getPostDate() }}
                    </p>
                    <p class="desc">
                        {{ $post->title }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection