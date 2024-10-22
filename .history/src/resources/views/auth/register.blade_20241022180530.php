@extends('layouts.app')

@section('main')
<div class="main__container">
    <div class="main__card">
        <div class="main__title">
            <p class="main__title-text">
                Registration
            </p>
        </div>
        <div class="main__content">
            <form class="main__form" action="/register" method="post">
                <div class="main__form-item"></div>
                <div class="main__content-item"></div>
                <div class="main__content-item"></div>
            </form>
        </div>
    </div>
</div>
@endsection