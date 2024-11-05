@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('main')
<div class="main_title">
    <h2>{{ Auth::user()->name }}さん</h2>
</div>
<div class="main-wrapper">
    <div class="reservation_container"></div>
    <div class></div>
</div>
@endsection