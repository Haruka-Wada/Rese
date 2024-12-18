{{ $reservation->user->name }}さん </br>
</br>
ご予約当日となりましたので、お知らせ致します。<br>
<br>
店名：{{ $reservation->shop->name }} <br>
日時：{{ $reservation->date->format('Y-m-d') }} {{ $reservation->time->format('H:i') }} <br>
人数：{{ $reservation->number }}名様 <br>

