@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Измение продукта</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
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
                        <h3 class="card-title">Измение продукта</h3>
                    </div>
                    <!-- /.card-header -->

                    <form role="form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название" value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="article">Актикул</label>
                                <input type="text" name="article" class="form-control @error('article') is-invalid @enderror" id="article" placeholder="Артикул" value="{{ $product->article }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    @foreach($categories as $key => $value)
                                    <option value="{{ $key }}" @if($key == $product->category_id) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="count">Количество</label>
                                <input type="text" name="count" class="form-control @error('count') is-invalid @enderror" id="count" placeholder="Количество" value="{{ $product->count }}">
                            </div>
                            <div class="form-group">
                                <label for="cost">Цена</label>
                                <input type="text" name="cost" class="form-control @error('cost') is-invalid @enderror" id="cost" placeholder="Цена" value="{{ $product->cost }}">
                            </div>
                            <div class="form-group">
                                <label for="specifications">Характеристики</label>
                                <textarea name="specifications" class="form-control @error('specifications') is-invalid @enderror" id="specifications" rows="7" placeholder="Характеристики ...">{{ $product->specifications }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Контент</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="7" placeholder="Описание ...">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="applications">Контент</label>
                                <textarea name="applications" class="form-control @error('applications') is-invalid @enderror" id="applications" rows="7" placeholder="Приложения и сервисы ...">{{ $product->applications }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label" for="thumbnail">Выберите файл</label>
                                    </div>
                                </div>
                                <div><img src="{{ $product->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection