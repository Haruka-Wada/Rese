@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('main')
<div class="main__wrapper">
    <div class="main__title">
        <h2>{{ Auth::user()->name }}さん</h2>
    </div>
    <div class="main__container">
        <div class="reservations__container">
            <div class="reservations__container-title">
                <h2>予約状況</h2>
            </div>
            <div class="reservation__card">
                <div class="reservation__card-header">
                    <div class="reservation__card-header-icon">
                        <img src="{{ asset('img/clock.png') }}" alt="時計のアイコン">
                    </div>
                    <div class="reservation__card-header-title">
                        <p>予約1</p>
                    </div>
                    <div class="reservation__card-header-close">
                        <a href="/reservation_delete">×</a>
                    </div>
                </div>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Shop</dt>
                    <dd class="reservation__card-content">仙人</dd>
                </dl>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Date</dt>
                    <dd class="reservation__card-content">2021-04-01</dd>
                </dl>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Time</dt>
                    <dd class="reservation__card-content">17:00</dd>
                </dl>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Number</dt>
                    <dd class="reservation__card-content">3人</dd>
                </dl>
            </div>
        </div>
        <div class="favorites__container">
            <div class="favorites__container-title">
                <h2>お気に入り店舗</h2>
            </div>
            <div class="favorites__contents">
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
                            <span class="card__content-tag-area"></span>
                            <span class="card__content-tag-area">#{{ $shop->genre->name }}</span>
                        </div>
                        <div class="card__content-detail">
                            <div class="card__content-detail-link">
                                <form action="/detail" method="post">
                                    @csrf
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                    <button>詳しくみる</button>
                                </form>
                            </div>
                            <div class="card__content-detail-fav">
                                <img class="like-toggle liked" src="{{ asset('img/heart.png') }}" alt="お気に入りボタン" data-shop-id="{{ $shop->id }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection