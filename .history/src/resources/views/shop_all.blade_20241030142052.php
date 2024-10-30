@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
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
                    <qp class="card__content-tag-area">#{{ $shop->area->name }}</qp>
                    <p class="card__content-tag-area">#{{ $shop->genre->name }}</p>
                </div>
                <div class="card__content-detail">
                    <a href="">詳しく見る</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection