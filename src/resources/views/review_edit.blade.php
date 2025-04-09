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
        <div class="review__wrapper">
            <div class="review__title">体験を評価してください</div>
            <form action="/score/update" method="post" id="review" enctype="multipart/form-data">
                @csrf
                <div class="review__form">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    @for($i = 5; $i > 0 ; $i--)
                    <input type="radio" name="rating" class="review__score" id="rating{{$i}}" value="{{$i}}" @if($reviewed->rating === $i) checked @endif>
                    <label class="review__score-label" for="rating{{$i}}"><img src="{{asset('img/star.png')}}" alt="rating"></label>
                    @endfor
                </div>
                <p class="review__title">口コミを投稿</p>
                <div class="review__error">
                    @if($errors->has('comment'))
                    @foreach($errors->get('comment') as $message)
                    <p> {{ $message }} </p>
                    @endforeach
                    @endif
                </div>
                <textarea class="review__comment" name="comment" id="textarea" maxlength="400">{{ $reviewed->comment }}</textarea>
                <div class="comment__counter" id="comment__counter">
                    <p>0/400(最高文字数)</p>
                </div>
                <p class="review__title">画像の追加</p>
                <div class="review__error">
                    @if($errors->has('image'))
                    @foreach($errors->get('image') as $message)
                    <p> {{ $message }} </p>
                    @endforeach
                    @endif
                </div>
                <div class="review__image">
                    <button type="button" class="review__image-button">クリックして写真を変更</button>
                    <input type="file" name="image" id="upload" class="review__image-upload" value="{{ $reviewed->image }}">
                </div>
                <div class="review__image-preview">
                    <img id="preview" src="{{ $reviewed->image }}" alt="口コミの画像">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="review__button">
    <button type="submit" form="review">口コミを変更</button>
</div>

<script src="{{ asset('js/favorite.js') }}"></script>
<script src="{{ asset('js/review.js') }}"></script>
@endsection