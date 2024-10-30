@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('search')
<div class="header__search">
    <select name="area_id" id="area_id" class="header__search-area">
        @if(empty(old('area_id')))
        <option value="" disabled selected> All area</option>
        @endif
        @foreach($areas as $area)
        <option value="{{ $area->id }}" class="header__search-area-item" @if(old('area_id')==$area->id) selected @endif>{{ $area->name }}</option>
        @endforeach
    </select>
    <select name="genre_id" id="genre_id" class="header__search-genre">
        @if(empty(old('area_id')))
        <option value="" disabled selected> All genre</option>
        @endif
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}" class="header__search-area-item" @if(old('genre_id')==$area->id) selected @endif>{{ $genre->name }}</option>
        @endforeach
    </select>
    <div class="header__search-icon">
        <label for="search"><img src="{{ asset('img/search.png') }}"></label>
    </div>
    <input type="text" idclass="header__search-keyword" placeholder="Search ...">
</div>
@endsection

@section('main')
<div class="main__wrapper">
    <div class="main__contents">
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
                    <span class="card__content-tag-area">#{{ $shop->area->name }}</span>
                    <span class="card__content-tag-area">#{{ $shop->genre->name }}</span>
                </div>
                <div class="card__content-detail">
                    <a href="">詳しくみる</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection