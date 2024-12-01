@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager/index.css') }}">
@endsection

@section('button')
<div class="logout">
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
</div>
@endsection

@section('main')
<div class="main__title">
    <h2>店舗情報</h2>
</div>
<div class="main__contents">
    @foreach($shops as $shop)
    <div class="card" id="{{ $shop->id }}">
        <div class="card__img">
            <img src="{{ $shop->image }}">
        </div>
        <h2>{{ $shop->name }}</h2>
        <div class="card__content">
            <div class="card__content-tag">
                <span class="card__content-tag">#{{ $shop->area->name }}</span><br>
                <span class="card__content-tag">#{{ $shop->genre->name }}</span>
            </div>
            <div class="card__content-detail">
                <div class="card__content-detail-link">
                    <form action="/manager/update" method="get">
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <button>更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="main__title">
    <h2>予約情報</h2>
</div>
<div class="reservation__contents">
    <div class="reservation__table">
        <table>
            <tr>
                <th>店舗名</th>
                <th>日時</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>人数</th>
            </tr>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->shop->name }}</td>
                <td>{{ $reservation->date->format('Y/m/d') }} {{ $reservation->time->format('H:i') }}</td>
                <td>{{ $reservation->user->name}}</td>
                <td>{{ $reservation->user->email}}</td>
                <td>{{ $reservation->number }}人</td>
            </tr>
            @endforeach
    </div>
</div>
@endsection