@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Заказы</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Заказы</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Заказ</h3>
                    </div>
                    <!-- /.card-header -->

                    <form role="form" method="post" action="{{ route('orders.update', ['order' => $order->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Номер заказа</label>
                                <input type="text" class="form-control" disabled value="{{ $order->number_of_order }}">
                            </div>
                            <div class="form-group">
                                <label for="">Статус</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">{{ $order->getStatus(1) }}</option>
                                    <option value="2">{{ $order->getStatus(2) }}</option>
                                    <option value="3">{{ $order->getStatus(3) }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Сумма заказа</label>
                                <input type="text" class="form-control" disabled value="{{ $order->sum }}">
                            </div>
                            <div class="form-group">
                                <label for="">ФИО заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Телефон заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['phone'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Е-mail заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['email'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Город заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['city'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Адрес заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['adress'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Метод доставки заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['method'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Адрес почтовой службы заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['delivery'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Комментарий заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['comment'] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Метод оплаты заказчика</label>
                                <input type="text" class="form-control" disabled value="{{ $order->data_order['methodPay'] }}">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
                                            <th>Название товара</th>
                                            <th>Артикул</th>
                                            <th>Количество</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products_in_order as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->attributes->article }}
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->quantity*$product->price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection