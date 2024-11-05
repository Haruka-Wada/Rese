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
                    <div class=""></div>
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
        </div>
    </div>
</div>
@endsection