@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('main')
<div class="form__container">
    <div class="form__title">
        <p class="form__title-text">
            Login
        </p>
    </div>
    <div class="form__content">
        <form class="form" action="/login" method="post">
            @csrf
            <div class="form-item">
                <div class="form-icon">
                </div>
                <div class="form-text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
            </div>
            <div class="form-item">
                <div class="form-icon">
                </div>
                <div class="form-text">
                    <input type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-button">
                <button>ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection