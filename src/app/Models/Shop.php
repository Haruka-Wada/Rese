<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'genre_id', 'name', 'outline', 'image', 'owner_id'];

    protected $guarded = ['id'];

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function isLikedBy($user): bool {
        return favorite::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function getReservation() {
        $reservations = Reservation::where('shop_id', '=', $this->id)->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return $reservations;
    }
}
