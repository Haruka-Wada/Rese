@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner/index.css') }}">
@endsection

@section('main')
<div class="main__contents">
    <div class="main__title">
        <h2>店舗情報</h2>
    </div>
    <div class="shop__create">
        <a href="/owner/create">店舗の新規登録</a>
    </div>
    <div class="import__container">
        <form action="/owner/import" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv_file" id="csv_file" class="csv__input">
            <div class="import__wrapper">
                <button type="button" class="csv__button">CSVファイル選択</button>
                <button class="import__button">インポート</button>
            </div>
        </form>
        @if(session('message'))
        <div class="session__message">
            <p>{{ session('message') }}</p>
        </div>
        @endif
        <div class="error">
            @foreach ($errors->all() as $error)
            <li>※{{$error}}</li>
            @endforeach
        </div>
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

<script type="text/javascript">
    document.querySelector(".csv__button").addEventListener("click", () => {
        document.querySelector(".csv__input").click();
    });
</script>
@endsection