@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="blog">
        <p class="page_title">Блог</p>
        <div class="breadcrumbs">
            <ul class="breadcumbs__elems">
                <li class="bc__elem"><a href="{{ route('home') }}">Главная</a></li>
                <li class="bc__elem"><a>Блог</a></li>
            </ul>
        </div>
        <div class="blog-elems">
            @foreach($posts as $post)
            <div class="blog-element">
                <div class="previe">
                    <a href="{{ route('article.show', ['article' => $post->slug]) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                </div>
                <div class="date">
                    <p>{{ $post->getPostDate() }}</p>
                </div>
                <div class="blog-title">
                    <p>Расширенная поддержка NFC на iPhone в iOS 13</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection