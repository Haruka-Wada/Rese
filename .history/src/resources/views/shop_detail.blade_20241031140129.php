@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="shop__container">
        <div class="shop__name-area">
            <button>&lt;</button>
            <h2>{{ $shop->name }}</h2>
        </div>
        <div class="shop__img">
            <img src="{{ $shop->image}}" alt="">
        </div>
        <div class="shop-tag">
            <span>#{{ $shop->area->name }}</span>
            <span>#{{ $shop->genre->name }}</span>
        </div>
        <div class="shop__outline">
            <p>{{ $shop->outline }}</p>
        </div>
    </div>
    <div class="reservation__container">
        <div class="reservation__title">
            <h2>予約</h2>
        </div>
        <form action="/reservation" method="post">
            <div class="reservation__form">
                <input type="hidden" name="shop_id" value="shop->id">
                <input type="date" name="date">
                <select name="time" id="">
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                    <option value="23:00">23:00</option>
                </select>
                <select name="number" id="">
                    @for($i = 1; $i < 50; $i++)
                        <option value="{{ $i }}">{{ $i }}人</option>
                </select>
            </div>
            <div class="reservation__cお"></div>
        </form>
    </div>
</div>
@endsection