@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
@endsection

@section('button')
<div class="home-button">
    <button onclick="location.href='/'">HOME</button>
</div>
@endsection

@section('main')
<div class="form__container">
    <div class="form__title">
        <p class="form__title-text">
            Owner Login
        </p>
    </div>
    <div class="form__content">
        <form class="form" action="/owner/login" method="post">
            @csrf
            <div class="form-item">
                <div class="form-icon">
                    <img src="{{ asset('img/mail.png') }}" alt="">
                </div>
                <div class="form-text">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="email">
                </div>
            </div>
            <div class="form-item">
                <div class="form-icon">
                    <img src="{{ asset('img/key.png') }}" alt="">
                </div>
                <div class="form-text">
                    <input type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form__error">
                @error('login')
                {{ $message }}
                @enderror
            </div>
            <div class="form-button">
                <button>ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection