@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="shop__container">
        <div class="shop__name-area">
            <p>今回のご利用はいかがでしたか？</p>
        </div>
        <div class="card" id="{{ $shop->id }}">
            <div class="card__img">
                <img src="{{ $shop->image }}" alt="{{ $shop->name }}">
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
                        <form action="/detail/" method="get">
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
                        <a href="/login"><img src="{{ asset('img/heart.png') }}" alt="お気に入りボタン"></a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div class="review__container">
        <div class="review__wrap">
            <div class="review__title">体験を評価してください</div>
            <form action="/score" method="post" id="review">
                @csrf
                <div class="review__form">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    @for($i = 5; $i > 0 ; $i--)
                    <input type="radio" name="rating" class="review__score" id="rating{{$i}}" value="{{$i}}">
                    <label class="review__score-label" for="rating{{$i}}"><img src="{{asset('img/star.png')}}" alt="rating"></label>
                    @endfor
                </div>
                <div class="review__error">
                    @error('rating')
                    {{ $message }}
                    @enderror
                </div>
                <p class="review__title">口コミを投稿</p>
                <textarea class="review__comment" name="comment" placeholder="カジュアルな夜のお出かけににおすすめのスポット"></textarea>
                <div class="review__error">
                    @error('comment')
                    {{ $message }}
                    @enderror
                </div>
            </form>
            <div class="review__button">
                <button type="submit" form="review">投稿する</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/favorite.js') }}"></script>
@endsection