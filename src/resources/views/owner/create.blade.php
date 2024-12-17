@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner/create.css') }}">
@endsection

@section('button')
<div class="back">
    <button onclick="location.href='/owner'">Back</button>
</div>
@endsection

@section('main')
<div class="main__contents">
    <div class="create__container">
        <div class="create__wrap">
            <div class="create__title">
                <h2>新規登録</h2>
            </div>
            <form action="/owner/store" method="post" id="store" enctype="multipart/form-data">
                @csrf
                <div class="create__form">
                    <input type="hidden" name="owner_id" value="{{ Auth::guard('owners')->id() }}">
                    <input type="text" name="name" class="create__name" placeholder="店舗名">
                    <select name="area_id" id="area_id" class="create__area">
                        @if(empty(old('area_id')))
                        <option value="" disabled selected> All area</option>
                        @endif
                        @foreach($areas as $area)
                        <option value="{{ $area->id }}" @if(old('area_id')==$area->id) selected @endif>{{ $area->name }}</option>
                        @endforeach
                    </select>
                    <select name="genre_id" id="genre_id" class="create__genre">
                        @if(empty(old('area_id')))
                        <option value="" disabled selected> All genre</option>
                        @endif
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" @if(old('genre_id')==$area->id) selected @endif>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    <textarea name="outline" class="create__outline" placeholder="詳細"></textarea>
                    <input type="file" name="image" class="create__image">
                </div>
            </form>
            <div class="error">
                @foreach ($errors->all() as $error)
                <li>※{{$error}}</li>
                @endforeach
            </div>
            <div class="create__button">
                <button form="store">登録する</button>
            </div>
        </div>
    </div>
</div>



@endsection