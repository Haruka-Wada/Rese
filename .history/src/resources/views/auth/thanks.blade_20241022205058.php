@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__text">
        <div></div>
        <div class="mainbutton">
            <button>ログイン</button>
        </div>
    </div>
</div>
@endsection