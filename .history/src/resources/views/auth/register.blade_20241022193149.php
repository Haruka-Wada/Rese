@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection

@section('main')
<div class="main__container">
    <div class="card">
        <div class="card__title">
            <p class="card__title-text">
                Registration
            </p>
        </div>
        <div class="card__content">
            <form class="card__form" action="/register" method="post">
                @csrf
                <div class="card__form-item">
                    <div class="card__form-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                </div>
                <div class="card__form-item">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="card__form-item">
                    <input type="password" name="password">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection