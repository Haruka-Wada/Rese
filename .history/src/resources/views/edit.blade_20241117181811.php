@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="shop__container">
        <div class="shop__name-area">
            <button onclick="location.href='/'">&lt;</button>
            <h2>{{ $reservation->shop->name }}</h2>
        </div>
        <div class="shop__img">
            <img src="{{ $reservation->shop->image}}" alt="">
        </div>
        <div class="shop__tag">
            <span>#{{ $reservation->shop->area->name }}</span>
            <span>#{{ $reservation->shop->genre->name }}</span>
        </div>
        <div class="shop__outline">
            <p>{{ $reservation->shop->outline }}</p>
        </div>
    </div>
    <div class="reservation__container">
        <div class="reservation__wrap">
            <div class="reservation__title">
                <h2>予約変更フォーム</h2>
            </div>
            <form action="/update" method="post" id="update">
                @csrf
                <div class="reservation__form">
                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                    <input type="date" name="date" class="reservation__date">
                    <div class="reservation__error">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </div>
                    <select name="time" id="" class="reservation__time">
                        <option disabled selected>選択してください</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                        <option value="19:00">19:00</option>
                        <option value="19:30">19:30</option>
                        <option value="20:00">20:00</option>
                        <option value="20:30">20:30</option>
                        <option value="21:00">21:00</option>
                        <option value="21:30">21:30</option>
                        <option value="22:00">22:00</option>
                        <option value="22:30">22:30</option>
                        <option value="23:00">23:00</option>
                    </select>
                    <div class="reservation__error">
                        @error('time')
                        {{ $message }}
                        @enderror
                    </div>
                    <select name="number" id="" class="reservation__number">
                        <option disabled selected>選択してください</option>
                        @for($i = 1; $i < 51; $i++)
                            <option value="{{ $i }}">{{ $i }}人</option>
                            @endfor
                    </select>
                    <div class="reservation__error">
                        @error('number')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </form>
            <div class="reservation__confirm">
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Shop</dt>
                    <dd class="reservation__confirm-content">{{ $reservation->shop->name }}</dd>
                </dl>
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Date</dt>
                    <dd class="reservation__confirm-content" id="date"></dd>
                </dl>
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Time</dt>
                    <dd class="reservation__confirm-content" id="time"></dd>
                </dl>
                <dl class="reservation__confirm-list">
                    <dt class="reservation__confirm-item">Number</dt>
                    <dd class="reservation__confirm-content" id="number"></dd>
                </dl>
            </div>
        </div>
        <div class="update__button">
            <button type="submit" form="update">変更する</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        const date = $('#date');
        $('[name=date]').change(function() {
            const selectedDate = $('[name=date]').val();
            const formatDate = new Date(selectedDate);
            const year = formatDate.getFullYear();
            const month = formatDate.getMonth() + 1;
            const day = formatDate.getDate();
            date.text(year + "/" + month + "/" + day);
        })
    })

    $(function() {
        const time = $('#time');
        $('[name=time]').change(function() {
            const selectedTime = $('[name=time] option:selected').text();
            time.text(selectedTime);
        });
    });

    $(function() {
        const number = $('#number');
        $('[name=number]').change(function() {
            const selectedNumber = $('[name=number] option:selected').text();
            number.text(selectedNumber);
        })
    })
</script>
@endsection