@extends('layouts.layout')

@section('title', 'Наши контакты')

@section('custom-js')
<script>
    $(document).ready(function() {
        $('.send').on('click', function() {
            let name = $('.name').val()
            let phone = $('.phone').val()
            let email = $('.email').val()
            let message = $('.comment').val()
            if ((name != '') && (phone != '') &&
                (email != '') && (message != '')) {
                $('.send-process').addClass('send-active');
                $.ajax({
                    url: "{{ route('send-mail') }}",
                    type: "POST",
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        message: message
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.name').val('')
                        $('.phone').val('')
                        $('.email').val('')
                        $('.comment').val('')
                        $('.send-process').removeClass('send-active');
                        $('.send-success').addClass('send-active');
                        setTimeout(function() {
                            $('.send-success').removeClass('send-active');
                        }, 1500)
                    },
                    error: (data) => {
                        console.log(data)
                    }
                })
            } else {
                $('.name').css('border', '1px solid red')
                $('.phone').css('border', '1px solid red')
                $('.email').css('border', '1px solid red')
                $('.comment').css('border', '1px solid red')
                setTimeout(function() {
                    $('.name').removeAttr('style')
                    $('.phone').removeAttr('style')
                    $('.email').removeAttr('style')
                    $('.comment').removeAttr('style')
                }, 500)
            }
        })
    })
</script>
@endsection

@section('content')
<div class="contacts">
    <div class="contact-form">
        <p class="page_title">Контакты</p>
        <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                <li class="bc__elem"><a href="{{ route('home') }}">Главная</a></li>
                <li class="bc__elem">Контакты</li>
            </ul>
        </div>
        <div class="contact-email">
            <p class="contact-elem">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-footer-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                </svg>
                E-mail
            </p>
            <p class="contact-info">info@nfcpoint.ru</p>
        </div>
        <div class="contact-phone">
            <p class="contact-elem"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-footer-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                Телефон</p>
            <p class="contact-info">8 (499) 391 54 05</p>
        </div>
        <div class="contact-adress">
            <p class="contact-elem">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>Адрес
            </p>
            <p class="contact-info"> г. Москва, ул. Промышленная, д.11, стр. 3</p>
        </div>
        <div class="contact-public">
            <p class="contact-elem">Соцсети</p>

        </div>
        <div class="form-feedback">
            <p class="public-elem1">У Вас остались вопросы? Напишите нам</p>
            <p class="public-elem2">Мы проконсультируем Вас по интересному вопросу</p>
            <div class="user-forms">
                <input type="text" class="name" required placeholder="Имя">
                <input type="text" class="phone" required placeholder="Телефон">
                <input type="text" class="email" required placeholder="E-mail">
            </div>
            <div class="user-comment">
                <textarea type="text" required class="comment" placeholder="Сообщение"></textarea>
            </div>
            <div class="feedback-btn">
                <button class="send">Отправить</button>
                <p class="btn-text">Нажимая на кнопку отправить вы соглашаетесь с политикой конфиденциальности</p>
                <div class="send-process">Отправляется...</div>
                <div class="send-success">Отправлено
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 5px; color: #1fc7b1;" width="22" height="22" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"></path>
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <img src="{{ asset('assets/front/images/NFCPoint_08-05-2021_15-57-30.png') }}" alt="">
    </div>
</div>
@endsection