@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner/update.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="shop__container">
        <div class="shop__name-area">
            <button onclick="location.href='/owner'">&lt;</button>
            <h2>{{ $shop->name }}</h2>
        </div>
        <div class="shop__img">
            <img src="{{ $shop->image}}" alt="">
        </div>
        <div class="shop__tag">
            <span>#{{ $shop->area->name }}</span>
            <span>#{{ $shop->genre->name }}</span>
        </div>
        <div class="shop__outline">
            <p>{{ $shop->outline }}</p>
        </div>
    </div>
    <div class="update__container">
        <div class="update__wrap">
            <div class="update__title">
                <h2>更新</h2>
            </div>
            <form action="/owner/update" method="post" id="update">
                @csrf
                @method('patch')
                <div class="update__form">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <input type="text" name="name" class="update__name" placeholder="店舗名">
                    <select name="area_id" id="area_id" class="update__area">
                        @if(empty(old('area_id')))
                        <option value="" disabled selected> All area</option>
                        @endif
                        @foreach($areas as $area)
                        <option value="{{ $area->id }}" class="header__search-area-item" @if(old('area_id')==$area->id) selected @endif>{{ $area->name }}</option>
                        @endforeach
                    </select>
                    <select name="genre_id" id="genre_id" class="update__genre">
                        @if(empty(old('area_id')))
                        <option value="" disabled selected> All genre</option>
                        @endif
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" class="header__search-area-item" @if(old('genre_id')==$area->id) selected @endif>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    <textarea name="outline" class="update__outline" placeholder="詳細"></textarea>
                    <input type="file" name="image" class="update__image">
                </div>
            </form>
        </div>
        <div class="update__button">
            <button form="update">更新する</button>
        </div>
    </div>
</div>
@endsection