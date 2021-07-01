@extends('layouts.layout')

@section('title', 'oplata i dostavka')

@section('content')
<div class="container">
      <p class="page_title">Оплата и доставка</p>
      <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                  <li class="bc__elem">Главная</li>
                  <li class="bc__elem">Оплата и доставка</li>
            </ul>
      </div>
      <div class="info-oplata" style="padding: 30px; margin-bottom: 100px;">
            <div class="oplata-elem1">
                  <p class="elem-title" style="font-size: 24px;">Размещение заказа</p>
                  <ul>
                        <li>
                              <p>
                                    <strong>На сайте</strong> - оформить заказ можно в нашем интернет магазине. Для этого достаточно заполнить корзину и выбрать способ доставки и оплаты.
                              </p>
                        </li>
                        <li>
                              <p>
                                    <strong>Электронная почта</strong> - сделать заказ можно, отправив заявку на наш почтовый адрес info@nfcpoint.ru
                              </p>
                        </li>
                        <li>
                              <p><strong>По телефону</strong> - позвонив по номеру 8(499)391-54-05, вы можете оставить заказ менеджеру.</p>
                        </li>
                  </ul>
                  <p class="oplata-min" style="font-size: 18px;"><strong>Минимальная сумма заказа - 500 руб.</strong></p>
            </div>
            <div class="oplata-elem1">
                  <p class="elem-title" style="font-size: 24px;">Оплата заказа</p>
                  <ul>
                        <li>
                              <p>
                                    <strong>Наличными при получении</strong> - заказ можно оплатить в пункте выдачи или курьеру при получении.
                              </p>
                        </li>
                        <li>
                              <p>
                                    <strong>Предоплата электронными деньгами</strong> - онлайн оплата осуществляется в любой удобной форме (Банковсая карта, QIWI, Webmoney, Яндекс-деньги)
                              </p>
                        </li>
                        <li>
                              <p><strong>Оплата по счету</strong> - юр. лицам выставляется счет для оплаты банковским переводом.</p>
                        </li>
                  </ul>
            </div>
            <div class="oplata-elem1">
                  <p class="elem-title" style="font-size: 24px;">Доставка</p>
                  <ul>
                        <li>
                              <p>
                                    <strong>Курьером СДЭК</strong> - доставка по адресу. Срок и стоимость доставки по тарифу СДЭК.
                              </p>
                        </li>
                        <li>
                              <p>
                                    <strong>Пункт выдачи СДЭК</strong> - доставка в пункт выдачи СДЭК. Срок и стоимость доставки по тарифу СДЭК.
                              </p>
                        </li>
                  </ul>
            </div>
      </div>
</div>
@endsection