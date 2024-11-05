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
    </div>
</div>
@endsection
