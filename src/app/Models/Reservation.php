<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id', 'date', 'time', 'number'];
    protected $guarded = ['id'];

    protected $dates = [
        'date', 'time'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }

    public function format($reservation) {
        $text = "氏名：".$reservation->user->name."\n".
                "メールアドレス：".$reservation->user->email."\n".
                "日時：".$reservation->date->format('Y-m-d')." ".$reservation->time->format('H:i')."\n".
                "人数：".$reservation->number."名様";
        return $text;
    }

    public function afterReservation($user_id, $shop_id) {
        $afterReservation = Reservation::query()
            ->where('user_id', $user_id)
            ->where('shop_id', $shop_id)
            ->whereDate('date', '<=', Carbon::today())
            ->first();

        return $afterReservation;
    }
}
