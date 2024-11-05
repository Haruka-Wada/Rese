@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('main')
<div class="main_title">
    <h2>{{ Auth::user()->name </h2>
</div>
@endsection