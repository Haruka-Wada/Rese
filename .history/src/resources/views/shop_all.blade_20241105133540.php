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
    <input type="text" id="search" class="header__search-keyword" placeholder="Search ...">
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
                    <div class="card__content-detail-link">
                        <form action="/detail" method="post">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                            <button>詳しくみる</button>
                        </form>
                    </div>
                    @auth
                    @if(!$favorite->isLikedBy(Auth::user()))
                    <div class="card__content-detail-fav like-toggle">
                        <img src="{{ asset('img/heart.png') }}" alt="">
                    </div>
                    @else
                    <div class="card__content-detail-fav like-toggle">
                        <img src="{{ asset('img/heart.png') }}" alt="">
                    </div>
                    @endif
                    @endauth
                    @guest
                    <div class="card__content-detail-fav">
                        <img src="{{ asset('img/heart.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    $(function() {
        let like =$('.like-toggle');
        like.on('click', function() {
            let $this
        })
    })

</script>
@endsection