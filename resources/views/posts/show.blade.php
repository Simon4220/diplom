@extends('layouts.layout')

@section('content')

<div class="container">
    <p class="page_title">Блог</p>
    <div class="breadcrumbs">
        <ul class="breadcumbs__elems">
            <li class="bc__elem"><a href="{{ route('home') }}">Главная</a></li>
            <li class="bc__elem"><a href="{{ route('articles') }}">Блог</a></li>
            <li class="bc__elem">{!! $post->title !!}</li>
        </ul>
    </div>
    <div class="blog-elem-content">
        <div class="post-image">
            <img src="{{ $post->getImage() }}" alt="">
        </div>
        <div class="post-title">
            <p>{{ $post->title }}</p>
        </div>
        <div class="post-date">
            <p>{{ $post->getPostDate() }}</p>
        </div>
        <div class="post-content">
            {!! $post->content !!}
        </div>
    </div>
</div>

@endsection