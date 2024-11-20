@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="shop__container">
        <div class="shop__name-area">
            <button onclick="location.href='/mypage'">&lt;</button>
            <h2>{{ $reservation->shop->name }}をレビュー</h2>
        </div>
        <div class="shop__img">
            <img src="{{ $reservation->shop->image}}" alt="">
        </div>
        <div class="shop__tag">
            <span>#{{ $reservation->shop->area->name }}</span>
            <span>#{{ $reservation->shop->genre->name }}</span>
        </div>
        <div class="shop__outline">
            <p>{{ $reservation->shop->outline }}</p>
        </div>
    </div>
    <div class="review__container">
        <div class="review__wrap">
            <p class="review__title">総合評価</p>
            <form action="/score" method="post" id="score">
                @csrf
                <div class="review__form">
                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                    @for($i = 5; $i < 0; $i)
                        <input type="radio" name="score" class="review__score" id="score$i" value="$i">
                        <label class="review__score-label" for="score$i"><img src="{{asset('img/star.png')}}" alt="star"></label>
                    @endfor
                    <div class="review__error">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="review__button">
            <button type="submit" form="review">投稿する</button>
        </div>
    </div>
</div>
@endsection