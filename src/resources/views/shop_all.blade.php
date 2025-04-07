@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('search')
<div class="header__search">
    <form action="/sort" method="get" id="sort_form" class="sort__form">
        <select name="sort" id="sort" class="header__search-sort">
            <option value="" hidden>並び替え:ランダム</option>
            <option value="random">ランダム</option>
            <option value="desc">評価の高い順</option>
            <option value="asc">評価の低い順</option>
        </select>
    </form>
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
        <label for="keyword"><img src="{{ asset('img/search.png') }}"></label>
    </div>
    <input type="text" id="keyword" class="header__search-keyword" placeholder="Search ...">
</div>
@endsection

@section('main')
@if(session('message'))
<div class="session__message">
    {{ session('message') }}
</div>
@endif
<div class="main__contents">
    @foreach($shops as $shop)
    <div class="card" id="{{ $shop->id }}">
        <div class="card__img">
            <img src="{{ $shop->image }}" alt="{{ $shop->name }}">
        </div>
        <div class="card__content">
            <div class="card__content-name">
                <h2>{{ $shop->name }}</h2>
                <div class="card__content-rating">
                    <img src=" {{asset('img/star.png')}}" alt="rating">
                    @if(number_format($shop->ratingAverage($shop->id)->ratingAverage, 2) == 0.00)
                    <p>評価なし</p>
                    @else
                    <p> {{ number_format($shop->ratingAverage($shop->id)->ratingAverage, 2) }}</p>
                    @endif
                    <p>{{ $shop->reviewCount() }}</p>
                </div>
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
    @endforeach
    @if(isset($no_reviews))
    @foreach($no_reviews as $shop)
    <div class="card" id="{{ $shop->id }}">
        <div class="card__img">
            <img src="{{ $shop->image }}" alt="{{ $shop->name }}">
        </div>
        <div class="card__content">
            <div class="card__content-name">
                <h2>{{ $shop->name }}</h2>
                <div class="card__content-rating">
                    <img src=" {{asset('img/star.png')}}" alt="rating">
                    @if(number_format($shop->ratingAverage($shop->id)->ratingAverage, 2) == 0.00)
                    <p>評価なし</p>
                    @else
                    <p> {{ number_format($shop->ratingAverage($shop->id)->ratingAverage, 2) }}</p>
                    @endif
                    <p>{{ $shop->reviewCount() }}</p>
                </div>
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
    @endforeach
    @endif
</div>

<script src="{{ asset('js/favorite.js') }}"></script>
<script>
    $(function() {
        $('[name=area_id],[name=genre_id],[id=keyword]').change(function() {
            $('div').removeClass('show');
            var area_id = $('[name="area_id"]').val();
            var genre_id = $('[name="genre_id"]').val();
            var keyword = $('[id=keyword]').val();
            var area = $('[name="area_id"]').html();
            $.ajax({
                url: '/search',
                method: 'GET',
                data: {
                    'area_id': area_id,
                    'genre_id': genre_id,
                    'keyword': keyword
                },
            }).done(function(res) {
                var shops = res.shops;
                $.each(shops, function(index, value) {
                    var shop_id = value.id;
                    var card = document.getElementById(shop_id);
                    $(card).addClass('show');
                })
                $('.show').css('display', 'block');
                $('.card').not('.show').css('display', 'none');

                $('.session_message').text()
            }).fail(function(res) {
                alert('データ取得できませんでした。');
            })
        })
    })

    $(function() {
        $("#sort").change(function() {
            $("#sort_form").submit();
        });
    });
</script>
@endsection