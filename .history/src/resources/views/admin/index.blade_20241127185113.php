@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('main')
<div class="title">
    <h1 class="title__text">店舗代表者登録</h1>
</div>
<form class="form" name="contact" method="POST">
    <div class="form-item">
        <p class="form-item-label">氏名</p>
        <input
            type="text"
            name="name"
            class="form-item-input"
            placeholder="例）山田太郎" />
    </div>
    <div class="form-item">
        <p class="form-item-label">メールアドレス</p>
        <input
            type="email"
            name="email"
            class="form-item-input"
            placeholder="例）test@example.com" />
    </div>
    <div class="form-item">
        <p class="form-item-label">
            <span class="form-item-label-required">必須</span>お問い合わせ内容
        </p>
        <textarea name="textarea" class="form-item-textarea"></textarea>
    </div>
    <input type="submit" class="form-btn" value="送信する" />
</form>


@endsection