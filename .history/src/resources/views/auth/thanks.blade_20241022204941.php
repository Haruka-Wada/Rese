@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('main')
<div class="form__container">
    <div class="form__content">
        <div></div>
        <div class="form-button">
            <button>ログイン</button>
        </div>
    </div>
</div>
@endsection