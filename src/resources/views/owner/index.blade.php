@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner/index.css') }}">
@endsection

@section('button')
<div class="logout">
    <button onclick="location.href='/'">HOME</button>
    <form action="owner/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
</div>
@endsection

@section('main')
<div class="main__contents">
    <div class="main__title">
        <h2>店舗情報</h2>
    </div>
    <div class="shop__create">
        <a href="/owner/create">店舗の新規登録</a>
    </div>
    @foreach($shops as $shop)
    <div class="card" id="{{ $shop->id }}">
        <div class="card__img">
            <img src="{{ $shop->image }}" alt="{{ $shop->name }}">
        </div>
        <h2>{{ $shop->name }}</h2>
        <div class="card__content">
            <div class="card__content-tag">
                <span class="card__content-tag">#{{ $shop->area->name }}</span><br>
                <span class="card__content-tag">#{{ $shop->genre->name }}</span>
            </div>
            <div class="card__content-detail">
                <div class="card__content-detail-link">
                    <form action="/owner/edit" method="get">
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <button>更新</button>
                    </form>
                    <form action="/owner/delete" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <button>削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="main__contents">
    <div class="reservation__contents">
        <div class="main__title">
            <h2>予約情報</h2>
        </div>
        <div class="reservation__table">
            <table>
                <tr class="reservation__table-head">
                    <th>店舗名</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>日時</th>
                    <th>人数</th>
                </tr>
                @foreach($shops as $shop)
                @foreach($shop->getReservation() as $reservation)
                <tr>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->user->email }}</td>
                    <td>{{$reservation->date->format('Y/m/d')}} {{ $reservation->time->format('H:i')}}</td>
                    <td>{{ $reservation->number }}人</td>
                </tr>
                @endforeach
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection