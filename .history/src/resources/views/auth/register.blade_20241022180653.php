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
            <form class="main__form" action="/register" method="post">
                @csrf
                <div class="main__form-item"></div>
                <div class="main__form-item"></div>
                <div class="main__form-item"></div>
            </form>
        </div>
    </div>
</div>
@endsection