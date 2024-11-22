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
            <div class="review__title">総合評価</div>
            <form action="/score" method="post" id="review">
                @csrf
                <div class="review__form">
                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                    @for($i = 5; $i > 0 ; $i--)
                    <input type="radio" name="rating" class="review__score" id="rating{{$i}}" value="{{$i}}">
                    <label class="review__score-label" for="rating{{$i}}"><img src="{{asset('img/star.png')}}" alt="rating"></label>
                    @endfor
                </div>

                <p class="review__title">コメント</p>
                <textarea class="review__comment" name="comment" placeholder="店舗へのコメントを記入してください。"></textarea>
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

<script type="text/javascript">

</script>
@endsection