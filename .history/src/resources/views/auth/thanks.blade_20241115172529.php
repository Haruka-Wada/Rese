@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks_done.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__text">
        <p>
            会員登録ありがとうございます!
            
        </p>
    </div>
    <div class="main__login">
        <a class="main__login-button" href="./login">ログインする</a>
    </div>
</div>
@endsection