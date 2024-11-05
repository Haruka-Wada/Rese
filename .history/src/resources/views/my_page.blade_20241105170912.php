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
            <div class="reservations__list">
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Shop</dt>
                    <dd class="reservation__confirm-content">{{ $shop->name }}</dd>
                </dl>
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Date</dt>
                    <dd class="reservation__confirm-content">2021-04-01</dd>
                </dl>
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Time</dt>
                    <dd class="reservation__confirm-content">17:00</dd>
                </dl>
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Number</dt>
                    <dd class="reservation__confirm-content">3人</dd>
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