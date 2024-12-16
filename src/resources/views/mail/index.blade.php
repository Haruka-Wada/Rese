@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mail/index.css') }}">
@endsection

@section('button')
<div class="back">
    <button onclick="location.href='/admin'">back</button>
</div>
@endsection

@section('main')
<div class="main__container">
    <form action="/owner/send" method="post">
        @csrf
        <p>本文入力</p>
        <textarea name="message">{{ old('message') }}</textarea>
        <div class="send__button">
            <button>送信する</button>
        </div>
    </form>
    @if( Session::has('sent'))
    <div class="message">{{ session('sent') }}</div>
    @endif
</div>
@endsection