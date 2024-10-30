@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('main')
<div class="main__wrapper">
    <div class="main__contents">
        @foreach(shops as shop)
        <div class="card">
            <div class="card__img">
                <img src="{{ shop->image }}">
            </div>
            <div class="card__content">
                <div class="card__content-name">{</div>
                <h2 class="card__content-ttl">
                    今日の朝ごはんは卵と肉を合わせたバランスの良いメニューです。
                </h2>
                <div class="card__content-tag">
                    <p class="card__content-tag-item">#朝ごはん</p>
                    <p class="card__content-tag-item card__content-tag-item--last">
                        2021/01/01
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection