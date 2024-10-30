@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('search')
<div class="header__search">
    <select name="" id="" class="header__search-area"></select>
    <select name="" id="" class="header__search-genre"></select>
    <input type="text" class="header__search-keyword">
</div>
@endsection

@section('main')
<div class="main__wrapper">
    <div class="main__contents">
        @foreach($shops as $shop)
        <div class="card">
            <div class="card__img">
                <img src="{{ $shop->image }}">
            </div>
            <div class="card__content">
                <div class="card__content-name">
                    <h2>{{ $shop->name }}</h2>
                </div>
                <div class="card__content-tag">
                    <span class="card__content-tag-area">#{{ $shop->area->name }}</span>
                    <span class="card__content-tag-area">#{{ $shop->genre->name }}</span>
                </div>
                <div class="card__content-detail">
                    <a href="">詳しくみる</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection