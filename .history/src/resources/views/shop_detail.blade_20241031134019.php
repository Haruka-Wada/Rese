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
    <div class="reservation"></div>
</div>
@endsection