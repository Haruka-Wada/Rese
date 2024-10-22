@extends('layouts.app')

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
                    <input type="text" name="name" value="{{ old('name')">
                </div>
                <div class="card__form-item"></div>
                <div class="card__form-item"></div>
            </form>
        </div>
    </div>
</div>
@endsection