@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('main')
<div class="main__wrapper">
    <div class="main_title">
        <h2>{{ Auth::user()->name }}さん</h2>
    </div>
    <div class="main??container"></div>
    <div class="reservations_container"></div>
    <div class="favorites_container"></div>
</div>
@endsection