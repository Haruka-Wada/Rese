@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('main')
<div class="main_container">
    <div class="shop_container">
        <div class="shop_name-area">
            <button>&lt;</button>
            <h2>{{ $shop->name }}</h2>
        </div>
        <div class="shop_img">
            <img src="{{ $shop->image}}" alt="">
        </div>
        <div class="shop-tag">
            <span>#{{ $shop->area->name }}</span>
            <span>#{{ $shop->genre->name }}</span>
        </div>
        <div class="shop_outline">
            <p>{{ $shop->outline }}</p>
        </div>
    </div>
    <div class="reservation_container">
        <div class="reservation_title">
            <h2>予約</h2>
        </div>
        <form action="/reservation" method="post">
            <input type="date" name="date">
            <select name="time" id="">
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="17:0">18:00</option>
                <option value="17:00">18:30</option>
                <option value="17:00">19:00</option>
                <option value="17:00">19:30</option>
                <option value="17:00">20:00</option>
                <option value="17:00">20:30</option>
                <option value="17:00">21:00</option>
                <option value="17:00">21:30</option>
                <option value="17:00">22:00</option>
                <option value="17:00">22:30</option>
                <option value="17:00">23:00</option>
            </select>
        </form>
    </div>
</div>
@endsection