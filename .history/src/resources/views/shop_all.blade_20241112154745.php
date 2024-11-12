@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('search')
<div class="header__search">
    <select name="area_id" id="area_id" class="header__search-area">
        @if(empty(old('area_id')))
        <option value=""> All area</option>
        @endif
        @foreach($areas as $area)
        <option value="{{ $area->id }}" class="header__search-area-item" @if(old('area_id')==$area->id) selected @endif>{{ $area->name }}</option>
        @endforeach
    </select>
    <select name="genre_id" id="genre_id" class="header__search-genre">
        @if(empty(old('area_id')))
        <option value=""> All genre</option>
        @endif
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}" class="header__search-area-item" @if(old('genre_id')==$area->id) selected @endif>{{ $genre->name }}</option>
        @endforeach
    </select>
    <div class="header__search-icon">
        <label for="search"><img src="{{ asset('img/search.png') }}"></label>
    </div>
    <input type="text" id="search" class="header__search-keyword" placeholder="Search ...">
</div>
@endsection

@section('main')
<div class="main__wrapper">
    <div class="main__contents">
        @foreach($shops as $shop)
        <div class="card" id="{{ $shop->id }}">
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
                    <div class="card__content-detail-link">
                        <form action="/detail" method="post">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                            <button>詳しくみる</button>
                        </form>
                    </div>
                    <div class="card__content-detail-fav">
                        @auth
                        @if(!$shop->isLikedBy(Auth::user()))
                        <img class="like-toggle" src=" {{ asset('img/heart.png') }}" alt="お気に入りボタン" data-shop-id="{{ $shop->id }}">
                        @else
                        <img class="like-toggle liked" src="{{ asset('img/heart.png') }}" alt="お気に入りボタン" data-shop-id="{{ $shop->id }}">
                        @endif
                        @endauth
                    </div>
                    @guest
                    <div class="card__content-detail-fav">
                        <img src="{{ asset('img/heart.png') }}" alt="お気に入りボタン">
                    </div>
                    @endguest
                </div>
            </div>
        </div>
        @endforeach
        <ul>
            <li></li>
        </ul>
    </div>
</div>

<script src="{{ asset('js/favorite.js') }}"></script>
<script>
    $(function() {
        $('[name=area_id]').change(function() {
            areaId = $('[name="area_id"]').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/search',
                method: 'GET',
                data: {
                    'area_id': areaId
                },
            }).done(function(res) {
                const shops = res.shops;
                $.each
            })
        })
    })
</script>
@endsection