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
            @if(!$reservations->isEmpty())
            @foreach($reservations as $reservation)
            <div class="reservation__card">
                <div class="reservation__card-header">
                    <div class="reservation__card-header-icon">
                        <img src="{{ asset('img/clock.png') }}" alt="時計のアイコン">
                    </div>
                    <div class="reservation__card-header-title">
                        <p>予約{{ $loop->iteration }}</p>
                    </div>
                    <div class="reservation__card-header-close">
                        <form action="/delete" method="post">
                            @method('')
                            @csrf
                            <input type="hidden" name="reservation" value="{{ $reservation->id }}">
                            <button>×</button>
                        </form>
                    </div>
                </div>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Shop</dt>
                    <dd class="reservation__card-content">{{ $reservation->shop->name }}</dd>
                </dl>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Date</dt>
                    <dd class="reservation__card-content">{{ $reservation->date->format('Y/m/d') }}</dd>
                </dl>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Time</dt>
                    <dd class="reservation__card-content">{{ $reservation->time->format('H:i') }}</dd>
                </dl>
                <dl class="reservation__card-list">
                    <dt class="reservation__card-item">Number</dt>
                    <dd class="reservation__card-content">{{ $reservation->number }}人</dd>
                </dl>
                <div class="reservation__card-edit">
                    <form action="/edit" method="post">
                        @csrf
                        <input type="hidden" name="reservation" value="{{ $reservation->id }}">
                        <button>変更</button>
                    </form>
                </div>
            </div>
            @endforeach
            @else
            <div class="reservation-message">
                <p>予約している店舗はありません。</p>
            </div>
            @endif
        </div>
        <div class="favorites__container">
            <div class="favorites__container-title">
                <h2>お気に入り店舗</h2>
            </div>
            <div class="favorites__contents">
                @if(!$favorites->isEmpty())
                @foreach($favorites as $favorite)
                <div class="card">
                    <div class="card__img">
                        <img src="{{ $favorite->shop->image }}">
                    </div>
                    <div class="card__content">
                        <div class="card__content-name">
                            <h2>{{ $favorite->shop->name }}</h2>
                        </div>
                        <div class="card__content-tag">
                            <span class="card__content-tag-area">#{{ $favorite->shop->area->name }}</span>
                            <span class="card__content-tag-area">#{{ $favorite->shop->genre->name }}</span>
                        </div>
                        <div class="card__content-detail">
                            <div class="card__content-detail-link">
                                <form action="/detail/" method="get">
                                    <input type="hidden" name="shop_id" value="{{ $favorite->shop_id }}">
                                    <button>詳しくみる</button>
                                </form>
                            </div>
                            <div class="card__content-detail-fav">
                                <img class="like-toggle liked" src="{{ asset('img/heart.png') }}" alt="お気に入りボタン" data-shop-id="{{ $favorite->shop_id }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="reservation-message">
                    <p>お気に入り店舗はありません。</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/favorite.js') }}"></script>
@endsection