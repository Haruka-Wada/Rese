@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
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
<div class="form__container">
    <div class="form__title">
        <p class="form__title-text">
            Admin Login
        </p>
    </div>
    <div class="form__content">
        <form class="form" action="/admin/login" method="post">
            @csrf
            <div class="form-item">
                <div class="form-icon">
                    <img src="{{ asset('img/user.png') }}" alt="">
                </div>
                <div class="form-text">
                    <input type="text" name="user_id" value="{{ old('user_id') }}" placeholder="UserID">
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