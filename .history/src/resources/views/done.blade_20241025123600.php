@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__text">
        <p>ご予約ありがとうございます</p>
    </div>
    <div class="main__login">
        <a class="main__login-button" href="./">戻る</a>
    </div>
</div>
@endsection