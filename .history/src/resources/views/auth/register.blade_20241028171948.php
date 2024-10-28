@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('main')
<div class="main__wrapper">
    <div class="form__container">
        <div class="form__title">
            <p class="form__title-text">
                Registration
            </p>
        </div>
        <div class="form__content">
            <form class="form" action="/register" method="post">
                @csrf
                <div class="form-item">
                    <div class="form-icon">
                        <img src="{{ asset('img/user.png') }}" alt="">
                    </div>
                    <div class="form-text">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                    </div>
                </div>
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
                    <button>登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection