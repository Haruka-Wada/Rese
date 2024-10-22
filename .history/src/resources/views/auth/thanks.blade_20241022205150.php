@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__text">
        <p>会員登録ありがとうございます</p>
    </div>
    <div class="main__login-button">
        <button>ログイン</button>
    </div>
</div>
@endsection