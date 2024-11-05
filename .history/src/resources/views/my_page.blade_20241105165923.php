@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('main')
<div class="main-wrapper">
    <div class="reservations_container"></div>
    <div class="favorites_container"></div>
</div>
@endsection