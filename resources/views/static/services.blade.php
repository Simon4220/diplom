@extends('layouts.layout')

@section('title', 'resheniya-i-uslugi')

@section('content')
<div class="container">
    <div class="services-information">
        <p class="page_title">Решения и услуги</p>
        <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                <li class="bc__elem">Главная</li>
                <li class="bc__elem">Решения и услуги</li>
            </ul>
        </div>
        <div class="services-elems">
            <div class="service">
                <div class="service-img">
                    <img src="{{ asset('assets/front/images/page1.jpg') }}" alt="">
                </div>
                <div class="service-desc">
                    <p class="desc-title">
                        Бренды и агенства
                    </p>
                    <p class="desc-desc">
                        Мы работаем вместо с маркетинговыми агентствами для реализации проектов их клиентов с
                        применением технологий Интернета вещей (NFC, Bluetooth, Штрих-коды). У нас есть
                        продукты,
                        услуги и
                        опыт, необходимые для успеха следующей интерактивной кампании вашего клиента. Агентство
                        управляет проектом и взаимодействует с клиентом, а мы заботимся о продуктах и
                        технологиях.
                    </p>
                </div>
            </div>
            <div class="service">
                <div class="service-img">
                    <img src="{{ asset('assets/front/images/page2.jpg') }}" alt="">
                </div>
                <div class="service-desc">
                    <p class="desc-title">
                        Типографии и производители
                    </p>
                    <p class="desc-desc">
                        Мы предоставляем технологии Интернета вещей типографиям, производителям упаковки и
                        других товаров. Это позволяет им делать свои продукты интерактивными. Мы поставляем
                        метки, решения для кодирования и опыт, необходимый для производства интернет-продуктов.
                    </p>
                </div>
            </div>
            <div class="service">
                <div class="service-img">
                    <img src="{{ asset('assets/front/images/page3.jpg') }}" alt="">
                </div>
                <div class="service-desc">
                    <p class="desc-title">
                        Разработчики приложений
                    </p>
                    <p class="desc-desc">
                        Мы помогаем поставщикам услуг и компаниям-разработчикам продумать, как наилучшим образом
                        подключить их программное обеспечение и сервисы к физическому миру. Мы используем наш
                        богатый опыт во многих отраслях, чтобы помочь создать лучший интерактивный опыт
                        взаимодействия с пользователем и избежать скрытых ошибок.
                    </p>
                </div>
            </div>
        </div>
        <p class="question">Что мы делаем?</p>
        <div class="question-answer">
            <div class="answer-elem">
                <div class="answer-img">
                    <img src="{{ asset('assets/front/images/1.png') }}" alt="">
                </div>
                <div class="asnwer-content">
                    <p class="answer-title">
                        Технологическое сопровождение
                    </p>
                    <p class="answer-desc">
                        NFCPoint имеет опыт работы с технологиями Интернета вещей
                        (NFC, Bluetooth и Штрих-коды). Мы готовы помочь Вам разобраться
                        в технологии и обеспечить необходимую техническую поддержку.
                    </p>
                </div>
            </div>
            <div class="answer-elem">
                <div class="answer-img">
                    <img src="{{ asset('assets/front/images/2.png') }}" alt="">
                </div>
                <div class="asnwer-content">
                    <p class="answer-title">
                        Поставка меток и оборудования
                    </p>
                    <p class="answer-desc">
                        NFCPoint предлагает один из самых широких ассортиментов NFC меток и NFC оборудования
                        в России. На нашем складе всегда в наличие нескольно десятков тысяч единиц товара.
                        Мы работает напрямую с производителями меток, чтобы предлагать лучшие продкуты
                        NFC по самым низким ценам и с минимальным временем выполнения заказа.
                    </p>
                </div>
            </div>
            <div class="answer-elem">
                <div class="answer-img">
                    <img src="{{ asset('assets/front/images/3.png') }}" alt="">
                </div>
                <div class="asnwer-content">
                    <p class="answer-title">
                        Программирование меток
                    </p>
                    <p class="answer-desc">
                        NFCPoint выпоняет все необходимые операции по подготовке
                        NFC меток к использованию в вашем проекте. Мы также предлагаем программное
                        обеспечение и сервисы для работы с NFC метками темс компаниям, которые
                        выполняют кодирование NFC меток самостоятельно.
                    </p>
                </div>
            </div>
            <div class="answer-elem">
                <div class="answer-img">
                    <img src="{{ asset('assets/front/images/4.png') }}" alt="">
                </div>
                <div class="asnwer-content">
                    <p class="answer-title">
                        Управление метками
                    </p>
                    <p class="answer-desc">
                        В процессе реализации проекта часто требуется изменять
                        информацию, которую получают пользователи при
                        взаимодействии с метками. Вы можете использовать
                        платформу NFCPoint для управления контентом, размещаемого
                        на метках. Контент задается в личном кабинете через
                        веб-приложение, перезаписывать метки не требуется.
                    </p>
                </div>
            </div>
            <div class="answer-elem">
                <div class="answer-img">
                    <img src="{{ asset('assets/front/images/5.png') }}" alt="">
                </div>
                <div class="asnwer-content">
                    <p class="answer-title">
                        Аналитика
                    </p>
                    <p class="answer-desc">
                        Для оценки ROI инвестиций в Интернет вещей необходим сбор
                        аналитических данных в ходе проекта. Платформа NFCPoint
                        предоставляет вам данные и инструменты для анализа и
                        составления отчетов об эффективности ваших проектов.
                    </p>
                </div>
            </div>
            <div class="answer-elem">
                <div class="answer-img">
                    <img src="{{ asset('assets/front/images/6.png') }}" alt="">
                </div>
                <div class="asnwer-content">
                    <p class="answer-title">
                        Консалтинг
                    </p>
                    <p class="answer-desc">
                        Мы работаем с компаниями, чтобы помочь определить их
                        стратегию внедрения Интернета вещей. Участвуем в
                        разработке продуктов и подходов к выходу на рынок. чтобы
                        обеспечить успешность проекта.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection