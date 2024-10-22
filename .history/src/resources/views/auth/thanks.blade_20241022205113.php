@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__text">
        <p></p>
        <div class="main__login-button">
            <button>ログイン</button>
        </div>
    </div>
</div>
@endsection