@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                            <h3 class="card-title">Список категорий</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить
                                категорию</a>
                            @if(count($categories)) 
                                <div class="table">
                                    <div class="table__row">
                                    @foreach($categories as $category)
                                        <div class="table__col">
                                            <div class="col__id">
                                                <p>{{ $category->id }}</p>
                                            </div>
                                            <div class="col__title">
                                                <p>{{ $category->title }}</p>
                                            </div>
                                            <div class="col__parent">
                                                <p>{{ $category->category_id }}</p>
                                            </div>
                                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1" style="position: absolute; right: 10px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form
                                                action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                method="post" class="float-left" style="position: absolute; right: 55px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @foreach($category->categories as $childCategory)
                                        <div class="child__col">
                                            <div class="col__id">
                                                <p>{{ $childCategory->id }}</p>
                                            </div>
                                            <div class="col__title">
                                                <p>{{ $childCategory->title }}</p>
                                            </div>
                                            <div class="col__parent">
                                                <p>{{ $category->title }}</p>
                                            </div>
                                            <a href="{{ route('categories.edit', ['category' => $childCategory->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1" style="position: absolute; right: 10px;">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('categories.destroy', ['category' => $childCategory->id]) }}"
                                                        method="post" class="float-left" style="position: absolute; right: 55px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                        </div>
                                        @endforeach
                                    @endforeach
                                    </div>
                                </div>
                                        
   
                                 
                                </div>
                            @else
                                <p>Категорий пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
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

