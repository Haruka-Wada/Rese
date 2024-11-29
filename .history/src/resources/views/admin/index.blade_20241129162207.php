@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('logout')
<div class="logout-button">
    <form action="/logout" method="post">
        @csrf
        <button class="hamburger__menu-logout">Logout</button>
    </form>
</div>
@endsection

@section('main')
<div class="form__container">
    <div class="form__title">
        <p class="form__title-text">
            Manager Registration
        </p>
    </div>
    <div class="form__content">
        <form class="form" action="manager/register" method="post">
            @csrf
            <div class="form-item">
                <div class="form-icon">
                    <img src="{{ asset('img/user.png') }}" alt="">
                </div>
                <div class="form-text">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                </div>
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form-item">
                <div class="form-icon">
                    <img src="{{ asset('img/mail.png') }}" alt="">
                </div>
                <div class="form-text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
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
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="form-button">
                <button>登録</button>
            </div>
        </form>
    </div>
</div>

@endsection